<?php

namespace App\Entity;

use App\Repository\QualificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QualificationRepository::class)]
class Qualification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Qualification_Name;

    #[ORM\Column(type: 'string', length: 255)]
    private $Expiry_Date;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'qualification')]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQualificationName(): ?string
    {
        return $this->Qualification_Name;
    }

    public function setQualificationName(string $Qualification_Name): self
    {
        $this->Qualification_Name = $Qualification_Name;

        return $this;
    }

    public function getExpiryDate(): ?string
    {
        return $this->Expiry_Date;
    }

    public function setExpiryDate(string $Expiry_Date): self
    {
        $this->Expiry_Date = $Expiry_Date;

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
    public function __toString(): string
    {
        return $this->Qualification_Name;
    }
}
