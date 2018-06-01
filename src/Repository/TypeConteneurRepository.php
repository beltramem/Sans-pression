<?php

namespace App\Repository;

use App\Entity\TypeConteneur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeConteneur|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeConteneur|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeConteneur[]    findAll()
 * @method TypeConteneur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeConteneurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeConteneur::class);
    }
	
	public function findAllAlphabet()
	{
		$qb = $this->createQueryBuilder('p')
					->orderBy('p.nomTypeConteneur')
					->getQuery();
			return $qb->execute();
	}

//    /**
//     * @return TypeConteneur[] Returns an array of TypeConteneur objects
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
    public function findOneBySomeField($value): ?TypeConteneur
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
