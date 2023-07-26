import CreateMember from '../API/API.Create.main.js';

const login = () => {     

    let tipousuario         = $('#create-tipousuario-door2door').val();
    let nombre              = $('#create-nombre-door2door').val().replace(/"/, '');
    let apellidos           = $('#create-apellidos-door2door').val().replace(/"/, '');
    let correo              = $('#create-correo-door2door').val().replace(/"/, '');
    let usuario             = $('#create-usuario-door2door').val().replace(/"/, '');
    let contrasena          = $('#create-contrasena-door2door').val().replace(/"/, '');
    let repetircontrasena   = $('#create-repetircontrasena-door2door').val().replace(/"/, '');  

    $('#create-nombre-door2door').val(nombre);
    $('#create-apellidos-door2door').val(apellidos);
    $('#create-correo-door2door').val(correo);
    $('#create-usuario-door2door').val(usuario);

   

    let informationForm = new FormData(document.getElementById("form-create-member-door2door")); 
    
    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
    informationForm.append("TockenOfdoor2doordoor2door",TockenOfdoor2doordoor2door);   
               
    if(nombre != ''){
        if(apellidos != ''){
            if(correo != ''){
                if(usuario != ''){
                    if(contrasena != '' && repetircontrasena != '') {
                        if(contrasena == repetircontrasena){ 
                            if(correo.includes('@')){
                                if($('#create-terminosycondiciones-door2door').prop('checked')){                                       
                                    let informationForm = new FormData(document.getElementById("form-create-member-door2door")); 
                                    const  FunCreateMember = CreateMember(informationForm).
                                    then((result) => {   console.log(result)                       
                                        if (result.message == 'Good'){

                                            $('#create-nombre-door2door').val('');
                                            $('#create-apellidos-door2door').val('');
                                            $('#create-correo-door2door').val('');
                                            $('#create-usuario-door2door').val('');

                                            $('#create-contrasena-door2door').val('');
                                            $('#create-repetircontrasena-door2door').val('');

                                            $('#message-newmember-door2door').html('');
                                            $('#message-newmember-door2door').html('USUARIO CREADO CON EXITO');
                                            $('#modal-newmember-door2door').modal('show');                                             

                                        }else if (result.message == 'USER IN USE'){

                                            $('#message-warning-door2door').html('');
                                            $('#message-warning-door2door').html('USUARIO 0 CORREO SE ENCUENTRA EN  USO');
                                            $('#modal-message-warning-door2door').modal('show');  

                                        }else if (result.message == 'EMAIL IN USE'){

                                            $('#message-warning-door2door').html('');
                                            $('#message-warning-door2door').html('CORREO SE ENCUENTRA EN  USO');
                                            $('#modal-message-warning-door2door').modal('show');     
                                            $('#create-correo-door2door').addClass('is-invalid');  

                                        }else{

                                            $('#message-warning-door2door').html('');
                                            $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!');
                                            $('#modal-message-warning-door2door').modal('show');
                                        }                            
                                    }).catch((error) => {
                                        console.log(error);
                                        $('#mensaje-advertencia').html('');
                                        $('#mensaje-advertencia').html('INTENTELO MAS TARDE');
                                        $('#modal-mensajes-advertencia-door2door').modal('show');
                                    });
                                }else{
                                    $('#message-warning-door2door').html('');
                                    $('#message-warning-door2door').html('DEBES DE ACEPTAR TÉRMINOS Y CONDICIONES');
                                    $('#modal-message-warning-door2door').modal('show'); 
                                    $('#create-contrasena-door2door').addClass('is-invalid'); 
                                }
                            }else{
                                $('#message-warning-door2door').html('');
                                $('#message-warning-door2door').html('CORREO NO APROPIADO');
                                $('#modal-message-warning-door2door').modal('show'); 
                                $('#create-correo-door2door').addClass('is-invalid');
                            }       
                        }else{
                            $('#message-warning-door2door').html('');
                            $('#message-warning-door2door').html('CONTRASEÑAS NO COINCIDEN');
                            $('#modal-message-warning-door2door').modal('show'); 
                            $('#create-contrasena-door2door').addClass('is-invalid'); 
                            $('#create-repetircontrasena-door2door').addClass('is-invalid'); 
                        }       
                    }else{                               
                        $('#message-warning-door2door').html('');
                        $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LAS CONTRASEÑAS QUE VA A USAR');
                        $('#modal-message-warning-door2door').modal('show'); 
                        $('#create-contrasena-door2door').addClass('is-invalid'); 
                        $('#create-repetircontrasena-door2door').addClass('is-invalid'); 
                    }                        
                }else{                               
                    $('#message-warning-door2door').html('');
                    $('#message-warning-door2door').html('FAVOR DE INTRODUCIR SU USUARIO A USAR');
                    $('#modal-message-warning-door2door').modal('show');
                    $('#create-usuario-door2door').addClass('is-invalid'); 
                }     
            }else{                               
                $('#message-warning-door2door').html('');
                $('#message-warning-door2door').html('FAVOR DE INTRODUCIR SU CORREO');
                $('#modal-message-warning-door2door').modal('show'); 
                $('#create-correo-door2door').addClass('is-invalid');
            }  
        }else{                               
            $('#message-warning-door2door').html('');
            $('#message-warning-door2door').html('FAVOR DE INTRODUCIR SU APELLIDO');
            $('#modal-message-warning-door2door').modal('show'); 
            $('#create-apellidos-door2door').addClass('is-invalid');
        }  
    }else{                               
        $('#message-warning-door2door').html('');
        $('#message-warning-door2door').html('FAVOR DE INTRODUCIR SU NOMBRE');
        $('#modal-message-warning-door2door').modal('show'); 
        $('#create-nombre-door2door').addClass('is-invalid');
    }                   
}


export default login;
