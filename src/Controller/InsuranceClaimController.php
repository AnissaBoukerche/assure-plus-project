<?php

namespace App\Controller;

use App\Entity\InsuranceClaim;
use App\Form\InsuranceClaimType;
use App\Repository\InsuranceClaimRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class InsuranceClaimController extends AbstractController
{
    #[Route('/', name: 'app_insurance_claim_index', methods: ['GET'])]
    public function index(InsuranceClaimRepository $insuranceClaimRepository): Response
    {
        return $this->render('insurance_claim/index.html.twig', [
            'insurance_claims' => $insuranceClaimRepository->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'app_insurance_claim_new', methods: ['GET', 'POST'])]
    public function new(Request $request, InsuranceClaimRepository $insuranceClaimRepository): Response
    {
        $insuranceClaim = new InsuranceClaim();
        $form = $this->createForm(InsuranceClaimType::class, $insuranceClaim);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $insuranceClaim->setUser($this->getUser());
            $insuranceClaimRepository->save($insuranceClaim, true);

            return $this->redirectToRoute('app_insurance_claim_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('insurance_claim/new.html.twig', [
            'insurance_claim' => $insuranceClaim,
            'form' => $form ->createView()
        ]);
    }

    #[Route('/voir/{id}', name: 'app_insurance_claim_show', methods: ['GET'])]
    public function show(InsuranceClaim $insuranceClaim): Response
    {
        return $this->render('insurance_claim/show.html.twig', [
            'insurance_claim' => $insuranceClaim,
        ]);
    }

    #[Route('/garages', name: 'app_insurance_claim_garages', methods: ['GET'])]
    public function garages(): Response
    {
        $insuranceClaimGarages = file_get_contents('./assets/json/AssurePlus-Garages.json');
        $garages = json_decode($insuranceClaimGarages,true);
    return $this->render('insurance_claim/_services/garages.html.twig',array(
        'insurance_claim_garages'=> $garages
    ));
    }

    #[Route('/services', name: 'app_insurance_claim_towing', methods: ['GET'])]
    public function towing(): Response
    {
        $insuranceClaimTowing = file_get_contents('./assets/json/AssurePlus-Garages.json');
        $towing = json_decode($insuranceClaimTowing, true);
    return $this->render('insurance_claim/_services/towing.html.twig',array(
        'insurance_claim_towing'=> $insuranceClaimTowing
    ));
    }

    #[Route('/garages.json', name: 'app_insurance_claim_garages_json', methods: ['GET'])]
    public function garages_json(): JsonResponse {
        $insuranceClaimGarages = file_get_contents('./assets/json/AssurePlus-Garages.json');
        $garages = json_decode($insuranceClaimGarages, true);
        return new JsonResponse($garages);
    }

    #[Route('/services.json', name: 'app_insurance_claim_services_json', methods: ['GET'])]
    public function services_json(): JsonResponse {
        $insuranceClaimTowing = file_get_contents('./assets/json/AssurePlus-Garages.json');
        $towing = json_decode($insuranceClaimTowing, true);
        return new JsonResponse($towing);
    }
}
