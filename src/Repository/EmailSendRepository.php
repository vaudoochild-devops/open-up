<?php

namespace App\Repository;

use App\Entity\EmailSend;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EmailSend|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmailSend|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmailSend[]    findAll()
 * @method EmailSend[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmailSendRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmailSend::class);
    }

    // /**
    //  * @return EmailSend[] Returns an array of EmailSend objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EmailSend
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
