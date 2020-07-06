<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CalendarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *   collectionOperations={
 *        "get",
 *        "post"={
              "access_control"="is_granted('ROLE_ADMIN')"
 *        }
 *   },
 *   denormalizationContext={
 *        "groups"={"post"}
 *   }
 * )
 * @ORM\Entity(repositoryClass=CalendarRepository::class)
 */
class Calendar
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
     * @ORM\Column(type="string", length=255)
     * @Groups({"post", "get"})
     */
    private $type;

    /**
     * @ORM\Column(type="date", length=255)
     * @Groups({"post", "get"})
     */
    private $date;

    /**
     * @ORM\Column(type="time", length=255)
     * @Groups({"post", "get"})
     */
    private $startTime;

    /**
     * @ORM\Column(type="time", length=255)
     * @Groups({"post", "get"})
     */
    private $endTime;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeInterface $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }
}
