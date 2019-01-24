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
            '/formulas' => array(array(array('_route' => 'formulas_index', '_controller' => 'App\\Controller\\FormulasController::index'), null, array('GET' => 0), null, true, false, null)),
            '/formulas/new' => array(array(array('_route' => 'formulas_new', '_controller' => 'App\\Controller\\FormulasController::new'), null, array('GET' => 0, 'POST' => 1), null, false, false, null)),
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
                    .'|/formulas/([^/]++)(?'
                        .'|(*:28)'
                        .'|/edit(*:40)'
                        .'|(*:47)'
                    .')'
                    .'|/games/([^/]++)(?'
                        .'|(*:73)'
                        .'|/edit(*:85)'
                        .'|(*:92)'
                    .')'
                    .'|/users/([^/]++)(?'
                        .'|(*:118)'
                        .'|/edit(*:131)'
                        .'|(*:139)'
                    .')'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:179)'
                        .'|wdt/([^/]++)(*:199)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:245)'
                                .'|router(*:259)'
                                .'|exception(?'
                                    .'|(*:279)'
                                    .'|\\.css(*:292)'
                                .')'
                            .')'
                            .'|(*:302)'
                        .')'
                    .')'
                .')/?$}sDu',
        );
        $this->dynamicRoutes = array(
            28 => array(array(array('_route' => 'formulas_show', '_controller' => 'App\\Controller\\FormulasController::show'), array('id'), array('GET' => 0), null, false, true, null)),
            40 => array(array(array('_route' => 'formulas_edit', '_controller' => 'App\\Controller\\FormulasController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, false, null)),
            47 => array(array(array('_route' => 'formulas_delete', '_controller' => 'App\\Controller\\FormulasController::delete'), array('id'), array('DELETE' => 0), null, false, true, null)),
            73 => array(array(array('_route' => 'games_show', '_controller' => 'App\\Controller\\GamesController::show'), array('id'), array('GET' => 0), null, false, true, null)),
            85 => array(array(array('_route' => 'games_edit', '_controller' => 'App\\Controller\\GamesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, false, null)),
            92 => array(array(array('_route' => 'games_delete', '_controller' => 'App\\Controller\\GamesController::delete'), array('id'), array('DELETE' => 0), null, false, true, null)),
            118 => array(array(array('_route' => 'users_show', '_controller' => 'App\\Controller\\UsersController::show'), array('id'), array('GET' => 0), null, false, true, null)),
            131 => array(array(array('_route' => 'users_edit', '_controller' => 'App\\Controller\\UsersController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, false, null)),
            139 => array(array(array('_route' => 'users_delete', '_controller' => 'App\\Controller\\UsersController::delete'), array('id'), array('DELETE' => 0), null, false, true, null)),
            179 => array(array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null, false, true, null)),
            199 => array(array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null, false, true, null)),
            245 => array(array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null, false, false, null)),
            259 => array(array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null, false, false, null)),
            279 => array(array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null, false, false, null)),
            292 => array(array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null, false, false, null)),
            302 => array(array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null, false, true, null)),
        );
    }
}
