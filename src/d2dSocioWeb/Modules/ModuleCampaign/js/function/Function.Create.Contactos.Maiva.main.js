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
    import CreateMasivaAPI        from '../API/API.Create.Contactos.Masiva.main.js';
    import SelectFull       from '../API/API.SelectFull.Contactos.main.js';
    import functionShow     from './Function.Show.Contactos.main.js';
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    

/*<Create>*/           
    const Create = async() => { 
        /*<CARGAR SHOW>*/
            $('#id-main').addClass('opacidad');
            $('#body-main-div').show();
            $('#body-main-div').addClass('body-main');
        /*</CARGAR SHOW>*/
        
        /*<Captura>*/
            let idCampana               =   $('#update-id-door2door').val();
            var fileInput               = document.getElementById('create-cargar-plantilla-door2door');
            var filePath                = fileInput.value;
        /*</Captura>*/

        var allowedExtensions = /(.csv)$/i;
        if(allowedExtensions.exec(filePath) && idCampana > 0){
            /*<ENVIAR INFORMACION>*/
                /*<INFORMACION>*/
                    let PlataformaForm = new FormData(document.getElementById("form-cargar-contactos-door2door")); 
                    PlataformaForm.append("idCampana",idCampana); 
                /*</INFORMACION>*/
                console.log("=>")
                const ResultCreateAPI= CreateMasivaAPI( PlataformaForm ).
                then((result) => {   console.log("=[") ; console.log(result)          
                    if(result.message == 'Good'){ 
                        
                        /*<CARGAR HIDE>*/
                            $('#id-main').removeClass('opacidad');
                            $('#body-main-div').removeClass('body-main');
                            $('#body-main-div').hide();
                        /*</CARGAR HIDE>*/

                        let respuestaContactos  = result.RESPUESTA_INSERTAR_TODOS;
                        let record              = '';
                        
                        if(respuestaContactos.length > 0){
                           record  = '<button class="btn btn-secondary btn-block descargar-contactos-malos" >DATOS INVALIDOS</button>';
                            const eventoRes = setTimeout(() => {
                                $('.descargar-contactos-malos').on('click',  () => {
                                    //comprobamos compatibilidad
                                    let ar = respuestaContactos;
                                    if(window.Blob && (window.URL || window.webkitURL)){
                                        var contenido = "",
                                            d = new Date(),
                                            blob,
                                            reader,
                                            save,
                                            clicEvent;
                                        //creamos contenido del archivo
                                        for (var i = 0; i < ar.length; i++) {
                                            //construimos cabecera del csv
                                            if(
                                                    respuestaContactos[i].message == 'GEOLOCALIZACION'      ||
                                                    respuestaContactos[i].message == 'CONTACTO REPETIDO'    ||
                                                    respuestaContactos[i].message == 'FALTAN DATOS'         ||
                                                    respuestaContactos[i].message == 'PAIS-ESTADO-MUNICIOPIO NO LOCALIZADO'      
                                                ){
                                                    if (i == 0)
                                                        contenido += Object.keys(ar[i]).join(";") + "\n";
                                                    //resto del contenido
                                                    contenido += Object.keys(ar[i]).map(function(key){
                                                                    return ar[i][key];
                                                            }).join(";") + "\n";
                                            }
                                        }
                                        //creamos el blob
                                        blob =  new Blob(["\ufeff", contenido], {type: 'text/csv'});
                                        //creamos el reader
                                        var reader = new FileReader();
                                        reader.onload = function (event) {
                                            //escuchamos su evento load y creamos un enlace en dom
                                            save = document.createElement('a');
                                            save.href = event.target.result;
                                            save.target = '_blank';
                                            //aquí le damos nombre al archivo
                                            save.download = "DATOS_INVALIDOS.csv";
                                            try {
                                                //creamos un evento click
                                                clicEvent = new MouseEvent('click', {
                                                    'view': window,
                                                    'bubbles': true,
                                                    'cancelable': true
                                                });
                                            } catch (e) {
                                                //si llega aquí es que probablemente implemente la forma antigua de crear un enlace
                                                clicEvent = document.createEvent("MouseEvent");
                                                clicEvent.initEvent('click', true, true);
                                            }
                                            //disparamos el evento
                                            save.dispatchEvent(clicEvent);
                                            //liberamos el objeto window.URL
                                            (window.URL || window.webkitURL).revokeObjectURL(save.href);
                                        }
                                        //leemos como url
                                        reader.readAsDataURL(blob);
                                    }else {
                                        //el navegador no admite esta opción
                                        alert("Su navegador no permite esta acción");
                                    }
                                });
                            },500)        
                        }
                        /*<Respuesta>*/
                            $('#message-succes-door2door').html("");
                            $('#message-succes-door2door').html(
                                'CREACIÓN EXITOSA<br>'+record
                               );
                            $('#modal-message-succes-door2door').modal('show');                             
                            $('#modal-cargar-contactos-door2door').modal('hide'); 
                        /*</Respuesta>*/     

                        
                        console.log("################");

                        /*<Consultar toda la iformacion>*/ 
                            let idCampana = $('#update-id-door2door').val();
                            const functionSFA = SelectFull(idCampana).
                            then( (result) => {       console.log(result)
                                if(result){                                                                    
                                    if(result.message == 'Good'){
                                        /*<Consulta exitosa>*/
                                            let ArraysRoles = [];
                                            ArraysRoles = result.information;                                 
                                            const functionS = functionShow(ArraysRoles);  

                                            $('#create-contactos-nombre-door2door').val('');
                                            $('#create-contactos-calle-door2door').val('');
                                            $('#create-contactos-telefono-door2door').val('');
                                            $('#create-contactos-noexterior-door2door').val('');
                                            $('#create-contactos-nointerior-door2door').val('');
                                            $('#create-contactos-codigopostal-door2door').val('');
                                            $('#create-contactos-colonia-door2door').val('');
                                            $('#create-contactos-deuda-door2door').val('');
                                        /*<Consulta exitosa>*/                        
                                        /*<CARGAR HIDE>*/
                                            $('#id-main').removeClass('opacidad');
                                            $('#body-main-div').removeClass('body-main');
                                            $('#body-main-div').hide();
                                        /*</CARGAR HIDE>*/
                                    }else{
                                        /*<CARGAR HIDE>*/
                                            $('#id-main').removeClass('opacidad');
                                            $('#body-main-div').removeClass('body-main');
                                            $('#body-main-div').hide();
                                        /*</CARGAR HIDE>*/
                                        /*<warning de query>*/ 
                                            $('#message-warning-door2door').html("");
                                            $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                            $('#modal-message-warning-door2door').modal('show');
                                        /*</warning de query>*/   
                                    }       
                                }                           
                            }).catch( (err) => {   
                                /*<CARGAR HIDE>*/
                                    $('#id-main').removeClass('opacidad');
                                    $('#body-main-div').removeClass('body-main');
                                    $('#body-main-div').hide();
                                /*</CARGAR HIDE>*/                                      
                                /*<warning desconocido>*/
                                    $('#message-warning-door2door').html("");
                                    $('#message-warning-door2door').html('¡warning AL RECARGAR LA PAGUINA!');
                                    $('#modal-message-warning-door2door').modal('show');
                                /*<warning desconocido>*/
                            });
                        /*<Consultar toda la iformacion>*/                                                            
                    }else if(result.message == 'MAS DE 500 REGUISTROS'){ 
                        /*<CARGAR HIDE>*/
                            $('#id-main').removeClass('opacidad');
                            $('#body-main-div').removeClass('body-main');
                            $('#body-main-div').hide();
                        /*</CARGAR HIDE>*/
                        /*<Respuesta>*/
                            $('#message-warning-door2door').html('');
                            $('#message-warning-door2door').html('¡EL ARCHIVO TIENE MAS DE 500 REGISTROS!');
                            $('#modal-message-warning-door2door').modal('show');
                        /*</Respuesta>*/
                    }else{ 
                        /*<CARGAR HIDE>*/
                            $('#id-main').removeClass('opacidad');
                            $('#body-main-div').removeClass('body-main');
                            $('#body-main-div').hide();
                        /*</CARGAR HIDE>*/
                        /*<Respuesta>*/
                            $('#message-warning-door2door').html('');
                            $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!');
                            $('#modal-message-warning-door2door').modal('show');
                        /*</Respuesta>*/
                    }                           
                }).catch( (err) => { 
                    /*<CARGAR HIDE>*/
                        $('#id-main').removeClass('opacidad');
                        $('#body-main-div').removeClass('body-main');
                        $('#body-main-div').hide();
                    /*</CARGAR HIDE>*/
                    /*<Respuesta>*/
                        $('#message-warning-door2door').html('');
                        $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE! warning AL CREAR.');
                        $('#modal-message-warning-door2door').modal('show');
                    /*</Respuesta>*/
                });   

            /*</ENVIAR INFORMACION>*/   
        }else{
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
            $('#message-warning-door2door').html("");
            $('#message-warning-door2door').html('¡SOLO SE ADMITEN ARCHIVOS CSV!');
            $('#modal-message-warning-door2door').modal('show');
        }
    }
    /*<export>*/

 
  
    
        export default Create;
    /*</export>*/
/*</Create>*/  
