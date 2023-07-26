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
    const CreateAPI = async(  ArraysDatos) => {    
        let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();                 
        const Request = await $.ajax({
            url: "/door2door/Modules/ModuleCommission/api/door2door.controller.create.php",
            type: 'post',
            async: false,
            dataType: "json",
            data: {
                TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                ArraysDatos:ArraysDatos              
            }                     
        });              
        const Response = Request;  
        return Response;                            
    }
    /*<export>*/
        export default CreateAPI;
    /*</export>*/
/*</Function of Creation>*/  

