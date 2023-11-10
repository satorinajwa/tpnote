<?php

namespace App\Entity;

use App\Repository\ConseillerBancaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConseillerBancaireRepository::class)]
class ConseillerBancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ID_Conseiller = null;

    #[ORM\Column(length: 255)]
    private ?string $prénom = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_agence = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDConseiller(): ?int
    {
        return $this->ID_Conseiller;
    }

    public function setIDConseiller(int $ID_Conseiller): static
    {
        $this->ID_Conseiller = $ID_Conseiller;

        return $this;
    }

    public function getPrénom(): ?string
    {
        return $this->prénom;
    }

    public function setPrénom(string $prénom): static
    {
        $this->prénom = $prénom;

        return $this;
    }

    public function getNomAgence(): ?string
    {
        return $this->nom_agence;
    }

    public function setNomAgence(string $nom_agence): static
    {
        $this->nom_agence = $nom_agence;

        return $this;
    }
}
