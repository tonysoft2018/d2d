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
 
    /*<Events  Button ButtonEditarContactos # 2 >*/
        const ButtonMostrarMapa = ( 
                                    latitud, 
                                    longitud,
                                    calle,
                                    noExterior,
                                    colonia,
                                    codigoPostal,
                                    idMunicipio,
                                    idEstado, 
                                    idPais
                                    
                                )=>{
            $('#show-latitud-door2door').val(latitud);
            $('#show-logitud-door2door').val(longitud);
            
            let ArraysPaises      = JSON.parse(localStorage.getItem('JSON_CAMPANA_PAISES')); 
            let ArraysEstados     = JSON.parse(localStorage.getItem('JSON_CAMPANA_ESTADOS'));  
            let ArraysMunicipio   = JSON.parse(localStorage.getItem('JSON_CAMPANA_MUNICIPIOS'));    

            /*<PAISES>*/
                let camposPaise          =  `<option value="0"   > -- SELEECCIONAR -- </option> `;
                for(let i = 0; i<ArraysPaises.length; i++){
                    if(ArraysPaises[i].idPais == idPais){
                        camposPaise +=   `<option value="${ArraysPaises[i].idPais}" selected  > ${ArraysPaises[i].nombre} </option> `;     
                        PaisMostrar = ArraysPaises[i].nombre;
                    }else{
                        camposPaise +=   `<option value="${ArraysPaises[i].idPais}"   > ${ArraysPaises[i].nombre} </option> `;     
                    }                                                  
                }   
                $('#actualizar-contactos-pais-door2door').html(camposPaise);    
            /*</PAISES>*/

            /*<ESTADOS>*/
                let camposEstados         =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                for(let i = 0; i<ArraysEstados.length; i++){
                    if(ArraysEstados[i].idPais  == idPais ){
                        if(ArraysEstados[i].idEstado == idEstado){
                            camposEstados +=   `<option value="${ArraysEstados[i].idEstado}"  selected > ${ArraysEstados[i].nombre} </option> `;     
                            EstadoMostrar = ArraysEstados[i].nombre;
                        } else{
                            camposEstados +=   `<option value="${ArraysEstados[i].idEstado}"   > ${ArraysEstados[i].nombre} </option> `;     
                        }   
                    }                                               
                }   
                $('#actualizar-contactos-estado-door2door').html(camposEstados);    
            /*</ESTADOS>*/

            /*<MUNISIPIOS>*/
                let camposMunicipios        =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                for(let i = 0; i<ArraysMunicipio.length; i++){
                    if(ArraysMunicipio[i].idEstado  == idEstado  ){
                        if(ArraysMunicipio[i].idMunicipio == idMunicipio){
                            camposMunicipios +=   `<option value="${ArraysMunicipio[i].idMunicipio}"  selected > ${ArraysMunicipio[i].nombre} </option> `;     
                            MunicipioMostrar = ArraysMunicipio[i].nombre;
                        } else{
                            camposMunicipios +=   `<option value="${ArraysMunicipio[i].idMunicipio}"   > ${ArraysMunicipio[i].nombre} </option> `;     
                        }   
                    }                                               
                }   
                $('#actualizar-contactos-municipio-door2door').html(camposMunicipios);    
            /*</MUNISIPIOS>*/

            let Direccion = calle+'  '+noExterior+', '+colonia+',  '+MunicipioMostrar+', '+EstadoMostrar+', '+PaisMostrar+' '+codigoPostal;
            $('#update-direccion-mostrar-door2door').val(Direccion);

            setTimeout(() => {
                $('#modal-contactos-door2door').modal('hide');
                setTimeout(() => {
                    $('#modal-update-door2door').modal('hide');
                    setTimeout(() => {
                        $('#modal-mapa-door2door').modal('show');            
                    }, 400);
                }, 400);
            }, 400);
                   
            
            
        }

        const ButtonEditarContactos  = ( 
                                        idContacto,
                                        nombre,
                                        calle,
                                        noInterior,
                                        noExterior,
                                        codigoPostal,
                                        colonia,
                                        idMunicipio,
                                        idEstado,
                                        idPais,
                                        entreCalle,
                                        latitud,
                                        longitud,
                                        instrucciones,
                                        telefono,
                                        email
                                    ) => {

            let PaisMostrar = '';
            let EstadoMostrar = '';
            let MunicipioMostrar = '';
            $('#actualizar-latitud-door2door').val(latitud);
            $('#actualizar-logitud-door2door').val(longitud);

            

            $('#actualizar-contactos-id-door2door').val(idContacto);
            $('#actualizar-contactos-nombre-door2door').val(nombre);
            $('#actualizar-contactos-calle-door2door').val(calle);
            $('#actualizar-contactos-colonia-door2door').val(colonia);
            $('#actualizar-contactos-noexterior-door2door').val(noExterior);
            $('#actualizar-contactos-nointerior-door2door').val(noInterior);
            $('#actualizar-contactos-codigopostal-door2door').val(codigoPostal);
            $('#actualizar-contactos-entreCalle-door2door').val(entreCalle);
            $('#actualizar-contactos-instrucciones-door2door').val(instrucciones);
            $('#actualizar-contactos-telefono-door2door').val(telefono);
            $('#actualizar-contactos-email-door2door').val(email);

            let ArraysPaises      = JSON.parse(localStorage.getItem('JSON_CAMPANA_PAISES')); 
            let ArraysEstados     = JSON.parse(localStorage.getItem('JSON_CAMPANA_ESTADOS'));  
            let ArraysMunicipio   = JSON.parse(localStorage.getItem('JSON_CAMPANA_MUNICIPIOS'));    

            /*<PAISES>*/
                let camposPaise          =  `<option value="0"   > -- SELEECCIONAR -- </option> `;
                for(let i = 0; i<ArraysPaises.length; i++){
                    if(ArraysPaises[i].idPais == idPais){
                        camposPaise +=   `<option value="${ArraysPaises[i].idPais}" selected  > ${ArraysPaises[i].nombre} </option> `;     
                        PaisMostrar = ArraysPaises[i].nombre;
                    }else{
                        camposPaise +=   `<option value="${ArraysPaises[i].idPais}"   > ${ArraysPaises[i].nombre} </option> `;     
                    }                                                  
                }   
                $('#actualizar-contactos-pais-door2door').html(camposPaise);    
            /*</PAISES>*/

            /*<ESTADOS>*/
                let camposEstados         =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                for(let i = 0; i<ArraysEstados.length; i++){
                    if(ArraysEstados[i].idPais  == idPais ){
                        if(ArraysEstados[i].idEstado == idEstado){
                            camposEstados +=   `<option value="${ArraysEstados[i].idEstado}"  selected > ${ArraysEstados[i].nombre} </option> `;     
                            EstadoMostrar = ArraysEstados[i].nombre;
                        } else{
                            camposEstados +=   `<option value="${ArraysEstados[i].idEstado}"   > ${ArraysEstados[i].nombre} </option> `;     
                        }   
                    }                                               
                }   
                $('#actualizar-contactos-estado-door2door').html(camposEstados);    
            /*</ESTADOS>*/

            /*<MUNISIPIOS>*/
                let camposMunicipios        =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                for(let i = 0; i<ArraysMunicipio.length; i++){
                    if(ArraysMunicipio[i].idEstado  == idEstado  ){
                        if(ArraysMunicipio[i].idMunicipio == idMunicipio){
                            camposMunicipios +=   `<option value="${ArraysMunicipio[i].idMunicipio}"  selected > ${ArraysMunicipio[i].nombre} </option> `;     
                            MunicipioMostrar = ArraysMunicipio[i].nombre;
                        } else{
                            camposMunicipios +=   `<option value="${ArraysMunicipio[i].idMunicipio}"   > ${ArraysMunicipio[i].nombre} </option> `;     
                        }   
                    }                                               
                }   
                $('#actualizar-contactos-municipio-door2door').html(camposMunicipios);    
            /*</MUNISIPIOS>*/
            let Direccion = calle+' '+noExterior+', '+colonia+', '+codigoPostal+' '+MunicipioMostrar+', '+EstadoMostrar+', '+PaisMostrar;
      
            $('#update-direccion-mostrar-door2door').val(Direccion);

            $('#detalles-contactos-nombre-door2door').val(nombre);
            $('#detalles-contactos-telefono-door2door').val(telefono);
            $('#detalles-contactos-email-door2door').val(email);

            $('#visita-contactos-nombre-door2door').val(nombre);

           


            let idContactos = $('#actualizar-contactos-id-door2door').val();
            let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
            
            $.ajax({
                url: "/d2dSocioWeb/Modules/ModuleCampaign/api/door2door.controller.select.full.visitas.php",
                type: 'post',
                async: false,
                dataType: "json",
                data: { 
                    TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                    idContactos:idContactos 
                }        
            }).
            then((result) => {    
                if(result){
                    if(result.message == 'Good'){
                        
                        let Information     = result.information; 
                        let record          = '';
                        let TableBody       = ''; 
                        
                        localStorage.setItem('JSON_VISITAS', JSON.stringify(Information)); 
                        
                        for(let i = 0; i < Information.length; i++ ){
                         
                            let FECHA           = Information[i].fecha.split(' ');     
          
                            record = `
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Comentario</label>
                                            <textarea   class="form-control" 
                                                        id="create-descripcion-door2door" 
                                                        name="create-descripcion-door2door" 
                                                        placeholder="Descripción" rows="4">
                                            ${Information[i].comentarios_Visitador}
                                            </textarea>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" 
                                                class="btn btn-warning btn-block" 
                                                onclick="ButtonMostrarVisita( 
                                                            ${i},
                                                        '${Information[i].NombreVisitado}', 
                                                        '${Information[i].ApellidosVisitado}',
                                                        '${Information[i].comentarios_Visitador}', 
                                                        '${Information[i].estatus}', 
                                                        '${Formato(FECHA[0])}' 
                                                    );" 
                                                >
                                                    Visita
                                        </button>
                                    </div>
                                </div>                                           
                                <br>
                            `;
                            TableBody += record;    
                        
                        }
                    
                        $('#visita-contacto').html(TableBody)   

                    }
                }
            });       
            
            $('#modal-contactos-actualizar-door2door').modal('show');                            

        }
    /*</Events  Button ButtonEditarContactos # 2 >*/
    
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
    
    /*<Events  Button ButtonPausar # 3 >*/
         const ButtonAbrir  = (id) => {            
            $('#abrir-id-door2door').val(id);
            $('#modal-abrir-door2door').modal('show');
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

   /*<Events Button ButtonMostrarVisita # 1 >*/

    const  ButtonMostrarVisita = ( 
            identifiador,
            NombreVisitado, 
            ApellidosVisitado,
            comentarios_Visitador, 
            estatus,
            fecha 
        ) => {
        let Arreglo     = JSON.parse(localStorage.getItem('JSON_VISITAS'));
        let Evidenicas  = Arreglo[identifiador].evidencias;

        let Campo = '';

        for(let i = 0; i < 5; i++ ){

            
            let ArchivoHtml             = '';
            let ArchivoHtmlEnvio        = '';
            let Direccion               = Evidenicas[i].archivo;
            let ArregloExtencion        = Evidenicas[i].archivo.split('.');

            let  tamano          = ArregloExtencion.length;
            tamano = tamano -1;

            if(
                    ArregloExtencion[tamano] == 'mp3' ||
                    ArregloExtencion[tamano] == 'ogg' ||
                    ArregloExtencion[tamano] == 'wav' 
                ){
                    if(ArregloExtencion[tamano] == 'mp3'){
                        ArchivoHtml = `
                            <audio controls  src=\"${Direccion}\" type=\"audio/mp3\" controls  loop ></audio>
                        `;
                        ArchivoHtmlEnvio    = `
                            <audio controls  src=\"${Direccion}\" type=\"audio/mp3\" controls  loop ></audio>
                        `;
                    }else if(ArregloExtencion[tamano] == 'ogg'){
                        ArchivoHtml = `
                                <audio controls  src=\"${Direccion}\" type=\"audio/ogg\" controls  loop ></audio>
                        `;
                        ArchivoHtmlEnvio    = `
                                <audio controls  src=\"${Direccion}\" type=\"audio/ogg\" controls  loop ></audio>
                        `;
                    }else if(ArregloExtencion[tamano] == 'wav'){
                        ArchivoHtml = `
                                <audio controls  src=\"${Direccion}\" type=\"audio/wav\" controls  loop ></audio>
                        `;
                        ArchivoHtmlEnvio    = `
                                <audio controls  src=\"${Direccion}\" type=\"audio/wav\" controls  loop ></audio>
                        `;
                    }

               
            }else if(
                        ArregloExtencion[tamano] == 'png' ||
                        ArregloExtencion[tamano] == 'jpg' ||
                        ArregloExtencion[tamano] == 'jpeg' 
                    ){
                    ArchivoHtml = `
                                <img src=\"${Direccion}\"  style=\"width:200px;height:200px;\"class=\"\">
                     `;

                    ArchivoHtmlEnvio    = `
                                <img src=\"${Direccion}\"   class="img-fluid">
                    `;
            }else if(
                    ArregloExtencion[tamano] == 'mp4'  ||
                    ArregloExtencion[tamano] == 'webm' ||
                    ArregloExtencion[tamano] == 'ogv' 
                    ){
                    ArchivoHtml         = `
                             <video src="${Direccion}"  width=\"300\" height="\"250\" controls ></video>
                    `;
                    ArchivoHtmlEnvio    = `
                             <video src=\"${Direccion}\"  width=\"640\" height=\"480\" controls></video>
                    `;
            }else{
               
                $('#message-error-door2door').html("");
                $('#message-error-door2door').html('¡ERROR TU ARCHVIO NO ES FORMATO COMPATIBLE!<BR> ');
                $('#modal-message-error-door2door').modal('show');

                ArchivoHtml         = '<img src=\"/door2door/Modules/ModulesImage/imagen.jpg\"  style=\"width:200px;height:200px;\" class=\"\">';
                ArchivoHtmlEnvio    = '<img src=\"/door2door/Modules/ModulesImage/imagen.jpg\"   class="img-fluid">';
            }

            Campo += `
                                       
                <div class="row cursor"   
                        onclick="ButtonMostrarDetalleEvidencia( '${Evidenicas[i].tipoArchivo}', '${btoa(ArchivoHtmlEnvio)}' );">
                    <div class="col-sm-12">
                        <center>
                            <div class="form-group">
                            <label for="">${Evidenicas[i].tipoArchivo}</label><br>
                            ${ArchivoHtml}
                            </div>
                        <center>
                    </div>
                </div> 
            `;
        }

        $('#visita-contacto-evidencias').html(Campo);   

        $('#visita-contactos-identifiador-door2door').val(identifiador);    
        $('#visita-contactos-sociovistador-door2door').val(NombreVisitado+' '+ApellidosVisitado);
        $('#visita-contactos-estatus-door2door').val(estatus);
        $('#visita-contactos-fechavisita-door2door').val(fecha);

        /*<REOLECION DE VISITAS>*/

        /*<REOLECION DE VISITAS>*/
        
        $('#modal-contactos-visita-door2door').modal('show');
    }

    const  ButtonMostrarDetalleEvidencia = ( tipoArchivo, ArchivoHtmlEnvio ) => {

        let Archivo = atob(ArchivoHtmlEnvio);

        $('#visita-contacto-evidencias-titulo').val(tipoArchivo);    
        $('#visita-contacto-evidencias-detalles').html(Archivo);

        $('#modal-update-door2door').modal('hide');
        $('#modal-contactos-door2door').modal('hide');
        $('#modal-contactos-actualizar-door2door').modal('hide');
        $('#modal-contactos-detalles-door2door').modal('hide');
        $('#modal-contactos-visita-door2door').modal('hide');
        setTimeout(() => {
            $('#modal-contactos-visita-detalle-door2door').modal('show');
        },700);
        
       

    }

    const  Formato = (texto) =>{
        return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
    }

    
</script>