<?php

namespace App\Repository;

use App\Entity\CategorieVieillissement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategorieVieillissement|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieVieillissement|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieVieillissement[]    findAll()
 * @method CategorieVieillissement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieVieillissementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategorieVieillissement::class);
    }

//    /**
//     * @return CategorieVieillissement[] Returns an array of CategorieVieillissement objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategorieVieillissement
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
