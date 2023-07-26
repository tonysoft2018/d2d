<script>
   
    /*<Events  Button Update # 2 >*/
        const ButtonUpdate  = ( 
                                    idUsuario, 
                                    idSolicitud, 
                                    folio, 
                                    fecha, 
                                    nombres, 
                                    apellido, 
                                    tipoPerfil, 
                                    estatus, 
                                    usuario, 
                                    imagen,
                                    TipoDeVehiculo,
                                    numeroCuenta
                            ) => {

            $('#update-idUsuario-door2door').val(idUsuario);
            $('#update-id-door2door').val(idSolicitud);
            $('#update-folio-door2door').val(folio);
            $('#update-usuario-door2door').val(usuario);
            $('#update-nombre-door2door').val(nombres);
            $('#update-apellido-door2door').val(apellido);
            $('#update-tiposocio-door2door').val(tipoPerfil);
            $('#update-estatus-door2door').val(estatus);
            $('#update-Tipo-vehículo-door2door').val(TipoDeVehiculo);
            $('#update-numeroCLABE-door2door').val(numeroCuenta);
           
            $('#Fotografia-frente').html('<img  style="width:200px;height:200px" class="img-fluid" src="'+imagen+'">');

            switch(estatus){
                case 'PENDIENTE':{
                    $('#button-aceptar').hide();
                    $('#button-activa').hide();
                    $('#button-rechazar').hide();
                    $('#button-incompleto').hide();
                    $('#button-contrato').hide();
                    $('#button-inactivo').hide();
                    break;
                }
                case 'CONFIRMADA':{
                    $('#button-aceptar').show();
                    $('#button-rechazar').show();
                    $('#button-incompleto').show();
                    $('#button-contrato').show();

                    $('#button-activa').hide();
                    $('#button-inactivo').hide();
                    break;
                }
                case 'CONTRATO':{
                    $('#button-rechazar').show();
                    $('#button-activa').show();
                    
                    $('#button-aceptar').hide();                    
                    $('#button-incompleto').hide();
                    $('#button-contrato').hide();
                    $('#button-inactivo').hide();

                    break;
                }
                case 'INCOMPLETA':{

                    $('#button-aceptar').show();
                    $('#button-rechazar').show();
                    $('#button-incompleto').show();
                    $('#button-contrato').show();
                    $('#button-inactivo').hide();

                    $('#button-activa').hide();

                    break;
                }
                case 'RECHAZADA':{
                    $('#button-aceptar').hide();
                    $('#button-activa').hide();
                    $('#button-rechazar').hide();
                    $('#button-incompleto').hide();
                    $('#button-contrato').hide();

                    $('#button-inactivo').hide();

                    break;
                }
                case 'ACTIVO':{
                    $('#button-aceptar').hide();
                    $('#button-activa').hide();
                    $('#button-rechazar').hide();
                    $('#button-incompleto').hide();
                    $('#button-contrato').hide();
                    
                    $('#button-inactivo').show();
                    break;
                }

                case 'INACTIVO':{
                    $('#button-aceptar').hide();
                    $('#button-inactivo').hide();
                    $('#button-rechazar').hide();
                    $('#button-incompleto').hide();
                    $('#button-contrato').hide();
                    
                    $('#button-activa').show();
                    break;
                }
                default :{
                    $('#button-aceptar').hide();
                    $('#button-activa').hide();
                    $('#button-rechazar').hide();
                    $('#button-incompleto').hide();
                    $('#button-contrato').hide();
                    $('#button-inactivo').hide();
                    break;
                }
            }
            

            $('#modal-update-door2door').modal('show');
        }
    /*<Events  Button Update # 2 >*/

    /*<Events  Button Delete # 3 >*/
        const ButtonRechazado  = (idUsuario, folio) => {            
            $('#delete-idUsuario-door2door').val(idUsuario);
            $('#delete-folio-door2door').val(folio);
            $('#delete-comentario-door2door').val('');
            $('#modal-delete-door2door').modal('show');
        }
    /*<Events Button Delete # 1 >*/

     /*<Events  Button Delete # 3 >*/
        const ButtonEliminar  = (idUsuario) => {      

            $('#delete-id-door2door').val(idUsuario);
            $('#modal-delete-door2door').modal('show');

        }
    /*<Events Button Delete # 1 >*/



    

</script>