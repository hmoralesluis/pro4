<?php
namespace App\AdminBundle\DataFixtures\ORM;

use App\AdminBundle\Controller\UserController;
use App\AdminBundle\Entity\BenefitTable;
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
            $role = $manager->getRepository('AdminBundle:Role')->findOneBy(array('name' => $role));
            $user->setRole($role);
            $user->setActive(true);
            $user->setEmail('user' . $i . '@domain.com');
            $date = date('Y-n-j');
            $user->setSignUpDate(date_create_from_format('Y-n-j', $date));
            $referring = $manager->getRepository('AdminBundle:User')->find(1); //Administrator
            $users = $manager->getRepository('AdminBundle:User')->findAll();
            if (count($users) != 1) {
                $referring = $users[rand(0, count($users) - 1)];
            }
            $user->setGeneration($referring->getGeneration() + 1);
            $count = $manager->getRepository('AdminBundle:User')->getCountInGeneration($referring->getGeneration() + 1) + 1;
            $positionInGeneration = intval($count);
            $user->setPositionInGeneration($positionInGeneration);
            $user->setAssociatedUser($referring);
            $user->setCountry($manager->getRepository('AdminBundle:Country')->findOneBy(array('alpha2Code' => $countries[rand(0, count($countries) - 1)])));
            foreach ($notificationTypes as $notificationType) {
                $user->addNotificationType($notificationType);
            }
            //************ building network bussines in Benefit Table *****************
            $benefitTable = null;
            $isReferring = true;
            $direct = true;
            $benefitTableReferring = $referring; //by default is direct Benefit [1,3,5,7,8,9,11,12,13,14]
            if (UserController::IsIndirectBenefit($positionInGeneration)) {
                //is indirect Benefit [2,4,6,10,15,20,25...]
                $benefitTableReferring = UserController::FindBenefitTableReferring($user);
                if (is_null($benefitTableReferring)) {
                    $isReferring = false;
                }
                $direct = false;
            }
            if ($isReferring) {
                $benefitTable = $manager->getRepository('AdminBundle:BenefitTable')->findOneBy(array('username' => $benefitTableReferring->getUsername()));
                if (empty($benefitTable) || is_null($benefitTable)) {
                    $benefitTable = new BenefitTable();
                    $benefitTable->setUsername($benefitTableReferring->getUsername());
                    $manager->persist($benefitTable);
                }
                $direct ? $user->setDirectBenefitTable($benefitTable) : $user->setIndirectBenefitTable($benefitTable);
            }
            //*************************************************************************
            $manager->persist($user);
            //associate to module
            $userModule = new UserModule();
            $userModule->setUser($user);
            $module = $manager->getRepository('AdminBundle:Module')->find(1); //Free
            if ($role->isPayment()) {
                $module = $manager->getRepository('AdminBundle:Module')->find(2); //Register
            }
            $userModule->setModule($module);
            $userModule->setActivationDate(date_create_from_format('Y-n-j', $date));
            $manager->persist($userModule);
            //begin creating a transaction for referring affiliate
            if ($role->isPayment() && $isReferring) {
                $transaction = new Transaction();
                $transaction->setDate(date_create_from_format('Y-n-j', $date));
                $transaction->setModule($module->getName());
                $transaction->setNickname('user' . $i);
                $transaction->setUser($benefitTableReferring);
                $transaction->setMoney($module->getCost()); //apply compensation plan by user's role
                $transaction->setGeneration(intval($referring->getGeneration() + 1) - intval($benefitTableReferring->getGeneration()));
                $transaction->setTransactionType($manager->getRepository('AdminBundle:TransactionType')->find(1)); //Module buy
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
        return 9; // the order in which fixtures will be loaded
    }
}