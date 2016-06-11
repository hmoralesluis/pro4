<?php

namespace App\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\AdminBundle\Entity\Product;

/**
 * Product controller.
 *
 * @Route("/management/product")
 */
class ProductController extends Controller
{

    /**
     * Lists all Product entities.
     *
     * @Route("/diets", name="management_product_diets")
     * @Method("GET")
     * @Template()
     */
    public function dietsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdminBundle:Product')->findAll(); //type diets

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Lists all Product entities.
     *
     * @Route("/training", name="management_product_training")
     * @Method("GET")
     * @Template()
     */
    public function trainingAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdminBundle:Product')->findAll(); //type training plans

        return array(
            'entities' => $entities,
        );
    }
}
