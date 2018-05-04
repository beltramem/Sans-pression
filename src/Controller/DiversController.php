<?php

namespace App\Controller;

use App\Entity\Divers;
use App\Form\DiversType;
use App\Repository\DiversRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;

/**
 * @Route("/divers")
 */
class DiversController extends Controller
{
    /**
     * @Route("/", name="divers_index", methods="GET")
     */
    public function index(DiversRepository $diversRepository): Response
    {
        return $this->render('divers/index.html.twig', ['divers' => $diversRepository->findAll()]);
    }

    /**
     * @Route("/new", name="divers_new", methods="GET|POST")
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $diver = new Divers();
        $form = $this->createForm(DiversType::class, $diver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
			$file = $diver->getPhoto();
			$fileName = $fileUploader->upload($file);
			$diver->setPhoto($fileName);
			$diver->setNomPhoto($fileName);
			$altPhoto = "Photo ".$diver->getNomProduit();
			$diver->setAltPhoto($altPhoto);
			$today= new \DateTime(date("Y-m-d H:i:s"));
			$diver->setDateCreationProduit($today);
            $em->persist($diver);
            $em->flush();

            return $this->redirectToRoute('divers_index');
        }

        return $this->render('divers/new.html.twig', [
            'diver' => $diver,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="divers_show", methods="GET")
     */
    public function show(Divers $diver): Response
    {
        return $this->render('divers/show.html.twig', ['diver' => $diver]);
    }

    /**
     * @Route("/{IdProduit}/edit", name="divers_edit", methods="GET|POST")
     */
    public function edit(Request $request, Divers $diver, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(DiversType::class, $diver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
			$file = $diver->getPhoto();
			$fileName = $diver->getNomPhoto();
			$fileUploader->updateUpload($file,$fileName);
			$em->flush();

            return $this->redirectToRoute('divers_edit', ['IdProduit' => $diver->getIdProduit()]);
        }

        return $this->render('divers/edit.html.twig', [
            'diver' => $diver,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="divers_delete", methods="DELETE")
     */
    public function delete(Request $request, Divers $diver): Response
    {
        if ($this->isCsrfTokenValid('delete'.$diver->getIdProduit(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
			$fileName = $alcool->getNomPhoto();
			$fileUploader->updateUpload($file,$fileName);
            $em->remove($diver);
            $em->flush();
        }

        return $this->redirectToRoute('divers_index');
    }
}
