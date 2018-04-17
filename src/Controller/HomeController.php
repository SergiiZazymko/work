<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index(SessionInterface $session)
    {
        if ($this->getUser() && $this->getUser()->getStatus() == 0) {
            $this->addFlash('success', 'You did not confirm your email');
            return $this->redirectToRoute('logout');
        }
        $session->set('userType', 'worker');
        //dump($session);
        return $this->render('home/index.html.twig');
    }
}
