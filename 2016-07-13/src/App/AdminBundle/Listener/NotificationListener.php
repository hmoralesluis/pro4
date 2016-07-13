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
            $apply = false; //por defecto no se aplica el plan de compensación
            $user = $entity->getUser();
            if ($entity->getTransactionType()->getId() == 1) {//si la transacción es por compra de módulo
                $module = $em->getRepository('AdminBundle:Module')->findOneBy(array('name' => $entity->getModule()));
                $userModule = $em->getRepository('AdminBundle:UserModule')->findOneBy(array('user' => $user, 'module' => $module));
                if ($module->getId() != 2) { //cualquier módulo menos el de registro, para este si, aunque no lo tenga asociado
                    if ($userModule) { //si el modulo no es el de registro (cualquier otro) y el usuario lo tiene asociado
                        $apply = true; //se aplica
                    }
                } else {
                    $apply = true; //si es el modulo de registro siempre se aplica
                }
            } else { //si la transacción no es por compra de módulo se aplica de todas formas
                $apply = true;
            }

            if ($apply) { //si se aplica
                //por defecto el plan de compensación va a ser a usuarios de pago
                $compensationPlan = $em->getRepository('AdminBundle:CompensationPlan')->find(1); //PaymentUser
                //si la transacción es por compra de módulo y el usuario no es de pago
                if ($entity->getTransactionType()->getId() == 1 && !$user->getRole()->isPayment()) {
                    $compensationPlan = $em->getRepository('AdminBundle:CompensationPlan')->find(2); //FreeUser
                } else {
                    //si es por retiro de fondo, entonces es el 100%, o el plan de compensación que se defina
                }
                //aplico el porciento de acuerdo al plan de compensación
                $money = $entity->getMoney() * $compensationPlan->getPercentage() / 100;
                $entity->setMoney($money); //actualizo el valor
            }

            /*
            //si el usuario tiene el dinero (suma de sus transacciones) buscar los modulos que no tenga asociado y comprarlos automaticamente
            $earnings = 0;
            foreach($user->getTransactions() as $associatedTransaction){
                $earnings += floatval($associatedTransaction->getMony());
            }
            $associatedModules = array();
            foreach($user->getUserModules() as $um){
                $associatedModules[] = $um->getModule();
            }
            $modules = $em->getRepository('AdminBundle:Module')->findUnAssigned($associatedModules);
            */


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