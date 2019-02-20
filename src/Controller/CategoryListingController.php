<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class CategoryListingController extends AbstractController
{
    /**
     * @Route("/listing/category/{category}/{id}", name="listing_category")
    */
    public function index($category, $id)
    {
        return $this->render('listing/index.twig', [
            'articles' => $this->getDoctrine()->getRepository(Article::class)->findByCategory((int)$id) ?? [],
            'slug' => '/article/',
        ]);
    }
}
