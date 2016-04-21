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
     * @Route("/homepage", name="homepage")
     */
    public function homepageAction()
    {
        return $this->render('FrontBundle:Homepage:homepage.html.twig');
    }
}
