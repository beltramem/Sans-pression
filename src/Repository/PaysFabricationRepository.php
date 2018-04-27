<?php

namespace App\Repository;

use App\Entity\PaysFabrication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PaysFabrication|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaysFabrication|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaysFabrication[]    findAll()
 * @method PaysFabrication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaysFabricationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PaysFabrication::class);
    }

//    /**
//     * @return PaysFabrication[] Returns an array of PaysFabrication objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PaysFabrication
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
