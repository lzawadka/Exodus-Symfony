<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TimeEventRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   collectionOperations={
 *        "get",
 *        "post"={
              "access_control"="is_granted('ROLE_ADMIN')"
 *        }
 *   }
 * )
 * @ORM\Entity(repositoryClass=TimeEventRepository::class)
 */
class TimeEvent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"post", "get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post", "get"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=500)
     * @Groups({"post", "get"})
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post", "get"})
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post", "get"})
     */
    private $buttonLabel;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post", "get"})
     */
    private $buttonUrl;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post", "get"})
     */
    private $Date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getButtonLabel(): ?string
    {
        return $this->buttonLabel;
    }

    public function setButtonLabel(string $buttonLabel): self
    {
        $this->buttonLabel = $buttonLabel;

        return $this;
    }

    public function getButtonUrl(): ?string
    {
        return $this->buttonUrl;
    }

    public function setButtonUrl(string $buttonUrl): self
    {
        $this->buttonUrl = $buttonUrl;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->Date;
    }

    public function setDate(string $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
