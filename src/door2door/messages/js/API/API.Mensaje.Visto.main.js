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


/*<Function of MensajeAPI>*/ 
const MensajeVistoAPI = async(
    idUsuario
) => {   
    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val(); 
    const Request = await $.ajax({
        url: "/door2door/messages/api/controller.mensajes.visto.php",
        type: 'post',
        async: false,
        dataType: "json",
        data: { 
            TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
            idUsuario:idUsuario 
        }        
      
    });              
    const Response = Request;  
    return Response;                             
}
/*<export>*/
    export default MensajeVistoAPI;
/*</export>*/
/*<Function of MensajeAPI>*/ 