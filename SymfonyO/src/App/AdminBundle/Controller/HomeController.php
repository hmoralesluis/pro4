<?php

namespace App\AdminBundle\Controller;

use App\AdminBundle\Entity\Role;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\ExpressionLanguage\Expression;

/**
 *
 * Class HomeController
 * @package App\AdminBundle\Controller
 * @Route("/")
 *
 */
class HomeController extends Controller
{
    public static function UserOptions($context, $em, $user){
        $sesion = $context->get('session');
        if ($context->isGranted('ROLE_ADMIN')) {
            $options = $em->getRepository('AdminBundle:Option')->findAll();
            $sesion->set('options_to_show', $options);
        } else {
            $sesion->set('options_to_show', $user->getRole()->getOptions());
        }
    }

    /**
     * @Route("/management", name="management")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AdminBundle:User')->findOneBy(array('username' => $this->getUser()->getUsername()));
        $this->UserOptions($this, $em, $user);
        return $this->render('AdminBundle:Home:home.html.twig', array());
    }

    public function profileAction()
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render('AdminBundle:profile.html.twig');
    }
}
