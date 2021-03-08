<?php

namespace App\Entity;

use App\Repository\ActualiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActualiteRepository::class)
 */
class Actualite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $lienFacebook;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLienFacebook(): ?string
    {
        return $this->lienFacebook;
    }

    public function setLienFacebook(string $lienFacebook): self
    {
        $this->lienFacebook = $lienFacebook;

        return $this;
    }
}
