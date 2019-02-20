<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/{id}", name="article")
     */
    public function index($id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find((int)$id);
        $authors = $article->getWritenBy()->getValues();
        $category = $article->getBelongsTo();
        $tags = $article->getContains()->getValues();

        return $this->render('article/index.twig', [
            'category' => $category->getName() ?? '',
            'article' => $article,
            'slugs' => [
                'category' => '/listing/category/'. $category->getName().'/'.$category->getId(),
                'authors' => '/listing/authors/',
                'tags' => '/listing/tags/'
            ],
            'authors' =>  $authors,
            'tags' => $tags,
            'logged' => $this->get('session')->get('logged') ?? 0,
            'heOwned' => $article->getPrice() === 0.0 ? true : false
        ]);
    }
}
