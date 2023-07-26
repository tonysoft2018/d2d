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


/*<Function of NotificacionesAPI>*/ 
const NotificacionesVistoAPI = async(idNotificacion) => {   
    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val(); 
    const Request = await $.ajax({
        url: "/door2door/messages/api/controller.notificaciones.select.php",
        type: 'post',
        async: false,
        dataType: "json",
        data: { 
            TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
            idNotificacion:idNotificacion
        }        
      
    });              
    const Response = Request;  
    return Response;                             
}
/*<export>*/
    export default NotificacionesVistoAPI;
/*</export>*/
/*<Function of NotificacionesAPI>*/ 