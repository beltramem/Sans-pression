<?php

namespace App\Repository;

use App\Entity\RegionFabrication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RegionFabrication|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegionFabrication|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegionFabrication[]    findAll()
 * @method RegionFabrication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegionFabricationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RegionFabrication::class);
    }

//    /**
//     * @return RegionFabrication[] Returns an array of RegionFabrication objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RegionFabrication
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
