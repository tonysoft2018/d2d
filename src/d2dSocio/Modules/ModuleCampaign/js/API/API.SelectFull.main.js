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
    const SelectFullAPI = async(FechaInicio,FechaFinal) => {    console.log(FechaInicio); console.log(FechaFinal); 
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();               
        const Request = await $.ajax({
            url: "/d2dSocio/Modules/ModuleCampaign/api/door2door.controller.select.full.php",
            type: 'post',
            async: false,
            dataType: "json",
            data: { 
                TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                FechaInicio:FechaInicio,
                FechaFinal:FechaFinal 
            }        
        });              
        const Response = Request;  
        return Response;   
                            
    }
    /*<export>*/
        export default SelectFullAPI;
    /*</export>*/
/*</Function of Update>*/   