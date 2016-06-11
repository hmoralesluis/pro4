<?php

namespace App\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/")
 */
class JoinController extends Controller
{

    /**
     * @Route("/join", name="join")
     */
    public function JoinAction()
    {
        $session = $this->get('session');
        $affiliate = $session->get('affiliate');
        $em = $this->getDoctrine()->getManager();
        if (isset($affiliate) && !is_null($affiliate)) {
            return $this->redirect($this->generateUrl('affiliate_join', array('username' => $affiliate)));
        }
        $countries = $em->getRepository('AdminBundle:Country')->findAll();
        return $this->render('FrontBundle:Join:join.html.twig', array(
            'countries' => $countries
        ));
    }

    /**
     * @Route("/join/affiliate={username}", name="affiliate_join")
     */
    public function affiliateJoinAction($username = null)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->get('session');
        $affiliate = $session->get('affiliate');
        if (is_null($username) && isset($affiliate)) {
            return $this->redirect($this->generateUrl('affiliate_join', array('username' => $affiliate)));
        } elseif(is_null($username) && !isset($affiliate)){
            return $this->redirect($this->generateUrl('join'));
        }
        if (!is_null($username)) {
            $user = $em->getRepository('AdminBundle:User')->findBy(array('username' => $username));
            if (!$user) {
                throw $this->createNotFoundException('Usuario de afiliado no válido');
            }
        }
        $session->set('affiliate', $username);
        $countries = $em->getRepository('AdminBundle:Country')->findAll();
        return $this->render('FrontBundle:Join:join.html.twig', array(
            'countries' => $countries
        ));
    }

}
