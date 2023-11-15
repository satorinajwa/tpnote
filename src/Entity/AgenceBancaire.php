<?php

namespace App\Entity;

use App\Repository\AgenceBancaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?string $Nom_agence = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse_agence = null;

    #[ORM\ManyToMany(targetEntity: ConseillerAgence::class, mappedBy: 'Id_Agence')]
    private Collection $conseillerAgences;

    public function __construct()
    {
        $this->conseillerAgences = new ArrayCollection();
    }

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
        return $this->Nom_agence;
    }

    public function setNomAgence(string $Nom_agence): static
    {
        $this->Nom_agence = $Nom_agence;

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

    /**
     * @return Collection<int, ConseillerAgence>
     */
    public function getConseillerAgences(): Collection
    {
        return $this->conseillerAgences;
    }

    public function addConseillerAgence(ConseillerAgence $conseillerAgence): static
    {
        if (!$this->conseillerAgences->contains($conseillerAgence)) {
            $this->conseillerAgences->add($conseillerAgence);
            $conseillerAgence->addIdAgence($this);
        }

        return $this;
    }

    public function removeConseillerAgence(ConseillerAgence $conseillerAgence): static
    {
        if ($this->conseillerAgences->removeElement($conseillerAgence)) {
            $conseillerAgence->removeIdAgence($this);
        }

        return $this;
    }
}
