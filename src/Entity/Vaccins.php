<?php

namespace App\Entity;

use App\Repository\VaccinsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VaccinsRepository::class)
 */
class Vaccins
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOld;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNext;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOld(): ?\DateTimeInterface
    {
        return $this->dateOld;
    }

    public function setDateOld(?\DateTimeInterface $dateOld): self
    {
        $this->dateOld = $dateOld;

        return $this;
    }

    public function getDateNext(): ?\DateTimeInterface
    {
        return $this->dateNext;
    }

    public function setDateNext(?\DateTimeInterface $dateNext): self
    {
        $this->dateNext = $dateNext;

        return $this;
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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
