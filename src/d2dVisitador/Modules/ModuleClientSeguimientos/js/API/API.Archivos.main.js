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
    const ArchivosAPI = async(  PlataformaForm ) => {    console.log("asdf")
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
        PlataformaForm.append("TockenOfdoor2doordoor2door",TockenOfdoor2doordoor2door);               
        const Request = await $.ajax({
            url: "/d2dVisitador/Modules/ModuleClientSeguimientos/api/door2door.controller.archivos.php",
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
        export default ArchivosAPI;
    /*</export>*/
/*</Function of Creation>*/  

