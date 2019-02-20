<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class AuthorsListingController extends AbstractController
{
    /**
     * @Route("/listing/authors/{id}", name="authors_listing")
     */
    public function index($id)
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll((int)$id) ?? [];
        $authorArticles = [];
        foreach($articles as $article) {
            $authors = $article->getWritenBy()->toArray();
            foreach($authors as $author) {
                if ($author->getId() === (int)$id) {
                    $authorArticles[] = $article;
                }
            }
        }

        return $this->render('listing/index.twig', [
            'articles' => $authorArticles,
            'slug' => '/article/',
        ]);
    }
}
