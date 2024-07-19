<?php

namespace App\Entity;

use App\Repository\DocumentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentsRepository::class)]
class Documents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $file_name = null;

    #[ORM\Column(length: 150)]
    private ?string $file_path = null;

    #[ORM\Column(length: 150)]
    private ?string $download_date = null;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    private ?Demarches $demarche = null;

    #[ORM\Column(length: 255)]
    private ?string $ManyToOne = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName(): ?string
    {
        return $this->file_name;
    }

    public function setFileName(?string $file_name): static
    {
        $this->file_name = $file_name;

        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->file_path;
    }

    public function setFilePath(string $file_path): static
    {
        $this->file_path = $file_path;

        return $this;
    }

    public function getDownloadDate(): ?string
    {
        return $this->download_date;
    }

    public function setDownloadDate(string $download_date): static
    {
        $this->download_date = $download_date;

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

    public function getDemarche(): ?Demarches
    {
        return $this->demarche;
    }

    public function setDemarche(?Demarches $demarche): static
    {
        $this->demarche = $demarche;

        return $this;
    }

    public function getManyToOne(): ?string
    {
        return $this->ManyToOne;
    }

    public function setManyToOne(string $ManyToOne): static
    {
        $this->ManyToOne = $ManyToOne;

        return $this;
    }
}
