/*
 * Submission summary page (templates/Submissions/view.php).
 *
 * Compares this submission with one ranked list it is on: a strip plot and rank per
 * phase, the rank over time for that list type, and a bandwidth/metadata scatter.
 * The first list's data is embedded in #sv-data; other lists come from
 * /submissions/compare/{id}/{listingId} when their ranking-history cell is clicked.
 */
(function () {
    'use strict';

    var dataEl = document.getElementById('sv-data');
    if (!dataEl) {
        return;
    }
    var D = JSON.parse(dataEl.textContent);
    if (!D.comparison) {
        return;
    }

    var NS = 'http://www.w3.org/2000/svg';
    var lg = Math.log10;
    var tip = document.getElementById('sp-tip');
    var cache = {};
    var current = null;
    cache[D.comparison.listing_id] = D.comparison;

    function membership(listingId) {
        for (var i = 0; i < D.memberships.length; i++) {
            if (D.memberships[i].listing_id === listingId) {
                return D.memberships[i];
            }
        }
        return null;
    }

    // Text from the database goes into tooltips as HTML: escape it.
    function esc(s) {
        return String(s).replace(/[&<>"']/g, function (c) {
            return {'&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'}[c];
        });
    }

    function ord(n) {
        var s = ['th', 'st', 'nd', 'rd'], v = n % 100;
        return n + (s[(v - 20) % 10] || s[v] || s[0]);
    }

    function f2(x) {
        return x.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    }

    function compact(x) {
        if (x >= 1e6) { return (x / 1e6).toFixed(1) + 'M'; }
        if (x >= 1e4) { return Math.round(x / 1e3) + 'k'; }
        if (x >= 100) { return Math.round(x).toLocaleString('en-US'); }
        return x >= 1 ? x.toFixed(1) : x.toPrecision(2);
    }

    function showTip(e, html) {
        tip.innerHTML = html;
        tip.style.opacity = 1;
        var x = e.clientX + 14, w = tip.offsetWidth;
        if (x + w > innerWidth - 8) {
            x = e.clientX - w - 14;
        }
        tip.style.left = x + 'px';
        tip.style.top = (e.clientY + 14) + 'px';
    }

    function hideTip() {
        tip.style.opacity = 0;
    }

    function el(name, attrs, text) {
        var e = document.createElementNS(NS, name);
        for (var k in attrs) {
            e.setAttribute(k, attrs[k]);
        }
        if (text !== undefined) {
            e.textContent = text;
        }
        return e;
    }

    function label(entry) {
        return esc(entry.system + ' · ' + entry.institution);
    }

    // Entries that have a value for one phase, as [value, entry].
    function values(entries, col) {
        var out = [];
        entries.forEach(function (e) {
            if (e[col] > 0) {
                out.push([e[col], e]);
            }
        });
        return out;
    }

    function rankOf(vals, v) {
        return vals.filter(function (p) { return p[0] > v; }).length + 1;
    }

    /* ---- Strip plot per phase ---- */
    function strip(td, entries, listName) {
        var col = td.dataset.col, unit = td.dataset.unit, v = D.own[col], vals = values(entries, col);
        td.innerHTML = '';
        if (!vals.length || !(v > 0)) {
            return;
        }
        var W = Math.min(td.clientWidth - 20, document.documentElement.clientWidth - 64), H = 30, pad = 46;
        var all = vals.map(function (p) { return p[0]; }).concat([v]);
        var lo = lg(Math.min.apply(null, all)), hi = lg(Math.max.apply(null, all));
        var X = function (x) { return pad + (lg(x) - lo) / ((hi - lo) || 1) * (W - 2 * pad); };
        var sorted = vals.map(function (p) { return p[0]; }).sort(function (a, b) { return a - b; });
        var med = sorted[Math.floor(sorted.length / 2)];
        var r = rankOf(vals, v);
        var svg = el('svg', {width: W, height: H, role: 'img', 'aria-label': ord(r) + ' of ' + vals.length + ' on ' + listName});
        svg.appendChild(el('line', {x1: pad, x2: W - pad, y1: 13, y2: 13, stroke: '#ececec'}));
        svg.appendChild(el('text', {x: pad - 6, y: 17, 'text-anchor': 'end', 'font-size': 10, fill: '#9aa0a8'}, compact(sorted[0])));
        svg.appendChild(el('text', {x: W - pad + 6, y: 17, 'font-size': 10, fill: '#9aa0a8'}, compact(sorted[sorted.length - 1])));
        vals.forEach(function (p) {
            svg.appendChild(el('line', {x1: X(p[0]), x2: X(p[0]), y1: 9, y2: 17, stroke: '#8a9099', 'stroke-opacity': 0.4}));
        });
        svg.appendChild(el('path', {d: 'M' + X(med) + ' 20 l-3.5 5 h7z', fill: '#555'}));
        svg.appendChild(el('line', {x1: X(v), x2: X(v), y1: 4, y2: 22, stroke: '#c8102e', 'stroke-width': 2.5}));
        td.appendChild(svg);

        svg.addEventListener('mousemove', function (e) {
            var mx = e.clientX - svg.getBoundingClientRect().left, best = null, bd = 1e9;
            vals.forEach(function (p) {
                var d = Math.abs(X(p[0]) - mx);
                if (d < bd) { bd = d; best = p; }
            });
            var dm = Math.abs(X(v) - mx);
            if (dm <= bd && dm < 8) {
                showTip(e, '<b>This system</b><br>' + f2(v) + ' ' + unit + ' · ' + ord(r) + ' of ' + vals.length);
            } else if (Math.abs(X(med) - mx) < 4 && bd > 3) {
                showTip(e, '<b>Median</b><br>' + f2(med) + ' ' + unit);
            } else if (best && bd < 8) {
                showTip(e, '<b>' + label(best[1]) + '</b><br>' + f2(best[0]) + ' ' + unit + ' <span>· ' + ord(rankOf(vals, best[0])) + '</span>');
            } else {
                hideTip();
            }
        });
        svg.addEventListener('mouseleave', hideTip);
    }

    /* ---- Bandwidth vs. metadata scatter ---- */
    function scatter(entries, listName) {
        var svg = document.getElementById('sp-scatter');
        while (svg.firstChild) { svg.removeChild(svg.firstChild); }
        var W = Math.max(320, svg.parentNode.clientWidth - 24), H = Math.round(Math.min(380, Math.max(260, W * 0.42)));
        var ml = 58, mr = 16, mt = 14, mb = 46, pw = W - ml - mr, ph = H - mt - mb;
        svg.setAttribute('viewBox', '0 0 ' + W + ' ' + H);
        svg.setAttribute('aria-label', 'Bandwidth versus metadata for ' + listName);
        var pts = entries.filter(function (e) { return e.bw > 0 && e.md > 0; });
        var bws = pts.map(function (e) { return e.bw; }).concat([D.own.bw]);
        var mds = pts.map(function (e) { return e.md; }).concat([D.own.md]);
        var x0 = Math.floor(lg(Math.min.apply(null, bws))), x1 = Math.ceil(lg(Math.max.apply(null, bws)));
        var y0 = Math.floor(lg(Math.min.apply(null, mds))), y1 = Math.ceil(lg(Math.max.apply(null, mds)));
        if (x1 === x0) { x1++; }
        if (y1 === y0) { y1++; }
        var X = function (v) { return ml + (lg(v) - x0) / (x1 - x0) * pw; };
        var Y = function (v) { return mt + ph - (lg(v) - y0) / (y1 - y0) * ph; };
        var tick = function (e) { return ['0.01', '0.1', '1', '10', '100', '1k', '10k', '100k', '1M', '10M', '100M'][e + 2] || '1e' + e; };
        var defs = el('defs'), clip = el('clipPath', {id: 'sp-clip'});
        clip.appendChild(el('rect', {x: ml, y: mt, width: pw, height: ph}));
        defs.appendChild(clip);
        svg.appendChild(defs);
        for (var e = x0; e <= x1; e++) {
            svg.appendChild(el('line', {x1: X(Math.pow(10, e)), x2: X(Math.pow(10, e)), y1: mt, y2: mt + ph, stroke: '#f0f0f0'}));
            svg.appendChild(el('text', {'class': 'tk', x: X(Math.pow(10, e)), y: mt + ph + 16, 'text-anchor': 'middle'}, tick(e)));
        }
        for (e = y0; e <= y1; e++) {
            svg.appendChild(el('line', {x1: ml, x2: ml + pw, y1: Y(Math.pow(10, e)), y2: Y(Math.pow(10, e)), stroke: '#f0f0f0'}));
            svg.appendChild(el('text', {'class': 'tk', x: ml - 8, y: Y(Math.pow(10, e)) + 4, 'text-anchor': 'end'}, tick(e)));
        }
        svg.appendChild(el('text', {'class': 'at', x: ml + pw / 2, y: H - 8, 'text-anchor': 'middle'}, 'Bandwidth (GiB/s)'));
        svg.appendChild(el('text', {'class': 'at', x: 14, y: mt + ph / 2, 'text-anchor': 'middle', transform: 'rotate(-90 14 ' + (mt + ph / 2) + ')'}, 'Metadata (kIOP/s)'));
        var g = el('g', {'clip-path': 'url(#sp-clip)'});
        svg.appendChild(g);
        // Constant-score isolines: score = sqrt(bw * md).
        [1, 10, 100, 1000, 10000, 100000].forEach(function (s) {
            var s2 = s * s, xa = Math.pow(10, x0), xb = Math.pow(10, x1);
            g.appendChild(el('line', {x1: X(xa), y1: Y(s2 / xa), x2: X(xb), y2: Y(s2 / xb), stroke: '#d5d7db', 'stroke-dasharray': '3 4'}));
            var bx = Math.min(Math.max(s2 / Math.pow(10, y1), xa), xb);
            if (X(bx) < ml + pw - 60) {
                g.appendChild(el('text', {'class': 'il', x: X(bx) + 4, y: Y(s2 / bx) + 12}, 'score ' + s.toLocaleString('en-US')));
            }
        });
        pts.forEach(function (p) {
            var c = el('circle', {cx: X(p.bw), cy: Y(p.md), r: 3.4, fill: '#9aa0a8', 'fill-opacity': 0.55});
            c.addEventListener('mousemove', function (ev) {
                c.setAttribute('fill', '#16181d');
                showTip(ev, '<b>' + label(p) + '</b><br>' + f2(p.bw) + ' GiB/s · ' + f2(p.md) + ' kIOP/s');
            });
            c.addEventListener('mouseleave', function () { c.setAttribute('fill', '#9aa0a8'); hideTip(); });
            g.appendChild(c);
        });
        var fx = X(D.own.bw), fy = Y(D.own.md), r = 7;
        var dm = el('path', {d: 'M' + fx + ' ' + (fy - r) + 'L' + (fx + r) + ' ' + fy + 'L' + fx + ' ' + (fy + r) + 'L' + (fx - r) + ' ' + fy + 'Z', fill: '#c8102e', stroke: '#fff', 'stroke-width': 1.5});
        dm.addEventListener('mousemove', function (ev) { showTip(ev, '<b>This system</b><br>' + f2(D.own.bw) + ' GiB/s · ' + f2(D.own.md) + ' kIOP/s'); });
        dm.addEventListener('mouseleave', hideTip);
        svg.appendChild(dm);
    }

    /* ---- Rank over time for one list type ---- */
    function bump(history, selectedRelease) {
        var section = document.getElementById('sp-bump-section'), svg = document.getElementById('sp-bump');
        section.hidden = history.releases.length < 2;
        if (section.hidden) {
            return;
        }
        while (svg.firstChild) { svg.removeChild(svg.firstChild); }
        var R = history.releases, W = Math.max(320, svg.parentNode.clientWidth - 24), narrow = W < 560;
        var ml = 58, mr = narrow ? 60 : 190, mt = 26, mb = 12;
        var series = history.series.slice();
        if (narrow) {
            series = series.filter(function (s) { return s.self; }).concat(series.filter(function (s) { return !s.self; }).slice(0, 4));
        }
        var ranks = [];
        series.forEach(function (s) { s.ranks.forEach(function (r) { if (r) { ranks.push(r); } }); });
        var r0 = Math.min.apply(null, ranks), r1 = Math.max.apply(null, ranks), rows = r1 - r0 + 1;
        var H = mt + mb + Math.max(150, Math.min(rows * 26, 340)), ph = H - mt - mb;
        var cw = (W - ml - mr) / Math.max(1, R.length - 1);
        var X = function (c) { return ml + c * cw; };
        var Y = function (r) { return mt + (rows === 1 ? ph / 2 : (r - r0) / (rows - 1) * ph); };
        svg.setAttribute('aria-label', 'Rank by release');
        R.forEach(function (rel, c) {
            var sel = rel === selectedRelease;
            if (sel) {
                svg.appendChild(el('rect', {x: X(c) - 18, y: mt - 24, width: 36, height: ph + 30, fill: '#fdf3f2'}));
            }
            svg.appendChild(el('line', {x1: X(c), x2: X(c), y1: mt, y2: mt + ph, stroke: '#eef0f2'}));
            svg.appendChild(el('text', {'class': 'rel' + (sel ? ' sel' : ''), x: X(c), y: mt - 10, 'text-anchor': 'middle'}, rel));
        });
        var step = Math.max(1, Math.ceil(rows / 10));
        for (var r = r0; r <= r1; r += step) {
            svg.appendChild(el('text', {'class': 'tk', x: ml - 20, y: Y(r) + 4, 'text-anchor': 'end'}, ord(r)));
        }
        function path(rs) {
            var d = '', prev = null;
            rs.forEach(function (rk, c) {
                if (!rk) { prev = null; return; }
                if (!prev) {
                    d += 'M' + X(c) + ' ' + Y(rk);
                } else {
                    var mx = (X(prev.c) + X(c)) / 2;
                    d += 'C' + mx + ' ' + Y(prev.r) + ' ' + mx + ' ' + Y(rk) + ' ' + X(c) + ' ' + Y(rk);
                }
                prev = {c: c, r: rk};
            });
            return d;
        }
        var labels = [];
        series.slice().reverse().forEach(function (s) {
            var me = s.self, g = el('g', {'class': me ? 'm' : 'o'}), name = esc(s.label);
            g.appendChild(el('path', me
                ? {d: path(s.ranks), fill: 'none', stroke: '#c8102e', 'stroke-width': 4, 'stroke-linecap': 'round'}
                : {d: path(s.ranks), 'class': 'ln'}));
            var last = null;
            s.ranks.forEach(function (rk, c) {
                if (!rk) { return; }
                last = {c: c, r: rk};
                var dot = el('circle', {cx: X(c), cy: Y(rk), r: me ? 5.5 : 3.5, fill: me ? '#c8102e' : '#aeb3ba', stroke: '#fff', 'stroke-width': 1.5});
                dot.addEventListener('mousemove', function (ev) {
                    showTip(ev, '<b>' + (me ? 'This system' : name) + '</b><br>' + R[c] + ': ' + ord(rk) + ' of ' + history.totals[c]);
                });
                dot.addEventListener('mouseleave', hideTip);
                g.appendChild(dot);
            });
            if (last && (!narrow || me)) {
                var t = s.label.split(' · ')[0];
                if (t.length > 26) { t = t.slice(0, 25) + '…'; }
                labels.push({g: g, me: me, x: X(last.c) + 10, y: Y(last.r) + 4, t: me ? (narrow ? ord(last.r) : t + '  ' + ord(last.r)) : t});
            }
            g.addEventListener('mousemove', function (ev) {
                if (ev.target.tagName !== 'circle') { showTip(ev, '<b>' + (me ? 'This system' : name) + '</b>'); }
            });
            g.addEventListener('mouseleave', hideTip);
            svg.appendChild(g);
        });
        // Keep end labels apart, and grow the chart if they run past the bottom.
        labels.sort(function (a, b) { return a.y - b.y; });
        for (var i = 1; i < labels.length; i++) {
            if (labels[i].y < labels[i - 1].y + 14) { labels[i].y = labels[i - 1].y + 14; }
        }
        var over = labels.length ? labels[labels.length - 1].y + 6 - H : 0;
        svg.setAttribute('viewBox', '0 0 ' + W + ' ' + (H + Math.max(0, over)));
        labels.forEach(function (a) { a.g.appendChild(el('text', {'class': a.me ? 'me' : 'lbl', x: a.x, y: a.y}, a.t)); });
    }

    /* ---- Render one list ---- */
    function render(listingId) {
        var m = membership(listingId), data = cache[listingId];
        if (!m || !data) {
            return;
        }
        current = listingId;
        var name = m.release + ' ' + m.type_name;
        document.querySelectorAll('[data-cmp]').forEach(function (e) { e.textContent = name; });
        document.querySelectorAll('[data-type]').forEach(function (e) { e.textContent = m.type_name + ' list'; });
        document.querySelectorAll('[data-cmp-head]').forEach(function (e) { e.textContent = name + ' (' + data.entries.length + ' entries)'; });
        document.querySelectorAll('.sp-res td.s').forEach(function (td) { strip(td, data.entries, name); });
        document.querySelectorAll('.sp-res td.rk').forEach(function (td) {
            var vals = values(data.entries, td.dataset.col), v = D.own[td.dataset.col];
            td.innerHTML = vals.length && v > 0 ? ord(rankOf(vals, v)) + ' <span>of ' + vals.length + '</span>' : '';
        });
        document.querySelectorAll('#sp-lists button.cell').forEach(function (b) {
            var on = +b.dataset.listing === listingId;
            b.classList.toggle('on', on);
            b.setAttribute('aria-pressed', on);
        });
        var link = document.getElementById('sp-list-link');
        if (link) {
            link.textContent = 'View the full ' + name + ' list ↗';
            link.href = D.listUrl + m.release.toLowerCase() + '/' + m.type_url;
        }
        scatter(data.entries, name);
        bump(data.history, m.release);
    }

    function select(listingId) {
        if (cache[listingId]) {
            render(listingId);
        } else {
            fetch(D.compareUrl + listingId, {headers: {Accept: 'application/json'}})
                .then(function (r) { if (!r.ok) { throw new Error(r.status); } return r.json(); })
                .then(function (data) { cache[listingId] = data; render(listingId); })
                .catch(function () { /* keep showing the current list */ });
        }
        var url = new URL(location.href);
        url.searchParams.set('list', listingId);
        history.replaceState(null, '', url);
    }

    document.querySelectorAll('#sp-lists button.cell').forEach(function (b) {
        b.addEventListener('click', function () { select(+b.dataset.listing); });
    });

    // Show as many releases as the System table has rows; the rest behind a toggle.
    (function () {
        var spec = document.getElementById('sp-spec'), table = document.getElementById('sp-lists'), btn = document.getElementById('sp-older');
        if (!spec || !table) {
            return;
        }
        var n = Math.max(1, spec.tBodies[0].rows.length), rows = [].slice.call(table.tBodies[0].rows), extra = rows.length - n;
        if (extra <= 0) {
            return;
        }
        var closed = 'Show ' + extra + ' older release' + (extra > 1 ? 's' : '') + ' ▾';
        rows.slice(n).forEach(function (r) { r.hidden = true; });
        btn.hidden = false;
        btn.textContent = closed;
        btn.addEventListener('click', function () {
            var open = btn.dataset.open !== '1';
            rows.slice(n).forEach(function (r) { r.hidden = !open; });
            btn.dataset.open = open ? '1' : '0';
            btn.textContent = open ? 'Show fewer ▴' : closed;
        });
    })();

    var resizeTimer;
    addEventListener('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () { render(current); }, 150);
    });

    render(D.comparison.listing_id);
})();
