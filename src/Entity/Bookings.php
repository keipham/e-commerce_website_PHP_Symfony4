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
     * Constructor
     */
    public function __construct(Users $user){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
        $this->customerId = $user->getId();
    }

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
     * @ORM\Column(type="integer")
     */
    private $formulaId;

    /**
     * @ORM\Column(type="integer")
     */
    private $gamesId;
  

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

    public function getFormulaId(): ?int
    {
        return $this->formulaId;
    }

    public function setFormulaId(int $formulaId): self
    {
        $this->formulaId = $formulaId;

        return $this;
    }

    public function getGamesId(): ?int
    {
        return $this->gamesId;
    }

    public function setGamesId(int $gamesId): self
    {
        $this->gamesId = $gamesId;

        return $this;
    }

    
}