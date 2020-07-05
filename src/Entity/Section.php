<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SectionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *    collectionOperations={
 *        "get",
 *        "api_blog_posts_comments_get_subresource"={
 *            "normalization_context"={
 *              "groups"={"get-section-with-article"}
 *            }
 *        },
 *        "post"={
                "access_control"="is_granted('ROLE_ADMIN')"
 *        }
 *    },
 *   itemOperations={
 *         "get",
 *         "delete"={
 *             "access_control"="is_granted('ROLE_ADMIN')"
 *         }
 *    }
 * )
 * @ORM\Entity(repositoryClass=SectionRepository::class)
 */
class Section
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"get-section-with-article", "post", "get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get-section-with-article", "post", "get"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get-section-with-article", "post", "get"})
     */
    private $title;

    /**
     * @ORM\Column(type="array")
     * @Groups({"get-section-with-article", "post", "get"})
     */
    private $image = [];

    /**
     * @ORM\Column(type="array")
     * @Groups({"get-section-with-article", "post", "get"})
     */
    private $text = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     * @Groups({"get-section-with-article", "post", "get"})
     */
    private $doubleMedia = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Articles", inversedBy="section")
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"get-section-with-article", "post", "get"})
     */
    private $article;

    public function getName()
    {
      return $this->name;
    }

    public function setName($name): void
    {
      $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getArticle(): ?Articles
    {
      return $this->article;
    }

    /**
     * @param mixed $article
     */
    public function setArticle(Articles $article): void
    {
      $this->article = $article;
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

    public function getImage(): ?array
    {
      return $this->image;
    }

    public function setImage(array $image): self
    {
      $this->image = $image;

      return $this;
    }

    public function getText(): ?array
    {
        return $this->text;
    }

    public function setText(array $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getDoubleMedia(): ?array
    {
        return $this->doubleMedia;
    }

    public function setDoubleMedia(?array $doubleMedia): self
    {
        $this->doubleMedia = $doubleMedia;

        return $this;
    }

    public function __toString(): string
    {
      return $this->name;
    }
}
