<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeEmployerController extends Controller
{
    /**
     * @Route("/employer", name="home_employer")
     */
    public function index(SessionInterface $session)
    {
        $session->set('userType', 'employer');
        dump($session);
        dump($_SESSION);
        return $this->render('home/index.html.twig');
    }
}
