<?php

namespace App\Controller;

use App\Entity\Visiteur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GsbController extends AbstractController
{
    public function index(Request $request): Response
    {
        if($request->cookies->get("login")==null){
           // return $this->redirectToRoute("app_login");
        }
        $repository = $this->getDoctrine()->getRepository(Visiteur::class);
        $visiteur = $repository->findOneBy(["login"=>$request->cookies->get("login")]);
        return $this->render('v_accueil.html.twig', [
            'controller_name' => 'GsbController',"visiteur"=>$visiteur,
        ]);
    }
}
