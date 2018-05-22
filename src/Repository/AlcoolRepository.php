<?php

namespace App\Repository;

use App\Entity\Alcool;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Alcool|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alcool|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alcool[]    findAll()
 * @method Alcool[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlcoolRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Alcool::class);
    }

	
	public function randAlcool()
	{
		$builder = $this->createQueryBuilder('e');
		$query = $builder
		->addSelect('RAND() as HIDDEN rand')
		->orderBy('rand');
		
		$result = $builder->getQuery()->execute();
 
        return $result;
	}
//    /**
//     * @return Alcool[] Returns an array of Alcool objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Alcool
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
