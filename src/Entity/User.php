<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sex;

    /**
     * @ORM\OneToMany(targetEntity=Child::class, mappedBy="user")
     */
    private $children;

    /**
     * @ORM\ManyToMany(targetEntity=Vaccins::class, inversedBy="users")
     */
    private $vaccins;

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
    private $Grippe;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Zona;

    /**
     * @ORM\ManyToMany(targetEntity=child::class, inversedBy="users")
     */
    private $child;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->vaccins = new ArrayCollection();
        $this->child = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

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

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

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
            $child->setUser($this);
        }

        return $this;
    }

    public function removeChild(Child $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getUser() === $this) {
                $child->setUser(null);
            }
        }

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

    public function getGrippe(): ?\DateTimeInterface
    {
        return $this->Grippe;
    }

    public function setGrippe(?\DateTimeInterface $Grippe): self
    {
        $this->Grippe = $Grippe;

        return $this;
    }

    public function getZona(): ?\DateTimeInterface
    {
        return $this->Zona;
    }

    public function setZona(?\DateTimeInterface $Zona): self
    {
        $this->Zona = $Zona;

        return $this;
    }

    /**
     * @return Collection|child[]
     */
    public function getChild(): Collection
    {
        return $this->child;
    }
}
