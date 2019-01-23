<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = array(
            '/games' => array(array(array('_route' => 'games_index', '_controller' => 'App\\Controller\\GamesController::index'), null, array('GET' => 0), null, true, false, null)),
            '/games/new' => array(array(array('_route' => 'games_new', '_controller' => 'App\\Controller\\GamesController::new'), null, array('GET' => 0, 'POST' => 1), null, false, false, null)),
            '/register' => array(array(array('_route' => 'register', '_controller' => 'App\\Controller\\SecurityController::registration'), null, null, null, false, false, null)),
            '/login' => array(array(array('_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'), null, null, null, false, false, null)),
            '/logout' => array(array(array('_route' => 'logout', '_controller' => 'App\\Controller\\SecurityController::logout'), null, null, null, false, false, null)),
            '/users' => array(array(array('_route' => 'users_index', '_controller' => 'App\\Controller\\UsersController::index'), null, array('GET' => 0), null, true, false, null)),
            '/users/new' => array(array(array('_route' => 'users_new', '_controller' => 'App\\Controller\\UsersController::new'), null, array('GET' => 0, 'POST' => 1), null, false, false, null)),
            '/_profiler' => array(array(array('_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'), null, null, null, true, false, null)),
            '/_profiler/search' => array(array(array('_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'), null, null, null, false, false, null)),
            '/_profiler/search_bar' => array(array(array('_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'), null, null, null, false, false, null)),
            '/_profiler/phpinfo' => array(array(array('_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'), null, null, null, false, false, null)),
            '/_profiler/open' => array(array(array('_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'), null, null, null, false, false, null)),
        );
        $this->regexpList = array(
            0 => '{^(?'
                    .'|/games/([^/]++)(?'
                        .'|(*:25)'
                        .'|/edit(*:37)'
                        .'|(*:44)'
                    .')'
                    .'|/users/([^/]++)(?'
                        .'|(*:70)'
                        .'|/edit(*:82)'
                        .'|(*:89)'
                    .')'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:128)'
                        .'|wdt/([^/]++)(*:148)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:194)'
                                .'|router(*:208)'
                                .'|exception(?'
                                    .'|(*:228)'
                                    .'|\\.css(*:241)'
                                .')'
                            .')'
                            .'|(*:251)'
                        .')'
                    .')'
                .')/?$}sDu',
        );
        $this->dynamicRoutes = array(
            25 => array(array(array('_route' => 'games_show', '_controller' => 'App\\Controller\\GamesController::show'), array('id'), array('GET' => 0), null, false, true, null)),
            37 => array(array(array('_route' => 'games_edit', '_controller' => 'App\\Controller\\GamesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, false, null)),
            44 => array(array(array('_route' => 'games_delete', '_controller' => 'App\\Controller\\GamesController::delete'), array('id'), array('DELETE' => 0), null, false, true, null)),
            70 => array(array(array('_route' => 'users_show', '_controller' => 'App\\Controller\\UsersController::show'), array('id'), array('GET' => 0), null, false, true, null)),
            82 => array(array(array('_route' => 'users_edit', '_controller' => 'App\\Controller\\UsersController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, false, null)),
            89 => array(array(array('_route' => 'users_delete', '_controller' => 'App\\Controller\\UsersController::delete'), array('id'), array('DELETE' => 0), null, false, true, null)),
            128 => array(array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null, false, true, null)),
            148 => array(array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null, false, true, null)),
            194 => array(array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null, false, false, null)),
            208 => array(array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null, false, false, null)),
            228 => array(array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null, false, false, null)),
            241 => array(array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null, false, false, null)),
            251 => array(array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null, false, true, null)),
        );
    }
}
