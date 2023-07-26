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
    const CreateCargarAPI = async(  PlataformaForm,  tipoArchivo) => {    
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
        PlataformaForm.append("TockenOfdoor2doordoor2door",TockenOfdoor2doordoor2door);  
        PlataformaForm.append("tipoArchivo",tipoArchivo);  
                   
        const Request = await $.ajax({
            url: "/door2door/Modules/ModuleCatalogsPaises/api/door2door.controller.create.cargar.php",
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
        export default CreateCargarAPI;
    /*</export>*/
/*</Function of Creation>*/  

