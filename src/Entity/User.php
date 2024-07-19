<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    private ?string $role = null;

    #[ORM\Column(length: 50)]
    private ?string $teams = null;

    #[ORM\Column(length: 10)]
    private ?string $password = null;

    /**
     * @var Collection<int, Appointment>
     */
    #[ORM\OneToMany(targetEntity: Appointment::class, mappedBy: 'user')]
    private Collection $appointments;

    /**
     * @var Collection<int, Demarches>
     */
    #[ORM\OneToMany(targetEntity: Demarches::class, mappedBy: 'user')]
    private Collection $demarches;

    /**
     * @var Collection<int, Documents>
     */
    #[ORM\OneToMany(targetEntity: Documents::class, mappedBy: 'user')]
    private Collection $documents;

    public function __construct()
    {
        $this->appointments = new ArrayCollection();
        $this->demarches = new ArrayCollection();
        $this->documents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getTeams(): ?string
    {
        return $this->teams;
    }

    public function setTeams(string $teams): static
    {
        $this->teams = $teams;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Appointment>
     */
    public function getAppointments(): Collection
    {
        return $this->appointments;
    }

    public function addAppointment(Appointment $appointment): static
    {
        if (!$this->appointments->contains($appointment)) {
            $this->appointments->add($appointment);
            $appointment->setUser($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): static
    {
        if ($this->appointments->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getUser() === $this) {
                $appointment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Demarches>
     */
    public function getDemarches(): Collection
    {
        return $this->demarches;
    }

    public function addDemarch(Demarches $demarch): static
    {
        if (!$this->demarches->contains($demarch)) {
            $this->demarches->add($demarch);
            $demarch->setUser($this);
        }

        return $this;
    }

    public function removeDemarch(Demarches $demarch): static
    {
        if ($this->demarches->removeElement($demarch)) {
            // set the owning side to null (unless already changed)
            if ($demarch->getUser() === $this) {
                $demarch->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Documents>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Documents $document): static
    {
        if (!$this->documents->contains($document)) {
            $this->documents->add($document);
            $document->setUser($this);
        }

        return $this;
    }

    public function removeDocument(Documents $document): static
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getUser() === $this) {
                $document->setUser(null);
            }
        }

        return $this;
    }
}
