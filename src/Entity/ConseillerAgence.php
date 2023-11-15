<?php

namespace App\Entity;

use App\Repository\ConseillerAgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConseillerAgenceRepository::class)]
class ConseillerAgence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: AgenceBancaire::class, inversedBy: 'conseillerAgences')]
    private Collection $Id_Agence;

    #[ORM\ManyToMany(targetEntity: ConseillerBancaire::class, inversedBy: 'conseillerAgences')]
    private Collection $Id_Conseiller;

    public function __construct()
    {
        $this->Id_Agence = new ArrayCollection();
        $this->Id_Conseiller = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, AgenceBancaire>
     */
    public function getIdAgence(): Collection
    {
        return $this->Id_Agence;
    }

    public function addIdAgence(AgenceBancaire $idAgence): static
    {
        if (!$this->Id_Agence->contains($idAgence)) {
            $this->Id_Agence->add($idAgence);
        }

        return $this;
    }

    public function removeIdAgence(AgenceBancaire $idAgence): static
    {
        $this->Id_Agence->removeElement($idAgence);

        return $this;
    }

    /**
     * @return Collection<int, ConseillerBancaire>
     */
    public function getIdConseiller(): Collection
    {
        return $this->Id_Conseiller;
    }

    public function addIdConseiller(ConseillerBancaire $idConseiller): static
    {
        if (!$this->Id_Conseiller->contains($idConseiller)) {
            $this->Id_Conseiller->add($idConseiller);
        }

        return $this;
    }

    public function removeIdConseiller(ConseillerBancaire $idConseiller): static
    {
        $this->Id_Conseiller->removeElement($idConseiller);

        return $this;
    }
}
