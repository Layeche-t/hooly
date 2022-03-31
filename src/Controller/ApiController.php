<?php

namespace App\Api;

use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;



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
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function post(Request $request)
    {

        $data = json_decode($request->getContent());
        if (empty($data)) {
            return new JsonResponse(['error' => 'empty data']);
        }
        $date = $date = new DateTime();
        $date->setTimestamp($data['date']);
        $askedDate =  $date->format('U = Y-m-d H:i:s');

        $trackfood = $this->getDoctrine()->getRepository(Foodtrucks::class)->findBy(['registration' => $data['registration']]);
        dd($trackfood);
    }
    /**
     * @Route("/get")
     *
     * @return void
     */
    public function get()
    {
    }


    /**
     * @param DateTime $date
     * @return bool
     */
    private function isFriday(DateTime $date)
    {
        $current = $date->format('Y-m-d');
        $day = date('w', strtotime($current));

        if ($day == 5) {
            return true;
        }

        return false;
    }

    /**
     * @param DateTime $date
     * @return bool
     */
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
