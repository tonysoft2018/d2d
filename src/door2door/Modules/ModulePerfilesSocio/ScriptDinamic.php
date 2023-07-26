<script>

    /*<Events  Button Update # 2 >*/
        const ButtonUpdate  = ( 
                                    id,  
                                    usuario,  
                                    nombres,
                                    apellidos,
                                    tipoPerfil,
                                    estatus,
                                    imagen
                            ) => {

            $('#update-id-door2door').val(id);
            $('#update-usuario-door2door').val(usuario); 
            $('#update-contrasena-door2door').val('*************************'); 
            $('#update-nombre-door2door').val(nombres);  
            $('#update-apellido-door2door').val(apellidos);  
            $('#update-estatus-door2door').val(estatus);
            
            let Options = '';

            if( tipoPerfil == 'SOCIO CLIENTE'){
                Options =   '<option value="SOCIO CLIENTE" selected>SOCIO CLIENTE</option>'+
                            '<option value="SOCIO VISITADOR">SOCIO VISITADOR</option>';
            }else if(tipoPerfil == 'SOCIO VISITADOR'){
                Options =   '<option value="SOCIO CLIENTE" >SOCIO CLIENTE</option>'+
                            '<option value="SOCIO VISITADOR" selected>SOCIO VISITADOR</option>';
            }
            $('#update-tipo-door2door').html(Options);
            $('#update-imagen-door2door').html('<img class="imagen-fluid img-circle elevation-2" style="width:350px;height:350px" src="'+imagen+'"  >');
            
            
            $('#modal-update-door2door').modal('show');
        }
    /*<Events  Button Update # 2 >*/

    /*<Events  Button Delete # 3 >*/
        const ButtonDelete  = (id) => {            
            $('#delete-id-door2door').val(id);
            $('#modal-delete-door2door').modal('show');
        }
    /*<Events Button Delete # 1 >*/

    /*<Events  Button Delete # 3 >*/
        const ButtonDetalleVisita  = (idContacto) => {        
            console.log(idContacto)
            $('#visita-id-door2door').val(idContacto);
            $('#modal-visitas-detalles-door2door').modal('show');
        }
    /*<Events Button Delete # 1 >*/

    /*<Events  Button Update # 2 >*/
       const ButtonUpdateSolicitudes  = ( 
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

            $('#solicitudes-update-idUsuario-door2door').val(idUsuario);
            $('#solicitudes-update-id-door2door').val(idSolicitud);
            $('#solicitudes-update-folio-door2door').val(folio);
            $('#solicitudes-update-usuario-door2door').val(usuario);
            $('#solicitudes-update-nombre-door2door').val(nombres);
            $('#solicitudes-update-apellido-door2door').val(apellido);
            $('#solicitudes-update-tiposocio-door2door').val(tipoPerfil);
            $('#solicitudes-update-estatus-door2door').val(estatus);
            $('#solicitudes-update-Tipo-vehículo-door2door').val(TipoDeVehiculo);
            $('#solicitudes-update-numeroCLABE-door2door').val(numeroCuenta);
           
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
            

            $('#modal-solicitudes-update-door2door').modal('show');
        }
    /*<Events  Button Update # 2 >*/

    /*<Events  Button Delete # 3 >*/
        const ButtonRechazadoSolicitudes  = (idUsuario, folio) => {            
            $('#delete-idUsuario-door2door').val(idUsuario);
            $('#delete-folio-door2door').val(folio);
            $('#delete-comentario-door2door').val('');
            $('#modal-delete-door2door').modal('show');
        }
    /*<Events Button Delete # 1 >*/

     /*<Events  Button Delete # 3 >*/
        const ButtonEliminarSolicitudes  = (idUsuario) => {      

            $('#delete-id-door2door').val(idUsuario);
            $('#modal-delete-door2door').modal('show');

        }
    /*<Events Button Delete # 1 >*/

    
    /*<Events  Button UpdateCampanas # 2 >*/
        const ButtonUpdateCampanas  = ( idCampana, folio, fecha, nombre, descripcion, tipoCampana, descripcionrecoleccion, estatus, NombreSocio, ApellidoSocio) => {


            if( estatus == 'BORRADOR'){
                
                $('#Campana-mostrar-actualizacion').show();
                $('#Campana-button-contactos').show();
                $('#Campana-BOTONES-BORRADOR').show();

                
                $('#Campana-lista-visitas').hide();
                $('#Campana-BOTONES-ABIERTO').hide();
                $('#Campana-mostrar-informacion').hide();

                $("#Campana-update-nombre-door2door").prop('disabled', false);
                $("#Campana-update-descripcion-door2door").prop('disabled', false);
                $("#Campana-update-tipocampana-door2door").prop('disabled', false);
                $("#Campana-update-descripcionrecoleccion-door2door").prop('disabled', false);

            }else{
                
                $('#Campana-mostrar-actualizacion').hide();
                $('#Campana-button-contactos').hide();
                $('#Campana-BOTONES-BORRADOR').hide();
                

                $('#Campana-lista-visitas').show();
                $('#Campana-mostrar-informacion').show();
                $('#Campana-BOTONES-ABIERTO').show();

                $("#Campana-update-nombre-door2door").prop('disabled', true);
                $("#Campana-update-descripcion-door2door").prop('disabled', true);
                $("#Campana-update-tipocampana-door2door").prop('disabled', true);
                $("#Campana-update-descripcionrecoleccion-door2door").prop('disabled', true);
               
            }
            
            let FECHA = fecha.split(' ');

            $('#Campana-update-id-door2door').val(idCampana);
            $('#Campana-update-folio-door2door').val(folio);
            $('#Campana-update-fecha-door2door').val(FECHA[0]);
            $('#Campana-update-nombre-door2door').val(nombre);
            $('#Campana-update-descripcion-door2door').val(descripcion);
            $('#Campana-update-descripcionrecoleccion-door2door').val(descripcionrecoleccion);

            $('#Campana-update-estatus-door2door').val(estatus);
            $('#Campana-update-socio-door2door').val(NombreSocio+' '+ApellidoSocio);


            let Options = '';   

            if(tipoCampana == 'VISITA'){
                Options =   '<option value="VISITA" selected>VISITA</option>'+
                            '<option value="RECOLECCIÓN" >RECOLECCIÓN</option>'+
                            '<option value="COBRANZA" >COBRANZA</option>';
            }else if(tipoCampana == 'RECOLECCIÓN'){ 
                Options =   '<option value="VISITA">VISITA</option>'+
                            '<option value="RECOLECCIÓN" selected>RECOLECCIÓN</option>'+
                            '<option value="COBRANZA" >COBRANZA</option>';
            }else if(tipoCampana == 'COBRANZA'){ 
                Options =   '<option value="VISITA">VISITA</option>'+
                            '<option value="RECOLECCIÓN" >RECOLECCIÓN</option>'+
                            '<option value="COBRANZA" selected>COBRANZA</option>';
            }

            $('#Campana-update-tipocampana-door2door').html(Options);   

            $('#Campana-modal-update-door2door').modal('show');
        }
    /*<Events  Button UpdateCampanas # 2 >*/

    /*<Events  Button DeleteCampanas # 3 >*/
        const ButtonEliminarCampanas  = (id) => {            
            $('#Campana-delete-id-door2door').val(id);
            $('#Campana-delete-comentario-door2door').val('');
            $('#Campana-modal-delete-door2door').modal('show');
        }
    /*<Events Button DeleteCampanas # 1 >*/

    /*<Events  Button Campana # 3 >*/
        const ButtonEliminarContactosCampanas  = (id) => {            
            $('#Campana-delete-contacto-id-door2door').val(id);
            $('#Campana-modal-delete-contacto-door2door').modal('show');
        }
    /*<Events Button Delete # 1 >*/

    /*<Events  Button Delete # 3 >*/
        const ButtonReaunudarCampanas  = (id) => {            
            $('#Campana-reanudar-id-door2door').val(id);
            $('#Campana-modal-reanudar-door2door').modal('show');
        }
    /*<Events Button Delete # 1 >*/

    /*<Events  Button Delete # 3 >*/
        const ButtonDetalleVisitaCampanas  = (
                                        SocioVisitador,
                                        calle,
                                        codigoPostal,
                                        colonia,
                                        deuda,
                                        estatus,
                                        fecha,
                                        noExterior,
                                        noInterior,
                                        nombre,
                                        telefono,
                                        email
                                    ) => {    
                                        console.log("sdf")
            $('#Campana-modal-detalle-visita-door2door').modal('show');
            $('#Campana-detalle-nombre-door2door').val(nombre);
            $('#Campana-detalle-domiciliop-door2door').val(colonia+' '+calle+' '+noExterior+' '+noInterior+' '+codigoPostal);
            $('#Campana-detalle-telefono-door2door').val(telefono);
            $('#Campana-detalle-email-door2door').val(email);
            $('#Campana-detalle-deuda-door2door').val(deuda);
            $('#Campana-detalle-estatus-door2door').val(estatus);
            $('#Campana-detalle-Comentarios-door2door').val('SIN COMENTARIO');
            $('#Campana-detalle-socios-door2door').val(SocioVisitador);
            $('#Campana-detalle-fecha-door2door').val(fecha);
            

          
        }
    /*<Events Button Delete # 1 >*/




    
  
</script>