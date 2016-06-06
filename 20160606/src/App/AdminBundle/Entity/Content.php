<?php

namespace App\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Module
 *
 * @ORM\Table(name="moduleContent_tb")
 * @ORM\Entity(repositoryClass="App\AdminBundle\Entity\ContentRepository")
 */
class Content
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
     * @var float
     *
     * @ORM\Column(name="productsLimitPrice", type="float", nullable=true)
     */
    private $productsLimitPrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantByProductType", type="integer", nullable=false)
     */
    private $cantByProductType;

    /**
     * @ORM\OneToOne(targetEntity="Module")
     * @ORM\JoinColumn(name="module_id", referencedColumnName="id", nullable=false)
     */
    private $module;

    /**
     * @ORM\ManyToMany(targetEntity="ProductType", inversedBy="moduleContents")
     * @ORM\JoinTable(name="content_productType_tb", joinColumns={@ORM\JoinColumn
    (name="content_id", referencedColumnName="id")}, inverseJoinColumns=
    {@ORM\JoinColumn(name="productType_id", referencedColumnName="id")})
     */
    private $productsType;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productsType = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set productsLimitPrice
     *
     * @param float $productsLimitPrice
     * @return Content
     */
    public function setProductsLimitPrice($productsLimitPrice)
    {
        $this->productsLimitPrice = $productsLimitPrice;

        return $this;
    }

    /**
     * Get productsLimitPrice
     *
     * @return float
     */
    public function getProductsLimitPrice()
    {
        return $this->productsLimitPrice;
    }

    /**
     * Set cantByProductType
     *
     * @param integer $cantByProductType
     * @return Content
     */
    public function setCantByProductType($cantByProductType)
    {
        $this->cantByProductType = $cantByProductType;

        return $this;
    }

    /**
     * Get cantByProductType
     *
     * @return integer
     */
    public function getCantByProductType()
    {
        return $this->cantByProductType;
    }

    /**
     * Set module
     *
     * @param \App\AdminBundle\Entity\Module $module
     * @return Content
     */
    public function setModule(\App\AdminBundle\Entity\Module $module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return \App\AdminBundle\Entity\Module
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Add productsType
     *
     * @param \App\AdminBundle\Entity\ProductType $productsType
     * @return Content
     */
    public function addProductsType(\App\AdminBundle\Entity\ProductType $productsType)
    {
        $this->productsType[] = $productsType;

        return $this;
    }

    /**
     * Remove productsType
     *
     * @param \App\AdminBundle\Entity\ProductType $productsType
     */
    public function removeProductsType(\App\AdminBundle\Entity\ProductType $productsType)
    {
        $this->productsType->removeElement($productsType);
    }

    /**
     * Get productsType
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductsType()
    {
        return $this->productsType;
    }
}
