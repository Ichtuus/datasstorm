<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function getUsers(SerializerInterface $serializer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $users = $entityManager->getRepository(User::class)->findAll();
        $jsonContent = $serializer->serialize($users, 'json');
        // print_r($users);
        // die();
        // return new Response($jsonContent, Response::HTTP_OK);
        return $this->render('index.html.twig', [
            'users' => $users
        ]);
    }

}
