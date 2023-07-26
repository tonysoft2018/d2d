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
const PasswordAPI = async(  PlataformaForm) => {    
let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
let id =  $('#update-id-door2door').val();
PlataformaForm.append("TockenOfdoor2doordoor2door",TockenOfdoor2doordoor2door);    
PlataformaForm.append("update-id-door2door",id);               
const Request = await $.ajax({
    url: "/door2door/Modules/ModuleUsersUsers/api/door2door.controller.update.password.php",
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
export default PasswordAPI;
/*</export>*/
/*</Function of Creation>*/  

