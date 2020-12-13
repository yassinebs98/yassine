<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\VoitureType;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Voiture;
use Symfony\Component\HttpFoundation\Request;



class VoitureController extends AbstractController
       
{
    /**
     * @Route("/voiture", name="voiture")
     */
    public function index(): Response
    { 
        $voitures =$this->getDoctrine()->getRepository(Voiture::class)->findAll();
        return $this->render('voiture/index.html.twig', [
            'voitures' => $voitures,
        ]);
    }
     /**
     * @Route("/voiture/{mat}", name="voiturebymat")
     */
    public function afficher(string $mat): Response
    { 
        $voitures =$this->getDoctrine()->getRepository(Voiture::class)->findBy(array('matricule'=>$mat));
        return $this->render('voiture/index.html.twig', [
            'voitures' => $voitures,
        ]);
    }
     /**
     * @Route("/modifiervoiture/{mat}", name="editvoiturebymat")
     */
    public function modifier(string $mat): Response
    { 
        $entityManager=$this->getDoctrine()->getManager();
        $voiture=$this->getDoctrine()->getRepository(Voiture::class)->findBy(array('matricule'=>$mat));
        if (!$voiture){
            throw $this->createNotFoundException('pas de voiture avec la matricule'.$mat);
        }
        $voiture[0]->setMarque('polo');
        $entityManager->flush();
        return $this->redirectToRoute('voiturebymat', [
            'mat' => $mat
        ]);
    }
       /**
     * @Route("/supprimervoiture/{mat}", name="supprimervoiturebymat")
     */
    public function supprimer(string $mat): Response
    { 
        $entityManager=$this->getDoctrine()->getManager();
        $voiture=$this->getDoctrine()->getRepository(Voiture::class)->findBy(array('matricule'=>$mat));
        if (!$voiture){
            throw $this->createNotFoundException('pas de voiture avec la matricule'.$mat);
        }
        $entityManager->remove($voiture[0]);
        $entityManager->flush();
        return $this->redirectToRoute('voiture');
    }

    /**
     * @Route("/", name="home")
     */

public function home(){
    return $this->render('base.html.twig',['tittle'=>"bienvenue ici les amis", 'age'=>30]);
}
  /**
     * @Route("/car", name="car")
     */

    public function voiture(){
        return $this->render('voiture/voiture.html.twig');
    }
     /**
     * @Route("/createvoiture", name="create_voiture")
     */
    public function createVoiture(Request $request) : Response
    {
        $voiture=new Voiture();
        $form=$this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $voiture->setDisponibilitee(1);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($voiture);
            $entityManager->flush();
            return $this->redirectToRoute('voiture');
        }
        return $this->render('voiture/ajouter.html.twig',['form'=> $form->createView()]);
 
 
    }






}
