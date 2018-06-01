<?php

namespace App\Controller;

use App\Entity\PaysFabrication;
use App\Form\PaysFabricationType;
use App\Repository\PaysFabricationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("gestion/pays/fabrication")
 */
class PaysFabricationController extends Controller
{
    /**
     * @Route("/", name="pays_fabrication_index", methods="GET")
     */
    public function index(PaysFabricationRepository $paysFabricationRepository): Response
    {
        return $this->render('pays_fabrication/index.html.twig', ['pays_fabrications' => $paysFabricationRepository->findAll()]);
    }

    /**
     * @Route("/new", name="pays_fabrication_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $paysFabrication = new PaysFabrication();
        $form = $this->createForm(PaysFabricationType::class, $paysFabrication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paysFabrication);
            $em->flush();

            return $this->redirectToRoute('pays_fabrication_index');
        }

        return $this->render('pays_fabrication/new.html.twig', [
            'pays_fabrication' => $paysFabrication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idPaysFabrication}", name="pays_fabrication_show", methods="GET")
     */
    public function show(PaysFabrication $paysFabrication): Response
    {
        return $this->render('pays_fabrication/show.html.twig', ['pays_fabrication' => $paysFabrication]);
    }

    /**
     * @Route("/{idPaysFabrication}/edit", name="pays_fabrication_edit", methods="GET|POST")
     */
    public function edit(Request $request, PaysFabrication $paysFabrication): Response
    {
        $form = $this->createForm(PaysFabricationType::class, $paysFabrication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pays_fabrication_edit', ['idPaysFabrication' => $paysFabrication->getidPaysFabrication()]);
        }

        return $this->render('pays_fabrication/edit.html.twig', [
            'pays_fabrication' => $paysFabrication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idPaysFabrication}", name="pays_fabrication_delete", methods="DELETE")
     */
    public function delete(Request $request, PaysFabrication $paysFabrication): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paysFabrication->getidPaysFabrication(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paysFabrication);
            $em->flush();
        }

        return $this->redirectToRoute('pays_fabrication_index');
    }
	
	public function afficheFiltre(PaysFabricationRepository $paysFabricationRepository)
	{
		return $this->render('pays_fabrication/filtre.html.twig', ['pays_fabrications' => $paysFabricationRepository->findAllAlphabet()]);
	}
}
