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
    const SelectFullAPI = async() => {   
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();               
        const Request = await $.ajax({
            url: "/d2dVisitador/Modules/ModuleClientSeguimientos/api/door2door.controller.select.full.php",
            type: 'post',
            async: false,
            dataType: "json",
            data: { TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door }        
        });              
        const Response = Request;  
        return Response;   
                            
    }
    /*<export>*/
        export default SelectFullAPI;
    /*</export>*/
/*</Function of Update>*/   