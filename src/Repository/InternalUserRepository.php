<?php

namespace App\Repository;

use App\Entity\InternalUser;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

/**
 * @method InternalUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method InternalUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method InternalUser[]    findAll()
 * @method InternalUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InternalUserRepository extends EntityRepository
{

    public function __construct(EntityManagerInterface $manager)
    {
        parent::__construct($manager, $manager->getClassMetadata(InternalUser::class));
    }
}
