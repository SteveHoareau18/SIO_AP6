<?php

namespace App\Entity;

use App\Repository\LigneFraisForfaitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneFraisForfaitRepository::class)
 */
class LigneFraisForfait
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idVisiteur;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $mois;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $idFraisForfait;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdVisiteur(): ?string
    {
        return $this->idVisiteur;
    }

    public function setIdVisiteur(string $idVisiteur): self
    {
        $this->idVisiteur = $idVisiteur;

        return $this;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getIdFraisForfait(): ?string
    {
        return $this->idFraisForfait;
    }

    public function setIdFraisForfait(string $idFraisForfait): self
    {
        $this->idFraisForfait = $idFraisForfait;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}
