const login = () => {     
    let EntradaUsuario = $('#login-usuario-door2door').val();
    let EntradaContrasena = $('#login-contrasena-door2door').val();
   
    EntradaUsuario = EntradaUsuario.replace(/"/, '');
    EntradaContrasena = EntradaContrasena.replace(/"/, '');

    $('#login-usuario-door2door').val(EntradaUsuario);
    $('#login-contrasena-door2door').val(EntradaContrasena);

    let informationForm = new FormData(document.getElementById("form-login-door2door")); 
    
    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
    informationForm.append("TockenOfdoor2doordoor2door",TockenOfdoor2doordoor2door);   
               
    if(EntradaContrasena != '' && EntradaUsuario != ''){
        $.ajax({
            url: "/door2door/login/controller/controller.login.php",
            type: 'post',
            data: informationForm,        
            dataType:"json",
            contentType:false,
            processData:false,
            cache:false    
        }).then((result) => {   console.log(result)                       
            if (result.message == 'Good'){
                if (result.userValitor == 'correct_user_door2door'){
                    $('#login-usuario-door2door').val('');
                    $('#login-contrasena-door2door').val('');
                    localStorage.setItem('JSON_door2door_INFOMATION',JSON.stringify((result)) )

                    window.location.href = "/door2door/Modules/Welcome/"
                }else{
                    $('#message-warning-door2door').html('');
                    $('#message-warning-door2door').html('CONTRASEÑA O USUARIO INCORRECTO');
                    $('#modal-message-warning-door2door').modal('show');                                      
                }   
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
        $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS');
        $('#modal-message-warning-door2door').modal('show'); 
        
    }                   
}


export default login;