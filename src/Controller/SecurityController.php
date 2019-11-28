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
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login(Security $security)
    {
        $user = $security->getUser();

        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->json([
                'error' => 'Invalid login request: check that the Content-Type header is "application/json".'
            ], 400);
        }

        return $this->json([
            'userid' => $user ? $user->getId() : null,
            'username' => $user ? $user->getUsername() : null
        ]);
    }


    /**
    * @Route("/admin/dashboard")
    */
    public function administration(Security $security){
        return $this->json([
            'userid' => $user ? $user->getId() : null,
            'username' => $user ? $user->getUsername() : null
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('should not be reached');
    }
}
