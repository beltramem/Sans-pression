<?php

namespace App\Controller;

use App\Entity\Biere;
use App\Form\BiereType;
use App\Repository\BiereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;


/**
 * @Route("gestion/biere")
 */
class BiereController extends Controller
{
    /**
     * @Route("/", name="biere_index", methods="GET")
     */
    public function index(BiereRepository $biereRepository): Response
    {
        return $this->render('biere/index.html.twig', ['bieres' => $biereRepository->findAll()]);
    }

	public function randBiere(BiereRepository $biereRepository)
    {
        return $this->render('biere/showAcc.html.twig',['biere' => $biereRepository->randBiere()[0]]);
    }	
	
    /**
     * @Route("/new", name="biere_new", methods="GET|POST")
     */
    public function new(Request $request, FileUploader $fileUploader)
    {
        $biere = new Biere();
        $form = $this->createForm(BiereType::class, $biere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
			$file = $biere->getPhoto();
			$fileName = $fileUploader->upload($file);
			$biere->setPhoto($fileName);
			$biere->setNomPhoto($fileName);
			$altPhoto = "Photo ".$biere->getNomProduit();
			$biere->setAltPhoto($altPhoto);
			$today= new \DateTime(date("Y-m-d H:i:s"));
			$biere->setDateCreationProduit($today);
            $em->persist($biere);
            $em->flush();

            return $this->redirectToRoute('biere_index');
        }

        return $this->render('biere/new.html.twig', [
            'biere' => $biere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="biere_show", methods="GET")
     */
    public function show(Biere $biere): Response
    {
        return $this->render('biere/show.html.twig', ['biere' => $biere]);
    }

    /**
     * @Route("/{IdProduit}/edit", name="biere_edit", methods="GET|POST")
     */
    public function edit(Request $request, Biere $biere, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(BiereType::class, $biere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$file = $biere->getPhoto();
			$fileName = $biere->getNomPhoto();
			$fileUploader->updateUpload($file,$fileName);
			$em->flush();
            return $this->redirectToRoute('biere_edit', ['IdProduit' => $biere->getIdProduit()]);
        }

        return $this->render('biere/edit.html.twig', [
            'biere' => $biere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="biere_delete", methods="DELETE")
     */
    public function delete(Request $request, Biere $biere, FileUploader $fileUploader)
    {
        if ($this->isCsrfTokenValid('delete'.$biere->getIdProduit(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
			$file = $biere->getPhoto();
			$fileName = $biere->getNomPhoto();
			$fileUploader->removeUpload($fileName);
            $em->remove($biere);
            $em->flush();
        }

        return $this->redirectToRoute('biere_index');
    }
	

	
}
