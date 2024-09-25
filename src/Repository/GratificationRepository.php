<?php

namespace App\Repository;

use App\Entity\Gratification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Gratification|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gratification|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gratification[]    findAll()
 * @method Gratification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GratificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gratification::class);
    }

    // /**
    //  * @return Gratification[] Returns an array of Gratification objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gratification
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
