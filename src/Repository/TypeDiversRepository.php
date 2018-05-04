<?php

namespace App\Repository;

use App\Entity\TypeDivers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeDivers|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeDivers|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeDivers[]    findAll()
 * @method TypeDivers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeDiversRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeDivers::class);
    }

//    /**
//     * @return TypeDivers[] Returns an array of TypeDivers objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeDivers
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
