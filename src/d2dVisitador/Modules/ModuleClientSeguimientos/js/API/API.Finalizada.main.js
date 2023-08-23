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


/*<Function of Delete>*/ 
    const FinalizadaAPI = async( idVisitas , comentarios, idContacto) => {   
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();      
        const Request = await $.ajax({
            url: "/d2dVisitador/Modules/ModuleClientSeguimientos/api/door2door.controller.finalizada.php",
            type: 'post',
            async:  false,
            dataType: "json",
            data: { 
                    TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                    idVisitas:idVisitas,
                    comentarios:comentarios,
                    idContacto:idContacto
            }  
        });              
        const Response = Request;  
        return Response;                             
    }
    /*<export>*/
        export default FinalizadaAPI;
    /*</export>*/
/*<Function of Delete>*/ 