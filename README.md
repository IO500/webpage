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
yamllint -d relaxed .github/ config/                                          # YAML
```

`composer cs-fix` will auto-fix most coding-standard violations.

## Running the tests

The test suite drops and recreates its tables, so it only runs against a throwaway
local MySQL started with Docker. `tests/bootstrap.php` refuses any other database.

```bash
bin/test-db.sh up                     # MySQL 8.0 on 127.0.0.1:33306, database io500_test_local
DATABASE_TEST_URL=mysql://io500:io500@127.0.0.1:33306/io500_test_local composer test
bin/test-db.sh down                   # remove the container when done
```

The schema comes from `tests/schema.sql`, a structure-only dump (no data). Regenerate
it when a script in `sql/` changes one of its tables.
