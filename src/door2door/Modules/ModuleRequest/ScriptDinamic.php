<script>
   
    /*<Events  Button Update # 2 >*/
        const ButtonUpdate  = ( 
                                    idSolicitud, 
                                    folio, 
                                    fecha, 
                                    estatus,
                                    idUsuario, 
                                    usuario, 
                                    imagen, 
                                    nombres, 
                                    apellidos, 
                                    tipoPerfil, 
                                    email,


                                    colonia,
                                    calle,
                                    noExterior,
                                    noInterior,
                                    codigoPostal,
                                    Municipio,
                                    Estado,
                                    Pais,

                                    banco,
                                    numeroCuenta,
                                    nombrePropietario,

                                    TipoDeVehiculo,
                                    latitud,
                                    longitud
                            ) => {
            //console.log("#####################");
            //console.log(idUsuario);
            $('#update-idUsuario-door2door').val(idUsuario);
            $('#update-id-door2door').val(idSolicitud);
            $('#update-folio-door2door').val(folio);
            $('#update-Estatus-door2door').val(estatus);

            $('#update-usuario-door2door').val(usuario);
            $('#update-nombre-door2door').val(nombres);
            $('#update-apellido-door2door').val(apellidos);
            $('#update-tiposocio-door2door').val(tipoPerfil);
            $('#update-correo-door2door').val(email);

            $('#update-latitud-door2door').val(latitud);
            $('#update-longitud-door2door').val(longitud);
            $('#update-calle-door2door').val(calle);
            $('#update-noExterior-door2door').val(noExterior);
            $('#update-noInterior-door2door').val(noInterior);
            $('#update-codigoPostal-door2door').val(codigoPostal);
            $('#update-colonia-door2door').val(colonia);
            $('#update-Municipio-door2door').val(Municipio);
            $('#update-Estado-door2door').val(Estado);
            $('#update-Pais-door2door').val(Pais);
            
            $('#update-Tipo-vehículo-door2door').val(TipoDeVehiculo);

            $('#update-banco-door2door').val(banco);
            $('#update-nombreDelPropietario-door2door').val(nombrePropietario);
            $('#update-numeroCLABE-door2door').val(numeroCuenta);
           
            $('#Fotografia-frente').html('<img  style="width:300px;height:300px" class="img-circle elevation-2" src="'+imagen+'">');

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
            
            

            $('#modal-datos-personales-door2door').modal('show');
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