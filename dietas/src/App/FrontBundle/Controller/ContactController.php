<?php

namespace App\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/")
 */
class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('FrontBundle:Contact:contact.html.twig');
    }
}
