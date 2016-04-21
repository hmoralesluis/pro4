<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'about' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\AboutController::aboutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/about',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'contact' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\ContactController::contactAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/contact',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\HomepageController::homepageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/homepage',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'join' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\JoinController::JoinAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/join',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\LoginController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'check_path' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\FrontBundle\\Controller\\LoginController::loginCheckAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'product' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    'id' => NULL,    '_controller' => 'App\\FrontBundle\\Controller\\ProductController::productAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/product',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'products' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    'name' => NULL,    '_controller' => 'App\\FrontBundle\\Controller\\ProductController::productsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/products/type',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'backoffice' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\AdminBundle\\Controller\\HomeController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/backoffice',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
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
