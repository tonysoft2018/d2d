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

/*<import>*/    
    import CreateRolesAPI        from '../API/API.CreateRoles.main.js';
/*</import>*/    

/*<Create>*/           
    const CreateRoles = async() => { 
        /*<Captura>*/
            let id =$('#update-id-door2door').val();
            let Arrays = JSON.parse(localStorage.getItem('JSON_ASSIGNMENTROLES'));
        /*</Captura>*/
        const ResultCreateAPI= CreateRolesAPI( id, Arrays ).
        then((result) => {    console.log(result)          
            if(result.message == 'Good'){ 
                /*<Respuesta>*/
                    $('#message-succes-door2door').html("");
                    $('#message-succes-door2door').html('CREACIÓN EXITOSA');
                    $('#modal-message-succes-door2door').modal('show'); 
                    
                    $('#modal-AssignmentRoles-door2door').modal('hide');                     
                /*</Respuesta>*/                                        
            }else{ 
                /*<Respuesta>*/
                    $('#message-error-door2door').html('');
                    $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE! ERROR AL CREAR.');
                    $('#modal-message-error-door2door').modal('show');
                /*</Respuesta>*/
            }                           
        }).catch( (err) => { 
            /*<Respuesta>*/
                $('#message-error-door2door').html('');
                $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE! ERROR AL CREAR.');
                $('#modal-message-error-door2door').modal('show');
            /*</Respuesta>*/
        });         
    }
    /*<export>*/
        export default CreateRoles;
    /*</export>*/
/*</Create>*/  
