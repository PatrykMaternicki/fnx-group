<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Service\UserService;

class UserController extends AbstractController
{
    private $UserService;

    private $session;

    public function __construct()
    {
       $this->UserService = new UserService();
    }

    /**
     * @Route("/", name="user")
     */
    public function index()
    {
        return $this->render('user/index.twig', [
            'controller_name' => 'UserController',
        ]);
        $this->get('session')->set('logged', 0);

    }

    /**
    * @Route("/user", name="login")
    */
    public function login()
    {
        $corectData = false;

        if (!empty($_POST['login'])) {
            $user = $this->getDoctrine()->getRepository(User::class)->findLogin($_POST['login']);
            $corectData = !empty($user) ?
                $this->UserService->correctPassword($_POST['password'], $user->getPassword()) : false;
            $this->get('session')->set('logged', (int) $corectData);
            $this->get('session')->set('id', (int) $user->getId());
        }

        return $this->redirect('/listing');
    }
}
