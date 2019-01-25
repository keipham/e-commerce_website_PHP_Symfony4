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
            '/admin/users' => array(array(array('_route' => 'admin_users_index', '_controller' => 'App\\Controller\\AdminController::indexUsers'), null, array('GET' => 0), null, false, false, null)),
            '/admin/users/new' => array(array(array('_route' => 'admin_users_new', '_controller' => 'App\\Controller\\AdminController::newUser'), null, array('GET' => 0, 'POST' => 1), null, false, false, null)),
            '/admin/games' => array(array(array('_route' => 'admin_games_index', '_controller' => 'App\\Controller\\AdminController::indexGames'), null, array('GET' => 0), null, false, false, null)),
            '/admin/games/new' => array(array(array('_route' => 'admin_games_new', '_controller' => 'App\\Controller\\AdminController::newGame'), null, array('GET' => 0, 'POST' => 1), null, false, false, null)),
            '/admin/new' => array(array(array('_route' => 'formulas_new', '_controller' => 'App\\Controller\\AdminController::newFormula'), null, array('GET' => 0, 'POST' => 1), null, false, false, null)),
            '/formulas' => array(array(array('_route' => 'formulas_index', '_controller' => 'App\\Controller\\FormulasController::index'), null, array('GET' => 0), null, true, false, null)),
            '/games/games' => array(array(array('_route' => 'games_index', '_controller' => 'App\\Controller\\GamesController::indexUser'), null, array('GET' => 0), null, true, false, null)),
            '/' => array(array(array('_route' => 'home', '_controller' => 'App\\Controller\\SecurityController::index'), null, null, null, false, false, null)),
            '/register' => array(array(array('_route' => 'register', '_controller' => 'App\\Controller\\SecurityController::registration'), null, null, null, false, false, null)),
            '/login' => array(array(array('_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'), null, null, null, false, false, null)),
            '/logout' => array(array(array('_route' => 'logout', '_controller' => 'App\\Controller\\SecurityController::logout'), null, null, null, false, false, null)),
            '/_profiler' => array(array(array('_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'), null, null, null, true, false, null)),
            '/_profiler/search' => array(array(array('_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'), null, null, null, false, false, null)),
            '/_profiler/search_bar' => array(array(array('_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'), null, null, null, false, false, null)),
            '/_profiler/phpinfo' => array(array(array('_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'), null, null, null, false, false, null)),
            '/_profiler/open' => array(array(array('_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'), null, null, null, false, false, null)),
        );
        $this->regexpList = array(
            0 => '{^(?'
                    .'|/admin/(?'
                        .'|games/([^/]++)(?'
                            .'|/edit(*:39)'
                            .'|(*:46)'
                        .')'
                        .'|([^/]++)(?'
                            .'|/edit(*:70)'
                            .'|(*:77)'
                        .')'
                    .')'
                    .'|/formulas/([^/]++)(*:104)'
                    .'|/games/games/([^/]++)(*:133)'
                    .'|/users/([^/]++)(?'
                        .'|(*:159)'
                        .'|/edit(*:172)'
                        .'|(*:180)'
                    .')'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:220)'
                        .'|wdt/([^/]++)(*:240)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:286)'
                                .'|router(*:300)'
                                .'|exception(?'
                                    .'|(*:320)'
                                    .'|\\.css(*:333)'
                                .')'
                            .')'
                            .'|(*:343)'
                        .')'
                    .')'
                .')/?$}sDu',
        );
        $this->dynamicRoutes = array(
            39 => array(array(array('_route' => 'admin_games_edit', '_controller' => 'App\\Controller\\AdminController::editGame'), array('id'), array('GET' => 0, 'POST' => 1), null, false, false, null)),
            46 => array(array(array('_route' => 'admin_games_delete', '_controller' => 'App\\Controller\\AdminController::deleteGame'), array('id'), array('DELETE' => 0), null, false, true, null)),
            70 => array(array(array('_route' => 'formulas_edit', '_controller' => 'App\\Controller\\AdminController::editFormula'), array('id'), array('GET' => 0, 'POST' => 1), null, false, false, null)),
            77 => array(array(array('_route' => 'formulas_delete', '_controller' => 'App\\Controller\\AdminController::deleteFormula'), array('id'), array('DELETE' => 0), null, false, true, null)),
            104 => array(array(array('_route' => 'formulas_show', '_controller' => 'App\\Controller\\FormulasController::showFormula'), array('id'), array('GET' => 0), null, false, true, null)),
            133 => array(array(array('_route' => 'games_show', '_controller' => 'App\\Controller\\GamesController::show'), array('id'), array('GET' => 0), null, false, true, null)),
            159 => array(array(array('_route' => 'users_show', '_controller' => 'App\\Controller\\UsersController::show'), array('id'), array('GET' => 0), null, false, true, null)),
            172 => array(array(array('_route' => 'users_edit', '_controller' => 'App\\Controller\\UsersController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, false, null)),
            180 => array(array(array('_route' => 'users_delete', '_controller' => 'App\\Controller\\UsersController::delete'), array('id'), array('DELETE' => 0), null, false, true, null)),
            220 => array(array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null, false, true, null)),
            240 => array(array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null, false, true, null)),
            286 => array(array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null, false, false, null)),
            300 => array(array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null, false, false, null)),
            320 => array(array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null, false, false, null)),
            333 => array(array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null, false, false, null)),
            343 => array(array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null, false, true, null)),
        );
    }
}
