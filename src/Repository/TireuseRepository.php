<?php

namespace App\Repository;

use App\Entity\Tireuse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tireuse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tireuse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tireuse[]    findAll()
 * @method Tireuse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TireuseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tireuse::class);
    }

//    /**
//     * @return Tireuse[] Returns an array of Tireuse objects
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
    public function findOneBySomeField($value): ?Tireuse
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
