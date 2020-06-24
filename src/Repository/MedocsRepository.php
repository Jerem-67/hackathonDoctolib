<?php

namespace App\Repository;

use App\Entity\Medocs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Medocs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medocs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medocs[]    findAll()
 * @method Medocs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedocsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medocs::class);
    }

    // /**
    //  * @return Medocs[] Returns an array of Medocs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Medocs
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
