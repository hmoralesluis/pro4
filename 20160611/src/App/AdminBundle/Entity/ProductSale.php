<?php

namespace App\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductSale
 *
 * @ORM\Table(name="productSale_tb")
 * @ORM\Entity(repositoryClass="App\AdminBundle\Entity\ProductSaleRepository")
 */
class ProductSale extends Transaction
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
     * @ORM\OneToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     */
    private $product;

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
     * Set product
     *
     * @param \App\AdminBundle\Entity\Product $product
     * @return ProductSale
     */
    public function setProduct(\App\AdminBundle\Entity\Product $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \App\AdminBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
