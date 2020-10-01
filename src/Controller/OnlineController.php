<?php


namespace App\Controller;

use App\Entity\Activity;
use App\Entity\InfoCoach;
use App\Repository\ActivityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Timeline;

class OnlineController extends AbstractController
{
    /**
     * @Route("/online", name="app_online")
     */
    public function index() : Response
    {
        $coachInfo = $this->getDoctrine()
            ->getRepository(InfoCoach::class)
            ->findOneBy([]);

        $activities = $this->getDoctrine()
            ->getRepository(Activity::class)
            ->findBy(['category'=>'distance']);

        return $this->render('online/index.html.twig', [
            'etapes' => Timeline::ONLINE,
            'coachInfo' => $coachInfo,
            'activities' => $activities,
            'title' => 'Programmes en ligne',
            'underTitle' => 'Retrouvez la forme, en toute autonomie',
        ]);
    }
}
