<?php

namespace App\Entity;

use App\Repository\ComptebancaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComptebancaireRepository::class)]
class Comptebancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ID_Compte = null;

    #[ORM\Column(length: 255)]
    private ?string $Type_Compte = null;

    #[ORM\Column(length: 255)]
    private ?string $Solde = null;

    #[ORM\ManyToMany(targetEntity: CompteLigne::class, mappedBy: 'Id_Compte')]
    private Collection $compteLignes;

    public function __construct()
    {
        $this->compteLignes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDCompte(): ?string
    {
        return $this->ID_Compte;
    }

    public function setIDCompte(string $ID_Compte): static
    {
        $this->ID_Compte = $ID_Compte;

        return $this;
    }

    public function getTypeCompte(): ?string
    {
        return $this->Type_Compte;
    }

    public function setTypeCompte(string $Type_Compte): static
    {
        $this->Type_Compte = $Type_Compte;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->Solde;
    }

    public function setSolde(string $Solde): static
    {
        $this->Solde = $Solde;

        return $this;
    }

    /**
     * @return Collection<int, CompteLigne>
     */
    public function getCompteLignes(): Collection
    {
        return $this->compteLignes;
    }

    public function addCompteLigne(CompteLigne $compteLigne): static
    {
        if (!$this->compteLignes->contains($compteLigne)) {
            $this->compteLignes->add($compteLigne);
            $compteLigne->addIdCompte($this);
        }

        return $this;
    }

    public function removeCompteLigne(CompteLigne $compteLigne): static
    {
        if ($this->compteLignes->removeElement($compteLigne)) {
            $compteLigne->removeIdCompte($this);
        }

        return $this;
    }
}
