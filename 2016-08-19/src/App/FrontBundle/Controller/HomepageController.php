<?php

namespace App\FrontBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
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
        $session = $this->get('session');
        $affiliate = $session->get('affiliate');
        if (isset($affiliate) && !is_null($affiliate)) {
            return $this->redirect($this->generateUrl('affiliate_homepage', array('username' => $affiliate)));
        } else {
            $affiliate = null;
        }
        $em = $this->getDoctrine()->getManager();
        $blocks = $em->getRepository('ContentManagementBundle:ContentBlock')->findBy(array('active' => true),
            array('position' => 'ASC'));
        $modules = $em->getRepository('AdminBundle:Module')->findToShow();
        return $this->render('FrontBundle:Homepage:homepage.html.twig', array(
            'blocks' => $blocks, 'modules' => $modules
        ));
    }

    /**
     * @Route("/{username}", name="affiliate_homepage")
     */
    public function affiliateHomepageAction($username = null)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->get('session');
        $affiliate = $session->get('affiliate');
        if (is_null($username) && isset($affiliate)) {
            return $this->redirect($this->generateUrl('affiliate_homepage', array('username' => $affiliate)));
        } elseif(is_null($username) && !isset($affiliate)){
            return $this->redirect($this->generateUrl('homepage'));
        }
        if (!is_null($username) && $username != 'page') {
            $user = $em->getRepository('AdminBundle:User')->findBy(array('username' => $username));
            if (!$user) {
                throw $this->createNotFoundException('Usuario de afiliado no válido');
            }
        }
        $session->set('affiliate', $username);
        $blocks = $em->getRepository('ContentManagementBundle:ContentBlock')->findBy(array('active' => true),
            array('position' => 'ASC'));
        $modules = $em->getRepository('AdminBundle:Module')->findToShow();
        return $this->render('FrontBundle:Homepage:homepage.html.twig', array(
            'blocks' => $blocks, 'modules' => $modules
        ));
    }
}
