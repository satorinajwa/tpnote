<?php

namespace App\Entity;

use App\Repository\ConseillerBancaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?string $Nom_Conseiller = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom_conseiller = null;

    #[ORM\ManyToMany(targetEntity: ConseillerAgence::class, mappedBy: 'Id_Conseiller')]
    private Collection $conseillerAgences;

    public function __construct()
    {
        $this->conseillerAgences = new ArrayCollection();
    }

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

    public function getNomConseiller(): ?string
    {
        return $this->Nom_Conseiller;
    }

    public function setNomConseiller(string $Nom_Conseiller): static
    {
        $this->Nom_Conseiller = $Nom_Conseiller;

        return $this;
    }

    public function getPrenomConseiller(): ?string
    {
        return $this->Prenom_conseiller;
    }

    public function setPrenomConseiller(string $Prenom_conseiller): static
    {
        $this->Prenom_conseiller = $Prenom_conseiller;

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
            $conseillerAgence->addIdConseiller($this);
        }

        return $this;
    }

    public function removeConseillerAgence(ConseillerAgence $conseillerAgence): static
    {
        if ($this->conseillerAgences->removeElement($conseillerAgence)) {
            $conseillerAgence->removeIdConseiller($this);
        }

        return $this;
    }
}
