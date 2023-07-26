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


/*<Function of Update>*/          
    const SelectFullAPI = async(idUsuario , estatus) => {   
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();               
        const Request = await $.ajax({
            url: "/door2door/Modules/ModuleMessageChat/api/door2door.controller.select.full.Mensajes.php",
            type: 'post',
            async: false,
            dataType: "json",
            data: { 
                TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                idUsuario:idUsuario,
                estatus:estatus 
            }        
        });              
        const Response = Request;  
        return Response;   
                            
    }
    /*<export>*/
        export default SelectFullAPI;
    /*</export>*/
/*</Function of Update>*/   