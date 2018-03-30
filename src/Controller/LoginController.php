<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function index(SessionInterface $session, AuthenticationUtils $authenticationUtils)
    {
//        dump($user);
//        die;
        $targetPath = $session->get('userType') == 'worker' ? 'home' : 'home_employer';

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'error' => $error,
            'lastUsername' => $lastUsername,
            'targetPath' => $targetPath,
        ]);
    }
}
