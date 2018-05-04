<?php

namespace App\Repository;

use App\Entity\TypeAlcool;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeAlcool|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAlcool|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAlcool[]    findAll()
 * @method TypeAlcool[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAlcoolRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeAlcool::class);
    }

//    /**
//     * @return TypeAlcool[] Returns an array of TypeAlcool objects
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
    public function findOneBySomeField($value): ?TypeAlcool
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
