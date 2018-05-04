<?php

namespace App\Controller;

use App\Entity\Alcool;
use App\Form\AlcoolType;
use App\Repository\AlcoolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;
/**
 * @Route("/alcool")
 */
class AlcoolController extends Controller
{
    /**
     * @Route("/", name="alcool_index", methods="GET")
     */
    public function index(AlcoolRepository $alcoolRepository): Response
    {
        return $this->render('alcool/index.html.twig', ['alcools' => $alcoolRepository->findAll()]);
    }

    /**
     * @Route("/new", name="alcool_new", methods="GET|POST")
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $alcool = new Alcool();
        $form = $this->createForm(AlcoolType::class, $alcool);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
            $file = $alcool->getPhoto();
			$fileName = $fileUploader->upload($file);
			$alcool->setPhoto($fileName);
			$alcool->setNomPhoto($fileName);
			$altPhoto = "Photo ".$alcool->getNomProduit();
			$alcool->setAltPhoto($altPhoto);
			$today= new \DateTime(date("Y-m-d H:i:s"));
			$alcool->setDateCreationProduit($today);
            $em->persist($alcool);
            $em->flush();

            return $this->redirectToRoute('alcool_index');
        }

        return $this->render('alcool/new.html.twig', [
            'alcool' => $alcool,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="alcool_show", methods="GET")
     */
    public function show(Alcool $alcool): Response
	{
        return $this->render('alcool/show.html.twig', ['alcool' => $alcool]);
    }

    /**
     * @Route("/{IdProduit}/edit", name="alcool_edit", methods="GET|POST")
     */
    public function edit(Request $request, Alcool $alcool, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(AlcoolType::class, $alcool);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
			$fileName = $alcool->getNomPhoto();
			$fileUploader->updateUpload($file,$fileName);
			$em->flush();

            return $this->redirectToRoute('alcool_edit', ['IdProduit' => $alcool->getIdProduit()]);
        }

        return $this->render('alcool/edit.html.twig', [
            'alcool' => $alcool,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdProduit}", name="alcool_delete", methods="DELETE")
     */
    public function delete(Request $request, Alcool $alcool, FileUploader $fileUploader): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alcool->getIdProduit(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
			$file = $alcool->getPhoto();
			$fileName = $alcool->getNomPhoto();
			$fileUploader->removeUpload($fileName);
            $em->remove($alcool);
            $em->flush();
        }

        return $this->redirectToRoute('alcool_index');
    }
}
