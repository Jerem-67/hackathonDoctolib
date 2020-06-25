<?php

namespace App\Entity;

use App\Repository\VaccinsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToMany(targetEntity=Child::class, mappedBy="vaccins")
     */
    private $children;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="vaccins")
     */
    private $users;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

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

    /**
     * @return Collection|Child[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(Child $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->addVaccin($this);
        }

        return $this;
    }

    public function removeChild(Child $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            $child->removeVaccin($this);
        }

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
            $user->addVaccin($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeVaccin($this);
        }

        return $this;
    }
}
