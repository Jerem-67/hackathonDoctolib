<?php

namespace App\Entity;

use App\Repository\ChildRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChildRepository::class)
 */
class Child
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $first_name;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sex;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="children")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity=Vaccins::class, inversedBy="children")
     */
    private $vaccins;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Tuberculose;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DTP;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Coqueluche;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Meningites;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $HepatiteB;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ROR;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $HPV;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="child")
     */
    private $users;

    public function __construct()
    {
        $this->vaccins = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getSex(): ?bool
    {
        return $this->sex;
    }

    public function setSex(bool $sex): self
    {
        $this->sex = $sex;

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

    /**
     * @return Collection|Vaccins[]
     */
    public function getVaccins(): Collection
    {
        return $this->vaccins;
    }

    public function addVaccin(Vaccins $vaccin): self
    {
        if (!$this->vaccins->contains($vaccin)) {
            $this->vaccins[] = $vaccin;
        }

        return $this;
    }

    public function removeVaccin(Vaccins $vaccin): self
    {
        if ($this->vaccins->contains($vaccin)) {
            $this->vaccins->removeElement($vaccin);
        }

        return $this;
    }

    public function getTuberculose(): ?\DateTimeInterface
    {
        return $this->Tuberculose;
    }

    public function setTuberculose(?\DateTimeInterface $Tuberculose): self
    {
        $this->Tuberculose = $Tuberculose;

        return $this;
    }

    public function getDTP(): ?\DateTimeInterface
    {
        return $this->DTP;
    }

    public function setDTP(?\DateTimeInterface $DTP): self
    {
        $this->DTP = $DTP;

        return $this;
    }

    public function getCoqueluche(): ?\DateTimeInterface
    {
        return $this->Coqueluche;
    }

    public function setCoqueluche(?\DateTimeInterface $Coqueluche): self
    {
        $this->Coqueluche = $Coqueluche;

        return $this;
    }

    public function getMeningites(): ?\DateTimeInterface
    {
        return $this->Meningites;
    }

    public function setMeningites(?\DateTimeInterface $Meningites): self
    {
        $this->Meningites = $Meningites;

        return $this;
    }

    public function getHepatiteB(): ?\DateTimeInterface
    {
        return $this->HepatiteB;
    }

    public function setHepatiteB(?\DateTimeInterface $HepatiteB): self
    {
        $this->HepatiteB = $HepatiteB;

        return $this;
    }

    public function getROR(): ?\DateTimeInterface
    {
        return $this->ROR;
    }

    public function setROR(?\DateTimeInterface $ROR): self
    {
        $this->ROR = $ROR;

        return $this;
    }

    public function getHPV(): ?\DateTimeInterface
    {
        return $this->HPV;
    }

    public function setHPV(?\DateTimeInterface $HPV): self
    {
        $this->HPV = $HPV;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addChild($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeChild($this);
        }

        return $this;
    }
}
