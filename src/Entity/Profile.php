<?php

namespace App\Entity;

use App\Enum\SexeEnum;
use App\Repository\ProfileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $postname = null;

    #[ORM\Column(length: 20)]
    private ?string $phone = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $address = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_of_birth = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $date_creation = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $date_inscrit = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'profiles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Passport $passport = null;

    #[ORM\Column(enumType: SexeEnum::class)]
    private ?SexeEnum $sexe = null;

    #[ORM\Column(length: 150)]
    private ?string $first_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPostname(): ?string
    {
        return $this->postname;
    }

    public function setPostname(?string $postname): static
    {
        $this->postname = $postname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(\DateTimeInterface $date_of_birth): static
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    public function getDateCreation(): ?string
    {
        return $this->date_creation;
    }

    public function setDateCreation(string $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getDateInscrit(): ?string
    {
        return $this->date_inscrit;
    }

    public function setDateInscrit(string $date_inscrit): static
    {
        $this->date_inscrit = $date_inscrit;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getPassport(): ?Passport
    {
        return $this->passport;
    }

    public function setPassport(?Passport $passport): static
    {
        $this->passport = $passport;

        return $this;
    }

    public function getSexe(): ?SexeEnum
    {
        return $this->sexe;
    }

    public function setSexe(SexeEnum $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }
}
