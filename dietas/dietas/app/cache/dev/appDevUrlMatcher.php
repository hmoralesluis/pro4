<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/management/contentblock')) {
            // management_contentblock
            if (rtrim($pathinfo, '/') === '/management/contentblock') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_management_contentblock;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'management_contentblock');
                }

                return array (  '_controller' => 'App\\ContentManagementBundle\\Controller\\ContentBlockController::indexAction',  '_route' => 'management_contentblock',);
            }
            not_management_contentblock:

            // management_contentblock_new
            if ($pathinfo === '/management/contentblock/new') {
                return array (  '_controller' => 'App\\ContentManagementBundle\\Controller\\ContentBlockController::newAction',  '_route' => 'management_contentblock_new',);
            }

            // management_contentblock_create
            if ($pathinfo === '/management/contentblock/create') {
                return array (  '_controller' => 'App\\ContentManagementBundle\\Controller\\ContentBlockController::createAction',  '_route' => 'management_contentblock_create',);
            }

            // management_contentblock_position_update
            if (0 === strpos($pathinfo, '/management/contentblock/update/entity') && preg_match('#^/management/contentblock/update/entity/(?P<id>[^/]++)/position(?:/(?P<p>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'management_contentblock_position_update')), array (  'id' => NULL,  'p' => NULL,  '_controller' => 'App\\ContentManagementBundle\\Controller\\ContentBlockController::UpdatePositionAction',));
            }

        }

        // app_contentmanagement_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_contentmanagement_default_index')), array (  '_controller' => 'App\\ContentManagementBundle\\Controller\\DefaultController::indexAction',));
        }

        // about
        if ($pathinfo === '/page/about') {
            return array (  '_controller' => 'App\\FrontBundle\\Controller\\AboutController::aboutAction',  '_route' => 'about',);
        }

        // affiliate_about
        if (preg_match('#^/(?P<username>[^/]++)/page/about$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'affiliate_about')), array (  'username' => NULL,  '_controller' => 'App\\FrontBundle\\Controller\\AboutController::affiliateAboutAction',));
        }

        // contact
        if ($pathinfo === '/page/contact') {
            return array (  '_controller' => 'App\\FrontBundle\\Controller\\ContactController::contactAction',  '_route' => 'contact',);
        }

        // affiliate_contact
        if (preg_match('#^/(?P<username>[^/]++)/page/contact$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'affiliate_contact')), array (  'username' => NULL,  '_controller' => 'App\\FrontBundle\\Controller\\ContactController::affiliateContactAction',));
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'App\\FrontBundle\\Controller\\HomepageController::homepageAction',  '_route' => 'homepage',);
        }

        // affiliate_homepage
        if (preg_match('#^/(?P<username>[^/]++)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'affiliate_homepage')), array (  'username' => NULL,  '_controller' => 'App\\FrontBundle\\Controller\\HomepageController::affiliateHomepageAction',));
        }

        // join
        if ($pathinfo === '/page/join') {
            return array (  '_controller' => 'App\\FrontBundle\\Controller\\JoinController::JoinAction',  '_route' => 'join',);
        }

        // affiliate_join
        if (preg_match('#^/(?P<username>[^/]++)/page/join$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'affiliate_join')), array (  'username' => NULL,  '_controller' => 'App\\FrontBundle\\Controller\\JoinController::affiliateAboutAction',));
        }

        // login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'App\\FrontBundle\\Controller\\LoginController::loginAction',  '_route' => 'login',);
        }

        if (0 === strpos($pathinfo, '/c')) {
            // check_path
            if ($pathinfo === '/check') {
                return array (  '_controller' => 'App\\FrontBundle\\Controller\\LoginController::loginCheckAction',  '_route' => 'check_path',);
            }

            if (0 === strpos($pathinfo, '/config/co')) {
                if (0 === strpos($pathinfo, '/config/compensationplan')) {
                    // config_compensationplan
                    if (rtrim($pathinfo, '/') === '/config/compensationplan') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_config_compensationplan;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'config_compensationplan');
                        }

                        return array (  '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::indexAction',  '_route' => 'config_compensationplan',);
                    }
                    not_config_compensationplan:

                    // config_compensationplan_create
                    if ($pathinfo === '/config/compensationplan/') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_config_compensationplan_create;
                        }

                        return array (  '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::createAction',  '_route' => 'config_compensationplan_create',);
                    }
                    not_config_compensationplan_create:

                    // config_compensationplan_new
                    if ($pathinfo === '/config/compensationplan/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_config_compensationplan_new;
                        }

                        return array (  '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::newAction',  '_route' => 'config_compensationplan_new',);
                    }
                    not_config_compensationplan_new:

                    // config_compensationplan_show
                    if (preg_match('#^/config/compensationplan/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_config_compensationplan_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_compensationplan_show')), array (  '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::showAction',));
                    }
                    not_config_compensationplan_show:

                    // config_compensationplan_edit
                    if (preg_match('#^/config/compensationplan/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_config_compensationplan_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_compensationplan_edit')), array (  '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::editAction',));
                    }
                    not_config_compensationplan_edit:

                    // config_compensationplan_update
                    if (preg_match('#^/config/compensationplan/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_config_compensationplan_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_compensationplan_update')), array (  '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::updateAction',));
                    }
                    not_config_compensationplan_update:

                    // config_compensationplan_delete
                    if (preg_match('#^/config/compensationplan/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_config_compensationplan_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_compensationplan_delete')), array (  '_controller' => 'App\\AdminBundle\\Controller\\CompensationPlanController::deleteAction',));
                    }
                    not_config_compensationplan_delete:

                }

                if (0 === strpos($pathinfo, '/config/country')) {
                    // config_country
                    if (rtrim($pathinfo, '/') === '/config/country') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_config_country;
                        }

                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'config_country');
                        }

                        return array (  '_controller' => 'App\\AdminBundle\\Controller\\CountryController::indexAction',  '_route' => 'config_country',);
                    }
                    not_config_country:

                    // config_country_create
                    if ($pathinfo === '/config/country/') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_config_country_create;
                        }

                        return array (  '_controller' => 'App\\AdminBundle\\Controller\\CountryController::createAction',  '_route' => 'config_country_create',);
                    }
                    not_config_country_create:

                    // config_country_new
                    if ($pathinfo === '/config/country/new') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_config_country_new;
                        }

                        return array (  '_controller' => 'App\\AdminBundle\\Controller\\CountryController::newAction',  '_route' => 'config_country_new',);
                    }
                    not_config_country_new:

                    // config_country_show
                    if (preg_match('#^/config/country/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_config_country_show;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_country_show')), array (  '_controller' => 'App\\AdminBundle\\Controller\\CountryController::showAction',));
                    }
                    not_config_country_show:

                    // config_country_edit
                    if (preg_match('#^/config/country/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_config_country_edit;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_country_edit')), array (  '_controller' => 'App\\AdminBundle\\Controller\\CountryController::editAction',));
                    }
                    not_config_country_edit:

                    // config_country_update
                    if (preg_match('#^/config/country/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_config_country_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_country_update')), array (  '_controller' => 'App\\AdminBundle\\Controller\\CountryController::updateAction',));
                    }
                    not_config_country_update:

                    // config_country_delete
                    if (preg_match('#^/config/country/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_config_country_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_country_delete')), array (  '_controller' => 'App\\AdminBundle\\Controller\\CountryController::deleteAction',));
                    }
                    not_config_country_delete:

                }

            }

        }

        // management
        if ($pathinfo === '/management') {
            return array (  '_controller' => 'App\\AdminBundle\\Controller\\HomeController::indexAction',  '_route' => 'management',);
        }

        if (0 === strpos($pathinfo, '/config/notificationtype')) {
            // config_notificationtype
            if (rtrim($pathinfo, '/') === '/config/notificationtype') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_notificationtype;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'config_notificationtype');
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::indexAction',  '_route' => 'config_notificationtype',);
            }
            not_config_notificationtype:

            // config_notificationtype_create
            if ($pathinfo === '/config/notificationtype/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_config_notificationtype_create;
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::createAction',  '_route' => 'config_notificationtype_create',);
            }
            not_config_notificationtype_create:

            // config_notificationtype_new
            if ($pathinfo === '/config/notificationtype/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_notificationtype_new;
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::newAction',  '_route' => 'config_notificationtype_new',);
            }
            not_config_notificationtype_new:

            // config_notificationtype_show
            if (preg_match('#^/config/notificationtype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_notificationtype_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_notificationtype_show')), array (  '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::showAction',));
            }
            not_config_notificationtype_show:

            // config_notificationtype_edit
            if (preg_match('#^/config/notificationtype/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_notificationtype_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_notificationtype_edit')), array (  '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::editAction',));
            }
            not_config_notificationtype_edit:

            // config_notificationtype_update
            if (preg_match('#^/config/notificationtype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_config_notificationtype_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_notificationtype_update')), array (  '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::updateAction',));
            }
            not_config_notificationtype_update:

            // config_notificationtype_delete
            if (preg_match('#^/config/notificationtype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_config_notificationtype_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_notificationtype_delete')), array (  '_controller' => 'App\\AdminBundle\\Controller\\NotificationTypeController::deleteAction',));
            }
            not_config_notificationtype_delete:

        }

        if (0 === strpos($pathinfo, '/management/product')) {
            // management_product_diets
            if ($pathinfo === '/management/product/diets') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_management_product_diets;
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\ProductController::dietsAction',  '_route' => 'management_product_diets',);
            }
            not_management_product_diets:

            // management_product_training
            if ($pathinfo === '/management/product/training') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_management_product_training;
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\ProductController::trainingAction',  '_route' => 'management_product_training',);
            }
            not_management_product_training:

        }

        if (0 === strpos($pathinfo, '/config/producttype')) {
            // config_producttype
            if (rtrim($pathinfo, '/') === '/config/producttype') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_producttype;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'config_producttype');
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::indexAction',  '_route' => 'config_producttype',);
            }
            not_config_producttype:

            // config_producttype_create
            if ($pathinfo === '/config/producttype/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_config_producttype_create;
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::createAction',  '_route' => 'config_producttype_create',);
            }
            not_config_producttype_create:

            // config_producttype_new
            if ($pathinfo === '/config/producttype/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_producttype_new;
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::newAction',  '_route' => 'config_producttype_new',);
            }
            not_config_producttype_new:

            // config_producttype_show
            if (preg_match('#^/config/producttype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_producttype_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_producttype_show')), array (  '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::showAction',));
            }
            not_config_producttype_show:

            // config_producttype_edit
            if (preg_match('#^/config/producttype/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_producttype_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_producttype_edit')), array (  '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::editAction',));
            }
            not_config_producttype_edit:

            // config_producttype_update
            if (preg_match('#^/config/producttype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_config_producttype_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_producttype_update')), array (  '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::updateAction',));
            }
            not_config_producttype_update:

            // config_producttype_delete
            if (preg_match('#^/config/producttype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_config_producttype_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_producttype_delete')), array (  '_controller' => 'App\\AdminBundle\\Controller\\ProductTypeController::deleteAction',));
            }
            not_config_producttype_delete:

        }

        // management_transaction
        if (rtrim($pathinfo, '/') === '/management/transaction') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'management_transaction');
            }

            return array (  '_controller' => 'App\\AdminBundle\\Controller\\TransactionController::indexAction',  '_route' => 'management_transaction',);
        }

        if (0 === strpos($pathinfo, '/config/transactiontype')) {
            // config_transactiontype
            if (rtrim($pathinfo, '/') === '/config/transactiontype') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_transactiontype;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'config_transactiontype');
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::indexAction',  '_route' => 'config_transactiontype',);
            }
            not_config_transactiontype:

            // config_transactiontype_create
            if ($pathinfo === '/config/transactiontype/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_config_transactiontype_create;
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::createAction',  '_route' => 'config_transactiontype_create',);
            }
            not_config_transactiontype_create:

            // config_transactiontype_new
            if ($pathinfo === '/config/transactiontype/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_transactiontype_new;
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::newAction',  '_route' => 'config_transactiontype_new',);
            }
            not_config_transactiontype_new:

            // config_transactiontype_show
            if (preg_match('#^/config/transactiontype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_transactiontype_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_transactiontype_show')), array (  '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::showAction',));
            }
            not_config_transactiontype_show:

            // config_transactiontype_edit
            if (preg_match('#^/config/transactiontype/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_config_transactiontype_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_transactiontype_edit')), array (  '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::editAction',));
            }
            not_config_transactiontype_edit:

            // config_transactiontype_update
            if (preg_match('#^/config/transactiontype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_config_transactiontype_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_transactiontype_update')), array (  '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::updateAction',));
            }
            not_config_transactiontype_update:

            // config_transactiontype_delete
            if (preg_match('#^/config/transactiontype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_config_transactiontype_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'config_transactiontype_delete')), array (  '_controller' => 'App\\AdminBundle\\Controller\\TransactionTypeController::deleteAction',));
            }
            not_config_transactiontype_delete:

        }

        if (0 === strpos($pathinfo, '/management/user')) {
            // management_user
            if (rtrim($pathinfo, '/') === '/management/user') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_management_user;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'management_user');
                }

                return array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::indexAction',  '_route' => 'management_user',);
            }
            not_management_user:

            // management_country
            if ($pathinfo === '/management/user/management') {
                return array (  'id' => NULL,  '_controller' => 'App\\AdminBundle\\Controller\\UserController::countryAction',  '_route' => 'management_country',);
            }

            if (0 === strpos($pathinfo, '/management/user/network')) {
                if (0 === strpos($pathinfo, '/management/user/network/message')) {
                    // management_user_message
                    if ($pathinfo === '/management/user/network/message') {
                        return array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::messageAction',  '_route' => 'management_user_message',);
                    }

                    // management_user_send
                    if ($pathinfo === '/management/user/network/message/send') {
                        return array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::sendAction',  '_route' => 'management_user_send',);
                    }

                    // management_user_compose
                    if ($pathinfo === '/management/user/network/message/compose') {
                        return array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::composeAction',  '_route' => 'management_user_compose',);
                    }

                }

                // management_user_network
                if ($pathinfo === '/management/user/network') {
                    return array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::networkAction',  '_route' => 'management_user_network',);
                }

            }

            // management_user_show
            if (0 === strpos($pathinfo, '/management/user/profile') && preg_match('#^/management/user/profile(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_management_user_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'management_user_show')), array (  'id' => NULL,  '_controller' => 'App\\AdminBundle\\Controller\\UserController::showAction',));
            }
            not_management_user_show:

            if (0 === strpos($pathinfo, '/management/user/a')) {
                // management_user_associate_notificationType
                if ($pathinfo === '/management/user/associate/notificationType') {
                    return array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::associateNotificationTypeAction',  '_route' => 'management_user_associate_notificationType',);
                }

                if (0 === strpos($pathinfo, '/management/user/avatar')) {
                    // management_user_avatar
                    if ($pathinfo === '/management/user/avatar') {
                        return array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::setAvatarAction',  '_route' => 'management_user_avatar',);
                    }

                    // management_user_avatar_delete
                    if ($pathinfo === '/management/user/avatar/delete') {
                        return array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::deleteAvatarAction',  '_route' => 'management_user_avatar_delete',);
                    }

                }

            }

            // management_user_password_change
            if ($pathinfo === '/management/user/password/change') {
                return array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::changePassworkAction',  '_route' => 'management_user_password_change',);
            }

            // management_user_create
            if ($pathinfo === '/management/user/create') {
                return array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::createAction',  '_route' => 'management_user_create',);
            }

            // management_user_update
            if ($pathinfo === '/management/user/update') {
                return array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::updateAction',  '_route' => 'management_user_update',);
            }

            // management_user_associate_module
            if (0 === strpos($pathinfo, '/management/user/associate/module') && preg_match('#^/management/user/associate/module/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'management_user_associate_module')), array (  '_controller' => 'App\\AdminBundle\\Controller\\UserController::buyModule',));
            }

        }

        // logout
        if ($pathinfo === '/logout') {
            return array('_route' => 'logout');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
