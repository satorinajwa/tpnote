<?php

namespace App\Entity;

use App\Repository\LigneDeCompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneDeCompteRepository::class)]
class LigneDeCompte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ID_ligne = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_publication = null;

    #[ORM\Column(length: 255)]
    private ?string $Montant_transaction = null;

    #[ORM\ManyToMany(targetEntity: LigneCompte::class, mappedBy: 'IDligne')]
    private Collection $compteslignes;

    public function __construct()
    {
        $this->compteslignes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDLigne(): ?int
    {
        return $this->ID_ligne;
    }

    public function setIDLigne(int $ID_ligne): static
    {
        $this->ID_ligne = $ID_ligne;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->Date_publication;
    }

    public function setDatePublication(\DateTimeInterface $Date_publication): static
    {
        $this->Date_publication = $Date_publication;

        return $this;
    }

    public function getMontantTransaction(): ?string
    {
        return $this->Montant_transaction;
    }

    public function setMontantTransaction(string $Montant_transaction): static
    {
        $this->Montant_transaction = $Montant_transaction;

        return $this;
    }

    /**
     * @return Collection<int, LigneCompte>
     */
    public function getCompteslignes(): Collection
    {
        return $this->compteslignes;
    }

    public function addComptesligne(LigneCompte $comptesligne): static
    {
        if (!$this->compteslignes->contains($comptesligne)) {
            $this->compteslignes->add($comptesligne);
            $comptesligne->addIDligne($this);
        }

        return $this;
    }

    public function removeComptesligne(LigneCompte $comptesligne): static
    {
        if ($this->compteslignes->removeElement($comptesligne)) {
            $comptesligne->removeIDligne($this);
        }

        return $this;
    }
}
