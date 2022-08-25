<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\GeometryCalculator;

/**
 * The controller that manages the circle figure
 * 
 * @author Anthony <njaka.randrianarison@gmail.com>
 * 
 * @since 2022-08-25
 * 
 */
class CircleController extends AbstractController
{
    const CIRCLE_TYPE = 'circle';

    /**
     * @Route("/circle/{radius}", name="app_circle", methods={"GET"},  requirements={"radius"="\d+"})
     */
    public function index(int $radius, GeometryCalculator $calculator): JsonResponse
    {
        $datas = [
            'radius' => $radius
        ];
        $circumference  = $calculator->calculateDiameters(self::CIRCLE_TYPE, $datas);
        $surface        = $calculator->calculateAreas(self::CIRCLE_TYPE, $datas);
        return $this->json([
            'type'          => self::CIRCLE_TYPE,
            'radius'        => number_format($radius, 1),
            'surface'       => number_format($surface, 2),
            'circumference' => number_format($circumference, 2),
        ]);
    }
}
