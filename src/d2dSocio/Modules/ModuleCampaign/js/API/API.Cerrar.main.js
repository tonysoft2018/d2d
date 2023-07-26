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


/*<Function of AbrirAPI>*/ 
const GrabarAPI = async(PlataformaForm) => {   
    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
    PlataformaForm.append("TockenOfdoor2doordoor2door",TockenOfdoor2doordoor2door);           
    const Request = await $.ajax({
        url: "/d2dSocio/Modules/ModuleCampaign/api/door2door.controller.cerrar.php",
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
    export default GrabarAPI;
/*</export>*/
/*<Function of Delete>*/ 