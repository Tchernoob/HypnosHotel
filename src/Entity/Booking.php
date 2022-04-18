<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $start_date_at;

    #[ORM\Column(type: 'date')]
    private $end_date_at;

    #[ORM\Column(type: 'boolean')]
    private $is_cancelled;

    #[ORM\ManyToOne(targetEntity: Suit::class, inversedBy: 'bookings')]
    #[ORM\JoinColumn(nullable: false)]
    private $suit;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'bookings')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDateAt(): ?\DateTimeInterface
    {
        return $this->start_date_at;
    }

    public function setStartDateAt(\DateTimeInterface $start_date_at): self
    {
        $this->start_date_at = $start_date_at;

        return $this;
    }

    public function getEndDateAt(): ?\DateTimeInterface
    {
        return $this->end_date_at;
    }

    public function setEndDateAt(\DateTimeInterface $end_date_at): self
    {
        $this->end_date_at = $end_date_at;

        return $this;
    }

    public function getIsCancelled(): ?bool
    {
        return $this->is_cancelled;
    }

    public function setIsCancelled(bool $is_cancelled): self
    {
        $this->is_cancelled = $is_cancelled;

        return $this;
    }

    public function getSuit(): ?Suit
    {
        return $this->suit;
    }

    public function setSuit(?Suit $suit): self
    {
        $this->suit = $suit;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
