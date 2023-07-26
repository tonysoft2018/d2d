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
    const CancelacionAPI = async( idVisitas  ) => {   
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();      
        const Request = await $.ajax({
            url: "/d2dVisitador/Modules/ModuleClientSeguimientos/api/door2door.controller.cacelacion.php",
            type: 'post',
            async:  false,
            dataType: "json",
            data: { 
                    TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                    idVisitas:idVisitas
            }  
        });              
        const Response = Request;  
        return Response;                             
    }
    /*<export>*/
        export default CancelacionAPI;
    /*</export>*/
/*<Function of Delete>*/ 