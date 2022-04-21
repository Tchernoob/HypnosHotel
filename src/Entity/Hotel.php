<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]

class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    private $adress;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $home_image;


    #[ORM\OneToMany(mappedBy: 'hotel', targetEntity: Suit::class, orphanRemoval: true)]
    private $suits;

    #[ORM\OneToOne(mappedBy: 'hotel', targetEntity: Manager::class, cascade: ['persist', 'remove'])]
    private $manager;

    public function __construct()
    {
        $this->suits = new ArrayCollection();
        $this->managers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getHomeImage(): ?string
    {
        return $this->home_image;
    }

    public function setHomeImage(string $home_image): self
    {
        $this->home_image = $home_image;

        return $this;
    }

    /**
     * @return Collection<int, Suit>
     */
    public function getSuits(): Collection
    {
        return $this->suits;
    }

    public function addSuit(Suit $suit): self
    {
        if (!$this->suits->contains($suit)) {
            $this->suits[] = $suit;
            $suit->setHotel($this);
        }

        return $this;
    }

    public function removeSuit(Suit $suit): self
    {
        if ($this->suits->removeElement($suit)) {
            // set the owning side to null (unless already changed)
            if ($suit->getHotel() === $this) {
                $suit->setHotel(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
