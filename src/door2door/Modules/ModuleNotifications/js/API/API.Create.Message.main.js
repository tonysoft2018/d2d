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
    const CreateAPI = async(  idUsuario, Mensajes) => { 
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
         console.log(Mensajes)
        const Request = await $.ajax({
            url: "/door2door/Modules/ModuleNotifications/api/door2door.controller.create.Mensaje.php",
            type: 'post',
            async: false,
            dataType: "json",
            data: { 
                TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                idUsuario:idUsuario,
                Mensajes:Mensajes 
            }                    
        });              
        const Response = Request;  
        return Response;                            
    }
    /*<export>*/
        export default CreateAPI;
    /*</export>*/
/*</Function of Creation>*/  

