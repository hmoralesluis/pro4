<?php

namespace App\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\AdminBundle\Entity\User;
use App\AdminBundle\Entity\UserModule;
use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 * @Route("/management/user")
 */
class UserController extends Controller
{

    /**
     * Lists all User entities.
     *
     * @Route("/", name="management_user")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdminBundle:User')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Lists NetworkBussines.
     *
     * @Route("/network", name="management_user_network")
     */
    public function networkAction()
    {
        $em = $this->getDoctrine()->getManager();
        $logged = $this->getUser();
        $user = $em->getRepository('AdminBundle:User')->findOneBy(array('username' => $logged->getUsername()));
        $network = $user->getNetworkUsers();
        return $this->render('AdminBundle:Bussines:network.html.twig', array(
            'network' => $network
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/profile/{id}", name="management_user_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id = null)
    {
        $entity = $this->getUser();
        if (!is_null($id)) {
            $em = $this->getDoctrine()->getManager();

            $entity = $em->getRepository('AdminBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }
        }

        return array(
            'entity' => $entity,
        );
    }

    private function getGeneration($user, $cont)
    {
        if (is_null($user->getAssociatedUser())) {
            return $cont;
        } else {
            $cont = $cont + 1;
            return $this->getGeneration($user->getAssociatedUser(), $cont);
        }
    }

    private function getPositionInGeneration($associated_user)
    {
        $brothers = $associated_user->getNetworkUsers();
        //ordering
        $newer = null;
        for ($i = 0; $i < count($brothers) - 1; $i++) {
            for ($j = $i + 1; $j < count($brothers); $j++) {
                if ($brothers[$j]->getPositionInGeneration() < $brothers[$i]->getPositionInGeneration()) {
                    $newer = $brothers[$j];
                    $brothers[$j] = $brothers[$i];
                    $brothers[$i] = $newer;
                }
            }
        }
        //find missing index
        $index = null;
        for ($c = 0; $c < count($brothers) - 1; $c++) {
            if ($brothers[$c + 1]->getPositionInGeneration() != $brothers[$c]->getPositionInGeneration() + 1) {
                $index = $brothers[$c]->getPositionInGeneration() + 1;
                break;
            }
        }
        if (is_null($index) && count($brothers) != 0) {
            $index = $brothers[count($brothers) - 1]->getPositionInGeneration() + 1;
        } else {
            $index = 1;
        }
        return $index;
    }

    /**
     * Create User entity.
     *
     * @Route("/create", name="management_user_create")
     * @param Request $request
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->get('session');
        $affiliate = $session->get('affiliate');
        $name = $request->get('name');
        $lastname = $request->get('lastname');
        $email = $request->get('email');
        $country = $request->get('country');
        $username = $request->get('username');
        $password = $request->get('pass');
        $module = $request->get('m');
        if ($request->getMethod() == 'POST') {
            $user = new User();
            $user->setName($name);
            $user->setLastName($lastname);
            $user->setEmail($email);
            $user->setCountry($em->getRepository('AdminBundle:Country')->findOneBy(array('alpha2Code' => $country)));
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setActive(true);
            $user->setSignUpDate(date_create_from_format('Y-m-d', date('Y-m-d')));
            $referring = $em->getRepository('AdminBundle:User')->find(1); //Administrator
            if (isset($affiliate)) {
                $referring = $em->getRepository('AdminBundle:User')->findOneBy(array('username' => $affiliate));
            }
            $user->setPositionInGeneration($this->getPositionInGeneration($referring));
            $user->setAssociatedUser($referring);
            $user->setGeneration($this->getGeneration($user, 1));
            $role = $em->getRepository('AdminBundle:Role')->find(3); //Free User
            if ($module != 1) { //not Free
                $role = $em->getRepository('AdminBundle:Role')->find(2); //Payment User
            }
            $user->setRole($role);
            $em->persist($user);
            $userModule = new UserModule();
            $userModule->setUser($user);
            $module = $em->getRepository('AdminBundle:Module')->find($module);
            $userModule->setModule($module);
            $userModule->setActivationDate(date_create_from_format('Y-m-d', date('Y-m-d')));
            $em->persist($userModule);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('join'));
    }
}
