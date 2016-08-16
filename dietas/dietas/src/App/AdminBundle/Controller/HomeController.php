<?php

namespace App\AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 *
 * Class HomeController
 * @package App\AdminBundle\Controller
 * @Route("/")
 *
 */
class HomeController extends Controller
{
    public static function UserOptions($context, $em, $user)
    {
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
        $sesion = $this->get('session');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AdminBundle:User')->findOneBy(array('username' => $this->getUser()->getUsername()));

        $userNotifications = array();
        foreach ($user->getNotifications() as $n) {
            $userNotifications[] = $n->getId();
        }
        $notificationsInLastWeek = $em->getRepository('AdminBundle:Notification')->findNotificationsInLastWeek($userNotifications);
        //update amount information in NotificationType
        foreach ($user->getNotificationTypes() as $nt) {
            $amount = 0;
            foreach ($notificationsInLastWeek as $lwn) {
                foreach ($lwn->getNotificationTypes() as $lwnt) { //2 always [warning, any]
                    if ($lwnt->getId() == $nt->getId()) {
                        $amount++;
                        $nt->setAmount($amount);
                    }
                }
            }
        }
        $em->flush();
        $sesion->set('associatedNotificationTypes', $user->getNotificationTypes());
        $sesion->set('notificationsInLastWeek', $notificationsInLastWeek);
        $sesion->set('modules', $em->getRepository('AdminBundle:Module')->findAll());
        $sesion->set('associatedModules', $user->getUserModule());
        $sesion->set('earning', $user->getBankAccount()->getMoney());
        $this->UserOptions($this, $em, $user);
        return $this->render('AdminBundle:Home:home.html.twig', array('entity' => $user));
    }
}
