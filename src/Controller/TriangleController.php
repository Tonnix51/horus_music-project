<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\GeometryCalculator;

/**
 * The controller that manages the triangle figure
 * 
 * @author Anthony <njaka.randrianarison@gmail.com>
 * 
 * @since 2022-08-25
 * 
 */
class TriangleController extends AbstractController
{
    const TRIANGLE_TYPE = 'triangle';

    /**
     * @Route("/triangle/{a}/{b}/{c}", name="app_triangle", methods={"GET"}, requirements={
     *     "a"="\d+",
     *     "b"="\d+",
     *     "c"="\d+"
     * })
     */
    public function index(
        int $a,
        int $b,
        int $c,
        GeometryCalculator $calculator

    ): JsonResponse
    {
        $datas = [
            'a' => $a,
            'b' => $b,
            'c' => $c
        ];
        $perimeter  = $calculator->calculateDiameters(self::TRIANGLE_TYPE, $datas);
        $surface    = $calculator->calculateAreas(self::TRIANGLE_TYPE, $datas);
        return $this->json([
            'type'        => self::TRIANGLE_TYPE,
            'a'           => number_format($a, 1),
            'b'           => number_format($b, 1),
            'c'           => number_format($c, 1),
            'surface'     => number_format($surface, 2),
            'perimeter'   => number_format($perimeter, 2)
        ]);
    }
}
