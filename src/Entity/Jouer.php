<?php

namespace App\Entity;

use App\Repository\JouerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JouerRepository::class)]
class Jouer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'joueursFilms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?film $identifiant_film = null;

    #[ORM\ManyToOne(inversedBy: 'acteurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?film $id_acteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifiantFilm(): ?film
    {
        return $this->identifiant_film;
    }

    public function setIdentifiantFilm(?film $identifiant_film): static
    {
        $this->identifiant_film = $identifiant_film;

        return $this;
    }

    public function getIdActeur(): ?film
    {
        return $this->id_acteur;
    }

    public function setIdActeur(?film $id_acteur): static
    {
        $this->id_acteur = $id_acteur;

        return $this;
    }
}
