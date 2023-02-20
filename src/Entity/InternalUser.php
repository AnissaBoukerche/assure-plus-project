<?php

namespace App\Entity;

use App\Repository\InternalUserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Umbrella\AdminBundle\Entity\BaseAdminUser;
use Umbrella\CoreBundle\Search\Annotation\Searchable;

#[ORM\Entity(repositoryClass: InternalUserRepository::class)]
#[UniqueEntity('email')]
#[Searchable]
class InternalUser extends BaseAdminUser
{

    #[ORM\OneToMany(mappedBy: 'internalUser', targetEntity: InsuranceClaim::class, orphanRemoval: true)]
    private Collection $insuranceClaim;
    /**
     * {@inheritdoc}
     */     
    public function getRoles(): array
    {
        return ['ROLE_ADMIN'];
    }

    /**
     * @return Collection<int, InsuranceClaim>
     */
    public function getInsuranceClaim(): Collection
    {
        return $this->insuranceClaim;
    }
}
