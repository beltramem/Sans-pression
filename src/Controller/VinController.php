<?php

namespace App\Controller;

use App\Entity\Vin;
use App\Form\VinType;
use App\Repository\VinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;

/**
 * @Route("/vin")
 */
class VinController extends Controller
{
    /**
     * @Route("/", name="vin_index", methods="GET")
     */
    public function index(VinRepository $vinRepository): Response
    {
        return $this->render('vin/index.html.twig', ['vins' => $vinRepository->findAll()]);
    }

    /**
     * @Route("/new", name="vin_new", methods="GET|POST")
     */
    public function new(Request $request, FileUploader $fileUploader ): Response
    {
        $vin = new Vin();
        $form = $this->createForm(VinType::class, $vin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
			$file = $vin->getPhoto();
			$fileName = $fileUploader->upload($file);
			$vin->setPhoto($fileName);
			$vin->setNomPhoto($fileName);
			$altPhoto = "Photo ".$vin->getNomProduit();
			$vin->setAltPhoto($altPhoto);
			$today= new \DateTime(date("Y-m-d H:i:s"));
			$vin->setDateCreationProduit($today);
            $em->persist($vin);
            $em->flush();

            return $this->redirectToRoute('vin_index');
        }

        return $this->render('vin/new.html.twig', [
            'vin' => $vin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="vin_show", methods="GET")
     */
    public function show(Vin $vin): Response
    {
        return $this->render('vin/show.html.twig', ['vin' => $vin]);
    }

    /**
     * @Route("/{IdProduit}/edit", name="vin_edit", methods="GET|POST")
     */
    public function edit(Request $request, Vin $vin, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(VinType::class, $vin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
			$file = $vin->getPhoto();
			$fileName = $vin->getNomPhoto();
			$fileUploader->updateUpload($file,$fileName);
			$em->flush();

            return $this->redirectToRoute('vin_edit', ['IdProduit' => $vin->getIdProduit()]);
        }

        return $this->render('vin/edit.html.twig', [
            'vin' => $vin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="vin_delete", methods="DELETE")
     */
    public function delete(Request $request, Vin $vin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vin->getIdProduit(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vin);
            $em->flush();
        }

        return $this->redirectToRoute('vin_index');
    }
}
