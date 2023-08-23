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


/*<Function of Creation>*/            
    const CargarAPI = async(folio ,idSolicitud,idUsuario,tipoSocio ) => {    
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();       
        const Request = await $.ajax({
            url: "/door2door/Modules/ModuleRequest/api/door2door.controller.select.full.file.php",
            type: 'post',
            async: false,
            dataType: "json",
            data: { 
                TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                folio:folio,
                idSolicitud:idSolicitud,
                idUsuario:idUsuario,
                tipoSocio:tipoSocio
            }                   
        });              
        const Response = Request;  
        return Response;                            
    }
    /*<export>*/
        export default CargarAPI;
    /*</export>*/
/*</Function of Creation>*/  

