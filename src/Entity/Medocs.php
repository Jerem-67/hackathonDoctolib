<?php

namespace App\Entity;

use App\Repository\MedocsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedocsRepository::class)
 */
class Medocs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $posologie;

    /**
     * @ORM\Column(type="text")
     */
    private $symptome;

    /**
     * @ORM\Column(type="text")
     */
    private $effets;

    /**
     * @ORM\Column(type="text")
     */
    private $contrindic;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dosage;

    /**
     * @ORM\Column(type="text")
     */
    private $conserv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $forme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosologie(): ?string
    {
        return $this->posologie;
    }

    public function setPosologie(string $posologie): self
    {
        $this->posologie = $posologie;

        return $this;
    }

    public function getSymptome(): ?string
    {
        return $this->symptome;
    }

    public function setSymptome(string $symptome): self
    {
        $this->symptome = $symptome;

        return $this;
    }

    public function getEffets(): ?string
    {
        return $this->effets;
    }

    public function setEffets(string $effets): self
    {
        $this->effets = $effets;

        return $this;
    }

    public function getContrindic(): ?string
    {
        return $this->contrindic;
    }

    public function setContrindic(string $contrindic): self
    {
        $this->contrindic = $contrindic;

        return $this;
    }

    public function getDosage(): ?string
    {
        return $this->dosage;
    }

    public function setDosage(string $dosage): self
    {
        $this->dosage = $dosage;

        return $this;
    }

    public function getConserv(): ?string
    {
        return $this->conserv;
    }

    public function setConserv(string $conserv): self
    {
        $this->conserv = $conserv;

        return $this;
    }

    public function getForme(): ?string
    {
        return $this->forme;
    }

    public function setForme(string $forme): self
    {
        $this->forme = $forme;

        return $this;
    }
}
