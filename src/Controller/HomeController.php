<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController{
    /**
     * @Route("/", name="home")
     */
    public function index(SerializerInterface $serializer, Security $security){
        $user = $security->getUser();
        return $this->render('index.html.twig', [
            'user' => $serializer->serialize($user, 'jsonld')
        ]);
    }


}
