<?php

namespace App\Entity;

use App\Entity\Users;
use App\Entity\Bookings;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comments
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
    private $userId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $formulaName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $eventDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $overallRating;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="boolean")
     */
    private $feedback;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Jumanji;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Voodoo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Assassin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $TheCabin;

     /**
     * Constructor
     */
    public function __construct(Users $user, Bookings $booking){     
        $this->userId = $user->getId();
        $this->formulaName = $booking->getFormulaName();
        $this->eventDate = $booking->getBeginAt();
        $this->feedback = false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

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

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->eventDate;
    }

    public function setEventDate(\DateTimeInterface $eventDate): self
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    public function getOverallRating(): ?int
    {
        return $this->overallRating;
    }

    public function setOverallRating(int $overallRating): self
    {
        $this->overallRating = $overallRating;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getFeedback(): ?bool
    {
        return $this->feedback;
    }

    public function setFeedback(bool $feedback): self
    {
        $this->feedback = $feedback;

        return $this;
    }

    public function getJumanji(): ?int
    {
        return $this->Jumanji;
    }

    public function setJumanji(int $Jumanji): self
    {
        $this->Jumanji = $Jumanji;

        return $this;
    }

    public function getVoodoo(): ?int
    {
        return $this->Voodoo;
    }

    public function setVoodoo(int $Voodoo): self
    {
        $this->Voodoo = $Voodoo;

        return $this;
    }

    public function getAssassin(): ?int
    {
        return $this->Assassin;
    }

    public function setAssassin(int $Assassin): self
    {
        $this->Assassin = $Assassin;

        return $this;
    }

    public function getTheCabin(): ?int
    {
        return $this->TheCabin;
    }

    public function setTheCabin(int $TheCabin): self
    {
        $this->TheCabin = $TheCabin;

        return $this;
    }
}
