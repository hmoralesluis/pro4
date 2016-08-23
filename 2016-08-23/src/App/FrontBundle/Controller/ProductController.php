<?php

namespace App\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/")
 */
class ProductController extends Controller
{
    /**
     * @Route("/page/product/{id}", name="product")
     */
    public function productAction($id = null)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->get('session');
        $affiliate = $session->get('affiliate');
        if (isset($affiliate) && !is_null($affiliate)) {
            return $this->redirect($this->generateUrl('affiliate_product', array('username' => $affiliate)));
        }
        $product = $em->getRepository('AdminBundle:Module')->find($id);
        if(!$product){
            throw $this->createNotFoundException('Módulo no encontrado');
        }
        return $this->render('FrontBundle:Products:Product.html.twig', array('product' => $product ));
    }

    /**
     * @Route("/{username}/page/product/{id}", name="affiliate_product")
     */
    public function affiliateProductAction($username = null, $id = null)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->get('session');
        $affiliate = $session->get('affiliate');
        if (is_null($username) && isset($affiliate)) {
            return $this->redirect($this->generateUrl('affiliate_product', array('username' => $affiliate)));
        } elseif(is_null($username) && !isset($affiliate)){
            return $this->redirect($this->generateUrl('product'));
        }
        if (!is_null($username)) {
            $user = $em->getRepository('AdminBundle:User')->findBy(array('username' => $username));
            if (!$user) {
                throw $this->createNotFoundException('Usuario de afiliado no válido');
            }
        }
        $session->set('affiliate', $username);
        $product = $em->getRepository('AdminBundle:Module')->find($id);
        if(!$product){
            throw $this->createNotFoundException('Módulo no encontrado');
        }
        return $this->render('FrontBundle:Products:Product.html.twig', array('product' => $product ));
    }
}
