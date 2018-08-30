<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Heading;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\ArticleRepository;
use App\Twig\AppExtension;

class HeadingController extends Controller
{


    /**
     * @Route("/heading", name="heading")
     */
    public function index()
    {
        return $this->render('heading/index.html.twig', [
            'controller_name' => 'HeadingController',
        ]);
    }

    /**
     * @Route("/heading/acuality", name="actuality")
     */

    public function showActuality()
    {
        return $this->render('heading/actuality.html.twig',[
            'controller_name' => 'HeadingController'
        ]);
    }

    

    /**
     * @Route("/heading/{id}", name="heading_show")
     */
    public function show(Heading $heading){

        return $this->render('heading/show.html.twig',[
            'controller_name' => 'HeadingController',
            'heading' => $heading
        ]);
    }
    /**
     * @Route("/heading/{id}/heading_article", name="heading_article")
     */
    public function showArticles(Heading $heading){

        return $this->render('heading/heading_article.html.twig',[
            'controller_name' => 'HeadingController',
            'heading' => $heading
        ]);
    }

}
