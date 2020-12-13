<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30,unique=true)
     */
    private $Matricule;

    /**
     * @ORM\Column(type="string", length=30)
     * @assert\NotBlank
     */
    private $Marque;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Couleur;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $TypeDeCarburant;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDeMiseEnCirculation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Disponibilitee;

    /**
     * @ORM\Column(type="integer")
     */
    private $NombreDePlace;

    /**
     * @ORM\OneToOne(targetEntity=Emplacement::class, mappedBy="idvoiture", cascade={"persist", "remove"})
     */
    private $emplacement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->Matricule;
    }

    public function setMatricule(string $Matricule): self
    {
        $this->Matricule = $Matricule;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->Couleur;
    }

    public function setCouleur(string $Couleur): self
    {
        $this->Couleur = $Couleur;

        return $this;
    }

    public function getTypeDeCarburant(): ?string
    {
        return $this->TypeDeCarburant;
    }

    public function setTypeDeCarburant(?string $TypeDeCarburant): self
    {
        $this->TypeDeCarburant = $TypeDeCarburant;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDateDeMiseEnCirculation(): ?\DateTimeInterface
    {
        return $this->DateDeMiseEnCirculation;
    }

    public function setDateDeMiseEnCirculation(\DateTimeInterface $DateDeMiseEnCirculation): self
    {
        $this->DateDeMiseEnCirculation = $DateDeMiseEnCirculation;

        return $this;
    }

    public function getDisponibilitee(): ?bool
    {
        return $this->Disponibilitee;
    }

    public function setDisponibilitee(bool $Disponibilitee): self
    {
        $this->Disponibilitee = $Disponibilitee;

        return $this;
    }

    public function getNombreDePlace(): ?int
    {
        return $this->NombreDePlace;
    }

    public function setNombreDePlace(int $NombreDePlace): self
    {
        $this->NombreDePlace = $NombreDePlace;

        return $this;
    }

    public function getEmplacement(): ?Emplacement
    {
        return $this->emplacement;
    }

    public function setEmplacement(Emplacement $emplacement): self
    {
        // set the owning side of the relation if necessary
        if ($emplacement->getIdvoiture() !== $this) {
            $emplacement->setIdvoiture($this);
        }

        $this->emplacement = $emplacement;

        return $this;
    }
}
