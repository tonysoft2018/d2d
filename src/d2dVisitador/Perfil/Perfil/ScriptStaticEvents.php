<script >

       
    
</script>

<script type="module">
    /*<import librarys>*/ 
        import functionCreate                       from './js/function/Function.Crear.main.js';  
        import functionConsult                      from './js/API/API.SelectFull.main.js';  
        import functionSelectFullPaisAPI            from '../../../door2door/Modules/ModuleCatalogsPaises/js/API/API.SelectFull.main.js';
        import functionSelectFullEstadoAPI          from '../../../door2door/Modules/ModuleCatalogsEstados/js/API/API.SelectFull.main.js';
        import functionSelectFullMunisipioPI        from '../../../door2door/Modules/ModuleCatalogsMunicipioD/js/API/API.SelectFull.main.js';
        import functionSelectFulltiposVehiculooPI   from '../../../door2door/Modules/ModuleCatalogsVehicles/js/API/API.SelectFull.main.js';
        import TarjetaBancaria                      from './js/function/Function.TarjetaBancaria.main.js'; 
        import TipoVehiculo                         from './js/function/Function.TipoVehiculo.main.js'; 
        import Contrato                             from './js/API/API.Contrato.main.js'; 
    /*<import librarys>*/ 

    let array = JSON.parse(localStorage.getItem('JSON_LOCALIZACION'));
   

        setTimeout(() => {      
             /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/   

        
                if (window.localStorage.getItem('JSON_LOCALIZACION') !== undefined && window.localStorage.getItem('JSON_LOCALIZACION') ) {
                    let Arrays = JSON.parse(localStorage.getItem('JSON_LOCALIZACION'));  
                    /*<EXISTE JSON_LOCALIZACION>*/  
                        if( (Arrays.lat > 0  ||  Arrays.lat < 0 ) &&  (Arrays.lng > 0 ||  Arrays.lng < 0 )  ){
                            console.log({lat: Arrays.lat, lng: Arrays.lng})
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
                            /*<MOSTRAR MENSAJE>*/
                                $('#message-geolocalizacion-door2door').html("");
                                $('#message-geolocalizacion-door2door').html(`GEOLOCALIZACIÓN NO DISPONIBLE \n <br> 
                                                                                . LE RECOMENDAMOS REINICIAR LA APLICACIÓN \n <br>
                                                                                . INTENTE MOVERSE DE SU POSICIÓN \n <br>
                                                                                . PRESIONE RECARGAR
                                                                            `);
                                $('#modal-message-geolocalizacion-door2door').modal('show');
                            /*</MOSTRAR>*/

                    /*</NO EXISTE JSON_LOCALIZACION>*/ 
                    
                        }       
                    /*<EXISTE JSON_LOCALIZACION/>*/             
               
            }           
        }, 1500);


    $(document).ready(() =>{  

        /*<Main Module Roles>*/     

            /*<Main>*/
                const ResultMain = Main();
            /*</Main>*/
        
            /*<Consultar pais>*/ 
                const functionSFAP = functionSelectFullPaisAPI().
                then( (result) => {   console.log(result)  ;
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysPaises = [];
                                ArraysPaises = result.information;   

                                let Option = ``;
                                let Options = `<option value="0"  selected > -- SELEECCIONAR -- </option> `;;
                                for(let i = 0; i<ArraysPaises.length; i++ ){
                                    Option = '<option value="'+ArraysPaises[i].idPais+'"  >'+ArraysPaises[i].nombre+'</option>';
                                    Options += Option;             
                                }
                                $('#create-pais-door2door').html(Options);

                                
                            /*<Consulta exitosa>*/                        
                        }else{
                           /*<Error de query>*/ 
                                $('#message-error-door2door').html("");
                                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-error-door2door').modal('show');
                            /*</Error de query>*/  
                        }       
                    }                           
                }).catch( (err) => { 
                    /*<Error de query>*/ 
                        $('#message-error-door2door').html("");
                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                        $('#modal-message-error-door2door').modal('show');
                    /*</Error de query>*/  
                });
            /*<Consultar pais>*/ 

            /*<create-pais-door2door>*/               
                $('#create-pais-door2door').on('change', () =>{ 

                    let idPais = $('#create-pais-door2door').val();

                    const functionSFA3 = functionSelectFullEstadoAPI().
                    then( (result) => {   console.log("Estados => ");        console.log(result)
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                    let ArraysEstados = [];
                                    ArraysEstados = result.information;           
                                    let campos  =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                    for(let i = 0; i<ArraysEstados.length; i++){
                                        if(idPais == ArraysEstados[i].idPais){
                                            campos +=   `<option value="${ArraysEstados[i].idEstado}"   > ${ArraysEstados[i].nombre} </option> `;      
                                        }                                                                         
                                    }            
                                    $('#create-estado-door2door').html(campos);     
                                
                                /*<Consulta exitosa>*/                        
                            }else{
                            /*<Error de query>*/ 
                                    $('#message-error-door2door').html("");
                                    $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                    $('#modal-message-error-door2door').modal('show');
                                /*</Error de query>*/  
                            }       
                        }                           
                    }).catch( (err) => { 
                        /*<Error de query>*/ 
                            $('#message-error-door2door').html("");
                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                            $('#modal-message-error-door2door').modal('show');
                        /*</Error de query>*/  
                    });    
                }); 
            /*</create-pais-door2door>*/                

            /*<create-estado-door2door>*/
                $('#create-estado-door2door').on('change', () =>{ 

                    let idEstado = $('#create-estado-door2door').val();

                    const functionSFA4 = functionSelectFullMunisipioPI().
                    then( (result) => {      console.log("Municipios => ");      console.log(result)
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                    let ArraysMunicipios = [];
                                    ArraysMunicipios = result.information;           
                                    let campos  =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                    for(let i = 0; i<ArraysMunicipios.length; i++){
                                        if(idEstado == ArraysMunicipios[i].idEstado){
                                            campos +=   `<option value="${ArraysMunicipios[i].idMunicipio}"   > ${ArraysMunicipios[i].nombre} </option> `;    
                                        }                                                                            
                                    }              
                                    $('#create-municipio-door2door').html(campos);     
                                
                                /*<Consulta exitosa>*/                        
                            }else{
                            /*<Error de query>*/ 
                                    $('#message-error-door2door').html("");
                                    $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                    $('#modal-message-error-door2door').modal('show');
                                /*</Error de query>*/  
                            }       
                        }                           
                    }).catch( (err) => { 
                        /*<Error de query>*/ 
                            $('#message-error-door2door').html("");
                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                            $('#modal-message-error-door2door').modal('show');
                        /*</Error de query>*/  
                    });
                  
                });                  
            /*</create-estado-door2door>*/
            
          
            $('#form-face-segunda-door2door').hide();
            $('#form-face-tercera-door2door').hide();
            $('#form-face-cuarta-door2door').hide();
            $('#form-face-quinta-door2door').hide();
            $('#form-face-sexta-door2door').hide();
            $('#form-face-septima-door2door').hide();
            $('#form-face-octavo-door2door').hide();


            /*<Evento navegacion>*/
                /*<Evento  face-primera >*/
                    $('#button-Continuar-face-primera-door2door').on('click', () =>{ 
                        
                        $('#form-face-primera-door2door').hide();

                        $('#form-face-segunda-door2door').show();

                        $('#form-face-tercera-door2door').hide();
                        $('#form-face-cuarta-door2door').hide();
                        $('#form-face-quinta-door2door').hide();                    
                        $('#form-face-sexta-door2door').hide();
                        $('#form-face-septima-door2door').hide();
                        $('#form-face-octavo-door2door').hide();
                        $('#form-face-novena-door2door').hide();
                    }); 
                /*</Evento face-primera>*/

                /*<Evento  face-segunda >*/
                    $('#button-Continuar-face-segunda-door2door').on('click', () =>{ const Result = FACE_SECUNDARIA();       }); 

                    $('#button-regresar-face-segunda-door2door').on('click', () =>{ 
                        
                        $('#form-face-primera-door2door').show();

                        $('#form-face-segunda-door2door').hide();
                        $('#form-face-tercera-door2door').hide();
                        $('#form-face-cuarta-door2door').hide();
                        $('#form-face-quinta-door2door').hide();                    
                        $('#form-face-sexta-door2door').hide();
                        $('#form-face-septima-door2door').hide();
                        $('#form-face-octavo-door2door').hide();
                        $('#form-face-novena-door2door').hide();
                    }); 
                /*</Evento face-segunda >*/

                /*<Evento  face-tercera >*/
                    $('#button-Continuar-face-tercera-door2door').on('click', () =>{ 
                        $('#message-succes-door2door').html("");
                        $('#message-succes-door2door').html('OPERACION EXITOSA');
                        $('#modal-message-succes-door2door').modal('show');   

                        $('#form-face-primera-door2door').hide();
                        $('#form-face-segunda-door2door').hide();
                        $('#form-face-tercera-door2door').hide();

                        $('#form-face-cuarta-door2door').show();

                        $('#form-face-quinta-door2door').hide();                    
                        $('#form-face-sexta-door2door').hide();
                        $('#form-face-septima-door2door').hide();
                        $('#form-face-octavo-door2door').hide();
                        $('#form-face-novena-door2door').hide();
                    }); 

                    $('#button-regresar-face-tercera-door2door').on('click', () =>{ 

                        $('#form-face-primera-door2door').hide();
                        $('#form-face-segunda-door2door').show();
                        $('#form-face-tercera-door2door').hide();

                        $('#form-face-cuarta-door2door').hide();

                        $('#form-face-quinta-door2door').hide();                    
                        $('#form-face-sexta-door2door').hide();
                        $('#form-face-septima-door2door').hide();
                        $('#form-face-octavo-door2door').hide();
                        $('#form-face-novena-door2door').hide();
                    }); 
                /*</Evento face-tercera >*/

                /*<Evento  face-cuarta>*/
                    $('#button-Continuar-face-cuarta-door2door').on('click', () =>{ 
                         

                        $('#form-face-primera-door2door').hide();
                        $('#form-face-segunda-door2door').hide();
                        $('#form-face-tercera-door2door').hide();
                        $('#form-face-cuarta-door2door').hide();

                        $('#form-face-quinta-door2door').show(); 

                        $('#form-face-sexta-door2door').hide();
                        $('#form-face-septima-door2door').hide();
                        $('#form-face-octavo-door2door').hide();
                        $('#form-face-novena-door2door').hide();
                    }); 
                    $('#button-regresar-face-cuarta-door2door').on('click', () =>{ 

                        $('#form-face-primera-door2door').hide();
                        $('#form-face-segunda-door2door').hide();
                        $('#form-face-tercera-door2door').show();
                        $('#form-face-cuarta-door2door').hide();

                        $('#form-face-quinta-door2door').hide(); 

                        $('#form-face-sexta-door2door').hide();
                        $('#form-face-septima-door2door').hide();
                        $('#form-face-octavo-door2door').hide();
                        $('#form-face-novena-door2door').hide();
                    }); 
                /*</Evento face-cuarta>*/

                /*<Evento  face-quinta>*/
                    $('#button-Continuar-face-quinta-door2door').on('click', () =>{ 
                       

                        $('#form-face-primera-door2door').hide();
                        $('#form-face-segunda-door2door').hide();
                        $('#form-face-tercera-door2door').hide();
                        $('#form-face-cuarta-door2door').hide();
                        $('#form-face-quinta-door2door').hide(); 

                        $('#form-face-sexta-door2door').show();

                        $('#form-face-septima-door2door').hide();
                        $('#form-face-octavo-door2door').hide();
                        $('#form-face-novena-door2door').hide();
                    }); 

                    $('#button-regresar-face-quinta-door2door').on('click', () =>{ 

                        $('#form-face-primera-door2door').hide();
                        $('#form-face-segunda-door2door').hide();
                        $('#form-face-tercera-door2door').hide();
                        $('#form-face-cuarta-door2door').show();
                        $('#form-face-quinta-door2door').hide(); 

                        $('#form-face-sexta-door2door').hide();

                        $('#form-face-septima-door2door').hide();
                        $('#form-face-octavo-door2door').hide();
                        $('#form-face-novena-door2door').hide();
                    }); 
                /*</Evento face-quinta>*/

                /*<Evento  face-sexta>*/
                    $('#button-Continuar-face-sexta-door2door').on('click', () =>{ 
                       

                        $('#form-face-primera-door2door').hide();
                        $('#form-face-segunda-door2door').hide();
                        $('#form-face-tercera-door2door').hide();
                        $('#form-face-cuarta-door2door').hide();
                        $('#form-face-quinta-door2door').hide(); 
                        $('#form-face-sexta-door2door').hide();

                        $('#form-face-septima-door2door').show();

                        $('#form-face-octavo-door2door').hide();
                        $('#form-face-novena-door2door').hide();
                    }); 
                     $('#button-regresar-face-sexta-door2door').on('click', () =>{ 

                        $('#form-face-primera-door2door').hide();
                        $('#form-face-segunda-door2door').hide();
                        $('#form-face-tercera-door2door').hide();
                        $('#form-face-cuarta-door2door').hide();

                        $('#form-face-quinta-door2door').show();

                        $('#form-face-sexta-door2door').hide();
                        $('#form-face-septima-door2door').hide();
                        $('#form-face-octavo-door2door').hide();
                        $('#form-face-novena-door2door').hide();
                    }); 

                /*</Evento face-sexta>*/

                /*<Evento  face-septima>*/
                    $('#button-Continuar-face-septima-door2door').on('click', () =>{ const result = TipoVehiculo();  }); 

                    $('#button-regresar-face-septima-door2door').on('click', () =>{ 

                        $('#form-face-primera-door2door').  hide();
                        $('#form-face-segunda-door2door').  hide();
                        $('#form-face-tercera-door2door').  hide();
                        $('#form-face-cuarta-door2door').   hide();
                        $('#form-face-quinta-door2door').   hide(); 
                        $('#form-face-sexta-door2door').    show();
                        $('#form-face-septima-door2door').  hide();

                        $('#form-face-octavo-door2door').   hide();
                        $('#form-face-novena-door2door').   hide();
                    }); 
                /*</Evento face-septima>*/
                
                /*<Evento  face-octavo>*/
                    $('#button-Continuar-face-octavo-door2door').on('click', () => { const Result = TarjetaBancaria();} )

                    $('#button-regresar-face-octavo-door2door').on('click', () =>{ 

                        $('#form-face-primera-door2door').  hide();
                        $('#form-face-segunda-door2door').  hide();
                        $('#form-face-tercera-door2door').  hide();
                        $('#form-face-cuarta-door2door').   hide();
                        $('#form-face-quinta-door2door').   hide(); 
                        $('#form-face-sexta-door2door').    hide();
                        $('#form-face-septima-door2door').  show();

                        $('#form-face-octavo-door2door').   hide();
                        $('#form-face-novena-door2door').   hide();
                    }); 
                /*</Evento  face-octavo>*/

               
            /*</Evento navegacion>*/

            /*<Evento Creacion>*/
                /*<Guardar foto de perfil>*/
                    $('#button-imagen-perfil-door2door').on('click', () =>{          const Result = FACE_PRIMERA(); });
                /*</Guardar foto de perfil>*/

                /*<Guardar foto comprobante de domicilio>*/
                    $('#button-imagen-comprobante-door2door').on('click', () =>{    const Result =  FACE_CUARTA(); });
                /*</Guardar foto comprobante de domicilio>*/

                /*<Guardar foto INE  frente>*/
                    $('#button-imagen-INEF-door2door').on('click', () =>{           const Result =  FACE_QUINTA(); });
                /*</Guardar foto INE  frente>*/

                /*<Guardar foto INE  detras>*/
                    $('#button-imagen-INED-door2door').on('click', () =>{           const Result =  FACE_SEXTA(); });
                /*</Guardar foto INE  detras>*/

                /*<Guardar foto Circulacion>*/
                    $('#button-imagen-TarejetCF-door2door').on('click', () =>{      const Result =  FACE_SEPTIMA();  });
                /*</Guardar foto Circulacion>*/

                /*<Guardar foto bancaria>*/
                    $('#button-imagen-bancaria-door2door').on('click', () =>{       const Result =  FACE_OCTABA();  });
                /*</Guardar foto bancaria>*/                
            /*</Evento Creacion>*/

            /*<Evento Creacion imagen>*/

                /*<Evento imagen perfil>*/
                    $('#button-Cargar-imegen-perfil-door2door').on('click', () =>{          $('#modal-imagen-perfil-door2door').modal('show'); });
                /*</Evento imagen perfil>*/

                /*<Evento imagen comprobante>*/
                    $('#button-Cargar-imegen-comprobante-door2door').on('click', () =>{     $('#modal-imagen-comprobante-door2door').modal('show'); });
                /*</Evento imagen comprobante>*/
                
                /*<Evento imagen INE F>*/
                    $('#button-Cargar-imegen-INEF-door2door').on('click', () =>{            $('#modal-imagen-INEF-door2door').modal('show'); });
                /*</Evento imagen INE F>*/

                /*<Evento imagen INE D>*/
                    $('#button-Cargar-imegen-INED-door2door').on('click', () =>{            $('#modal-imagen-INED-door2door').modal('show'); });
                /*</Evento imagen INE D>*/

                /*<Evento imagen TC>*/
                    $('#button-Cargar-imegen-TarejetCF-door2door').on('click', () =>{       $('#modal-imagen-TarejetCF-door2door').modal('show'); });
                /*</Evento imagen TC>*/

                /*<Evento imagen TB>*/
                    $('#button-Cargar-imegen-bancaria-door2door').on('click', () =>{        $('#modal-imagen-bancaria-door2door').modal('show'); });
                /*</Evento imagen TB>*/
            /*</Evento Creacion imagen>*/

            /*<Eventos Eliminar fotos>*/
                /*<Eliminar imagen perfil>*/
                    $('#button-eliminar-imagen-perfil-door2door').on('click', () => {       const Result = EliminarImagens('FOTO PERFIL'); });
                /*</Eliminar imagen perfil>*/
                
                /*<Eliminar imagen comprobante>*/
                    $('#button-eliminar-imegen-comprobante-door2door').on('click', () => { const Result = EliminarImagens('COMPREBATE DE DOMICILIO'); });
                /*</Eliminar imagen comprobante>*/

                /*<Eliminar imagen INEF>*/
                    $('#button-eliminar-imegen-INEF-door2door').on('click', () => {         const Result = EliminarImagens('INE FRENTE'); });
                /*</Eliminar imagen INEF>*/

                /*<Eliminar imagen INED>*/
                    $('#button-eliminar-imegen-INED-door2door').on('click', () => {         const Result = EliminarImagens('INE ATRAS'); });
                /*</Eliminar imagen INED>*/

                /*<Eliminar imagen TarejetCF>*/
                    $('#button-eliminar-imagen-TarejetCF-door2door').on('click', () => {    const Result = EliminarImagens('TARJETA DE CIRCULACION'); });
                /*</Eliminar imagen TarejetCF>*/

                /*<Eliminar imagen bancaria>*/
                    $('#button-eliminar-imagen-bancaria-door2door').on('click', () => {     const Result = EliminarImagens('TARJETA BANCARIA'); });
                /*</Eliminar imagen bancaria>*/

                /*<Evento Boton finalizar >*/
                   
        /*</Main Module Roles>*/                                 
    });

    /*<Main>*/
        const Main = () => {
            let Arrays = JSON.parse( localStorage.getItem('JSON_INFORMACION' ) );

            const ResultfunctionConsult = functionConsult(Arrays.idUsuario).
            then( (result) => { console.log(result)
                if(result){
                    if(result.message == 'Good'){
                        /*<ESTATUS>*/

                            $('#create-calle-door2door').                       val(result.information_USUARIO[0].calle);
                            $('#create-nointerior-door2door').           val(result.information_USUARIO[0].noInterior);
                            $('#create-noexterior-door2door').                  val(result.information_USUARIO[0].noExterior);
                            $('#create-codigopostal-door2door').                val(result.information_USUARIO[0].codigoPostal);
                            $('#create-colonia-door2door').                     val(result.information_USUARIO[0].colonia);
                            $('#create-colonia-door2door').                     val(result.information_USUARIO[0].colonia);
                            $('#update-imagen-perfil-door2door').html('<img src="'+result.information_USUARIO[0].imagen+'" style="width:200px;height:200px;" class="img-circle elevation-2" >');
                            
                            setTimeout(() => {

                                const functionPais = functionSelectFullPaisAPI().
                                then( (result1) => {   console.log("##>");  console.log(result);
                                    if(result1){                                                                    
                                        if(result.message == 'Good'){
                                            /*<Consulta exitosa>*/
                                                let ArraysPaises = [];
                                                ArraysPaises = result1.information;   
                                                
                                                let Option = ``;
                                                let Options = ``;

                                               
                                                for(let i = 0; i<ArraysPaises.length; i++ ){
                                                    if(ArraysPaises[i].idPais == result.information_USUARIO[0].idPaises){
                                                        Option = '<option value="'+ArraysPaises[i].idPais+'" selected >'+ArraysPaises[i].nombre+'</option>';
                                                    }else{
                                                        Option = '<option value="'+ArraysPaises[i].idPais+'"  >'+ArraysPaises[i].nombre+'</option>';
                                                    }
                                                    
                                                    Options += Option;             
                                                }
                                              
                                                $('#create-pais-door2door').html(Options);

                                                
                                            /*<Consulta exitosa>*/                        
                                        }else{
                                        /*<Error de query>*/ 
                                                $('#message-error-door2door').html("");
                                                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                                $('#modal-message-error-door2door').modal('show');
                                            /*</Error de query>*/  
                                        }       
                                    }                           
                                }).catch( (err) => { 
                                    /*<Error de query>*/ 
                                        $('#message-error-door2door').html("");
                                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                        $('#modal-message-error-door2door').modal('show');
                                    /*</Error de query>*/  
                                });

                                const functionEstados = functionSelectFullEstadoAPI().
                                then( (result1) => {   console.log("##>");  console.log(result);
                                    if(result1){                                                                    
                                        if(result.message == 'Good'){
                                            /*<Consulta exitosa>*/
                                                let ArraysEstados = [];
                                                ArraysEstados = result1.information;           
                                                let campos  =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                                for(let i = 0; i<ArraysEstados.length; i++){
                                                    if( ArraysEstados[i].idPais == result.information_USUARIO[0].idPaises )
                                                    {

                                                        if(ArraysEstados[i].idEstado == result.information_USUARIO[0].idEstados  )
                                                        {
                                                            campos +=   `<option value="${ArraysEstados[i].idEstado}" selected  > ${ArraysEstados[i].nombre} </option> `;      
                                                        }
                                                        else
                                                        {
                                                            campos +=   `<option value="${ArraysEstados[i].idEstado}"   > ${ArraysEstados[i].nombre} </option> `;      
                                                        }              
                                                    }                                                           
                                                }            
                                                $('#create-estado-door2door').html(campos);     
                                            
                                            /*<Consulta exitosa>*/                        
                                        }else{
                                        /*<Error de query>*/ 
                                                $('#message-error-door2door').html("");
                                                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                                $('#modal-message-error-door2door').modal('show');
                                            /*</Error de query>*/  
                                        }       
                                    }                           
                                }).catch( (err) => { 
                                    /*<Error de query>*/ 
                                        $('#message-error-door2door').html("");
                                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                        $('#modal-message-error-door2door').modal('show');
                                    /*</Error de query>*/  
                                });   

                                const functionMunisipio = functionSelectFullMunisipioPI().
                                then( (result1) => {      console.log("##>");  console.log(result1);
                                    if(result1){                                                                    
                                        if(result1.message == 'Good'){
                                            /*<Consulta exitosa>*/
                                                let ArraysMunicipios = [];
                                                ArraysMunicipios = result1.information;           
                                                let campos  =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                                for(let i = 0; i<ArraysMunicipios.length; i++){

                                                    if( ArraysMunicipios[i].idEstado == result.information_USUARIO[0].idEstados ){

                                                        if(ArraysMunicipios[i].idMunicipio == result.information_USUARIO[0].idMunicipio  )
                                                        {
                                                            campos +=   `<option value="${ArraysMunicipios[i].idMunicipio}"  selected > ${ArraysMunicipios[i].nombre} </option> `;      
                                                        }
                                                        else
                                                        {
                                                            campos +=   `<option value="${ArraysMunicipios[i].idMunicipio}"   > ${ArraysMunicipios[i].nombre} </option> `;    
                                                        }              
                                                    }                                                                           
                                                }              
                                                $('#create-municipio-door2door').html(campos);     
                                            
                                            /*<Consulta exitosa>*/                        
                                        }else{
                                        /*<Error de query>*/ 
                                                $('#message-error-door2door').html("");
                                                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                                $('#modal-message-error-door2door').modal('show');
                                            /*</Error de query>*/  
                                        }       
                                    }                           
                                }).catch( (err) => { 
                                    /*<Error de query>*/ 
                                        $('#message-error-door2door').html("");
                                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                        $('#modal-message-error-door2door').modal('show');
                                    /*</Error de query>*/  
                                });
                                const functiontiposVehiculo = functionSelectFulltiposVehiculooPI().
                                then( (result1) => {      console.log("##>");  console.log(result1);
                                    if(result1){                                                                    
                                        if(result1.message == 'Good'){
                                            /*<Consulta exitosa>*/
                                                let ArraysTVehiculo = [];
                                                ArraysTVehiculo = result1.information;           
                                                let campos  =  `<option value="0"  selected > -- SELEECCIONAR -- </option> `;
                                                for(let i = 0; i<ArraysTVehiculo.length; i++){

                                                    if(ArraysTVehiculo[i].idTVehiculo  == result.information_USUARIO[0].idTVehiculo   )
                                                    {
                                                        campos +=   `<option value="${ArraysTVehiculo[i].idTVehiculo }"  selected > ${ArraysTVehiculo[i].nombre} </option> `;      
                                                    }
                                                    else
                                                    {
                                                        campos +=   `<option value="${ArraysTVehiculo[i].idTVehiculo }"   > ${ArraysTVehiculo[i].nombre} </option> `;    
                                                    }                                                                               
                                                }              
                                                $('#create-tipoVehiculo-door2door').html(campos);     
                                            
                                            /*<Consulta exitosa>*/                        
                                        }else{
                                        /*<Error de query>*/ 
                                                $('#message-error-door2door').html("");
                                                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                                $('#modal-message-error-door2door').modal('show');
                                            /*</Error de query>*/  
                                        }       
                                    }                           
                                }).catch( (err) => { 
                                    /*<Error de query>*/ 
                                        $('#message-error-door2door').html("");
                                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                        $('#modal-message-error-door2door').modal('show');
                                    /*</Error de query>*/  
                                });

                                
                            }, 1000);
                            if( result.information_CUESNTIONARIOS.length > 0 ){
                                let Preguntas = result.information_CUESNTIONARIOS[0].PREGUNTAS;
                                let record = '';
                                let TableBody= ''; 
                                localStorage.setItem('JSON_CUESTIONARIO', JSON.stringify(Preguntas));     
                                for(let i = 0; i< Preguntas.length; i++){
                                    record = `  <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="">${Preguntas[0].pregunta}</label>
                                                            <textarea   class="form-control" 
                                                                        onkeyup="GuadarRespuesta(${i});"  
                                                                        id="create-respuesta-door2door-${i}" 
                                                                        value="" placeholder="Respuesta" rows="2">${Preguntas[0].respuesta}</textarea>
                                                        </div>
                                                    </div>
                                                </div>   `;
                                    TableBody += record;
                                }
                                $('#Cuesntionario-mostrar').html(TableBody);
                            }                       
                            if(result.information_IMAGENES.length > 0)
                            {
                                for(let i = 0; i<result.information_IMAGENES.length; i++ )
                                {

                                    if(result.information_IMAGENES[i].tipoArchivo       == "INE ATRAS" )
                                    {
                                        $('#update-imagen-INED-door2door').html('<img src="'+result.information_IMAGENES[i].archivo+'" style="width:200px;height:200px;" >');
                                    }
                                    else if(result.information_IMAGENES[i].tipoArchivo  == "INE FRENTE" )
                                    {
                                        $('#update-imagen-INEF-door2door').html('<img src="'+result.information_IMAGENES[i].archivo+'" style="width:200px;height:200px;" >');
                                    }
                                    else if(result.information_IMAGENES[i].tipoArchivo  == "COMPREBATE DE DOMICILIO" )
                                    {
                                        $('#update-comprobante-door2door').html('<img src="'+result.information_IMAGENES[i].archivo+'" style="width:200px;height:200px;" >');
                                        
                                    }
                                    else if(result.information_IMAGENES[i].tipoArchivo  == "TARJETA DE CIRCULACION" )
                                    {
                                        $('#update-imagen-TarejetCF-door2door').html('<img src="'+result.information_IMAGENES[i].archivo+'" style="width:200px;height:200px;" >');

                                    }
                                    else if(result.information_IMAGENES[i].tipoArchivo  == "TARJETA BANCARIA" )
                                    {
                                        $('#update-imagen-bancaria-door2door').html('<img src="'+result.information_IMAGENES[i].archivo+'" style="width:200px;height:200px;" >');

                                    }
                                }
                            }

                            if(Arrays.estatus == 'PENDIENTE') {

                                $('#message-pendiente-door2door').html("");
                                $('#message-pendiente-door2door').html('¡SU SOLICITUD ESTA INCOMPLETA, POR FAVOR COMPLETE LA INFORMACIÓN!');
                                $('#modal-message-pendiente-door2door').modal('show');

                            }else  if(Arrays.estatus == 'CONFIRMADA') {

                                $('#message-confirmada-door2door').html("");
                                $('#message-confirmada-door2door').html('¡SOLICITUD CONFIRMADA!');
                                $('#modal-message-confirmada-door2door').modal('show');
                                
                            }else  if(Arrays.estatus == 'CONTRATO') {
                                $('#Contrato-mostar').html( '<div class="embed-responsive embed-responsive-21by9" > '
                                                                +'<iframe class="embed-responsive-item" src="'+ result.information_CONTRATO[0].contrato+'" ></iframe>'
                                                            +'</div>'    );     
                                $('#message-contrato-door2door').html("");
                                $('#message-contrato-door2door').html('¡CONTRATO!');
                                $('#modal-message-contrato-door2door').modal('show');
                                
                            }else  if(Arrays.estatus == 'RECHAZADA') {

                                $('#message-rechazada-door2door').html("");
                                $('#message-rechazada-door2door').html('¡LAMENTAMOS INFORMARLE QUE SU SOLICITUD FUE RECHAZADA COMENTARIOS REALIZADOS POR EL ADMINISTRADOR!');
                                $('#modal-message-rechazada-door2door').modal('show');
                                
                            }else  if(Arrays.estatus == 'INCOMPLETA') {

                                $('#message-incompleta-door2door').html("");
                                $('#message-incompleta-door2door').html('¡LAMENTAMOS INFORMARLE QUE SU SOLICITUD  ESTA INCOMPLETA, POR FAVOR COMPLETE LA INFORMACIÓN!');
                                $('#modal-message-incompleta-door2door').modal('show');
                            }
                        /*</ESTATUS>*/
                    }
                }
            }).catch( (err)=> {
                console.log(err);
            })
            
           
            
        }
    /*<Main>*/
    
    
    /*<Primera face  consta de foto de perfil>*/
        const FACE_PRIMERA  = () => {
            let informationForm = new FormData(document.getElementById("form-imagen-perfil-door2door")); 
            let IdUsuario       = JSON.parse(localStorage.getItem('JSON_INFORMACION'));

            informationForm.append('face-de-creacion','FACE_PRIMERA');
            informationForm.append('idUsuario',     IdUsuario.idUsuario);

            const Result = functionCreate(informationForm). 
            then( (result) => {
                $('#modal-imagen-perfil-door2door').modal('hide');
            }). 
            carch( (err) => {
                
            });
        }
    /*</Primera face consta de foto de perfil>*/

    /*<secundaria face  captara de informacion del domiciolio>*/
        const FACE_SECUNDARIA = () => {

            let Calle           = $('#create-calle-door2door').val();
            let NoInterior      = $('#create-nointerior-door2door').val();
            let NoExterior      = $('#create-noexterior-door2door').val();
            let CodigoPostal    = $('#create-codigopostal-door2door').val();
            let Colonia         = $('#create-colonia-door2door').val();
            let Pais            = $('#create-pais-door2door').val();
            let Estado          = $('#create-estado-door2door').val();
            let Munisipio       = $('#create-municipio-door2door').val();
           
           

            /*<VALIDACION CALLE >*/
                if(Calle == ''){
                    $('#message-warning-door2door').html("");
                    $('#message-warning-door2door').html('¡FAVOR DE INTRODUCIR LA CALLE!');
                    $('#modal-message-warning-door2door').modal('show');                   
                }else{
                    /*<VALIDACION NoInterior >*/
                        if(NoInterior == ''){ 
                            $('#message-warning-door2door').html("");
                            $('#message-warning-door2door').html('¡FAVOR DE INTRODUCIR EL NUMERÓ INTERIOR!');
                            $('#modal-message-warning-door2door').modal('show');
                           
                        }else{
                            /*<VALIDACION  NoExterior >*/
                                if(NoExterior == ''){
                                    $('#message-warning-door2door').html("");
                                    $('#message-warning-door2door').html('¡FAVOR DE INTRODUCIR EL NUMERÓ  EXTERIOR!');
                                    $('#modal-message-warning-door2door').modal('show');
                                }else{
                                    /*<VALIDACION  CodigoPostal>*/
                                        if(CodigoPostal == ''){
                                            $('#message-warning-door2door').html("");
                                            $('#message-warning-door2door').html('¡FAVOR DE INTRODUCIR EL CODIGO POSTAL!');
                                            $('#modal-message-warning-door2door').modal('show');
                                        }else{
                                            /*<VALIDACION  Colonia>*/
                                                if(Colonia == ''){
                                                    $('#message-warning-door2door').html("");
                                                    $('#message-warning-door2door').html('¡FAVOR DE INTRODUCIR LA COLONIA!');
                                                    $('#modal-message-warning-door2door').modal('show');
                                                }else{
                                                    /*<VALIDACION  Pais>*/
                                                        if(Pais <= 0){
                                                            $('#message-warning-door2door').html("");
                                                            $('#message-warning-door2door').html('¡FAVOR DE SELECCIONAR EL PAIS!');
                                                            $('#modal-message-warning-door2door').modal('show');
                                                        }else{
                                                            /*<VALIDACION  Pais>*/
                                                                if(Estado <= 0){
                                                                    $('#message-warning-door2door').html("");
                                                                    $('#message-warning-door2door').html('¡FAVOR DE SELECCIONAR EL Estados!');
                                                                    $('#modal-message-warning-door2door').modal('show');
                                                                }else{
                                                                    /*<VALIDACION  Munisipio>*/
                                                                        if(Munisipio <= 0){
                                                                            $('#message-warning-door2door').html("");
                                                                            $('#message-warning-door2door').html('¡FAVOR DE SELECCIONAR EL Munisipio!');
                                                                            $('#modal-message-warning-door2door').modal('show');
                                                                        }else{
                                                                            let informationForm = new FormData(document.getElementById("form-face-segunda-door2door")); 
                                                                            let IdUsuario       = JSON.parse(localStorage.getItem('JSON_INFORMACION'));

                                                                            informationForm.append('face-de-creacion','FACE_SECUNDARIA');
                                                                            informationForm.append('idUsuario',     IdUsuario.idUsuario);
                                                                            
                                                                            const Result = functionCreate(informationForm). 
                                                                            then( (result) => { console.log(result)
                                                                                if(result){
                                                                                    if(result == 'Good'){
                                                                                    
                                                                                    }
                                                                                }

                                                                            }). 
                                                                            catch( (err) => {
                                                                                console.log(err)
                                                                            });
            
                                                                        }
                                                                    /*</VALIDACION  Munisipio>*/
                                                                }
                                                            /*</VALIDACION  Pais>*/
                                                        }
                                                    /*</VALIDACION  Pais>*/
                                                }
                                            /*</VALIDACION  Colonia>*/
                                        }
                                    /*</VALIDACION  CodigoPostal>*/
                                }
                            /*</VALIDACION NoExterior >*/
                        }
                    /*</VALIDACION NoInterior >*/
                }
            /*</VALIDACION CALLE >*/
    

        }
    /*</secundaria face captara de informacion del domiciolio>*/

    /*<tercera face  captura de cordenada de domicilio>*/
        const FACE_TERCEARIA = () => {
            let informationForm = new FormData(document.getElementById("crear-imagen-perfil-door2door")); 
            let IdUsuario       = JSON.parse(localStorage.getItem('JSON_INFORMACION'));

            informationForm.append('face-de-creacion','FACE_PRIMERA');
            informationForm.append('idUsuario',     IdUsuario.idUsuario);

            const Result = functionCreate(informationForm). 
            then( (result) => {
                if(result){
                    if(result == 'Good'){
                        $('#modal-imagen-perfil-door2door').modal('hide');
                    }
                }

            }). 
            carch( (err) => {
                
            });
        }
    /*</tercera face  captura de cordenada de domicilio>*/

    /*<cuarta face  comprobante de domisilio>*/
        const FACE_CUARTA = () => {
            let informationForm = new FormData(document.getElementById("form-imagen-comprobante-door2door")); 
            let IdUsuario       = JSON.parse(localStorage.getItem('JSON_INFORMACION'));

            informationForm.append('face-de-creacion','FACE_CUARTA');
            informationForm.append('idUsuario',     IdUsuario.idUsuario);

            const Result = functionCreate(informationForm). 
            then( (result) => {
                if(result){
                    if(result == 'Good'){
                        $('#modal-imagen-perfil-door2door').modal('hide');
                    }
                }

            }). 
            carch( (err) => {
                
            });
        }
    /*</cuarta face  comprobante de domisilio>*/

    /*<quinta face Ine frente> */
        const FACE_QUINTA = () => {
            let informationForm = new FormData(document.getElementById("form-imagen-INEF-door2door")); 
            let IdUsuario       = JSON.parse(localStorage.getItem('JSON_INFORMACION'));

            informationForm.append('face-de-creacion','FACE_QUINTA');
            informationForm.append('idUsuario',     IdUsuario.idUsuario);

            const Result = functionCreate(informationForm). 
            then( (result) => {
                if(result){
                    if(result == 'Good'){
                        $('#modal-imagen-perfil-door2door').modal('hide');
                    }
                }

            }). 
            carch( (err) => {
                
            });
        }
    /*</quinta face Ine frente>*/

    /*<sexta face ine atras>*/
        const FACE_SEXTA = () => {  
            let informationForm = new FormData(document.getElementById("form-imagen-INED-door2door")); 
            let IdUsuario       = JSON.parse(localStorage.getItem('JSON_INFORMACION'));

            informationForm.append('face-de-creacion','FACE_SEXTA');
            informationForm.append('idUsuario',     IdUsuario.idUsuario);

            const Result = functionCreate(informationForm). 
            then( (result) => {
                if(result){
                    if(result == 'Good'){
                        $('#modal-imagen-perfil-door2door').modal('hide');
                    }
                }

            }). 
            carch( (err) => {
                
            });
        }
    /*</sexta face ine atras>*/

    /*<septima face tarjeta de sirculacion>*/
        const FACE_SEPTIMA = () => {
            let informationForm = new FormData(document.getElementById("form-imagen-TarejetCF-door2door")); 
            let IdUsuario       = JSON.parse(localStorage.getItem('JSON_INFORMACION'));

            informationForm.append('face-de-creacion','FACE_SEPTIMA');
            informationForm.append('idUsuario',     IdUsuario.idUsuario);

            const Result = functionCreate(informationForm). 
            then( (result) => {
                if(result){
                    if(result == 'Good'){
                        $('#modal-imagen-perfil-door2door').modal('hide');
                    }
                }
            }). 
            carch( (err) => {
                
            });
        }
        const FACE_SEPTIMA_MEDIA = () => {
            let informationForm = new FormData(document.getElementById("form-face-septima-door2door")); 
            let IdUsuario       = JSON.parse(localStorage.getItem('JSON_INFORMACION'));

            informationForm.append('face-de-creacion','FACE_SEPTIMA_MEDIA');
            informationForm.append('idUsuario',     IdUsuario.idUsuario);

            const Result = functionCreate(informationForm). 
            then( (result) => {
                if(result){
                    if(result == 'Good'){
                        $('#modal-imagen-perfil-door2door').modal('hide');
                    }
                }
            }). 
            carch( (err) => {
                
            });
        }
    /*</septima face  tarjeta de sirculacio>*/

    /*<ocatvo face tarjeta bancaria>*/
        const FACE_OCTABA = () => {
            let informationForm = new FormData(document.getElementById("form-imagen-bancaria-door2door")); 
            let IdUsuario       = JSON.parse(localStorage.getItem('JSON_INFORMACION'));

            informationForm.append('face-de-creacion','FACE_OCTABA');
            informationForm.append('idUsuario',     IdUsuario.idUsuario);

            const Result = functionCreate(informationForm). 
            then( (result) => {
                if(result){
                    if(result == 'Good'){
                        $('#modal-imagen-bancaria-door2door').modal('hide');
                    }
                }
            }). 
            carch( (err) => {
                
            });
            
        }
        const FACE_OCTABA_MEDIA = () => {
            let informationForm = new FormData(document.getElementById("form-imagen-bancaria-door2door")); 
            let IdUsuario       = JSON.parse(localStorage.getItem('JSON_INFORMACION'));

            informationForm.append('face-de-creacion','FACE_OCTABA_MEDIA');
            informationForm.append('idUsuario',     IdUsuario.idUsuario);

            const Result = functionCreate(informationForm). 
            then( (result) => {
                if(result){
                    if(result == 'Good'){
                        $('#modal-imagen-bancaria-door2door').modal('hide');
                    }
                }

            }). 
            carch( (err) => {
                
            });
            
        }
    /*</ocatvo face tarjeta bancaria>*/

    /*<Eliminar imagen>*/
        const EliminarImagens = (tipoArchivo) => {

            let IdUsuario       = JSON.parse(localStorage.getItem('JSON_INFORMACION'));
            let informationForm = new FormData(document.getElementById("form-eliminar-archivo-door2door")); 

            informationForm.append('face-de-creacion','FACE_ELIMINAR');
            informationForm.append('idUsuario',     IdUsuario.idUsuario);
            informationForm.append('tipoArchivo',   tipoArchivo);

            const Result = functionCreate(informationForm);
        }
    /*<Eliminar imagen>*/

    /*<Evento Contrato>*/
        $('#button-contrato-aceptar-door2door').on(  'click', () => { 

            const ResContrato = Contrato().
            then( (result) => {
                if(result){
                    if(result.message == "Good"){
                        $('#modal-message-contrato-door2door').modal('hide');
                        $('#message-contrato-aceptar-door2door').html("");
                        $('#message-contrato-aceptar-door2door').html('¡CONTRATO ACEPTADO! <br> SU SOLICITUD ESTA EN EVALUACION');
                        $('#modal-message-contrato-aceptar-door2door').modal('show');  
                    }
                }
            })
            
        });

        $('#button-contrato-rechazar-door2door').on( 'click', () => { 
            $('#modal-message-contrato-door2door').modal('hide');
            $('#message-contrato-rechazar-door2door').html("");
            $('#message-contrato-rechazar-door2door').html('¡NO FUE POSIBLE PROCESAR LA ACEPTACIÓN DEL CONTRATO!');
            $('#modal-message-contrato-rechazar-door2door').modal('show');
        });
      
    /*</Evento Contrato>*/


    </script>
    <script>

        const GuadarRespuesta   = (selecionado) => {
            let Preguntas     = JSON.parse( localStorage.getItem('JSON_CUESTIONARIO'));
            let Respuesta   = $('#create-respuesta-door2door-'+selecionado).val();
            Preguntas[selecionado].respuesta = Respuesta;
            localStorage.setItem('JSON_CUESTIONARIO', JSON.stringify(Preguntas));  
        }
</script>