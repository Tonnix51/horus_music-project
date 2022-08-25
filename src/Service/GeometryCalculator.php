<?php

namespace App\Service;

/**
 * Utility class for calculating geometric figures
 * 
 * @author Anthony <njaka.randrianarison@gmail.com>
 * 
 * @since 2022-08-25
 * 
 */
class GeometryCalculator
{
    const TRIANGLE_TYPE = 'triangle';
    const CIRCLE_TYPE   = 'circle';
    const PI            = 3.14;

    /**
     * Calculate Perimeter or Circumference of geometric figure
     * 
     * @param string    $type   Type of figure
     * @param array     $datas  The data for the calculations
     * 
     * @return float
     */
    public function calculateDiameters($type, $datas = [])
    {
        if(self::TRIANGLE_TYPE == $type){
            $sides = [];
            foreach($datas as $data){
                $sides[] = $data;
            }
            return array_sum($sides);
        } else if (self::CIRCLE_TYPE == $type){
            $circumference = 2 * self::PI * $datas['radius'];
            return $circumference;
        }
    }

    /**
     * Calculate Area of geometric figure
     * 
     * @param string    $type   Type of figure
     * @param array     $datas  The data for the calculations
     * 
     * @return float 
     */
    public function calculateAreas($type, $datas = [])
    {
        if(self::TRIANGLE_TYPE == $type){
            $sides = [];
            foreach($datas as $data){
                $sides[] = $data;
            }
            return (array_sum($sides)) * 0.5;
        } else if (self::CIRCLE_TYPE == $type){
            $surface = self::PI * ($datas['radius'] * $datas['radius']) ;
            return $surface;
        }
    }
}