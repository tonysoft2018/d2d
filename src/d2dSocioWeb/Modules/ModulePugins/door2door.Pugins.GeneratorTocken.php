<?php
/*
*    Autor: Carlos Andres González Gómez  
*    Description; Class of connection MariaDb
**/


namespace  d2dSocioWeb\Modules\ModulePugins\GeneradorTocken;

    include_once('door2door.Cofiguration.Conection.php');
    
    /*<Import>*/
        use  d2dSocioWeb\Modules\ModulePugins\Conection\Conection AS ConectionGeneratorTocken;
    /*<Import>*/

    class GeneradorTocken  extends ConectionGeneratorTocken{

        /*<GeneratorTocken>*/
            public function generatorTocken($tockenVal){
                return  $tockenVal.(date('dmy') *1123);
            }
        /*</GeneratorTocken>*/

        /*<GeneratorTocken>*/
            public function validadorTocken($tocken){
                return false;
            }
        /*</GeneratorTocken>*/

    }
