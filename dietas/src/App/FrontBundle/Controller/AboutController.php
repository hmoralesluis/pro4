<?php

namespace App\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/")
 */
class AboutController extends Controller
{
    /**
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {
        return $this->render('FrontBundle:About:about.html.twig');
    }
}
