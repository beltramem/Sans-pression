<?php
namespace App\Controller;
use App\Entity\Produit;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route; //add this line to add usage of Route class.
class ProduitController extends Controller
{
	
	/**
     * @Route("/produit/all", name="produit.all")
	 * @Template("pages/produit/all.html.twig")
     */
	public function all()
	{
		$em = $this->getDoctrine()->getManager();
        $products = $em->getRepository(Produit::class)->findAll();
        return ["products" => $products];
	}
}	