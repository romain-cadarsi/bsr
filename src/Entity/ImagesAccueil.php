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
}
