<script type="module">
    /*<import librarys>*/ 

        import functionCreate           from './js/function/Function.Update.main.js';  
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';
    /*<import librarys>*/ 
    
    


    $(document).ready(() =>
    {  

        setTimeout(() => {
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
        }, 1500);

        /*<Main Module Roles>*/               
            /*<Consultar toda la iformacion>*/ 
                const functionSFA = functionSelectFullAPI().
                then( (result) => {  console.log(result);
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let Arrays = [];
                                Arrays = result.information;
                                console.log(Arrays);
                                if(Arrays.length > 0)      {
                                    $('#create-id-door2door').val( Arrays[0].idUsuario);
                                    $('#create-nombre-door2door').val(  Arrays[0].nombres);
                                    $('#create-apellido-door2door').val( Arrays[0].apellidos);
                                    $('#create-usuario-door2door').val( Arrays[0].usuario);
                                    $('#imagen-epmresa').html('<img class="img-circle elevation-2" src="'+Arrays[0].imagen+'" style="width:200px;height:200px"  >');
                                    $("#imagen-perfil").attr("src", Arrays[0].imagen);
                                }else{
                                    $('#create-id-door2door').val('');
                                    $('#create-nombre-door2door').val('');
                                    $('#create-apellido-door2door').val('');
                                }
                                                                  
                                                            
                            /*<Consulta exitosa>*/                        
                        }else{
                           /*<Error de query>*/ 
                                $('#message-error-platform').html("");
                                $('#message-error-platform').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-error-platform').modal('show');
                            /*</Error de query>*/  
                        }       
                    }                           
                }).catch( (err) => { 
                    /*<Error de query>*/ 
                        $('#message-error-platform').html("");
                        $('#message-error-platform').html('¡ERROR AL RECARGAR LA PAGUINA!');
                        $('#modal-message-error-platform').modal('show');
                    /*</Error de query>*/  
                });
            /*<Consultar toda la iformacion>*/ 

            /*<Evento creacion de un nuevo>*/
                $('#button-create-door2door').on('click', () =>{ const Funresult = functionCreate(); }); 
            /*</Evento creacion de un nuevo>*/

            /*<Evento creacion de un nuevo>*/
                $('#button-contrasena-door2door').on('click', () =>{ $('#modal-new-password-door2door').modal('show'); }); 
            /*</Evento creacion de un nuevo>*/
            
            /*<Evento creacion de un nuevo>*/
                $('#button-imagen-door2door').on('click', () =>{ $('#modal-imagen-door2door').modal('show'); }); 
            /*</Evento creacion de un nuevo>*/

            $('#button-update-password-door2door').on('click', () =>{ 
                let password    = $('#update-users-new-contrasena-door2door').val();
                let passwordNew = $('#update-users-new-repetir-contrasena-door2door').val();

                if( password != '' &&  passwordNew != '' ){
                    if(password == passwordNew){
                        if(password.length > 8){
                            let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();               
                            $.ajax({
                                url: "/d2dSocioWeb/Modules/ModulePerfil/api/door2door.controller.password.php",
                                type: 'post',
                                async: false,
                                dataType: "json",
                                data: { 
                                    TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                                    password:password
                                }             
                            }).
                            then((result) => {   console.log("#"); console.log(result);
                                if(result){
                                    if(result.message == 'Good'){
                                        $('#message-succes-door2door').html("");
                                        $('#message-succes-door2door').html('OPERACION REALIZADA CON EXITO');
                                        $('#modal-message-succes-door2door').modal('show'); 

                                        $('#update-users-new-contrasena-door2door').val('');
                                        $('#update-users-new-repetir-contrasena-door2door').val('');
                                        $('#modal-new-password-door2door').modal('hide');                                    
                                    }
                                }
                            }).
                            catch( (err) => {

                            });  

                        }else{
                            $('#message-warning-door2door').html('');
                            $('#message-warning-door2door').html('¡LA CONTRASEÑA DEBE DE SER MAYOR DE 8 CARACTERES!');
                            $('#modal-message-warning-door2door').modal('show'); 
                        }
                    }else{
                        $('#message-warning-door2door').html('');
                        $('#message-warning-door2door').html('CONTRASEÑAS NO COINCIDEN');
                        $('#modal-message-warning-door2door').modal('show'); 
                    }
                }else{
                    $('#message-warning-door2door').html('');
                    $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LAS CONTRASEÑAS QUE VA A USAR');
                    $('#modal-message-warning-door2door').modal('show'); 
                }
            }); 

            $('#button-guardar-door2door').on('click', () =>{ 
                let nombres     = $('#create-nombre-door2door').val();
                let apellidos   = $('#create-apellido-door2door').val();

                if( nombres != '' &&  apellidos != '' ){
                    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();               
                    $.ajax({
                        url: "/d2dSocioWeb/Modules/ModulePerfil/api/door2door.controller.create.php",
                        type: 'post',
                        async: false,
                        dataType: "json",
                        data: { 
                            TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                            nombres:nombres,
                            apellidos:apellidos
                        }             
                    }).
                    then((result) => {   console.log(result)
                        if(result){
                            if(result.message == 'Good'){
                                $('#message-succes-door2door').html("");
                                $('#message-succes-door2door').html('OPERACION REALIZADA CON EXITO');
                                $('#modal-message-succes-door2door').modal('show'); 

                                $('#update-users-new-contrasena-door2door').val('');
                                $('#update-users-new-repetir-contrasena-door2door').val('');
                                $('#modal-imagen-door2door').modal('hide');                                    
                            }
                        }
                    }).
                    catch( (err) => {

                    });  
                }else{
                    $('#message-warning-door2door').html('');
                    $('#message-warning-door2door').html('FAVOR DE INTRODUCIR NOMBRE Y APELLIDOS');
                    $('#modal-message-warning-door2door').modal('show'); 
                }
            });


            
            $('#button-imagen-guradar-door2door').on('click', () =>{ 
              
                let informationForm = new FormData(document.getElementById("form-imagen-perfil-door2door")); 
               
                let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();  
                informationForm.append('TockenOfdoor2doordoor2door',     TockenOfdoor2doordoor2door);             
                $.ajax({
                    url: "/d2dSocioWeb/Modules/ModulePerfil/api/door2door.controller.imagen.php",
                    type: 'post',
                    async: false,
                    data: informationForm,        
                    dataType:"json",
                    contentType:false,
                    processData:false,
                    cache:false     
                }).
                then((result) => {   console.log(result)
                    if(result){
                        if(result.message == 'Good'){
                            $('#message-succes-door2door').html("");
                            $('#message-succes-door2door').html('OPERACION REALIZADA CON EXITO');
                            $('#modal-message-succes-door2door').modal('show');                            
                            $('#modal-imagen-door2door').modal('hide');   
                            $('#imagen-epmresa').html('<img  class="img-circle elevation-2" src="'+result.imagen+'" style="width:200px;height:200px"  >');
                            $("#imagen-perfil").attr("src", Arrays[0].imagen);           

                        }
                    }
                }).
                catch( (err) => {

                });  
                
            });
           
        /*</Main Module Roles>*/                                 
    });
</script>