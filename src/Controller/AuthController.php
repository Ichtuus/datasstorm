<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UserRepository;

class AuthController extends AbstractController
{
    /** @var UserRepository $userRepository */
    private $userRepository;
    /**
     * AuthController Constructor
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Register new user
     * @param Request $request
     *
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function register(Request $request)
    {
        $newUserData['email']    = $request->get('email');
        $newUserData['password'] = $request->get('password');
        $newUserData['username'] = $request->get('username');
        // $newUserData['role'] = $request->get('role');
        $user = $this->userRepository->createNewUser($newUserData);
        return new Response(sprintf('User %s successfully created', $user->getUsername()));
    }

}
