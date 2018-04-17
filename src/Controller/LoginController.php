<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function index(SessionInterface $session, AuthenticationUtils $authenticationUtils, Request $request)
    {
        //dump($session->get('counter'));
        //dump($request->cookies);

        if ($request->cookies->get('block')) {
            $session->set('counter', 0);
            return $this->redirectToRoute('blocked');
        }

        if ($session->get('counter') > 4) {
            $date = new \DateTime();
            $date->modify('+10 minutes');
            $response = new Response();
            $response->headers->setCookie(new Cookie('block', 1, $date));
            $response->prepare($request);
            $response->send();
        }

        $targetPath = $session->get('userType') == 'worker' ? 'home' : 'home_employer';

        $error = $authenticationUtils->getLastAuthenticationError();
        if ($error) {
            $session->set('counter', $session->get('counter', 0) + 1);
        }

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'error' => $error,
            'lastUsername' => $lastUsername,
            'targetPath' => $targetPath,
        ]);
    }
}
