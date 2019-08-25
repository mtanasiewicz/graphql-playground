<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="cities")
     * @ORM\JoinColumn(nullable=false)
     * @var Country
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\District", mappedBy="city", orphanRemoval=true)
     * @var array|District[]
     */
    private $districts;

    /**
     * City constructor.
     * @param string $name
     * @param Country $country
     * @param District[]|array $districts
     */
    public function __construct(string $name, Country $country, array $districts = [])
    {
        $this->name = $name;
        $this->country = $country;
        $this->districts = new ArrayCollection($districts);
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
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @return array|District[]
     */
    public function getDistricts(): array
    {
        return $this->districts->toArray();
    }

    public function addDistrict(District $district): void
    {
        if (!$this->districts->contains($district)) {
            $this->districts[] = $district;
            $district->updateCity($this);
        }
    }

    public function updateCountry(Country $country): void
    {
        $this->country = $country;
    }
}
