# IO500 Webpage

This repository contains the source-code for the new webpage of IO500. It is made in PHP using the [CakePHP](https://cakephp.org) 4.x framework. The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Contributions

Feel free to contribute to this page by forking and making a merge request. You can find more information on how to contribute in the Wiki.

## Running checks locally

CI runs the same checks on every pull request. To reproduce them locally before pushing:

```bash
composer install            # one-time, pulls phpcs and the CakePHP codesniffer
composer cs-check           # PHP coding standard (CakePHP)
find src tests config templates -name '*.php' -print0 | xargs -0 -n1 php -l   # PHP syntax
yamllint -d relaxed .github/ config/                                 # YAML
Rscript -e 'parse(file="webroot/plots/generate-plots.r")'            # R plot script
```

`composer cs-fix` will auto-fix most coding-standard violations.
