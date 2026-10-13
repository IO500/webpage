<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\TestSuite\Fixture\SchemaLoader;

/**
 * Test runner bootstrap.
 *
 * Add additional configuration/setup your application needs when running
 * unit tests in this file.
 */
require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/config/bootstrap.php';

$_SERVER['PHP_SELF'] = '/';

Configure::write('App.fullBaseUrl', 'http://localhost');

// DebugKit skips settings these connection config if PHP SAPI is CLI / PHPDBG.
// But since PagesControllerTest is run with debug enabled and DebugKit is loaded
// in application, without setting up these config DebugKit errors out.
ConnectionManager::setConfig('test_debug_kit', [
    'className' => 'Cake\Database\Connection',
    'driver' => 'Cake\Database\Driver\Sqlite',
    'database' => TMP . 'debug_kit.sqlite',
    'encoding' => 'utf8',
    'cacheMetadata' => true,
    'quoteIdentifiers' => false,
]);

ConnectionManager::alias('test_debug_kit', 'debug_kit');

// The suite drops, recreates and truncates tables, so it must only ever run against
// a throwaway local database (bin/test-db.sh). Build the `test` connection from
// DATABASE_TEST_URL alone - never from config/app_local.php, which points at a
// shared server - and refuse anything that is not local and named io500_test_local.
// This runs before SchemaLoader below and before the fixture extension touches a table.
$testUrl = getenv('DATABASE_TEST_URL');
if (!$testUrl) {
    fwrite(STDERR, "DATABASE_TEST_URL is not set. Start the local test database with bin/test-db.sh up and run:\n"
        . "  DATABASE_TEST_URL=mysql://io500:io500@127.0.0.1:33306/io500_test_local composer test\n");
    exit(1);
}
ConnectionManager::drop('test');
ConnectionManager::setConfig('test', ['url' => $testUrl]);
$testConfig = ConnectionManager::getConfig('test');
if (
    !in_array($testConfig['host'] ?? '', ['localhost', '127.0.0.1', '::1'], true)
    || ($testConfig['database'] ?? '') !== 'io500_test_local'
) {
    fwrite(STDERR, sprintf(
        "Refusing to run tests against %s/%s: the test database must be local and named io500_test_local.\n",
        $testConfig['host'] ?? '?',
        $testConfig['database'] ?? '?',
    ));
    exit(1);
}

// Let PHPUnit handle PHP errors and deprecations: it only installs its own handler
// when none is set, and the app's ErrorTrap (config/bootstrap.php) would otherwise
// just print them. With failOnDeprecation in phpunit.xml.dist they fail the run.
restore_error_handler();

// Tests must not read or write tmp/cache, which the web server also owns.
Cache::disable();

// Recreate the schema in the local test database (drops every table there first).
(new SchemaLoader())->loadSqlFiles(TESTS . 'schema.sql', 'test');

// Fixate sessionid early on, as php7.2+
// does not allow the sessionid to be set after stdout
// has been written to.
session_id('cli');
