<?php

namespace App\Repository;

use App\Entity\SolicitudDemo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SolicitudDemo|null find($id, $lockMode = null, $lockVersion = null)
 * @method SolicitudDemo|null findOneBy(array $criteria, array $orderBy = null)
 * @method SolicitudDemo[]    findAll()
 * @method SolicitudDemo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolicitudDemoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SolicitudDemo::class);
    }

    // /**
    //  * @return SolicitudDemo[] Returns an array of SolicitudDemo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SolicitudDemo
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
