<?php

namespace App\Controller;

use App\Entity\RegionFabrication;
use App\Form\RegionFabricationType;
use App\Repository\RegionFabricationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("gestion/region/fabrication")
 */
class RegionFabricationController extends Controller
{
    /**
     * @Route("/", name="region_fabrication_index", methods="GET")
     */
    public function index(RegionFabricationRepository $regionFabricationRepository): Response
    {
        return $this->render('region_fabrication/index.html.twig', ['regionFabrications' => $regionFabricationRepository->findAll()]);
    }

    /**
     * @Route("/new", name="region_fabrication_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $regionFabrication = new RegionFabrication();
        $form = $this->createForm(RegionFabricationType::class, $regionFabrication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($regionFabrication);
            $em->flush();

            return $this->redirectToRoute('region_fabrication_index');
        }

        return $this->render('region_fabrication/new.html.twig', [
            'regionFabrication' => $regionFabrication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdRegionFabrication}", name="region_fabrication_show", methods="GET")
     */
    public function show(RegionFabrication $regionFabrication): Response
    {
        return $this->render('region_fabrication/show.html.twig', ['regionFabrication' => $regionFabrication]);
    }

    /**
     * @Route("/{IdRegionFabrication}/edit", name="region_fabrication_edit", methods="GET|POST")
     */
    public function edit(Request $request, RegionFabrication $regionFabrication): Response
    {
        $form = $this->createForm(RegionFabricationType::class, $regionFabrication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('region_fabrication_edit', ['idRegionFabrication' => $regionFabrication->getIdRegionFabrication()]);
        }

        return $this->render('region_fabrication/edit.html.twig', [
            'regionFabrication' => $regionFabrication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{IdRegionFabrication}", name="region_fabrication_delete", methods="DELETE")
     */
    public function delete(Request $request, RegionFabrication $regionFabrication): Response
    {
        if ($this->isCsrfTokenValid('delete'.$regionFabrication->getIdRegionFabrication(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($regionFabrication);
            $em->flush();
        }

        return $this->redirectToRoute('region_fabrication_index');
    }
}
