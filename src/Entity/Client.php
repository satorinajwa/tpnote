<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(length: 255)]
    public ?string $Nom_Client = null;

    #[ORM\Column(length: 255)]
    public ?string $Prenom_Client = null;

    #[ORM\Column(length: 255)]
    public ?string $Adresse_Client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClient(): ?string
    {
        return $this->Nom_Client;
    }

    public function setNomClient(string $Nom_Client): static
    {
        $this->Nom_Client = $Nom_Client;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->Prenom_Client;
    }

    public function setPrenomClient(string $Prenom_Client): static
    {
        $this->Prenom_Client = $Prenom_Client;

        return $this;
    }

    public function getAdresseClient(): ?string
    {
        return $this->Adresse_Client;
    }

    public function setAdresseClient(string $Adresse_Client): static
    {
        $this->Adresse_Client = $Adresse_Client;

        return $this;
    }
}
