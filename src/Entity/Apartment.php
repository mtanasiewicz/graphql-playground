<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ApartmentRepository")
 */
class Apartment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $streetAddress;

    /**
     * @ORM\Column(type="date")
     * @var DateTime
     */
    private $buildYear;

    /**
     * @ORM\Column(type="float")
     * @var float
     */
    private $size;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\District", inversedBy="apartments")
     * @ORM\JoinColumn(nullable=false)
     * @var District
     */
    private $district;

    /**
     * Apartment constructor.
     * @param string $streetAddress
     * @param DateTime $buildYear
     * @param float $size
     * @param District $district
     */
    public function __construct(string $streetAddress, DateTime $buildYear, float $size, District $district)
    {
        $this->streetAddress = $streetAddress;
        $this->buildYear = $buildYear;
        $this->size = $size;
        $this->district = $district;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getStreetAddress(): string
    {
        return $this->streetAddress;
    }

    /**
     * @return DateTime
     */
    public function getBuildYear(): DateTime
    {
        return $this->buildYear;
    }

    /**
     * @return float
     */
    public function getSize(): float
    {
        return $this->size;
    }

    /**
     * @return District
     */
    public function getDistrict(): District
    {
        return $this->district;
    }
}
