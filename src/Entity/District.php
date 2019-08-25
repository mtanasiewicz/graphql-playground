<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DistrictRepository")
 */
class District
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="districts")
     * @ORM\JoinColumn(nullable=false)
     * @var City
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=40)
     * @var string
     */
    private $zipCode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Apartment", mappedBy="district", orphanRemoval=true)
     * @var Collection|Apartment[]
     */
    private $apartments;

    /**
     * District constructor.
     * @param string $name
     * @param City $city
     * @param string $zipCode
     * @param Apartment[] $apartments
     */
    public function __construct(string $name, City $city, string $zipCode, array $apartments)
    {
        $this->name = $name;
        $this->city = $city;
        $this->zipCode = $zipCode;
        $this->apartments = new ArrayCollection($apartments);
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return City
     */
    public function getCity(): City
    {
        return $this->city;
    }

    public function updateCity(City $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @return Apartment[]
     */
    public function getApartments(): array
    {
        return $this->apartments->toArray();
    }
}
