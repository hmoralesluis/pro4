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
        return $this->render('FrontBundle:Join:join.html.twig');
    }

}
