<?php
namespace App\Controller;
use App\Entity\Produit;
use App\Entity\PhotoProduit;
use App\Form\ProduitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\FileUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route; //add this line to add usage of Route class.
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
	
	/**
     * @Route("/produit/add", name="produit.add")
	 * @Template("pages/produit/create.html.twig")
     */
	public function addProduit(Request $request, FileUploader $fileUploader)
	{
		$produit = new Produit();
		$form   = $this->get('form.factory')->create(ProduitType::class, $produit);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$file = $produit->getImage()->getPhoto();

			$fileName = $fileUploader->upload($file);
			var_dump($fileName);
			$produit->getImage()->setPhoto($fileName);
			$em = $this->getDoctrine()->getManager();
			$em->persist($produit);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

		  
    }

    return $this->render('pages/produit/create.html.twig', array(
      'form' => $form->createView(),
    ));
	}
	
	    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

	

}	