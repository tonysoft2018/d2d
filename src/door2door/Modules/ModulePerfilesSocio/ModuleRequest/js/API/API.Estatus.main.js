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
    const EstatusAPI = async( estatus, idUsuario, folio, comentario) => {   
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();   
        const Request = await $.ajax({
            url: "/door2door/Modules/ModulePerfilesSocio/ModuleRequest/api/door2door.controller.estatus.php",
            type: 'post',
            async: false,
            dataType:"json",
            data: {
                TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                estatus:estatus,
                idUsuario:idUsuario,
                folio:folio,
                comentario:comentario
            },        
            
        });              
        const Response = Request;  
        return Response;                             
    }
    /*<export>*/
        export default EstatusAPI;
    /*</export>*/
/*<Function of Delete>*/ 