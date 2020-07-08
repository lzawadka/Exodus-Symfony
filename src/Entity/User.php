<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\ResetPasswordAction;

/**
 * @ApiResource(
 *     itemOperations={
 *         "get"={
 *             "access_control"="is_granted('IS_AUTHENTICATED_FULLY')",
 *             "normalization_context"={
 *                 "groups"={"get"}
 *             }
 *         },
 *         "put"={
 *             "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object == user",
 *             "denormalization_context"={
 *                 "groups"={"put"}
 *             },
 *             "normalization_context"={
 *                 "groups"={"get"}
 *             }
 *         },
 *         "put-reset-password"={
 *             "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object == user",
 *             "method"="PUT",
 *             "path"="/users/{id}/reset-password",
 *             "controller"=ResetPasswordAction::class,
 *             "denormalization_context"={
 *                 "groups"={"put-reset-password"}
 *             },
 *             "validation_groups"={"put-reset-password"}
 *         }
 *     },
 *     collectionOperations={
 *         "post"={
 *             "denormalization_context"={
 *                 "groups"={"post"}
 *             },
 *             "normalization_context"={
 *                 "groups"={"get"}
 *             },
 *             "validation_groups"={"post"}
 *         }
 *     },
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity("username", groups={"post"})
 * @UniqueEntity("email", groups={"post"})
 */
class User implements UserInterface
{
  const ROLE_WRITER = 'ROLE_WRITER';
  const ROLE_ADMIN = 'ROLE_ADMIN';
  const ROLE_SUPERADMIN = 'ROLE_SUPERADMIN';

  const DEFAULT_ROLES = [self::ROLE_WRITER];
  /**
   * @ORM\Id()
   * @ApiProperty(identifier=false)
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   * @Groups({"get"})
   */
  private $id;

