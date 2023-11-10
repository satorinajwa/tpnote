<?php

namespace App\Entity;

use App\Repository\CompteBancaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteBancaireRepository::class)]
class CompteBancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ID_Compte = null;

    #[ORM\Column(length: 255)]
    private ?string $type_contrat = null;

    #[ORM\ManyToMany(targetEntity: ClientCompte::class, mappedBy: 'Id_Compte')]
    private Collection $comptesclient;

    #[ORM\ManyToMany(targetEntity: LigneCompte::class, mappedBy: 'id_compte')]
    private Collection $lignecompte;

    public function __construct()
    {
        $this->comptesclient = new ArrayCollection();
        $this->lignecompte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDCompte(): ?int
    {
        return $this->ID_Compte;
    }

    public function setIDCompte(int $ID_Compte): static
    {
        $this->ID_Compte = $ID_Compte;

        return $this;
    }

    public function getTypeContrat(): ?string
    {
        return $this->type_contrat;
    }

    public function setTypeContrat(string $type_contrat): static
    {
        $this->type_contrat = $type_contrat;

        return $this;
    }

    /**
     * @return Collection<int, ClientCompte>
     */
    public function getComptesclient(): Collection
    {
        return $this->comptesclient;
    }

    public function addComptesclient(ClientCompte $comptesclient): static
    {
        if (!$this->comptesclient->contains($comptesclient)) {
            $this->comptesclient->add($comptesclient);
            $comptesclient->addIdCompte($this);
        }

        return $this;
    }

    public function removeComptesclient(ClientCompte $comptesclient): static
    {
        if ($this->comptesclient->removeElement($comptesclient)) {
            $comptesclient->removeIdCompte($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, LigneCompte>
     */
    public function getLignecompte(): Collection
    {
        return $this->lignecompte;
    }

    public function addLignecompte(LigneCompte $lignecompte): static
    {
        if (!$this->lignecompte->contains($lignecompte)) {
            $this->lignecompte->add($lignecompte);
            $lignecompte->addIdCompte($this);
        }

        return $this;
    }

    public function removeLignecompte(LigneCompte $lignecompte): static
    {
        if ($this->lignecompte->removeElement($lignecompte)) {
            $lignecompte->removeIdCompte($this);
        }

        return $this;
    }
}
