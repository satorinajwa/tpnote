<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ID_Client = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prénom = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\ManyToMany(targetEntity: ClientCompte::class, mappedBy: 'ID_Client')]
    private Collection $clientid;

    public function __construct()
    {
        $this->clientid = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDClient(): ?int
    {
        return $this->ID_Client;
    }

    public function setIDClient(int $ID_Client): static
    {
        $this->ID_Client = $ID_Client;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrénom(): ?string
    {
        return $this->Prénom;
    }

    public function setPrénom(string $Prénom): static
    {
        $this->Prénom = $Prénom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    /**
     * @return Collection<int, ClientCompte>
     */
    public function getClientid(): Collection
    {
        return $this->clientid;
    }

    public function addClientid(ClientCompte $clientid): static
    {
        if (!$this->clientid->contains($clientid)) {
            $this->clientid->add($clientid);
            $clientid->addIDClient($this);
        }

        return $this;
    }

    public function removeClientid(ClientCompte $clientid): static
    {
        if ($this->clientid->removeElement($clientid)) {
            $clientid->removeIDClient($this);
        }

        return $this;
    }
}