  /**
   * @ApiProperty(identifier=true)
   * @ORM\Column(type="string", length=255, unique=true)
   * @Groups({"get", "post", "get-comment-with-author", "get-blog-post-with-author"})
   * @Assert\NotBlank()
   * @Assert\Length(min=6, max=255, groups={"post"})
   */
  private $username;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"post"})
   * @Assert\NotBlank(groups={"post"})
   * @Assert\Regex(
   *   pattern="/(?=.*[A-Z])(?=.*[a-z](?=.*[0-9])).{7,}/",
   *   message="Wrong password",
   *   groups={"post"}
   * )
   */
  private $password;

  /**
   * @Groups({"put-reset-password"})
   * @Assert\NotBlank(groups={"put-reset-password"})
   * @Assert\Regex(
   *   pattern="/(?=.*[A-Z])(?=.*[a-z](?=.*[0-9])).{7,}/",
   *   message="Wrong password",
   *   groups={"put-reset-password"}
   * )
   */
  private $newPassword;

  /**
   * @Groups({"put-reset-password"})
   * @Assert\NotBlank(groups={"put-reset-password"})
   * @UserPassword(groups={"put-reset-password"})
   */
  private $oldPassword;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"get", "post", "put", "get-comment-with-author", "get-blog-post-with-author"})
   * @Assert\NotBlank(groups={"post"})
   * @Assert\Length(min=5, max=255, groups={"post", "put"})
   */
  private $name;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"get", "post"})
   */
  private $firstName;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"post", "put", "get-admin", "get-owner"})
   * @Assert\NotBlank(groups={"post"})
   * @Assert\Email(groups={"post", "put"})
   * @Assert\Length(min=6, max=255, groups={"post", "put"})
   */
  private $email;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\BlogPost", mappedBy="author")
   * @Groups({"get", "get-blog-post-with-author"})
   */
  private $posts;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="author")
   * @Groups({"get", "get-comment-with-author"})
   */
  private $comments;

  /**
   * @ORM\Column(type="simple_array", length=200)
   * @Groups({"get-admin", "get-owner"})
   */
  private $roles;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  private $passwordChangeDate;

  /**
   * @ORM\Column(type="boolean")
   */
  private $enabled;

  /**
   * @ORM\Column(type="string", length=40, nullable=true)
   */
  private $confirmationToken;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"get", "post"})
   */
  private $age;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"get", "post"})
   */
  private $birthDate;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"get", "post"})
   */
  private $birthPlace;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"get", "post"})
   */
  private $work;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"get", "post"})
   */
  private $weight;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"get", "post"})
   */
  private $height;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"get", "post"})
   */
  private $eyeColor;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"get", "post"})
   */
  private $hairColor;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   * @Groups({"get", "post"})
   */
  private $profilePicture;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   * @Groups({"get", "post"})
   */
  private $ticketUrl;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"get", "post"})
   */
  private $gender;

  public function __construct()
  {
    $this->posts = new ArrayCollection();
    $this->comments = new ArrayCollection();
    $this->roles = self::DEFAULT_ROLES;
    $this->enabled = false;
    $this->confirmationToken = null;
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getUsername(): ?string
  {
      return $this->username;
  }

  public function setUsername(string $username): self
  {
      $this->username = $username;

      return $this;
  }

  public function getPassword(): ?string
  {
      return $this->password;
  }

  public function setPassword(string $password): self
  {
      $this->password = $password;

      return $this;
  }

  public function getName(): ?string
  {
      return $this->name;
  }

  public function setName(string $name): self
  {
      $this->name = $name;

      return $this;
  }

  public function getFirstName(): ?string
  {
    return $this->firstName;
  }

  public function setFirstName(string $firstName): self
  {
    $this->firstName = $firstName;

    return $this;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function setEmail(string $email): self
  {
    $this->email = $email;

    return $this;
  }

  /**
   * @return Collection
   */
  public function getPosts(): Collection
  {
    return $this->posts;
  }

  /**
   * @return Collection
   */
  public function getComments(): Collection
  {
    return $this->comments;
  }


  /**
   * Returns the roles granted to the user.
   *
   *     public function getRoles()
   *     {
   *         return ['ROLE_USER'];
   *     }
   *
   * Alternatively, the roles might be stored on a ``roles`` property,
   * and populated in any number of different ways when the user object
   * is created.
   *
   * @return string[] The user roles
   */
  public function getRoles(): array
  {
    return $this->roles;
  }

  public function setRoles(array $roles)
  {
    $this->roles = $roles;
  }

  /**
   * Returns the salt that was originally used to encode the password.
   *
   * This can return null if the password was not encoded using a salt.
   *
   * @return string|null The salt
   */
  public function getSalt()
  {
    return null;
  }

  /**
   * Removes sensitive data from the user.
   *
   * This is important if, at any given point, sensitive information like
   * the plain-text password is stored on this object.
   */
  public function eraseCredentials()
  {
    // TODO: Implement eraseCredentials() method.
  }

  public function getNewPassword(): ?string
  {
    return $this->newPassword;
  }

  public function setNewPassword($newPassword): void
  {
    $this->newPassword = $newPassword;
  }

  public function getOldPassword(): ?string
  {
    return $this->oldPassword;
  }

  public function setOldPassword($oldPassword): void
  {
    $this->oldPassword = $oldPassword;
  }

  public function getPasswordChangeDate()
  {
    return $this->passwordChangeDate;
  }

  public function setPasswordChangeDate($passwordChangeDate): void
  {
    $this->passwordChangeDate = $passwordChangeDate;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }

  public function setEnabled($enabled): void
  {
    $this->enabled = $enabled;
  }

  public function getConfirmationToken()
  {
    return $this->confirmationToken;
  }

  public function setConfirmationToken($confirmationToken): void
  {
    $this->confirmationToken = $confirmationToken;
  }

  public function getAge()
  {
    return $this->age;
  }

  public function setAge($age): void
  {
    $this->age = $age;
  }

  public function getBirthDate(): ?string
  {
      return $this->birthDate;
  }

  public function setBirthDate(string $birthDate): self
  {
      $this->birthDate = $birthDate;

      return $this;
  }

  public function getBirthPlace(): ?string
  {
      return $this->birthPlace;
  }

  public function setBirthPlace(string $birthPlace): self
  {
      $this->birthPlace = $birthPlace;

      return $this;
  }

  public function getWork(): ?string
  {
      return $this->work;
  }

  public function setWork(string $work): self
  {
      $this->work = $work;

      return $this;
  }

  public function getWeight(): ?string
  {
      return $this->weight;
  }

  public function setWeight(string $weight): self
  {
      $this->weight = $weight;

      return $this;
  }

  public function getHeight(): ?string
  {
      return $this->height;
  }

  public function setHeight(string $height): self
  {
      $this->height = $height;

      return $this;
  }

  public function getEyeColor(): ?string
  {
      return $this->eyeColor;
  }

  public function setEyeColor(string $eyeColor): self
  {
      $this->eyeColor = $eyeColor;

      return $this;
  }

  public function getHairColor(): ?string
  {
      return $this->hairColor;
  }

  public function setHairColor(string $hairColor): self
  {
      $this->hairColor = $hairColor;

      return $this;
  }

  public function getProfilePicture(): ?string
  {
      return $this->profilePicture;
  }

  public function setProfilePicture(?string $profilePicture): self
  {
      $this->profilePicture = $profilePicture;

      return $this;
  }

  public function getTicketUrl(): ?string
  {
      return $this->ticketUrl;
  }

  public function setTicketUrl(?string $ticketUrl): self
  {
      $this->ticketUrl = $ticketUrl;

      return $this;
  }

  public function __toString(): string
  {
    return $this->name;
  }

  public function getGender(): ?string
  {
      return $this->gender;
  }

  public function setGender(string $gender): self
  {
      $this->gender = $gender;

      return $this;
  }
}
