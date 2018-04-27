<?php

namespace App\Controller;

use App\Entity\Biere;
use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use DateTime;


class BiereController extends ProduitController
{
    /**
     * @Route("/biere/all", name="biere")
	 * @Template("pages/biere/all.html.twig")
     */
	public function all()
	{
		$em = $this->getDoctrine()->getManager();
        $bieres = $em->getRepository(Biere::class)->findbyAllBiere();
        return ["bieres" => $bieres];
	}
	
	
	/**
 	* @Route("/biere/add", name="create_biere")
 	* @Template("pages/biere/create.html.twig")
 	*/  
	public function addBiere(Request $request)
	{
		return $form;
	}
}
