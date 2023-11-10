<?php

namespace App\Entity;

use App\Repository\LigneCompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneCompteRepository::class)]
class LigneCompte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: lignedeCompte::class, inversedBy: 'compteslignes')]
    private Collection $IDligne;

    #[ORM\ManyToMany(targetEntity: CompteBancaire::class, inversedBy: 'lignecompte')]
    private Collection $id_compte;

    public function __construct()
    {
        $this->IDligne = new ArrayCollection();
        $this->id_compte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, lignedeCompte>
     */
    public function getIDligne(): Collection
    {
        return $this->IDligne;
    }

    public function addIDligne(lignedeCompte $iDligne): static
    {
        if (!$this->IDligne->contains($iDligne)) {
            $this->IDligne->add($iDligne);
        }

        return $this;
    }

    public function removeIDligne(lignedeCompte $iDligne): static
    {
        $this->IDligne->removeElement($iDligne);

        return $this;
    }

    /**
     * @return Collection<int, CompteBancaire>
     */
    public function getIdCompte(): Collection
    {
        return $this->id_compte;
    }

    public function addIdCompte(CompteBancaire $idCompte): static
    {
        if (!$this->id_compte->contains($idCompte)) {
            $this->id_compte->add($idCompte);
        }

        return $this;
    }

    public function removeIdCompte(CompteBancaire $idCompte): static
    {
        $this->id_compte->removeElement($idCompte);

        return $this;
    }
}
