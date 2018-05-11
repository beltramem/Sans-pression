<?php

namespace App\Repository;

use App\Entity\Biere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Biere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Biere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Biere[]    findAll()
 * @method Biere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BiereRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Biere::class);
    }
	
	public function findbyAllBiere ()
	{
		$builder = $this->createQueryBuilder('p');
 
        /**
         * Select elements
         */
        $query = $builder->select()->andWhere("p INSTANCE OF App\Entity\Biere");
 
        $result = $builder->getQuery()->execute();
 
        return $result;
	}
	
	public function randBiere()
	{
		$builder = $this->createQueryBuilder('e');
		$query = $builder
		->addSelect('RAND() as HIDDEN rand')
		->orderBy('rand');
		
		$result = $builder->getQuery()->execute();
 
        return $result;
	}

//    /**
//     * @return Biere[] Returns an array of Biere objects
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
    public function findOneBySomeField($value): ?Biere
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
