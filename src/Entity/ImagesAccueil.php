<?php

namespace App\Entity;

use App\Repository\ImagesAccueilRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagesAccueilRepository::class)
 */
class ImagesAccueil
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
    private $imageDroite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageGauche;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $texteDroite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $texteGauche;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageRealisations;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $texteRealisations;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageBlogs;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $texteBlogs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageActualites;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $texteActualites;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageContact;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $texteContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleurDroite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleurGauche;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageDroite(): ?string
    {
        return $this->imageDroite;
    }

    public function setImageDroite(string $imageDroite): self
    {
        $this->imageDroite = $imageDroite;

        return $this;
    }

    public function getImageGauche(): ?string
    {
        return $this->imageGauche;
    }

    public function setImageGauche(string $imageGauche): self
    {
        $this->imageGauche = $imageGauche;

        return $this;
    }

    public function getTexteDroite(): ?string
    {
        return $this->texteDroite;
    }

    public function setTexteDroite(string $texteDroite): self
    {
        $this->texteDroite = $texteDroite;

        return $this;
    }

    public function getTexteGauche(): ?string
    {
        return $this->texteGauche;
    }

    public function setTexteGauche(string $texteGauche): self
    {
        $this->texteGauche = $texteGauche;

        return $this;
    }

    public function getImageRealisations(): ?string
    {
        return $this->imageRealisations;
    }

    public function setImageRealisations(?string $imageRealisations): self
    {
        $this->imageRealisations = $imageRealisations;

        return $this;
    }

    public function getTexteRealisations(): ?string
    {
        return $this->texteRealisations;
    }

    public function setTexteRealisations(?string $texteRealisations): self
    {
        $this->texteRealisations = $texteRealisations;

        return $this;
    }

    public function getImageBlogs(): ?string
    {
        return $this->imageBlogs;
    }

    public function setImageBlogs(?string $imageBlogs): self
    {
        $this->imageBlogs = $imageBlogs;

        return $this;
    }

    public function getTexteBlogs(): ?string
    {
        return $this->texteBlogs;
    }

    public function setTexteBlogs(?string $texteBlogs): self
    {
        $this->texteBlogs = $texteBlogs;

        return $this;
    }

    public function getImageActualites(): ?string
    {
        return $this->imageActualites;
    }

    public function setImageActualites(?string $imageActualites): self
    {
        $this->imageActualites = $imageActualites;

        return $this;
    }

    public function getTexteActualites(): ?string
    {
        return $this->texteActualites;
    }

    public function setTexteActualites(?string $texteActualites): self
    {
        $this->texteActualites = $texteActualites;

        return $this;
    }

    public function getImageContact(): ?string
    {
        return $this->imageContact;
    }

    public function setImageContact(?string $imageContact): self
    {
        $this->imageContact = $imageContact;

        return $this;
    }

    public function getTexteContact(): ?string
    {
        return $this->texteContact;
    }

    public function setTexteContact(?string $texteContact): self
    {
        $this->texteContact = $texteContact;

        return $this;
    }

    public function getCouleurDroite(): ?string
    {
        return $this->couleurDroite;
    }

    public function setCouleurDroite(?string $couleurDroite): self
    {
        $this->couleurDroite = $couleurDroite;

        return $this;
    }

    public function getCouleurGauche(): ?string
    {
        return $this->couleurGauche;
    }

    public function setCouleurGauche(?string $couleurGauche): self
    {
        $this->couleurGauche = $couleurGauche;

        return $this;
    }
}
