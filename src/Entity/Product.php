<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


     /**
     * @ORM\Column(type="string", length=255)
     */
    private $full_description;

    
     /**
     * @ORM\Column(type="datetime")
     */
    private $date_added;

    
     /**
     * @ORM\Column(type="float")
     */
    private $price;

    
     /**
     * @ORM\Column(type="string", length=100)
     */
    private $short_description;

    
     /**
     * @ORM\Column(type="string", length=255)
     */
    private $manufacturer;

    
     /**
     * @ORM\Column(type="string", length=255)
     */
    private $country_of_origin;

    
     /**
     * @ORM\Column(type="integer", length=11)
     */
    private $quantity;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFullDescription()
    {
        return $this->full_description;
    }

    public function getDateAdded()
    {
        return $this->date_added;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getShortDescription()
    {
        return $this->short_description;
    }

    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    public function getCountryOfOrigin()
    {
        return $this->country_of_origin;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setFullDescription($fdes)
    {
        $this->full_description = $fdes;
    }

    public function setDateAdded($date)
    {
        $this->date_added = $date;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setShortDescription($sdes)
    {
        $this->short_description = $sdes;
    }

    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    public function setCountryOfOrigin($country)
    {
        $this->country_of_origin = $country;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}
