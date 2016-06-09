<?php

namespace App\AdminBundle\Controller;


use App\AdminBundle\Entity\Transaction;
use App\AdminBundle\Entity\User;
use App\AdminBundle\Entity\UserModule;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;


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
        $countries = $em->getRepository('AdminBundle:Country')->findAll();
        $fullInformation = true;
        if (!is_null($id)) {
            if ($entity->getId() != $id) {
                $entity = $em->getRepository('AdminBundle:User')->find($id);
                if (!$entity) {
                    throw $this->createNotFoundException('Unable to find User entity.');
                }
                $fullInformation = false;
            }
        }

        return array(
            'entity' => $entity,
            'countries' => $countries,
            'fullInformation' => $fullInformation,
        );
    }

    /**
     * @Route("/avatar", name="management_user_avatar")
     */
    public function setAvatarAction(Request $request)
    {
        $entity = $this->getUser();
        if ($request->getMethod() == 'POST') {
            $file = $_FILES["file"]['name'];
            $temp = explode('.', $file);
            $extension = $temp[count($temp) - 1];
            $name = $entity->getUsername() . "." . $extension; //olivio.marrero.jpg
            $target = 'bundles/admin/usuarios/' . $name;
            if (file_exists($target)) {
                unlink($target);
            }
            if (copy($_FILES['file']['tmp_name'], $target)) {
                $em = $this->getDoctrine()->getManager();
                $entity = $em->getRepository('AdminBundle:User')->findOneBy(array('username' => $entity->getUsername()));
                if (!$entity) {
                    throw $this->createNotFoundException('Unable to find User entity.');
                }
                $entity->setPhotoExtension($extension);
                $em->flush();
            }
        }

        $this->get('session')->getFlashBag()->add(
            'notice',
            'Se ha cambiado el avatar.'
        );

        return $this->redirect($this->generateUrl('management_user_show'));
    }

    /**
     * @Route("/avatar/delete", name="management_user_avatar_delete")
     */
    public function deleteAvatarAction()
    {
        $entity = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AdminBundle:User')->findOneBy(array('username' => $entity->getUsername()));
        $file = 'bundles/admin/usuarios/' . $entity->getUsername() . '.' . $entity->getPhotoExtension();
        if (file_exists($file)) {
            unlink($file);
        }
        $entity->setPhotoExtension(null);
        $em->flush();

        $this->get('session')->getFlashBag()->add(
            'notice',
            'Su avatar ha sido eliminado.'
        );

        return $this->redirect($this->generateUrl('management_user_show'));
    }

    /**
     * @Route("/password/change", name="management_user_password_change")
     */
    public function changePassworkAction(Request $request)
    {
        $oldPass = $request->get('oldPassword');
        $password = $request->get('password');
        $confimPassword = $request->get('confimPassword');
        if ($request->getMethod() == 'POST') {
            if (!empty($oldPass) && !empty($password) && !empty($confimPassword)) {
                $entity = $this->getUser();
                $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
                $encripted = $encoder->encodePassword($oldPass, $entity->getSalt());
                if ($encripted == $entity->getPassword()) {
                    if ($password == $confimPassword) {
                        $em = $this->getDoctrine()->getManager();
                        $entity = $em->getRepository('AdminBundle:User')->findOneBy(array('username' => $entity->getUsername()));
                        $entity->setPassword($password);
                        $em->flush();

                        $this->get('session')->getFlashBag()->add(
                            'notice',
                            'La contraseña ha sido cambiada.'
                        );

                        return $this->redirect($this->generateUrl('management_user_show'));
                    }
                }
            }
        }
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
        return $this->redirect($this->generateUrl('join'));
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
                $birthday = $request->get('birthday');
                if ($birthday != '') {
                    $entity->setBirthday(date_create_from_format('Y-n-j', $birthday));
                }
                $entity->setCountry($em->getRepository('AdminBundle:Country')->findOneBy(array('alpha2Code' => $request->get('country'))));
                $entity->setCity($request->get('city'));
                $entity->setAddress($request->get('address'));
                $entity->setEmail($request->get('email'));
                $entity->setSkype($request->get('skype'));
                $entity->setWhatsapp($request->get('whatsapp'));
                $entity->setFacebook($request->get('facebook'));
                $entity->setTwitter($request->get('twitter'));
                $entity->setGoogle($request->get('google'));
                $entity->setContactPhone($request->get('contactPhone'));
                $entity->setAbout($request->get('about'));
                $em->persist($entity);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Se han guardado los cambios.'
                );
            }
        }
        return $this->redirect($this->generateUrl('management_user_show'));
    }
}
