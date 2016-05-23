<?php
namespace App\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use App\AdminBundle\Entity\Option;
use Doctrine\ORM\EntityNotFoundException;

class LoadOptionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $path = 'web/bundles/admin/data/Option.csv';
        if (!file_exists($path))
            exit("File not found");
        $rows = file($path);
        foreach ($rows as $row) {
            $fields = explode(";", $row);
            $option = new Option();
            $option->setName($fields[1]);
            $option->setPath(empty($fields[2]) ? null : $fields[2]);
            $option->setIcon($fields[3]);
            if ($fields[0]) {
                $asociatedOption = $manager->getRepository('AdminBundle:Option')->find(intval($fields[0]));
                $option->setAsociatedOption($asociatedOption);
            }
            $manager->persist($option);
        }
        $manager->flush();

        $path = 'web/bundles/admin/data/RoleOption.csv';
        if (!file_exists($path))
            exit("File not found");
        $rows = file($path);
        foreach ($rows as $row) {
            $fields = explode(";", $row);
            if ($fields[0] != '' && $fields[1] != '') {
                $option = $manager->getRepository('AdminBundle:Option')->find(intval($fields[1]));
                if(!$option){
                    throw new EntityNotFoundException();
                }
                $role = $manager->getRepository('AdminBundle:Role')->find(intval($fields[0]));
                if(!$role){
                    throw new EntityNotFoundException();
                }
                $role->addOption($option);
            }
            $manager->persist($role);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}