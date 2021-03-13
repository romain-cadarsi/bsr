<?php

namespace App\Repository;

use App\Entity\PolitiqueDeConfidentialite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PolitiqueDeConfidentialite|null find($id, $lockMode = null, $lockVersion = null)
 * @method PolitiqueDeConfidentialite|null findOneBy(array $criteria, array $orderBy = null)
 * @method PolitiqueDeConfidentialite[]    findAll()
 * @method PolitiqueDeConfidentialite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PolitiqueDeConfidentialiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PolitiqueDeConfidentialite::class);
    }

    // /**
    //  * @return PolitiqueDeConfidentialite[] Returns an array of PolitiqueDeConfidentialite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PolitiqueDeConfidentialite
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
