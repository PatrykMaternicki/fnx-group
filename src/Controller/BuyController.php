<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Article;

class BuyController extends AbstractController
{
    /**
     * @Route("/buy/article/{id}", name="buy")
     */
    public function index($id)
    {
        $user = $this->getDoctrine()->getRepository(Article::class)->find($id);
        var_dump($user);
        die();
        return $this->render('buy/index.html.twig', [
            'controller_name' => 'BuyController',
        ]);
    }
}
