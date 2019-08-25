<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
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
     * @ORM\OneToMany(targetEntity="App\Entity\City", mappedBy="country", orphanRemoval=true)
     * @var City[]
     */
    private $cities;

    /**
     * Country constructor.
     * @param string $name
     * @param City[] $cities
     */
    public function __construct(string $name, array $cities = [])
    {
        $this->name = $name;
        $this->cities = new ArrayCollection($cities);
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
     * @return array|City[]
     */
    public function getCities(): array
    {
        return $this->cities->toArray();
    }

    public function addCity(City $city): self
    {
        if (!$this->cities->contains($city)) {
            $this->cities[] = $city;
            $city->updateCountry($this);
        }

        return $this;
    }
}
