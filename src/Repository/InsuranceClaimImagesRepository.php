<?php

namespace App\Repository;

use App\Entity\InsuranceClaimImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InsuranceClaimImages>
 *
 * @method InsuranceClaimImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method InsuranceClaimImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method InsuranceClaimImages[]    findAll()
 * @method InsuranceClaimImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InsuranceClaimImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InsuranceClaimImages::class);
    }

    public function save(InsuranceClaimImages $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(InsuranceClaimImages $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return InsuranceClaimImages[] Returns an array of InsuranceClaimImages objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?InsuranceClaimImages
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
