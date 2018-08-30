<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 23/07/18
 * Time: 22:42
 */

namespace App\Twig;

use App\Entity\Article;
use App\Entity\Heading;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class AppExtension extends AbstractExtension
{

    protected $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * récupère la liste des rubriques
     * @return object[]
     */
    public function getHeadings()
    {

        $headings = $this->doctrine
            ->getRepository(Heading::class)
            ->findBy([], ['position' => 'ASC']);


        return $headings;
    }

    /**public function getArticles($heading_id){
        $articles = $this->doctrine
            ->getRepository(Article::class)
            ->find($heading_id);

        return $articles;
    }*/


    public function getFunctions()
    {
        return array(
            new TwigFunction('getHeadings', [$this, 'getHeadings'])
           // new TwigFunction('getArticles', [$this, 'getArticles'])
        );

    }
}




