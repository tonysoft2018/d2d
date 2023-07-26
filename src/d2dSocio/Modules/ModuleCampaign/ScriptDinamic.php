<script>

    /*<Events  Button ButtonUpdate # 2 >*/
        const ButtonUpdate  = ( idCampana, folio, fecha, nombre, descripcion, tipoCampana, descripcionrecoleccion, estatus, NombreSocio, ApellidoSocio) => {


            if( estatus == 'BORRADOR'){
                
                $('#mostrar-actualizacion').show();
                $('#button-contactos').show();
                $('#BOTONES-BORRADOR').show();

                
                $('#lista-visitas').hide();
                $('#BOTONES-ABIERTO').hide();
                $('#mostrar-informacion').hide();

                $("#update-nombre-door2door").prop('disabled', false);
                $("#update-descripcion-door2door").prop('disabled', false);
                $("#update-tipocampana-door2door").prop('disabled', false);
                $("#update-descripcionrecoleccion-door2door").prop('disabled', false);

            }else{
                
                $('#mostrar-actualizacion').hide();
                $('#button-contactos').hide();
                $('#BOTONES-BORRADOR').hide();
                

                $('#lista-visitas').show();
                $('#mostrar-informacion').show();
                $('#BOTONES-ABIERTO').show();

                $("#update-nombre-door2door").prop('disabled', true);
                $("#update-descripcion-door2door").prop('disabled', true);
                $("#update-tipocampana-door2door").prop('disabled', true);
                $("#update-descripcionrecoleccion-door2door").prop('disabled', true);
               
            }
            
            let FECHA = fecha.split(' ');

            $('#update-id-door2door').val(idCampana);
            $('#update-folio-door2door').val(folio);
            $('#update-fecha-door2door').val(FECHA[0]);
            $('#update-nombre-door2door').val(nombre);
            $('#update-descripcion-door2door').val(descripcion);
            $('#update-descripcionrecoleccion-door2door').val(descripcionrecoleccion);

            $('#update-estatus-door2door').val(estatus);
            $('#update-socio-door2door').val(NombreSocio+' '+ApellidoSocio);


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

            $('#update-tipocampana-door2door').html(Options);   

            $('#modal-update-door2door').modal('show');
        }
    /*<Events  Button ButtonUpdate # 2 >*/


    
    /*<Events  Button ButtonCancelar # 3 >*/
        const ButtonCancelar = (id) => {            
            $('#cancelacion-id-door2door').val(id);
            $('#cancelacion-comentario-door2door').val('');
            $('#modal-cancelacion-door2door').modal('show');
        }
    /*<Events Button ButtonCancelar # 1 >*/
    
    /*<Events  Button ButtonEliminar # 3 >*/
        const ButtonCerrar = (id) => {            
            $('#cerrar-id-door2door').val(id);
            $('#cerrar-comentario-door2door').val('');
            $('#modal-cerrar-door2door').modal('show');
        }
    /*<Events Button ButtonEliminar # 1 >*/

    /*<Events  Button ButtonEliminarContactos # 3 >*/
        const ButtonEliminarContactos  = (id) => {            
            $('#delete-contacto-id-door2door').val(id);
            $('#modal-delete-contacto-door2door').modal('show');
        }
    /*<Events Button ButtonEliminarContactos # 1 >*/

    /*<Events  Button ButtonReaunudar # 3 >*/
        const ButtonReaunudar  = (id) => {            
            $('#reanudar-id-door2door').val(id);
            $('#modal-reanudar-door2door').modal('show');
        }
    /*<Events Button ButtonReaunudar # 1 >*/

    /*<Events  Button ButtonPausar # 3 >*/
        const ButtonPausar  = (id) => {            
            $('#pausar-id-door2door').val(id);
            $('#modal-pausar-door2door').modal('show');
        }
    /*<Events Button ButtonPausar # 1 >*/
     

    /*<Events  Button ButtonDetalleVisita # 3 >*/
        const ButtonDetalleVisita  = (
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
                                        $('#modal-detalle-visita-door2door').modal('show');
            $('#detalle-nombre-door2door').val(nombre);
            $('#detalle-domiciliop-door2door').val(colonia+' '+calle+' '+noExterior+' '+noInterior+' '+codigoPostal);
            $('#detalle-telefono-door2door').val(telefono);
            $('#detalle-email-door2door').val(email);
            $('#detalle-deuda-door2door').val(deuda);
            $('#detalle-estatus-door2door').val(estatus);
            $('#detalle-Comentarios-door2door').val('SIN COMENTARIO');
            $('#detalle-socios-door2door').val(SocioVisitador);
            $('#detalle-fecha-door2door').val(fecha);
            

          
        }
    /*<Events Button ButtonDetalleVisita # 1 >*/


    

    
</script>