<?php

namespace App\Entity;

use App\Repository\GeneralRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GeneralRepository::class)
 */
class General
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
    private $logoSombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logoClair;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logoPetit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseEmail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEntreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slogan;

    /**
     * @ORM\Column(type="string", length=100000)
     */
    private $quiSommesNous;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageQuiSommesNous;

    /**
     * @ORM\Column(type="string", length=1000000)
     */
    private $nosChiffresCles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageNosChiffresCles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageAccueil;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogoSombre(): ?string
    {
        return $this->logoSombre;
    }

    public function setLogoSombre(string $logoSombre): self
    {
        $this->logoSombre = $logoSombre;

        return $this;
    }

    public function getLogoClair(): ?string
    {
        return $this->logoClair;
    }

    public function setLogoClair(string $logoClair): self
    {
        $this->logoClair = $logoClair;

        return $this;
    }

    public function getLogoPetit(): ?string
    {
        return $this->logoPetit;
    }

    public function setLogoPetit(string $logoPetit): self
    {
        $this->logoPetit = $logoPetit;

        return $this;
    }

    public function getAdresseEmail(): ?string
    {
        return $this->adresseEmail;
    }

    public function setAdresseEmail(string $adresseEmail): self
    {
        $this->adresseEmail = $adresseEmail;

        return $this;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(string $slogan): self
    {
        $this->slogan = $slogan;

        return $this;
    }

    public function getQuiSommesNous(): ?string
    {
        return $this->quiSommesNous;
    }

    public function setQuiSommesNous(string $quiSommesNous): self
    {
        $this->quiSommesNous = $quiSommesNous;

        return $this;
    }

    public function getImageQuiSommesNous(): ?string
    {
        return $this->imageQuiSommesNous;
    }

    public function setImageQuiSommesNous(string $imageQuiSommesNous): self
    {
        $this->imageQuiSommesNous = $imageQuiSommesNous;

        return $this;
    }

    public function getNosChiffresCles(): ?string
    {
        return $this->nosChiffresCles;
    }

    public function setNosChiffresCles(string $nosChiffresCles): self
    {
        $this->nosChiffresCles = $nosChiffresCles;

        return $this;
    }

    public function getImageNosChiffresCles(): ?string
    {
        return $this->imageNosChiffresCles;
    }

    public function setImageNosChiffresCles(string $imageNosChiffresCles): self
    {
        $this->imageNosChiffresCles = $imageNosChiffresCles;

        return $this;
    }

    public function getImageAccueil(): ?string
    {
        return $this->imageAccueil;
    }

    public function setImageAccueil(string $imageAccueil): self
    {
        $this->imageAccueil = $imageAccueil;

        return $this;
    }
}
