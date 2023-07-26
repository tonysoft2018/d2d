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
    const SelectedAPI = async(idContacto) => {   
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
                 
        const Request = await $.ajax({
            url: "/d2dSocio/Modules/ModuleClientSeguimientos/api/door2door.controller.Selected.php",
            type: 'post',
            async: false,
            dataType: "json",
            data: { 
                TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                idContacto:idContacto
            }    
                
        });              
        const Response = Request;  
        return Response;                            
    }
   /*<export>*/
        export default SelectedAPI;
   /*</export>*/
/*</Function of Update>*/     