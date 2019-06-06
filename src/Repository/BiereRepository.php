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
	
	public function findbyAllFiltre($pays,$couleurs,$typeBieres,$volumes, $productName)
	{
		$productName = '%'.$productName.'%';
		 $qb = $this->createQueryBuilder('b')
		 ->join('b.brasserie', 'bss')
		 ->join('b.typeConteneurs', 'tc')
		 // ->join('b.typeBiere', 'tb')
		 // ->join('b.couleur', 'c')
		 //->join('bss.paysFabrication', 'p')
		 ->addSelect('b');
		 if ($productName != "%null%" && $productName !="%all%")
		 {
			 $qb->Where('b.NomProduit like :productName')
			 ->orWhere('bss.nomBrasserie like :productName')
			 ->setParameter('productName', $productName);
		 }
		 if ($pays[0] != "null")
		 {
			$qb->andWhere('bss.paysFabrication in (:pays)')
			->setParameter('pays', $pays);
		 }
		 if ($couleurs[0]!= "null")
		 {
			$qb->andWhere('b.couleur in (:couleurs)')
			->setParameter('couleurs', $couleurs);
		 }
		 if ($typeBieres[0] != "null")
		 {
			$qb->andWhere('b.typeBiere in (:typeBieres)')
			->setParameter('typeBieres', $typeBieres);
		 }
		 if ($volumes[0] != "null")
		 {
			$qb->andWhere('tc.idTypeConteneur in (:volumes)')
			->setParameter('volumes', $volumes);
		 }
		 $result = $qb->getQuery()->execute();
		 return $result;
		 
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
	
	public function findAllRand ()
	{
		$builder = $this->createQueryBuilder('b');
		$query  = $builder->select()->andWhere("b INSTANCE of App\Entity\Biere")->setMaxResults(20)->orderBy('RAND()');
		$result = $builder->getQuery()->execute();
		
		return $result;
	}
	
	public function findbyBrasserie($brasserie,$nom)
	{
		$builder = $this->createQueryBuilder('b')
		->join('b.brasserie', 'bss');
		$query  = $builder->select()->Where("bss.nomBrasserie like :brasserie")->andWhere('UPPER(b.NomProduit) NOT LIKE UPPER(:nom)')->setParameter('brasserie', $brasserie)->setParameter('nom', $nom)->setMaxResults(4)->orderBy('RAND()');
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
