/* global Plotly */
/*
 * Client-side renderer for the IO500 plotly charts.
 *
 * Fetches /plots/data.json (one row per ListingsSubmissions entry across
 * all released "io500" lists) and renders one jitter scatter per
 * <div data-plot-metric="..."> on the page.
 *
 * Set window.IO500_PLOTS_DATA_URL from the template (via $this->Url->build)
 * so the path works regardless of the app's base URL.
 */

(function () {
    'use strict';

    var COLORS = ['#ec563c', '#1d2a30'];

    // data-plot-metric value -> { column, ylabel }
    var METRICS = {
        score:              { column: 'score',              ylabel: 'IO500 Score' },
        io500_bw:           { column: 'io500_bw',           ylabel: 'IO500 Bandwidth (GiB/s)' },
        io500_md:           { column: 'io500_md',           ylabel: 'IO500 Metadata (KIOP/s)' },
        ior_easy_write:     { column: 'ior_easy_write',     ylabel: 'IOR Easy Write (GiB/s)' },
        ior_easy_read:      { column: 'ior_easy_read',      ylabel: 'IOR Easy Read (GiB/s)' },
        ior_hard_write:     { column: 'ior_hard_write',     ylabel: 'IOR Hard Write (GiB/s)' },
        ior_hard_read:      { column: 'ior_hard_read',      ylabel: 'IOR Hard Read (GiB/s)' },
        mdtest_easy_write:  { column: 'mdtest_easy_write',  ylabel: 'MDtest Easy Write (kIOP/s)' },
        mdtest_easy_stat:   { column: 'mdtest_easy_stat',   ylabel: 'MDtest Easy Stat (kIOP/s)' },
        mdtest_easy_delete: { column: 'mdtest_easy_delete', ylabel: 'MDtest Easy Delete (kIOP/s)' },
        mdtest_hard_write:  { column: 'mdtest_hard_write',  ylabel: 'MDtest Hard Write (kIOP/s)' },
        mdtest_hard_read:   { column: 'mdtest_hard_read',   ylabel: 'MDtest Hard Read (kIOP/s)' },
        mdtest_hard_stat:   { column: 'mdtest_hard_stat',   ylabel: 'MDtest Hard Stat (kIOP/s)' },
        mdtest_hard_delete: { column: 'mdtest_hard_delete', ylabel: 'MDtest Hard Delete (kIOP/s)' },
        find_easy:          { column: 'find_easy',          ylabel: 'Find (kIOP/s)' }
    };

    function distinctBofs(rows) {
        var seen = {};
        var result = [];
        for (var i = 0; i < rows.length; i++) {
            var name = rows[i].list_name;
            if (!seen[name]) {
                seen[name] = true;
                result.push(name);
            }
        }
        return result;
    }

    function renderJitterPlot(target, rows, metric) {
        var bofs = distinctBofs(rows);
        var indexByBof = {};
        for (var i = 0; i < bofs.length; i++) {
            indexByBof[bofs[i]] = i;
        }

        var xs = [];
        var ys = [];
        var texts = [];
        var colors = [];
        for (var j = 0; j < rows.length; j++) {
            var row = rows[j];
            var raw = row[metric.column];
            if (raw === null || raw === undefined || raw === '') {
                continue;
            }
            var y = Number(raw);
            if (!isFinite(y)) {
                continue;
            }
            var baseX = indexByBof[row.list_name];
            var jitter = (Math.random() - 0.5) * 0.6;
            xs.push(baseX + jitter);
            ys.push(y);
            texts.push(
                'List: ' + row.list_name + '<br>' +
                'System: ' + row.information_system + '<br>' +
                'File System: ' + row.information_filesystem_type + '<br>' +
                'Institution: ' + row.information_institution + '<br>' +
                metric.ylabel + ': ' + y.toLocaleString('en-US', { maximumFractionDigits: 2 })
            );
            colors.push(COLORS[baseX % COLORS.length]);
        }

        var trace = {
            x: xs,
            y: ys,
            text: texts,
            mode: 'markers',
            type: 'scattergl',
            marker: { size: 5, color: colors },
            hoverinfo: 'text',
            showlegend: false
        };

        // Initial visible window shows the last 4 BoFs (with half-unit padding).
        var rangeStart = Math.max(-0.5, bofs.length - 4 - 0.5);
        var rangeEnd = bofs.length - 0.5;

        var layout = {
            autosize: true,
            margin: { l: 60, r: 20, t: 10, b: 40, pad: 0 },
            xaxis: {
                tickmode: 'array',
                tickvals: bofs.map(function (_, i) { return i; }),
                ticktext: bofs,
                range: [rangeStart, rangeEnd],
                rangeslider: {
                    visible: true,
                    thickness: 0.05,
                    bgcolor: '#fafafa',
                    borderwidth: 0
                },
                showgrid: false,
                zeroline: false
            },
            yaxis: {
                title: { text: metric.ylabel },
                type: 'log',
                dtick: 1,
                fixedrange: false,
                gridcolor: '#e7e7e7',
                zeroline: false
            },
            plot_bgcolor: 'white',
            paper_bgcolor: 'white'
        };

        Plotly.newPlot(target, [trace], layout, {
            displayModeBar: false,
            responsive: true
        });

        addScaleToggle(target, 'log');
    }

    function addScaleToggle(plotDiv, initial) {
        var bar = document.createElement('div');
        bar.className = 'plot-controls';

        var linearBtn = document.createElement('button');
        linearBtn.type = 'button';
        linearBtn.textContent = 'Linear';

        var logBtn = document.createElement('button');
        logBtn.type = 'button';
        logBtn.textContent = 'Log';

        function setActive(which) {
            linearBtn.className = which === 'linear' ? 'button-navigation-active' : 'button-navigation';
            logBtn.className = which === 'log' ? 'button-navigation-active' : 'button-navigation';
        }
        setActive(initial);

        linearBtn.addEventListener('click', function () {
            Plotly.relayout(plotDiv, { 'yaxis.type': 'linear', 'yaxis.dtick': null });
            setActive('linear');
        });
        logBtn.addEventListener('click', function () {
            Plotly.relayout(plotDiv, { 'yaxis.type': 'log', 'yaxis.dtick': 1 });
            setActive('log');
        });

        bar.appendChild(linearBtn);
        bar.appendChild(logBtn);
        plotDiv.parentNode.insertBefore(bar, plotDiv);
    }

    function init() {
        var targets = document.querySelectorAll('[data-plot-metric]');
        if (targets.length === 0) {
            return;
        }
        var url = window.IO500_PLOTS_DATA_URL || '/plots/data.json';

        fetch(url, { credentials: 'same-origin' })
            .then(function (r) {
                if (!r.ok) {
                    throw new Error('HTTP ' + r.status);
                }
                return r.json();
            })
            .then(function (rows) {
                for (var i = 0; i < targets.length; i++) {
                    var div = targets[i];
                    var key = div.getAttribute('data-plot-metric');
                    var metric = METRICS[key];
                    if (!metric) {
                        console.warn('plots.js: unknown metric "' + key + '"');
                        continue;
                    }
                    renderJitterPlot(div, rows, metric);
                }
            })
            .catch(function (err) {
                console.error('plots.js: failed to load ' + url, err);
                for (var i = 0; i < targets.length; i++) {
                    targets[i].innerHTML =
                        '<p style="color:#999;text-align:center;padding:2em;">' +
                        'Plot data unavailable.</p>';
                }
            });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
}());
