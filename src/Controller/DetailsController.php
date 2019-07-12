<?php

namespace App\Controller;

use App\Entity\Biere;
use App\Entity\Vin;
use App\Entity\Alcool;
use App\Entity\Divers;
use App\Entity\Note;
use App\Form\BrasserieType;
use App\Repository\ProduitRepository;
use App\Repository\BiereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("detail")
 */
class DetailsController extends Controller
{
	
	/**
     * @Route("/brasserie={brasserie}/nom={nom}", name="biere_search_meme_brasserie", methods="GET")
	 */
	public function biereSearchBrasserie(BiereRepository $biereRepository,$brasserie,$nom)
	{
		$bieres = $biereRepository->findbyBrasserie($brasserie,$nom);
		return $this->render('biere/sousProduitDetail.html.twig', ['bieres' => $bieres]);
	}
	
	/**
     * @Route("/type={type}/color={color}/alcool={alcool}/amertume={amertume}/nom={nom}", name="biere_conseil", methods="GET")
	 */
	public function biereSearchConseil(BiereRepository $biereRepository,$type,$color,$alcool,$amertume,$nom)
	{
		$bieres = $biereRepository->findbyConseil($type,$color,$alcool,$amertume,$nom);
		return $this->render('biere/sousProduitDetail.html.twig', ['bieres' => $bieres]);
	}
	
	/**
     * @Route("/{idProduit}", name="details_show", methods="GET")
     */
	public function details(ProduitRepository $produitRepository, $idProduit)
	{
		$produit = $produitRepository->find($idProduit);
		
		if ($produit instanceof Biere)
		{	
			return $this->render('biere/detail.html.twig',['biere' => $produit]);
		}			
		else if ($produit instanceof Vin)
		{
			return $this->render('vin/detail.html.twig',['vin' => $produit]);
		}			
		else if ($produit instanceof Alcool)
		{
			return $this->render('alcool/detail.html.twig',['alcool' => $produit]);
		}
		else if ($produit instanceof Divers)
		{
			return $this->render('divers/detail.html.twig',['divers' => $produit]);
		}		
	}
}