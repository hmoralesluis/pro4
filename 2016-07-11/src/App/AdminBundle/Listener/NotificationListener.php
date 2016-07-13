<?php
namespace App\AdminBundle\Listener;

use App\AdminBundle\Entity\Notification;
use App\AdminBundle\Entity\Product;
use App\AdminBundle\Entity\ProductSale;
use App\AdminBundle\Entity\Transaction;
use App\AdminBundle\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Routing\Router;

class NotificationListener
{

    private $operacion, $router, $container;

    public function __construct(Router $router, $container)
    {
        $this->router = $router;
        $this->container = $container;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $entity = $args->getEntity();
        if ($entity instanceof User) {
            if (!is_null($entity->getAssociatedUser())) {
                $notification = new Notification();
                $date = date_create_from_format('Y-m-d', date('Y-m-d'));
                $notification->setTitle('Usuario registrado');
                $notification->setImage('icon-user');
                $notification->setLabel('label-info');
                $notification->setDate($date);
                //----------------------
                $info = $em->getRepository('AdminBundle:NotificationType')->find(2); //General
                $newUsers = $em->getRepository('AdminBundle:NotificationType')->find(3); //Nuevos Usuarios
                $info->addNotification($notification);
                $newUsers->addNotification($notification);
                $notification->addUser($em->getRepository('AdminBundle:User')->findOneBy(array('username' => $entity->getAssociatedUser()->getUsername())));
                $em->persist($notification);
            }
        } elseif ($entity instanceof ProductSale) {

        } elseif ($entity instanceof Product) {

        } elseif ($entity instanceof Transaction) {
            $notification = new Notification();
            $date = date_create_from_format('Y-m-d', date('Y-m-d'));
            $notification->setTitle('Transacción realizada');
            $notification->setImage('icon-share-alt');
            $notification->setLabel('label-important');
            $notification->setDate($date);
            //----------------------
            $info = $em->getRepository('AdminBundle:NotificationType')->find(2); //General
            $transacciones = $em->getRepository('AdminBundle:NotificationType')->find(5); //Transacciones
            $info->addNotification($notification);
            $transacciones->addNotification($notification);
            $notification->addUser($entity->getUser());
            $em->persist($notification);
        }
        $em->flush();
    }

    public function postUpdate(LifecycleEventArgs $args)
    {

    }

    public function preRemove(LifecycleEventArgs $args)
    {

    }
}