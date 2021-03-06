<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Module
 *
 * @ORM\Table(name="module_tb")
 * @ORM\Entity(repositoryClass="App\AdminBundle\Entity\ModuleRepository")
 */
class Module
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="cost", type="float")
     * @Assert\NotBlank()
     */
    private $cost;

    /**
     * @var integer
     *
     * @ORM\Column(name="activeDays", type="integer", nullable=false)
     */
    private $activeDays;

    /**
     * @var ArrayCollection $userModule
     *
     * @ORM\OneToMany(targetEntity="UserModule", mappedBy="module", cascade={"all"}, fetch="EAGER")
     */
    protected $userModule;

    /**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="modules")
     * @ORM\JoinTable(name="module_product_tb", joinColumns={@ORM\JoinColumn
    (name="module_id", referencedColumnName="id")}, inverseJoinColumns=
    {@ORM\JoinColumn(name="product_id", referencedColumnName="id")})
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userModule = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     * @return Module
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set cost
     *
     * @param float $cost
     * @return Module
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set activeDays
     *
     * @param integer $activeDays
     * @return Module
     */
    public function setActiveDays($activeDays)
    {
        $this->activeDays = $activeDays;

        return $this;
    }

    /**
     * Get activeDays
     *
     * @return integer
     */
    public function getActiveDays()
    {
        return $this->activeDays;
    }

    /**
     * Add userModule
     *
     * @param \App\AdminBundle\Entity\UserModule $userModule
     * @return Module
     */
    public function addUserModule(\App\AdminBundle\Entity\UserModule $userModule)
    {
        $this->userModule[] = $userModule;

        return $this;
    }

    /**
     * Remove userModule
     *
     * @param \App\AdminBundle\Entity\UserModule $userModule
     */
    public function removeUserModule(\App\AdminBundle\Entity\UserModule $userModule)
    {
        $this->userModule->removeElement($userModule);
    }

    /**
     * Get userModule
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserModule()
    {
        return $this->userModule;
    }

    /**
     * Add product
     *
     * @param \App\AdminBundle\Entity\Product $product
     * @return Module
     */
    public function addProduct(\App\AdminBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \App\AdminBundle\Entity\Product $product
     */
    public function removeProduct(\App\AdminBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
