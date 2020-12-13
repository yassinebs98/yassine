<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConnectionController extends AbstractController
{
    /**
     * @Route("/connection", name="connection")
     */
    public function index(): Response
    {
        try{
            $em-> $this->getDoctrine()->getManager();
            $em->getConnection()->connect();
            $connected = $em -> getconnection()->isConnected ();
        
        return $this->render('connection/index.html.twig', [
            'connected' => $Connected,
        ]);
    }
    catch(\exception $e)
    {
        return $this->render('connection/index.html.twig');
    }
}
}

