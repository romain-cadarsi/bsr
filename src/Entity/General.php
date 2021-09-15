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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=10000)
     */
    private $entrepriseDescription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $questionFooter;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $descriptionQuestionFooter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $positionSloganAccueil;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $sousTexteSlogan;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleurSlogan;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $policeGeneral;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $policeTitres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accueilTitreSection1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accueilTitreSection2;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hidePhoneOnMobile;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEntrepriseDescription(): ?string
    {
        return $this->entrepriseDescription;
    }

    public function setEntrepriseDescription(string $entrepriseDescription): self
    {
        $this->entrepriseDescription = $entrepriseDescription;

        return $this;
    }

    public function getQuestionFooter(): ?string
    {
        return $this->questionFooter;
    }

    public function setQuestionFooter(string $questionFooter): self
    {
        $this->questionFooter = $questionFooter;

        return $this;
    }

    public function getDescriptionQuestionFooter(): ?string
    {
        return $this->descriptionQuestionFooter;
    }

    public function setDescriptionQuestionFooter(string $descriptionQuestionFooter): self
    {
        $this->descriptionQuestionFooter = $descriptionQuestionFooter;

        return $this;
    }

    public function getPositionSloganAccueil(): ?string
    {
        return $this->positionSloganAccueil;
    }

    public function setPositionSloganAccueil(string $positionSloganAccueil): self
    {
        $this->positionSloganAccueil = $positionSloganAccueil;

        return $this;
    }

    public function getSousTexteSlogan(): ?string
    {
        return $this->sousTexteSlogan;
    }

    public function setSousTexteSlogan(?string $sousTexteSlogan): self
    {
        $this->sousTexteSlogan = $sousTexteSlogan;

        return $this;
    }

    public function getCouleurSlogan(): ?string
    {
        return $this->couleurSlogan;
    }

    public function setCouleurSlogan(?string $couleurSlogan): self
    {
        $this->couleurSlogan = $couleurSlogan;

        return $this;
    }

    public function getPoliceGeneral(): ?string
    {
        return $this->policeGeneral;
    }

    public function setPoliceGeneral(?string $policeGeneral): self
    {
        $this->policeGeneral = $policeGeneral;

        return $this;
    }

    public function getPoliceTitres(): ?string
    {
        return $this->policeTitres;
    }

    public function setPoliceTitres(?string $policeTitres): self
    {
        $this->policeTitres = $policeTitres;

        return $this;
    }

    public function getAccueilTitreSection1(): ?string
    {
        return $this->accueilTitreSection1;
    }

    public function setAccueilTitreSection1(?string $accueilTitreSection1): self
    {
        $this->accueilTitreSection1 = $accueilTitreSection1;

        return $this;
    }

    public function getAccueilTitreSection2(): ?string
    {
        return $this->accueilTitreSection2;
    }

    public function setAccueilTitreSection2(?string $accueilTitreSection2): self
    {
        $this->accueilTitreSection2 = $accueilTitreSection2;

        return $this;
    }

    public function getHidePhoneOnMobile(): ?bool
    {
        return $this->hidePhoneOnMobile;
    }

    public function setHidePhoneOnMobile(bool $hidePhoneOnMobile): self
    {
        $this->hidePhoneOnMobile = $hidePhoneOnMobile;

        return $this;
    }
}
