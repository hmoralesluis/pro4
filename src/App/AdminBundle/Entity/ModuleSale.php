<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModuleSale
 *
 * @ORM\Table(name="moduleSale_tb")
 * @ORM\Entity(repositoryClass="App\AdminBundle\Entity\ModuleSaleRepository")
 */
class ModuleSale extends Transaction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="UserModule", inversedBy="moduleSales")
     * @ORM\JoinColumn(name="userModule_id", referencedColumnName="id", nullable=false)
     */
    private $userModule;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userModule
     *
     * @param \App\AdminBundle\Entity\UserModule $userModule
     * @return ModuleSale
     */
    public function setUserModule(\App\AdminBundle\Entity\UserModule $userModule)
    {
        $this->userModule = $userModule;

        return $this;
    }

    /**
     * Get userModule
     *
     * @return \App\AdminBundle\Entity\UserModule 
     */
    public function getUserModule()
    {
        return $this->userModule;
    }
}
