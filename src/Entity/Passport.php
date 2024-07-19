<?php

namespace App\Entity;

use App\Repository\PassportRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PassportRepository::class)]
class Passport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nationalité = null;

    #[ORM\Column(length: 100)]
    private ?string $profession = null;

    /**
     * @var Collection<int, Profile>
     */
    #[ORM\OneToMany(targetEntity: Profile::class, mappedBy: 'passport', orphanRemoval: true)]
    private Collection $profiles;

    #[ORM\Column(length: 9)]
    private ?string $number_Passport = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $expireAt = null;


    public function __construct()
    {
        $this->profiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNationalité(): ?string
    {
        return $this->nationalité;
    }

    public function setNationalité(string $nationalité): static
    {
        $this->nationalité = $nationalité;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * @return Collection<int, Profile>
     */
    public function getProfiles(): Collection
    {
        return $this->profiles;
    }

    public function addProfile(Profile $profile): static
    {
        if (!$this->profiles->contains($profile)) {
            $this->profiles->add($profile);
            $profile->setPassport($this);
        }

        return $this;
    }

    public function removeProfile(Profile $profile): static
    {
        if ($this->profiles->removeElement($profile)) {
            // set the owning side to null (unless already changed)
            if ($profile->getPassport() === $this) {
                $profile->setPassport(null);
            }
        }

        return $this;
    }

    public function getNumberPassport(): ?string
    {
        return $this->number_Passport;
    }

    public function setNumberPassport(string $number_Passport): static
    {
        $this->number_Passport = $number_Passport;

        return $this;
    }

    public function getExpireAt(): ?\DateTimeInterface
    {
        return $this->expireAt;
    }

    public function setExpireAt(\DateTimeInterface $expireAt): static
    {
        $this->expireAt = $expireAt;

        return $this;
    }
}
