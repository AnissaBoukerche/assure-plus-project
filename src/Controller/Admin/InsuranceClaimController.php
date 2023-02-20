<?php

namespace App\Controller\Admin;

use App\DataTable\InsuranceClaimTableType;
use App\Entity\InsuranceClaim;
use App\Form\Admin\InsuranceClaimType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Umbrella\CoreBundle\Controller\BaseController;
use function Symfony\Component\Translation\t;

#[Route('/admin/sinistre')]
class InsuranceClaimController extends BaseController
{

    #[Route('')]
    public function index(Request $request)
    {
        $table = $this->createTable(InsuranceClaimTableType::class);
        $table->handleRequest($request);

        if ($table->isCallback()) {
            return $table->getCallbackResponse();
        }

        return $this->render('@UmbrellaAdmin/DataTable/index.html.twig', [
            'table' => $table
        ]);
    }

    #[Route('/modifier/{id}', requirements: ['id' => '\d+'])]
    public function edit(Request $request, ?int $id = null)
    {
        if ($id === null) {
            $insuranceClaim = new InsuranceClaim();
        } else {
            $insuranceClaim = $this->findOrNotFound(InsuranceClaim::class, $id);
        }

        $form = $this->createForm(InsuranceClaimType::class, $insuranceClaim);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->persistAndFlush($insuranceClaim);

            $this->toastSuccess(t('Statut mis à jour'));
            return $this->redirectToRoute('app_admin_insuranceclaim_edit', [
                'id' => $insuranceClaim->getId(),
            ]);
        }

        return $this->render('admin/_insurance_claim/edit.html.twig', [
            'form' => $form->createView(),
            'insuranceClaim' => $insuranceClaim,
        ]);
    }

}
