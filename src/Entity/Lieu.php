<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LieuRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LieuRepository::class)
 */
class Lieu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PlaceName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CoverImage;

    /**
     * @ORM\Column(type="array")
     */
    private $DoubleMedia = [];

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Texte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->Category;
    }

    public function setCategory(string $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    public function getPlaceName(): ?string
    {
        return $this->PlaceName;
    }

    public function setPlaceName(string $PlaceName): self
    {
        $this->PlaceName = $PlaceName;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->CoverImage;
    }

    public function setCoverImage(string $CoverImage): self
    {
        $this->CoverImage = $CoverImage;

        return $this;
    }

    public function getDoubleMedia(): array
    {
        return $this->DoubleMedia;
    }

    public function setDoubleMedia(array $DoubleMedia): self
    {
        $this->DoubleMedia = $DoubleMedia;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->Texte;
    }

    public function setTexte(string $Texte): self
    {
        $this->Texte = $Texte;

        return $this;
    }
}
