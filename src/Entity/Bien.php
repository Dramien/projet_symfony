<?php

namespace App\Entity;

use App\Repository\BienRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=BienRepository::class)
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
*/
class Bien
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
    */
    private $id;

    /**
     * @ORM\Column(type="text")
    */
    private $description;

    /**
     * @ORM\Column(type="integer")
    */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $photo;

    /**
     *
     * @Vich\UploadableField(mapping="biens_images", fileNameProperty="photo")
     *
     * @var File
     */
    private $photoFile;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $proprietaire;

    // fonction pour vérifier la correspondances des id de user et bien
    public function isProprietaire(User $user = null)
    {
        return $user && $user === $this->getProprietaire();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
    *
    * @return string|null
    */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    /**
    *
    * @param string $photo
    */
    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    /**
    * @return null
    */
    public function getPhotoFile(): ?File
    {
        return $this->photoFile;
    }

    /**
     *
     * @param File $photoFile
     */
    public function setPhotoFile(?File $photoFile = null)
    {
        $this->photoFile = $photoFile;

        if (null !== $photoFile) {

            $this->updatedAt = new \DateTime('now');
        }
        return $this;
    }


    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
    *
    * @ORM\PrePersist
    */
    public function setCreatedAt(): self
    {
        $this->createdAt = new \DateTime ();

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
    *
    * @ORM\PreUpdate
    */
    public function setUpdatedAt(): self
    {
        $this->updatedAt = new \DateTime ();

        return $this;
    }

    public function getProprietaire(): ?User
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?User $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }
}
