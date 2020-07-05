<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\ArticlesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   collectionOperations={
 *        "get",
 *        "post"={
            "access_control"="is_granted('ROLE_ADMIN')"
 *        }
 *   },
 *   itemOperations={
 *        "get"={
 *            "normalization_context"={
 *                "groups"={"get"}
 *            }
 *        },
 *        "delete"={
 *             "access_control"="is_granted('ROLE_ADMIN')"
 *        }
 *      },
 * )
 * @ORM\Entity(repositoryClass=ArticlesRepository::class)
 */
class Articles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @Groups({"get", "post"})
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get", "post"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get", "post"})
     */
    private $intro;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get", "post"})
     */
    private $coverImage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get", "post"})
     */
    private $timeToRead;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Section", mappedBy="article")
     * @Groups({"get", "post"})
     * @ApiSubresource()
     */
    private $sections;

    public function __construct()
    {
      $this->sections = new ArrayCollection();
    }

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

    public function getIntro(): ?string
    {
        return $this->intro;
    }

    public function setIntro(string $intro): self
    {
        $this->intro = $intro;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(string $coverImage): self
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    public function getTimeToRead(): ?string
    {
        return $this->timeToRead;
    }

    public function setTimeToRead(string $timeToRead): self
    {
        $this->timeToRead = $timeToRead;

        return $this;
    }

    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function setSections(array $sections): self
    {
        $this->sections = $sections;

        return $this;
    }

    public function __toString(): string
    {
      return $this->title;
    }
}
