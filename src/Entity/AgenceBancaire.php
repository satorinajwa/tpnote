<?php

namespace App\Entity;

use App\Repository\AgenceBancaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgenceBancaireRepository::class)]
class AgenceBancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ID_Agence = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_Agence = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse_agence = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDAgence(): ?int
    {
        return $this->ID_Agence;
    }

    public function setIDAgence(int $ID_Agence): static
    {
        $this->ID_Agence = $ID_Agence;

        return $this;
    }

    public function getNomAgence(): ?string
    {
        return $this->Nom_Agence;
    }

    public function setNomAgence(string $Nom_Agence): static
    {
        $this->Nom_Agence = $Nom_Agence;

        return $this;
    }

    public function getAdresseAgence(): ?string
    {
        return $this->Adresse_agence;
    }

    public function setAdresseAgence(string $Adresse_agence): static
    {
        $this->Adresse_agence = $Adresse_agence;

        return $this;
    }
}
