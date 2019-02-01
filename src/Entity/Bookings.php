<?php

namespace App\Entity;

use App\Entity\Users;
use App\Entity\Bookings;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\BookingsController;
/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingsRepository")
 */
class Bookings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $customerId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $beginAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $formulaName;

    /**
     * @ORM\Column(type="string")
     */
    private $gamesName;
    
    /**
     * @ORM\Column(type="string")
     */
    private $bookingStatus;

    /**
     * Constructor
     */
    public function __construct(Users $user){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
        $this->customerId = $user->getId();
        $this->bookingStatus = "En attente";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    public function setCustomerId(int $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->beginAt;
    }

    public function setBeginAt(\DateTimeInterface $beginAt): self
    {
        $this->beginAt = $beginAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(\DateTimeInterface $endAt): self
    {
        $this->endAt = $endAt;

        return $this;
    }

    public function getFormulaName(): ?string
    {
        return $this->formulaName;
    }

    public function setFormulaName(string $formulaName): self
    {
        $this->formulaName = $formulaName;

        return $this;
    }

    public function getGamesName(): ?string
    {
        return $this->gamesName;
    }

    public function setGamesName(string $gamesName): self
    {
        $this->gamesName = $gamesName;

        return $this;
    }

    public function getBookingStatus(): ?string
    {
        return $this->bookingStatus;
    }

    public function setBookingStatus(string $bookingStatus): self
    {
        $this->bookingStatus = $bookingStatus;

        return $this;
    }

    
}