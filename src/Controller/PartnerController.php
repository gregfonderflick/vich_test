<?php

namespace App\Controller;

use App\Entity\Partner;
use App\Repository\PartnerRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PartnerController extends Controller
{
    /**
     * @Route("/partner", name="partner")
     */
    public function index(PartnerRepository $repo)
    {
        $partner = $repo->findAll();

        return $this->render('partner/index.html.twig', [
            'controller_name' => 'PartnerController',
            'partners' => $partner
        ]);
    }

    public function show(Partner $partner)
    {

        return $this->render('partner/show.html.twig', [
            'controller_name' => 'PartnerController',
            'name' => $partner->getName(),
            'partner' => $partner
        ]);
    }
}
