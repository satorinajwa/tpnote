<?php

namespace App\Entity;

use App\Repository\CompteLigneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteLigneRepository::class)]
class CompteLigne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: LignesCompte::class, inversedBy: 'compteLignes')]
    private Collection $Id_ligne;

    #[ORM\ManyToMany(targetEntity: Comptebancaire::class, inversedBy: 'compteLignes')]
    private Collection $Id_Compte;

    public function __construct()
    {
        $this->Id_ligne = new ArrayCollection();
        $this->Id_Compte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, LignesCompte>
     */
    public function getIdLigne(): Collection
    {
        return $this->Id_ligne;
    }

    public function addIdLigne(LignesCompte $idLigne): static
    {
        if (!$this->Id_ligne->contains($idLigne)) {
            $this->Id_ligne->add($idLigne);
        }

        return $this;
    }

    public function removeIdLigne(LignesCompte $idLigne): static
    {
        $this->Id_ligne->removeElement($idLigne);

        return $this;
    }

    /**
     * @return Collection<int, Comptebancaire>
     */
    public function getIdCompte(): Collection
    {
        return $this->Id_Compte;
    }

    public function addIdCompte(Comptebancaire $idCompte): static
    {
        if (!$this->Id_Compte->contains($idCompte)) {
            $this->Id_Compte->add($idCompte);
        }

        return $this;
    }

    public function removeIdCompte(Comptebancaire $idCompte): static
    {
        $this->Id_Compte->removeElement($idCompte);

        return $this;
    }
}
