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
    const SelectFullAPI = async(idCampana) => {   
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();               
        const Request = await $.ajax({
            url: "/d2dSocioWeb/Modules/ModuleCampaign/api/door2door.controller.select.full.Contactos.php",
            type: 'post',
            async: false,
            dataType: "json",
            data: { 
                TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                idCampana:idCampana 
            }        
        });              
        const Response = Request;  
        return Response;   
                            
    }
    /*<export>*/
        export default SelectFullAPI;
    /*</export>*/
/*</Function of Update>*/   