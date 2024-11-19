<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */
/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    // Register scoped middleware for in scopes.
    $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true,
    ]));

    /*
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered through `Application::routes()` with `registerMiddleware()`
     */
    $builder->applyMiddleware('csrf');

    /*
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, templates/Pages/home.php)...
     */
    $builder->connect(
        '/',
        [
            'controller' => 'Listings',
            'action' => 'list',
            'sc24',
            'io500',
        ]
    );
    $builder->connect(
        '/running',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'running',
        ]
    );
    $builder->connect(
        '/about',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'about',
        ]
    );
    $builder->connect(
        '/the-lists',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'the-lists',
        ]
    );
    $builder->connect(
        '/contact',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'contact',
        ]
    );
    $builder->connect(
        '/news',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'news',
        ]
    );
    $builder->connect(
        '/bofs',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'bofs',
        ]
    );
    $builder->connect(
        '/running',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'running',
        ]
    );
    $builder->connect(
        '/steering',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'steering',
        ]
    );
    $builder->connect(
        '/submission',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'submission',
        ]
    );
    $builder->connect(
        '/cfs',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'submission',
        ]
    );
    $builder->connect(
        '/rules',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'rules',
        ]
    );
    $builder->connect(
        '/rules/submission',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'rules-submission',
        ]
    );
    $builder->connect(
        '/rules/scc-submission',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'rules-scc-submission',
        ]
    );
    $builder->connect(
        '/rules/benchmark',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'rules-benchmark',
        ]
    );
    $builder->connect(
        '/rules/committee',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'rules-committee',
        ]
    );
    $builder->connect(
        '/rules/sub-committees',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'rules-sub-committees',
        ]
    );
    $builder->connect(
        '/rules/committee-member',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'rules-committee-member',
        ]
    );
    $builder->connect(
        '/rules/public',
        [
            'controller' => 'Pages',
            'action' => 'display',
            'rules-public',
        ]
    );

    $builder->connect(
        '/list/*',
        [
            'controller' => 'Listings',
            'action' => 'list',
        ]
    );

    $builder->connect(
        '/download/*',
        [
            'controller' => 'Listings',
            'action' => 'download',
        ]
    );

    /*
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $builder->connect(
        '/pages/*',
        [
            'controller' => 'Pages',
            'action' => 'display',
        ]
    );

    /*
     * Connect catchall routes for all controllers.
     *
     * The `fallbacks` method is a shortcut for
     *
     * ```
     * $builder->connect('/:controller', ['action' => 'index']);
     * $builder->connect('/:controller/:action/*', []);
     * ```
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $builder->fallbacks();
});

/*
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * $routes->scope('/api', function (RouteBuilder $builder) {
 *     // No $builder->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
