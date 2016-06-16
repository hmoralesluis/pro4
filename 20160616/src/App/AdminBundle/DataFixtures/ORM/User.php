<?php
namespace App\AdminBundle\DataFixtures\ORM;

use App\AdminBundle\Entity\Transaction;
use App\AdminBundle\Entity\User;
use App\AdminBundle\Entity\UserModule;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $roles = array('Libre', 'Pago');
        $nombres = array('José', 'Juan', 'Maidelín', 'Alejandro', 'Marcelo', 'Martha', 'Sheila', 'Adolfo', 'Olivio',
            'Hamlet', 'Reinier', 'Nancy', 'Dagoberto', 'Adrian', 'Vivian', 'Yoan', 'Raul', 'Darien', 'Miriam', 'Anabel');
        $apellidos = array('Marrero', 'Vega', 'Rodriguez', 'Pérez', 'Torres', 'Prieto', 'Bernal', 'García', 'Martell',
            'Cantero', 'Hernández', 'Gómez', 'Companioni', 'Cañizares', 'Angulo', 'Carcassees', 'Caseres', 'Prades',
            'Pina', 'Marin');
        $countries = array('CU', 'AF', 'AR', 'BO', 'BR', 'CA', 'CL', 'CN', 'CO', 'DE', 'JP', 'PA', 'ES', 'US');
        $sexo = array('Mujer', 'Hombre');

        $notificationTypes = $manager->getRepository('AdminBundle:NotificationType')->findAll();

        $admin = new User();
        $admin->setName('Administrador');
        $admin->setLastName('');
        $admin->setSex('Hombre');
        $admin->setUsername('admin');
        $admin->setPassword('adminpass');
        $admin->setRole($manager->getRepository('AdminBundle:Role')->findOneBy(array('name' => 'Administrador')));
        $admin->setActive(true);
        $admin->setEmail('admin@domain.com');
        $admin->setSignUpDate(date_create_from_format('Y-m-d', date('Y-m-d')));
        $admin->setGeneration(1);
        $admin->setPositionInGeneration(1);
        $admin->setCountry($manager->getRepository('AdminBundle:Country')->findOneBy(array('name' => 'Cuba')));
        foreach ($notificationTypes as $notificationType) {
            $admin->addNotificationType($notificationType);
        }
        $manager->persist($admin);
        $manager->flush();

        for ($i = 1; $i <= 100; $i++) {
            $user = new User();
            $user->setName($nombres[rand(0, count($nombres) - 1)]);
            $user->setLastName($apellidos[rand(0, count($apellidos) - 1)]);
            $user->setSex($sexo[rand(0, count($sexo) - 1)]);
            $user->setUsername('user' . $i);
            $user->setPassword('userpass' . $i);
            $role = $roles[rand(0, count($roles) - 1)];
            $user->setRole($manager->getRepository('AdminBundle:Role')->findOneBy(array('name' => $role)));
            $user->setActive(true);
            $user->setEmail('user' . $i . '@domain.com');
            $date = rand(2000, 2016) . '-' . rand(1, 12) . '-' . rand(1, 28);
            $user->setSignUpDate(date_create_from_format('Y-n-j', $date));
            $referring = $manager->getRepository('AdminBundle:User')->find(1); //Administrator
            $users = $manager->getRepository('AdminBundle:User')->findAll();
            if (count($users) != 1) {
                $referring = $users[rand(0, count($users) - 1)];
            }
            $user->setGeneration($referring->getGeneration() + 1);
            $count = $manager->getRepository('AdminBundle:User')->getCountInGeneration($referring->getGeneration() + 1) + 1;
            $user->setPositionInGeneration(intval($count));
            $user->setAssociatedUser($referring);
            $user->setCountry($manager->getRepository('AdminBundle:Country')->findOneBy(array('alpha2Code' => $countries[rand(0, count($countries) - 1)])));
            foreach ($notificationTypes as $notificationType) {
                $user->addNotificationType($notificationType);
            }
            $manager->persist($user);
            //associate to module
            $userModule = new UserModule();
            $userModule->setUser($user);
            $module = $manager->getRepository('AdminBundle:Module')->find(1);
            if ($role == 'Pago') {
                $module = $manager->getRepository('AdminBundle:Module')->find(2);
            }
            $userModule->setModule($module);
            $userModule->setActivationDate(date_create_from_format('Y-n-j', $date));
            $manager->persist($userModule);
            //begin creating a transaction for referring affiliate
            if ($role == 'Pago') {
                $transaction = new Transaction();
                $transaction->setDate(date_create_from_format('Y-n-j', $date));
                $transaction->setUser($referring);
                $transaction->setGeneration($referring->getGeneration() + 1);
                $manager->persist($transaction);
            }
            $manager->flush();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 8; // the order in which fixtures will be loaded
    }
}