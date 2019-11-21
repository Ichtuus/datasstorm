<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Security\Core\Security;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login", methods={"POST"})
     */
    public function login(Security $security)
    {
        $user = $security->getUser();
        // print_r($user);
        // die();
        // $parametersAsArray = [];
        // if ($content = $request->getContent()) {
        //     $parametersAsArray = json_decode($content, true);
        // }

     //    if(!empty($request->getContent())){
     //     //make something curious, get some unbelieveable data
     //     $arrData = ['output' => $request->getContent()];
     //     return new JsonResponse($arrData);
     // }
     // return $this->json([
     //     'username' => $user->getEmail(),
     //     'pass' => $user->getPassword(),
     // ]);
         // print_r($parametersAsArray);
        // die();
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->json([
                'error' => 'Invalid login request: check that the Content-Type header is "application/json".'
            ], 400);
        }

            // return new Response('Well hi there '.$user->getUsername());

        return $this->json([
            'user' => $user ? $user->getId() : null
        ]);
    }
}
