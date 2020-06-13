<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LikesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LikesRepository::class)
 */
class Likes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $likes = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BlogPost", mappedBy="likes")
     */
    private $post;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="likes")
     */
    private $author;

    public function __construct()
    {
        $this->author = new ArrayCollection();
        $this->post = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getAuthor(): Collection
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getPost(): Collection
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post): void
    {
        $this->post = $post;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLikes(): ?array
    {
        return $this->likes;
    }

    public function setLikes(array $likes): self
    {
        $this->likes = $likes;

        return $this;
    }
}
