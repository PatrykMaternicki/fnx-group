<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class TagsListingController extends AbstractController
{
    /**
     * @Route("/listing/tags/{id}", name="tags_listing")
     */
    public function index($id)
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll((int)$id) ?? [];
        $tagArticles = [];
        foreach($articles as $article) {
            $tags = $article->getContains()->toArray();
            foreach($tags as $tag) {
                if ($tag->getId() === (int)$id) {
                    $tagArticles[] = $article;
                }
            }
        }

        return $this->render('listing/index.twig', [
            'articles' => $tagArticles,
            'slug' => '/article/',
        ]);
    }
}
