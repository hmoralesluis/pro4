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
            $notification = new Notification();
            $date = date_create_from_format('Y-m-d', date('Y-m-d'));
            $notification->setDate($date);
            //----------------------
            //$notificationType = $em->getRepository('AdminBundle:NotificationType')->findOneBy(array('name' => 'Nuevos Usuarios'));
            //$notification->setNotificationType($notificationType);
            //$notification->addUser($em->getRepository('AdminBundle:User')->findOneBy(array('username' => $entity->getAssociatedUser()->getUsername())));
            //$em->persist($notification);
            //$em->flush();
        } elseif ($entity instanceof ProductSale) {

        } elseif ($entity instanceof Product) {

        } elseif ($entity instanceof Transaction) {

        }
    }

    public function postUpdate(LifecycleEventArgs $args)
    {

    }

    public function preRemove(LifecycleEventArgs $args)
    {

    }
}