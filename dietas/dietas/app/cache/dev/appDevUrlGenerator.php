<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appDevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_purge' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:purgeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/purge',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_info' => array (  0 =>   array (    0 => 'about',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'about',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler/info',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_step' => array (  0 =>   array (    0 => 'index',  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'index',    ),    1 =>     array (      0 => 'text',      1 => '/_configurator/step',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_final' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/final',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_twig_error_test' => array (  0 =>   array (    0 => 'code',    1 => '_format',  ),  1 =>   array (    '_controller' => 'twig.controller.preview_error:previewErrorPageAction',    '_format' => 'html',  ),  2 =>   array (    'code' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^/]++',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'code',    ),    2 =>     array (      0 => 'text',      1 => '/_error',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_contentblock' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\ContentManagementBundle\\Controller\\ContentBlockController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/contentblock/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_contentblock_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\ContentManagementBundle\\Controller\\ContentBlockController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/contentblock/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_contentblock_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\ContentManagementBundle\\Controller\\ContentBlockController::createAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/contentblock/create',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_contentblock_position_update' => array (  0 =>   array (    0 => 'id',    1 => 'p',  ),  1 =>   array (    'id' => NULL,    'p' => NULL,    '_controller' => 'App\\ContentManagementBundle\\Controller\\ContentBlockController::UpdatePositionAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'p',    ),    1 =>     array (      0 => 'text',      1 => '/position',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    3 =>     array (      0 => 'text',      1 => '/management/contentblock/update/entity',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_contentmanagement_default_index' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'App\\ContentManagementBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/hello',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'about' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\AboutController::aboutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/page/about',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'affiliate_about' => array (  0 =>   array (    0 => 'username',  ),  1 =>   array (    'username' => NULL,    '_controller' => 'App\\FrontBundle\\Controller\\AboutController::affiliateAboutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/page/about',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'username',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'contact' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\ContactController::contactAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/page/contact',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'affiliate_contact' => array (  0 =>   array (    0 => 'username',  ),  1 =>   array (    'username' => NULL,    '_controller' => 'App\\FrontBundle\\Controller\\ContactController::affiliateContactAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/page/contact',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'username',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\HomepageController::homepageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'affiliate_homepage' => array (  0 =>   array (    0 => 'username',  ),  1 =>   array (    'username' => NULL,    '_controller' => 'App\\FrontBundle\\Controller\\HomepageController::affiliateHomepageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'username',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'join' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\JoinController::JoinAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/page/join',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'affiliate_join' => array (  0 =>   array (    0 => 'username',  ),  1 =>   array (    'username' => NULL,    '_controller' => 'App\\FrontBundle\\Controller\\JoinController::affiliateAboutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/page/join',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'username',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\LoginController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'check_path' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\LoginController::loginCheckAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_compensationplan' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/compensationplan/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_compensationplan_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::createAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/compensationplan/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_compensationplan_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::newAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/compensationplan/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_compensationplan_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::showAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/compensationplan',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_compensationplan_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::editAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/config/compensationplan',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_compensationplan_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::updateAction',  ),  2 =>   array (    '_method' => 'PUT',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/compensationplan',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_compensationplan_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::deleteAction',  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/compensationplan',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_country' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CountryController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/country/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_country_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CountryController::createAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/country/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_country_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CountryController::newAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/country/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_country_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CountryController::showAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/country',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_country_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CountryController::editAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/config/country',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_country_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CountryController::updateAction',  ),  2 =>   array (    '_method' => 'PUT',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/country',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_country_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\CountryController::deleteAction',  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/country',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\HomeController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_notificationtype' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/notificationtype/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_notificationtype_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::createAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/notificationtype/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_notificationtype_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::newAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/notificationtype/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_notificationtype_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::showAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/notificationtype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_notificationtype_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::editAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/config/notificationtype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_notificationtype_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::updateAction',  ),  2 =>   array (    '_method' => 'PUT',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/notificationtype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_notificationtype_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::deleteAction',  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/notificationtype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_product_diets' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\ProductController::dietsAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/product/diets',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_product_training' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\ProductController::trainingAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/product/training',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_producttype' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/producttype/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_producttype_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::createAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/producttype/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_producttype_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::newAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/producttype/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_producttype_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::showAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/producttype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_producttype_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::editAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/config/producttype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_producttype_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::updateAction',  ),  2 =>   array (    '_method' => 'PUT',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/producttype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_producttype_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::deleteAction',  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/producttype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_transaction' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\TransactionController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/transaction/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_transactiontype' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/transactiontype/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_transactiontype_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::createAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/transactiontype/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_transactiontype_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::newAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/config/transactiontype/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_transactiontype_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::showAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/transactiontype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_transactiontype_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::editAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/config/transactiontype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_transactiontype_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::updateAction',  ),  2 =>   array (    '_method' => 'PUT',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/transactiontype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'config_transactiontype_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::deleteAction',  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/config/transactiontype',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::indexAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_country' => array (  0 =>   array (  ),  1 =>   array (    'id' => NULL,    '_controller' => 'App\\AdminBundle\\Controller\\UserController::countryAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/management',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_message' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::messageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/network/message',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_send' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::sendAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/network/message/send',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_compose' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::composeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/network/message/compose',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_network' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::networkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/network',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    'id' => NULL,    '_controller' => 'App\\AdminBundle\\Controller\\UserController::showAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/management/user/profile',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_associate_notificationType' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::associateNotificationTypeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/associate/notificationType',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_avatar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::setAvatarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/avatar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_avatar_delete' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::deleteAvatarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/avatar/delete',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_password_change' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::changePassworkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/password/change',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::createAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/create',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_update' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::updateAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/management/user/update',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'management_user_associate_module' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\UserController::buyModule',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/management/user/associate/module',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'logout' => array (  0 =>   array (  ),  1 =>   array (  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}