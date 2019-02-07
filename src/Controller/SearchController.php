<?php

namespace App\Controller;

namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\BiereRepository;

/**
 * @Route("search")
 */
class SearchController extends Controller
{
	
	
	/**
     * @Route("/biere/", name="app_search")
     * @Template("pages/search.html.twig")
     */
    public function searchAction(BiereRepository $biereRepository)
    {
       return $this->render('pages/search.html.twig',['bieres' => $biereRepository->findAllRand()]);
    }
	/**
     * @Route("/biere/pays={pays}/couleurs={couleurs}/typeBieres={typeBieres}/volumes={volumes}/productName={productName}", defaults={"productName" = null}, name="search-all-filtre")
	*/
	public function biereSearch(BiereRepository $biereRepository,$pays=null,$couleurs=null,$typeBieres=null,$volumes=null, $productName=null)
	{	$pays = explode("-", $pays);
		$couleurs = explode("-", $couleurs);
		$typeBieres = explode("-", $typeBieres);
		$volumes = explode("-", $volumes);	
		$em = $this->getDoctrine()->getManager();
		$bieres = $biereRepository->findbyAllFiltre($pays,$couleurs,$typeBieres,$volumes,$productName);
		
		return $this->render('biere/search.html.twig', ['bieres' => $bieres]);
		
	}
	

	
}
