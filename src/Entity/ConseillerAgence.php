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

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'ID_Agence')]
    private Collection $IdConseiller;

    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'IdConseiller')]
    private Collection $ID_Agence;

    public function __construct()
    {
        $this->IdConseiller = new ArrayCollection();
        $this->ID_Agence = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, self>
     */
    public function getIdConseiller(): Collection
    {
        return $this->IdConseiller;
    }

    public function addIdConseiller(self $idConseiller): static
    {
        if (!$this->IdConseiller->contains($idConseiller)) {
            $this->IdConseiller->add($idConseiller);
        }

        return $this;
    }

    public function removeIdConseiller(self $idConseiller): static
    {
        $this->IdConseiller->removeElement($idConseiller);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getIDAgence(): Collection
    {
        return $this->ID_Agence;
    }

    public function addIDAgence(self $iDAgence): static
    {
        if (!$this->ID_Agence->contains($iDAgence)) {
            $this->ID_Agence->add($iDAgence);
            $iDAgence->addIdConseiller($this);
        }

        return $this;
    }

    public function removeIDAgence(self $iDAgence): static
    {
        if ($this->ID_Agence->removeElement($iDAgence)) {
            $iDAgence->removeIdConseiller($this);
        }

        return $this;
    }
}
