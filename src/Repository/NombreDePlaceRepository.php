<?php

namespace App\Repository;

use App\Entity\NombreDePlace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NombreDePlace|null find($id, $lockMode = null, $lockVersion = null)
 * @method NombreDePlace|null findOneBy(array $criteria, array $orderBy = null)
 * @method NombreDePlace[]    findAll()
 * @method NombreDePlace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NombreDePlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NombreDePlace::class);
    }

    // /**
    //  * @return NombreDePlace[] Returns an array of NombreDePlace objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NombreDePlace
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
