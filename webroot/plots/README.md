# IO500 Plots

The interactive charts under `/submissions/{graphs,ior,mdtest,pfind}` are rendered client-side by `webroot/js/plots.js` from the JSON endpoint `GET /plots/data.json` (implemented in `ListingsController::plotsData()`).

There is no script to run and no static HTML to commit. The set of BoFs shown on the x-axis is whatever is in the `releases` table.

## Adding a new metric

1. Add the column to the payload in `ListingsController::plotsData()`.
2. Add an entry to the `METRICS` map in `webroot/js/plots.js` (`{column, ylabel}`).
3. Add a `<div data-plot-metric="your_metric"></div>` to the relevant template under `templates/Submissions/` (and a `<h3>` heading inside the `<li>` that wraps it).

That's it — no regeneration step.

## Adding a new release

Just add the release/listing/submissions rows to the database. The next page load picks them up (subject to the 10-minute `Cache-Control: public, max-age=600` on the JSON endpoint).
