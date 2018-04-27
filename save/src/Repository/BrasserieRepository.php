<?php

namespace App\Repository;

use App\Entity\Brasserie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Brasserie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Brasserie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Brasserie[]    findAll()
 * @method Brasserie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BrasserieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Brasserie::class);
    }

//    /**
//     * @return Brasserie[] Returns an array of Brasserie objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Brasserie
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
