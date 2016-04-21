<?php

namespace App\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * @Route("/")
 */
class ProductController extends Controller
{
    /**
     * @Route("/product/{id}", name="product")
     */
    public function productAction($id=null)
    {
        if(!is_null($id)){
            return $this->render('FrontBundle:Product:product.html.twig', array(
                'id' => $id
            ));
        } else {
            throw new AccessDeniedException('Access Denied. Invalid parameter "Id" on a null result');
        }
    }

    /**
     * @Route("/products/type/{name}", name="products")
     */
    public function productsAction($name=null)
    {
        if(!is_null($name)){
            return $this->render('FrontBundle:Product:products.html.twig', array(
                'name' => $name
            ));
        } else {
            throw new AccessDeniedException('Access Denied. Invalid parameter "product" on a null result');
        }
    }
}
