<?php

namespace App\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\AdminBundle\Entity\User;
use App\AdminBundle\Entity\UserModule;
use App\AdminBundle\Entity\Transaction;
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

    private function getFullNetwork($user, $result)
    {
        $list = $user->getNetworkUsers();
        if (count($list) == 0) {
            return $result;
        }
        for ($i = 0; $i < count($list); $i++) {
            $result[] = $list[$i];
            $result = $this->getFullNetwork($list[$i], $result);
        }
        return $result;
    }


    /**
     * Lists Country.
     *
     * @Route("/management", name="management_country")
     */
    public function countryAction($id = null)
    {
        $entity = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        if (!is_null($id)) {
            $entity = $em->getRepository('AdminBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }
        }

        $countries = $em->getRepository('AdminBundle:Country')->findAll();
        return $this->render('AdminBundle:Configuration:country.html.twig', array(
            'entity' => $entity,
            'countries' => $countries,
        ));
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
        $firstGeneration = $user->getNetworkUsers();
        $full_network = $this->getFullNetwork($user, array());
        return $this->render('AdminBundle:Bussines:network.html.twig', array(
            'firstGeneration' => $firstGeneration, 'network' => $full_network
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
        $em = $this->getDoctrine()->getManager();
        if (!is_null($id)) {
            $entity = $em->getRepository('AdminBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }
        }

        $countries = $em->getRepository('AdminBundle:Country')->findAll();

        return array(
            'entity' => $entity,
            'countries' => $countries,
        );
    }

    public static function getGeneration($user, $cont)
    {
        if (is_null($user->getAssociatedUser())) {
            return $cont;
        } else {
            $cont = $cont + 1;
            return UserController::getGeneration($user->getAssociatedUser(), $cont);
        }
    }

    public static function getPositionInGeneration($associated_user)
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
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->get('session');
        $affiliate = $session->get('affiliate');
        $name = $request->get('name');
        $lastname = $request->get('lastname');
        $sex = $request->get('sex');
        $email = $request->get('email');
        $country = $request->get('country');
        $username = $request->get('username');
        $password = $request->get('pass');
        $module = $request->get('m');
        if ($request->getMethod() == 'POST') {
            $user = new User();
            $user->setName($name);
            $user->setLastName($lastname);
            $user->setSex($sex);
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
            $role = $em->getRepository('AdminBundle:Role')->find(3); //Free
            if ($module != 1) { //not Free
                $role = $em->getRepository('AdminBundle:Role')->find(2); //Payment
            }
            $user->setRole($role);
            $em->persist($user);
            $userModule = new UserModule();
            $userModule->setUser($user);
            $module = $em->getRepository('AdminBundle:Module')->find($module);
            $userModule->setModule($module);
            $userModule->setActivationDate(date_create_from_format('Y-m-d', date('Y-m-d')));
            $em->persist($userModule);
            if ($role->getName() == 'Pago') {
                //begin creating a transaction for referring affiliate
                $transaction = new Transaction();
                $transaction->setDate(date_create_from_format('Y-m-d', date('Y-m-d')));
                $transaction->setUser($referring);
                $transaction->setGeneration($this->getGeneration($user, 1));
                $em->persist($transaction);
            }
            $em->flush();
        }
        //var_dump($user->getUsername());
       return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * Update User entity.
     *
     * @Route("/update", name="management_user_update")
     */
    public function updateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AdminBundle:User')->findOneBy(array('username' => $request->get('username')));
        if (!$entity) {
            throw $this->createNotFoundException('Error, no existe el usuario ' . $request->get('username'));
        } else {
            if ($request->getMethod() == 'POST') {
                $entity->setUsername($request->get('username'));
                $entity->setName($request->get('name'));
                $entity->setLastName($request->get('lastName'));
                $entity->setSex($request->get('sex'));
                $entity->setBirthday(date_create_from_format('Y-n-j', $request->get('birthday')));
                $entity->setCountry($em->getRepository('AdminBundle:Country')->findOneBy(array('alpha2Code' => $request->get('country'))));
                $entity->setCity($request->get('city'));
                $entity->setAddress($request->get('address'));
                $entity->setEmail($request->get('email'));
                $entity->setSignUpDate(date_create_from_format('Y-n-j', $request->get('signUpDate')));
                $entity->setSkype($request->get('skype'));
                $entity->setWhatsapp($request->get('whatsapp'));
                $entity->setFacebook($request->get('facebook'));
                $entity->setTwitter($request->get('twitter'));
                $entity->setGoogle($request->get('google'));
                $entity->setContactPhone($request->get('contactPhone'));
                $entity->setAbout($request->get('about'));
                $em->persist($entity);
                $em->flush();
            }
        }
        return $this->redirect($this->generateUrl('management_user_show'));
    }
}
