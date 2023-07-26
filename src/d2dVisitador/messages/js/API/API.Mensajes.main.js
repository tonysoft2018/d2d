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
const MensajeAPI = async() => {   
    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val(); 
    const Request = await $.ajax({
        url: "/d2dVisitador/messages/api/controller.mensajes.select.php",
        type: 'post',
        async: false,
        dataType: "json",
        data: { 
            TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door
        }        
      
    });              
    const Response = Request;  
    return Response;                             
}
/*<export>*/
    export default MensajeAPI;
/*</export>*/
/*<Function of MensajeAPI>*/ 