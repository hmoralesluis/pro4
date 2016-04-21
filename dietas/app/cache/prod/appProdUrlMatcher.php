<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // about
        if ($pathinfo === '/about') {
            return array (  '_controller' => 'App\\FrontBundle\\Controller\\AboutController::aboutAction',  '_route' => 'about',);
        }

        // contact
        if ($pathinfo === '/contact') {
            return array (  '_controller' => 'App\\FrontBundle\\Controller\\ContactController::contactAction',  '_route' => 'contact',);
        }

        // homepage
        if ($pathinfo === '/homepage') {
            return array (  '_controller' => 'App\\FrontBundle\\Controller\\HomepageController::homepageAction',  '_route' => 'homepage',);
        }

        // join
        if ($pathinfo === '/join') {
            return array (  '_controller' => 'App\\FrontBundle\\Controller\\JoinController::JoinAction',  '_route' => 'join',);
        }

        // login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'App\\FrontBundle\\Controller\\LoginController::loginAction',  '_route' => 'login',);
        }

        // check_path
        if ($pathinfo === '/check') {
            return array (  '_controller' => 'App\\FrontBundle\\Controller\\LoginController::loginCheckAction',  '_route' => 'check_path',);
        }

        if (0 === strpos($pathinfo, '/product')) {
            // product
            if (preg_match('#^/product(?:/(?P<id>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'product')), array (  'id' => NULL,  '_controller' => 'App\\FrontBundle\\Controller\\ProductController::productAction',));
            }

            // products
            if (0 === strpos($pathinfo, '/products/type') && preg_match('#^/products/type(?:/(?P<name>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'products')), array (  'name' => NULL,  '_controller' => 'App\\FrontBundle\\Controller\\ProductController::productsAction',));
            }

        }

        // backoffice
        if ($pathinfo === '/backoffice') {
            return array (  '_controller' => 'App\\AdminBundle\\Controller\\HomeController::indexAction',  '_route' => 'backoffice',);
        }

        // logout
        if ($pathinfo === '/logout') {
            return array('_route' => 'logout');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
