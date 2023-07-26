/*
*   <Information>
*       <Author> 
*           Carlos Andres González Gómez
*       </Author>
*       <Description> 
*           Funcion de javascrit para realizar peticiones
*       </Description>
*   </Information>
*/ 


/*<Function of AbrirAPI>*/          
    const ConsultAPI = async(  tipo,  feachinicio, fechafinal
                                    ) => {   
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
        const Peticion = await $.ajax({
            url: "/door2door/Modules/ModuleDashboard/api/door2door.controller.consult.php",
            type: 'post',
            async: false,
            dataType: "json",
            data: {
                TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                tipo:tipo,
                feachinicio:feachinicio,
                fechafinal:fechafinal
            }        
        });              
        const Respuesta = Peticion;  
        return Respuesta;   
                            
    }
    /*<export>*/
        export default ConsultAPI;
    /*</export>*/
/*<Function of Delete>*/ 