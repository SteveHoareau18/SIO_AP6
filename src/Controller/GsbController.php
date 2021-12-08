<?php

namespace App\Controller;

use App\Entity\Visiteur;
use App\Entity\LigneFraisForfait;
use App\Entity\Fichefrais;
use App\Entity\Fraisforfait;
use ArrayObject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function Composer\Autoload\includeFile;

class GsbController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request): Response
    {
        if(!$this->getUser()){
           return $this->redirectToRoute("app_login");
        }
        return $this->render('v_accueil.html.twig', [
            'controller_name' => 'GsbController',"visiteur"=>$this->getUser(),
        ]);
    }

    /**
     * @Route("/consulter", name="consulter")
     */
    public function consulter(Request $request): Response
    {
        if ($request->query->get("lstMois") !== null) {
            $ligneFraisForfais = $this->getDoctrine()->getRepository(LigneFraisForfait::class)->findOneBy(["idVisiteur"=>$this->getUser()->getId(),"mois"=>$request->query->get("lstMois")]);
            $fraisForfais = $this->getDoctrine()->getRepository(Fraisforfait::class)->findOneBy(["id"=>$ligneFraisForfais->getIdFraisForfait()]);
            $ficheFrais = $this->getDoctrine()->getRepository(Fichefrais::class)->findOneBy(["idvisiteur"=>$this->getUser()->getId(),"mois"=>$request->query->get("lstMois")]);
            return $this->render('v_etatFrais.html.twig', [
                'controller_name' => 'GsbController', "visiteur"=>$this->getUser(),  "fraisForfait"=>$fraisForfais, "fiche"=>$ficheFrais, "ligneFraisForfait"=>$ligneFraisForfais,
            ]);
        }
        $mois = $this->getDoctrine()->getRepository(LigneFraisForfait::class)->findBy(["idVisiteur"=>$this->getUser()->getId()]);
        return $this->render('v_listeMois.html.twig', [
            'controller_name' => 'GsbController', "visiteur"=>$this->getUser(), "mois"=>$mois,
        ]);
    }

     /**
     * @Route("/saisir", name="saisir")
     */
    public function saisir(Request $request): Response
    {
         return $this->render('v_saisieFrais.html.twig', [
            'controller_name' => 'GsbController', "visiteur"=>$this->getUser(),
        ]);
    }
    /**
     * @Route("/image", name="image")
     */
    public function image(Request $request): Response
    {
        return $this->render('images/logo.jpg', [
            'controller_name' => 'GsbController',
        ]);
    }
    
  }
