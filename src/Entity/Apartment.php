<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=20)
     * @var string
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=10)
     * @var string
     */
    private $zipCode;

    /**
     * @ORM\Column(type="string", length=20)
     * @var string
     */
    private $country;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $buildYear;

    /**
     * @ORM\Column(type="float")
     * @var float
     */
    private $size;

    /**
     * Apartment constructor.
     * @param string $streetAddress
     * @param string $city
     * @param string $zipCode
     * @param string $country
     * @param int $buildYear
     * @param float $size
     */
    public function __construct(
        string $streetAddress,
        string $city,
        string $zipCode,
        string $country,
        int $buildYear,
        float $size
    )
    {
        $this->streetAddress = $streetAddress;
        $this->city = $city;
        $this->zipCode = $zipCode;
        $this->country = $country;
        $this->buildYear = $buildYear;
        $this->size = $size;
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
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return int
     */
    public function getBuildYear(): int
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
}
