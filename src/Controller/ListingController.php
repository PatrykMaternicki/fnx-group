<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class ListingController extends AbstractController
{
    /**
     * @Route("/listing", name="listing")
     */
    public function index()
    {

        return $this->render('listing/index.twig', [
            'articles' => $this->getDoctrine()->getRepository(Article::class)->findAll() ?? [],
            'slug' => '/article/',
        ]);
    }

}
