<?php

namespace App\Entity;

use App\Repository\InsuranceClaimRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InsuranceClaimRepository::class)]

class InsuranceClaim
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateOfTheLoss = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $natureOfTheClaim = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $natureOfTheDamages = null;

    #[ORM\Column(length: 255)]
    private ?string $place = null;

    #[ORM\Column(length: 255)]
    private ?string $contractNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $vehicleModel = null;

    #[ORM\Column(length: 255)]
    private ?string $vehicleRegistrationNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $vehicleLocation = null;


    #[ORM\OneToMany(mappedBy: 'insuranceClaim', targetEntity: InsuranceClaimImages::class, orphanRemoval: true, cascade:['persist'])]
    private Collection $insuranceClaimImages;

    #[ORM\ManyToOne(inversedBy: 'insuranceClaim')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'insuranceClaim')]
    #[ORM\JoinColumn(nullable: true)]
    private ?InternalUser $internalUser = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;


    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->dateOfTheLoss = new \DateTime();
        $this->insuranceClaimImages = new ArrayCollection();
        $this->setStatus('new');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getDateOfTheLoss(): ?\DateTimeInterface
    {
        return $this->dateOfTheLoss;
    }

    public function setDateOfTheLoss(\DateTimeInterface $dateOfTheLoss): self
    {
        $this->dateOfTheLoss = $dateOfTheLoss;

        return $this;
    }
    public function getNatureOfTheClaim(): ?string
    {
        return $this->natureOfTheClaim;
    }

    public function setNatureOfTheClaim(string $natureOfTheClaim): self
    {
        $this->natureOfTheClaim = $natureOfTheClaim;

        return $this;
    }

    public function getNatureOfTheDamages(): ?string
    {
        return $this->natureOfTheDamages;
    }

    public function setNatureOfTheDamages(string $natureOfTheDamages): self
    {
        $this->natureOfTheDamages = $natureOfTheDamages;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getContractNumber(): ?string
    {
        return $this->contractNumber;
    }

    public function setContractNumber(string $contractNumber): self
    {
        $this->contractNumber = $contractNumber;

        return $this;
    }

    public function getVehicleModel(): ?string
    {
        return $this->vehicleModel;
    }

    public function setVehicleModel(string $vehicleModel): self
    {
        $this->vehicleModel = $vehicleModel;

        return $this;
    }

    public function getVehicleRegistrationNumber(): ?string
    {
        return $this->vehicleRegistrationNumber;
    }

    public function setVehicleRegistrationNumber(string $vehicleRegistrationNumber): self
    {
        $this->vehicleRegistrationNumber = $vehicleRegistrationNumber;

        return $this;
    }

    public function getVehicleLocation(): ?string
    {
        return $this->vehicleLocation;
    }

    public function setVehicleLocation(string $vehicleLocation): self
    {
        $this->vehicleLocation = $vehicleLocation;

        return $this;
    }

    /**
     * @return Collection<int, InsuranceClaimImages>
     */
    public function getInsuranceClaimImages(): Collection
    {
        return $this->insuranceClaimImages;
    }

    public function addInsuranceClaimImage(InsuranceClaimImages $insuranceClaimImage): self
    {
        if (!$this->insuranceClaimImages->contains($insuranceClaimImage)) {
            $this->insuranceClaimImages->add($insuranceClaimImage);
            $insuranceClaimImage->setInsuranceClaim($this);
        }

        return $this;
    }

    public function removeInsuranceClaimImage(InsuranceClaimImages $insuranceClaimImage): self
    {
        if ($this->insuranceClaimImages->removeElement($insuranceClaimImage)) {
            // set the owning side to null (unless already changed)
            if ($insuranceClaimImage->getInsuranceClaim() === $this) {
                $insuranceClaimImage->setInsuranceClaim(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
    public function getInternalUser(): ?InternalUser
    {
        return $this->internalUser;
    }
    public function setInternalUser(?InternalUser $internalUser): self
    {
        $this->internalUser = $internalUser;

        return $this;
    }
    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
