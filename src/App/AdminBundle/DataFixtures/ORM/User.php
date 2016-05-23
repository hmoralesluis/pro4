<?php
namespace App\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use App\AdminBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setName('Admin');
        $admin->setLastName('Test');
        $admin->setUsername('admin');
        $admin->setPassword('adminpass');
        $admin->setRole($manager->getRepository('AdminBundle:Role')->findOneBy(array('name' => 'Administrator')));
        $admin->setActive(true);
        $admin->setEmail('admin@domain.com');
        $admin->setSignUpDate(date_create_from_format('Y-m-d', date('Y-m-d')));
        $admin->setGeneration(1);
        $admin->setPositionInGeneration(1);
        $admin->setCountry($manager->getRepository('AdminBundle:Country')->findOneBy(array('name' => 'Cuba')));
        $manager->persist($admin);

        $user = new User();
        $user->setName('User');
        $user->setLastName('Test');
        $user->setUsername('user');
        $user->setPassword('userpass');
        $user->setRole($manager->getRepository('AdminBundle:Role')->findOneBy(array('name' => 'Payment User')));
        $user->setActive(true);
        $user->setEmail('user@domain.com');
        $user->setSignUpDate(date_create_from_format('Y-m-d', date('Y-m-d')));
        $user->setGeneration(2);
        $user->setPositionInGeneration(1);
        $user->setAssociatedUser($admin);
        $user->setCountry($manager->getRepository('AdminBundle:Country')->findOneBy(array('name' => 'Cuba')));
        $manager->persist($user);
        $manager->flush();

        $user1 = new User();
        $user1->setName('User1');
        $user1->setLastName('Test');
        $user1->setUsername('user1');
        $user1->setPassword('userpass1');
        $user1->setRole($manager->getRepository('AdminBundle:Role')->findOneBy(array('name' => 'Free User')));
        $user1->setActive(true);
        $user1->setEmail('user1@domain.com');
        $user1->setSignUpDate(date_create_from_format('Y-m-d', date('Y-m-d')));
        $user1->setGeneration(2);
        $user1->setPositionInGeneration(2);
        $user1->setAssociatedUser($admin);
        $user1->setCountry($manager->getRepository('AdminBundle:Country')->findOneBy(array('name' => 'Cuba')));
        $manager->persist($user1);
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}