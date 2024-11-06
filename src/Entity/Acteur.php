<?php

namespace App\Entity;

use App\Repository\ActeurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActeurRepository::class)]
class Acteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_acteur = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom_acteur = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_naissance_acteur = null;

    #[ORM\Column(length: 255)]
    private ?string $Role_acteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomActeur(): ?string
    {
        return $this->Nom_acteur;
    }

    public function setNomActeur(string $Nom_acteur): static
    {
        $this->Nom_acteur = $Nom_acteur;

        return $this;
    }

    public function getPrenomActeur(): ?string
    {
        return $this->Prenom_acteur;
    }

    public function setPrenomActeur(string $Prenom_acteur): static
    {
        $this->Prenom_acteur = $Prenom_acteur;

        return $this;
    }

    public function getDateNaissanceActeur(): ?\DateTimeInterface
    {
        return $this->Date_naissance_acteur;
    }

    public function setDateNaissanceActeur(\DateTimeInterface $Date_naissance_acteur): static
    {
        $this->Date_naissance_acteur = $Date_naissance_acteur;

        return $this;
    }

    public function getRoleActeur(): ?string
    {
        return $this->Role_acteur;
    }

    public function setRoleActeur(string $Role_acteur): static
    {
        $this->Role_acteur = $Role_acteur;

        return $this;
    }
}
