<?php
                
/*
*    Autor: Carlos Andres González Gómez  
*    Description; Class of connection MariaDb
**/

namespace  d2dVisitador\Modules\ModulePugins\Functions;


class Functions {

    /*<distanciaEntreDosPuntos>*/
        public function distanciaEntreDosPuntos(
                                                    $latitudeFrom ,
                                                    $longitudeFrom , 
                                                    $latitudeTo , 
                                                    $longitudeTo 
                                                ){
                $theta = $longitudeFrom - $longitudeTo;
                $dist  = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
                $dist  = acos($dist);
                $dist  = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;
                $unit  = strtoupper($unit);
            return $miles * 1.609344;
        }
    /*</distanciaEntreDosPuntos>*/

}