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
const AceptarAPI = async(  ArraysDatos, idCorte) => {    
    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();                 
    const Request = await $.ajax({
        url: "/door2door/Modules/ModuleCommission/api/door2door.controller.aceptar.php",
        type: 'post',
        async: false,
        dataType: "json",
        data: {
            TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
            ArraysDatos:ArraysDatos,
            idCorte:idCorte              
        }                     
    });              
    const Response = Request;  
    return Response;                            
}
/*<export>*/
    export default AceptarAPI;
/*</export>*/
/*</Function of Creation>*/  

