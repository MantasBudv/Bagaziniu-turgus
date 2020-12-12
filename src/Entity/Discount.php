<?php

namespace App\Entity;
use App\Repository\DiscountRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscountRepository::class)
 */
class Discount
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
    * @ORM\Column(type="integer", length=1)
    */
    private $is_percentile;

    /**
    * @ORM\Column(type="datetime")
    */
    private $exp_date;

    /**
    * @ORM\Column(type="float")
    */
    private $percentile;

    /**
    * @ORM\Column(type="float")
    */
    private $sum;

    public function getName()
    {
        return $this->name;
    }

    public function getIsPercentile()
    {
        return $this->is_percentile;
    }

    public function getExpDate()
    {
        return $this->exp_date;
    }

    public function getPercentile()
    {
        return $this->percentile;
    }

    public function getSum()
    {
        return $this->sum;
    }

}

?>