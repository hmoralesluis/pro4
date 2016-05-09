<?php

namespace App\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/")
 */
class HomepageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction()
    {
        $em = $this->getDoctrine()->getManager();
        $blocks = $em->getRepository('ContentManagementBundle:ContentBlock')->findBy(array('active' => true),
            array('position' => 'ASC'));
        return $this->render('FrontBundle:Homepage:homepage.html.twig', array(
            'blocks' => $blocks
        ));
    }
}
