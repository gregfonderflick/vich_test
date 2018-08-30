<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Heading;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{

    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    /**
     * @Route("/article/{id}", name="article_show")
     */
    public function show(Article $article){

        return $this->render('article/show.html.twig',[
            'controller_name' => 'ArticleController',
            'title' => $article->getTitle(),
            'article' => $article
        ]);
    }
}
