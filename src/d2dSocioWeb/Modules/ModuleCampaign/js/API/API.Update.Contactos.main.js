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
    const CreateAPI = async(  PlataformaForm) => {    console.log("asdf")

        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
        PlataformaForm.append("TockenOfdoor2doordoor2door",TockenOfdoor2doordoor2door); 

        let idCampana =  $('#update-id-door2door').val();
        PlataformaForm.append("idCampana",idCampana);          
             
        const Request = await $.ajax({
            url: "/d2dSocioWeb/Modules/ModuleCampaign/api/door2door.controller.update.contactos.php",
            type: 'post',
            async: false,
            data: PlataformaForm,        
            dataType:"json",
            contentType:false,
            processData:false,
            cache:false                   
        });              
        const Response = Request;  
        return Response;                            
    }
    /*<export>*/
        export default CreateAPI;
    /*</export>*/
/*</Function of Creation>*/  
