<?php

namespace App\Repository;

use App\Entity\InsuranceClaim;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InsuranceClaim>
 *
 * @method InsuranceClaim|null find($id, $lockMode = null, $lockVersion = null)
 * @method InsuranceClaim|null findOneBy(array $criteria, array $orderBy = null)
 * @method InsuranceClaim[]    findAll()
 * @method InsuranceClaim[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InsuranceClaimRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InsuranceClaim::class);
    }

    public function save(InsuranceClaim $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(InsuranceClaim $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


//    /**
//     * @return InsuranceClaim[] Returns an array of InsuranceClaim objects
//     */

public function findAllElements()
{
    return $this->createQueryBuilder('e')
        ->getQuery()
        ->getResult();
}
public function findElementsByName($name): array
{
    return $this->createQueryBuilder('e')
        ->andWhere('e:name = :name')
        ->setParameter('name', $name)
        ->orderBy('e.id', 'ASC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult();
}

//    public function findOneBySomeField($value): ?InsuranceClaim
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
