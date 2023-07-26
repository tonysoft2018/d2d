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
import PasswordAPI        from '../API/API.Password.main.js';
/*</import>*/    

/*<Create>*/           
const Create = async() => { 
    /*<Captura>*/
        let newPassword1        =   $('#update-users-new-contrasena-door2door').val().replace(/['"`]/, '');
        let newPassword2        =   $('#update-users-new-repetir-contrasena-door2door').val().replace(/['"`]/, '');

        /*<Eliminamos caracteres extraños>*/
            $('#update-users-new-contrasena-door2door').val(newPassword1);
            $('#update-users-new-repetir-contrasena-door2door').val(newPassword2);
        /*<Eliminamos caracteres extraños>*/

        if( newPassword1 != '' && newPassword2 != ''){
            let informationForm = new FormData(document.getElementById("form-password-door2door")); 
            const ResultCreateAPI= PasswordAPI( informationForm ).
            then((result) => {    console.log(result)          
                if(result.message == 'Good'){ 
                    /*<Respuesta>*/
                        $('#message-succes-door2door').html("");
                        $('#message-succes-door2door').html('OPERACIÓN EXITOSA');
                        $('#modal-message-succes-door2door').modal('show');                        

                        $('#update-users-new-contrasena-door2door').val('');
                        $('#update-users-new-repetir-contrasena-door2door').val('');

                        $('#modal-new-password-door2door').modal('hide'); 
                    /*</Respuesta>*/   
                }else{
                    /*<Error de query>*/ 
                        $('#message-error-door2door').html("");
                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                        $('#modal-message-error-door2door').modal('show');
                    /*</Error de query>*/
                }
            }).catch( (err) => {                                         
                /*<Error desconocido>*/
                    $('#message-error-door2door').html("");
                    $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                    $('#modal-message-error-door2door').modal('show');
                /*<Error desconocido>*/
            });

        }else{
            /*<Respuesta >*/
                $('#message-warning-door2door').html('');
                $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS');
                $('#modal-message-warning-door2door').modal('show')
            /*</Respuesta>*/

            /*<Respuesta>*/
                $('#password-contrasena-door2door').addClass("is-invalid");   
                $('#password-new-contrasena-door2door').addClass("is-invalid");   
                $('#password-new-repetir-contrasena-door2door').addClass("is-invalid");   
            /*</Respuesta>*/  
        }
    /*</Captura>*/
    
}
/*<export>*/
    export default Create;
/*</export>*/
/*</Create>*/  
