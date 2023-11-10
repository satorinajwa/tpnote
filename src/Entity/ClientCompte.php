<?php

namespace App\Entity;

use App\Repository\ClientCompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientCompteRepository::class)]
class ClientCompte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Client::class, inversedBy: 'clientid')]
    private Collection $ID_Client;

    #[ORM\ManyToMany(targetEntity: CompteBancaire::class, inversedBy: 'comptesclient')]
    private Collection $Id_Compte;

    public function __construct()
    {
        $this->ID_Client = new ArrayCollection();
        $this->Id_Compte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getIDClient(): Collection
    {
        return $this->ID_Client;
    }

    public function addIDClient(Client $iDClient): static
    {
        if (!$this->ID_Client->contains($iDClient)) {
            $this->ID_Client->add($iDClient);
        }

        return $this;
    }

    public function removeIDClient(Client $iDClient): static
    {
        $this->ID_Client->removeElement($iDClient);

        return $this;
    }

    /**
     * @return Collection<int, CompteBancaire>
     */
    public function getIdCompte(): Collection
    {
        return $this->Id_Compte;
    }

    public function addIdCompte(CompteBancaire $idCompte): static
    {
        if (!$this->Id_Compte->contains($idCompte)) {
            $this->Id_Compte->add($idCompte);
        }

        return $this;
    }

    public function removeIdCompte(CompteBancaire $idCompte): static
    {
        $this->Id_Compte->removeElement($idCompte);

        return $this;
    }
}
