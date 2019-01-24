<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        'formulas_index' => array(array(), array('_controller' => 'App\\Controller\\FormulasController::index'), array(), array(array('text', '/formulas/')), array(), array()),
        'formulas_new' => array(array(), array('_controller' => 'App\\Controller\\FormulasController::new'), array(), array(array('text', '/formulas/new')), array(), array()),
        'formulas_show' => array(array('id'), array('_controller' => 'App\\Controller\\FormulasController::show'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/formulas')), array(), array()),
        'formulas_edit' => array(array('id'), array('_controller' => 'App\\Controller\\FormulasController::edit'), array(), array(array('text', '/edit'), array('variable', '/', '[^/]++', 'id', true), array('text', '/formulas')), array(), array()),
        'formulas_delete' => array(array('id'), array('_controller' => 'App\\Controller\\FormulasController::delete'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/formulas')), array(), array()),
        'games_index' => array(array(), array('_controller' => 'App\\Controller\\GamesController::index'), array(), array(array('text', '/games/')), array(), array()),
        'games_new' => array(array(), array('_controller' => 'App\\Controller\\GamesController::new'), array(), array(array('text', '/games/new')), array(), array()),
        'games_show' => array(array('id'), array('_controller' => 'App\\Controller\\GamesController::show'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/games')), array(), array()),
        'games_edit' => array(array('id'), array('_controller' => 'App\\Controller\\GamesController::edit'), array(), array(array('text', '/edit'), array('variable', '/', '[^/]++', 'id', true), array('text', '/games')), array(), array()),
        'games_delete' => array(array('id'), array('_controller' => 'App\\Controller\\GamesController::delete'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/games')), array(), array()),
        'register' => array(array(), array('_controller' => 'App\\Controller\\SecurityController::registration'), array(), array(array('text', '/register')), array(), array()),
        'login' => array(array(), array('_controller' => 'App\\Controller\\SecurityController::login'), array(), array(array('text', '/login')), array(), array()),
        'logout' => array(array(), array('_controller' => 'App\\Controller\\SecurityController::logout'), array(), array(array('text', '/logout')), array(), array()),
        'users_index' => array(array(), array('_controller' => 'App\\Controller\\UsersController::index'), array(), array(array('text', '/users/')), array(), array()),
        'users_new' => array(array(), array('_controller' => 'App\\Controller\\UsersController::new'), array(), array(array('text', '/users/new')), array(), array()),
        'users_show' => array(array('id'), array('_controller' => 'App\\Controller\\UsersController::show'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/users')), array(), array()),
        'users_edit' => array(array('id'), array('_controller' => 'App\\Controller\\UsersController::edit'), array(), array(array('text', '/edit'), array('variable', '/', '[^/]++', 'id', true), array('text', '/users')), array(), array()),
        'users_delete' => array(array('id'), array('_controller' => 'App\\Controller\\UsersController::delete'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/users')), array(), array()),
        '_twig_error_test' => array(array('code', '_format'), array('_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code' => '\\d+'), array(array('variable', '.', '[^/]++', '_format', true), array('variable', '/', '\\d+', 'code', true), array('text', '/_error')), array(), array()),
        '_wdt' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::toolbarAction'), array(), array(array('variable', '/', '[^/]++', 'token', true), array('text', '/_wdt')), array(), array()),
        '_profiler_home' => array(array(), array('_controller' => 'web_profiler.controller.profiler::homeAction'), array(), array(array('text', '/_profiler/')), array(), array()),
        '_profiler_search' => array(array(), array('_controller' => 'web_profiler.controller.profiler::searchAction'), array(), array(array('text', '/_profiler/search')), array(), array()),
        '_profiler_search_bar' => array(array(), array('_controller' => 'web_profiler.controller.profiler::searchBarAction'), array(), array(array('text', '/_profiler/search_bar')), array(), array()),
        '_profiler_phpinfo' => array(array(), array('_controller' => 'web_profiler.controller.profiler::phpinfoAction'), array(), array(array('text', '/_profiler/phpinfo')), array(), array()),
        '_profiler_search_results' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array(), array(array('text', '/search/results'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_open_file' => array(array(), array('_controller' => 'web_profiler.controller.profiler::openAction'), array(), array(array('text', '/_profiler/open')), array(), array()),
        '_profiler' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::panelAction'), array(), array(array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_router' => array(array('token'), array('_controller' => 'web_profiler.controller.router::panelAction'), array(), array(array('text', '/router'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_exception' => array(array('token'), array('_controller' => 'web_profiler.controller.exception::showAction'), array(), array(array('text', '/exception'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_exception_css' => array(array('token'), array('_controller' => 'web_profiler.controller.exception::cssAction'), array(), array(array('text', '/exception.css'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && null !== $name) {
            do {
                if ((self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name) {
                    unset($parameters['_locale']);
                    $name .= '.'.$locale;
                    break;
                }
            } while (false !== $locale = strstr($locale, '_', true));
        }

        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
