<?php

namespace App\Entity;

use App\Repository\LignesCompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LignesCompteRepository::class)]
class LignesCompte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ID_Ligne = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_de_transaction = null;

    #[ORM\Column(length: 255)]
    private ?string $Montant_de_la_transaction = null;

    #[ORM\ManyToMany(targetEntity: CompteLigne::class, mappedBy: 'Id_ligne')]
    private Collection $compteLignes;

    public function __construct()
    {
        $this->compteLignes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDLigne(): ?int
    {
        return $this->ID_Ligne;
    }

    public function setIDLigne(int $ID_Ligne): static
    {
        $this->ID_Ligne = $ID_Ligne;

        return $this;
    }

    public function getDateDeTransaction(): ?\DateTimeInterface
    {
        return $this->Date_de_transaction;
    }

    public function setDateDeTransaction(\DateTimeInterface $Date_de_transaction): static
    {
        $this->Date_de_transaction = $Date_de_transaction;

        return $this;
    }

    public function getMontantDeLaTransaction(): ?string
    {
        return $this->Montant_de_la_transaction;
    }

    public function setMontantDeLaTransaction(string $Montant_de_la_transaction): static
    {
        $this->Montant_de_la_transaction = $Montant_de_la_transaction;

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
            $compteLigne->addIdLigne($this);
        }

        return $this;
    }

    public function removeCompteLigne(CompteLigne $compteLigne): static
    {
        if ($this->compteLignes->removeElement($compteLigne)) {
            $compteLigne->removeIdLigne($this);
        }

        return $this;
    }
}
