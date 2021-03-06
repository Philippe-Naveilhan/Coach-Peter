<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Entity\InfoCoach;
use App\Entity\Degree;
use App\Entity\Activity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Transformation;
use App\Entity\Timeline;
use App\Entity\Offer;

class WhoIAmController extends AbstractController
{
    /**
     * @Route("/qui-suis-je", name="whoiam_index")
     */
    public function index(): Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        $coachDegrees = $this->getDoctrine()
            ->getRepository(Degree::class)
            ->findAll();

        return $this->render('WhoIAm/index.html.twig', [
            'etapes' => Timeline::WHOIAM,
            'offers' => Offer::OFFER,
            'degrees' => $coachDegrees,
            'coachInfo' => $coachInfo,
            'title' => 'Qui suis-je ?',
            'underTitle' => 'Mon accompagnement pas à pas',
            'bgimage' => 'groupe.jpg',
        ]);
    }
}
