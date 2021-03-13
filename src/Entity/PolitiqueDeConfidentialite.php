<?php

namespace App\Entity;

use App\Repository\PolitiqueDeConfidentialiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PolitiqueDeConfidentialiteRepository::class)
 */
class PolitiqueDeConfidentialite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100000000)
     */
    private $contenu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }
    public function getDisplayContent(){
        $pattern = '/h1/i';
        $replacement = 'h2';
        return preg_replace($pattern, $replacement, $this->contenu);
    }
}
