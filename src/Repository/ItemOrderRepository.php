<?php

namespace App\Repository;

use App\Entity\ItemOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ItemOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemOrder[]    findAll()
 * @method ItemOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemOrder::class);
    }

    // /**
    //  * @return ItemOrder[] Returns an array of ItemOrder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ItemOrder
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
