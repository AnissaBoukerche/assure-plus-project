<?php

namespace App\Entity;

use App\Repository\InsuranceClaimImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;

#[ORM\Entity(repositoryClass: InsuranceClaimImagesRepository::class)]
#[Vich\Uploadable]
class InsuranceClaimImages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'insuranceClaimImages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?InsuranceClaim $insuranceClaim = null;

    #[Vich\UploadableField(mapping:"insuranceClaim_images", fileNameProperty: 'image.name')]
    
    private ?File $imageFile = null;

    #[ORM\Embedded(class:EmbeddedFile::class)]
    private ?EmbeddedFile $image = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->image = new EmbeddedFile();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInsuranceClaim(): ?InsuranceClaim
    {
        return $this->insuranceClaim;
    }

    public function setInsuranceClaim(?InsuranceClaim $insuranceClaim): self
    {
        $this->insuranceClaim = $insuranceClaim;

        return $this;
    }
    public function getImageFile(): ?File
    {

        return $this->imageFile;
    }
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        if (null!==$imageFile){
        $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImage(): ?EmbeddedFile
    {
        return $this->image;
    }

    public function setImage(EmbeddedFile $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
