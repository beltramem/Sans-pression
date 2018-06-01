<?php

namespace App\Repository;

use App\Entity\TypeBiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeBiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeBiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeBiere[]    findAll()
 * @method TypeBiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeBiereRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeBiere::class);
    }

	public function findAllAlphabet()
	{
		$qb = $this->createQueryBuilder('p')
					->orderBy('p.NomTypeBiere')
					->getQuery();
			return $qb->execute();
	}
	
//    /**
//     * @return TypeBiere[] Returns an array of TypeBiere objects
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
    public function findOneBySomeField($value): ?TypeBiere
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
