<?php

namespace App\Controller;

use App\Form\EditProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as ControllerAbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class UserController extends ControllerAbstractController
{ 
    #[Route('/user', name: 'app_user_index', methods: ['GET'])]
    public function index()
{
        return $this->render('user/index.html.twig')
    ;
}

#[Route('/user/modifier/profil', name: 'app_user_edit', methods: ['GET', 'POST'])]
public function editProfile(Request $request, EntityManagerInterface $em)
{
    $user = $this->getUser();
    $form = $this->createForm(EditProfileType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($user);
        $em->flush();

            $this->addFlash('message', 'Profil mis à jour');

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
    return $this->render('user/editprofile.html.twig',[
    'form'=> $form ->createView(),
]);
}


}