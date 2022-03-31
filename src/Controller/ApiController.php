<?php

namespace App\Api;

use DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Class 
 * 
 * @Route("/api")
 */
class ApiController
{

    /**
     * Function post
     * 
     * @Route("/post", name="post_rdv", methods={"POST"})
     * 
     */
    public function post()
    {
        return new JsonResponse([]);
    }



    private function isFriday(DateTime $now)
    {
        $date = $now->format('Y-m-d');
        $day = date('w', strtotime($date));

        if ($day == 5) {
            return true;
        }

        return false;
    }

    private function isDateInCurrentWeek(DateTime $date)
    {
        $firstDay = date("Y-m-d", strtotime('sunday last week'));
        $lastDay = date("Y-m-d", strtotime('sunday this week'));
        $date->format("Y-m-d");

        if ($date > $firstDay && $date < $lastDay) {
            return true;
        }

        return false;
    }
}
