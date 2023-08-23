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
    import CreateAPI        from '../API/API.Create.main.js';
    import SelectFull       from '../API/API.SelectFull.main.js';
    import functionShow     from './Function.Show.main.js';
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

            let nombre                  =   $('#create-nombre-door2door').val().replace(/['"`]/, '');
            let descripcion             =   $('#create-descripcion-door2door').val().replace(/['"`]/, '');
            let tipocampana             =   $('#create-tipocampana-door2door').val().replace(/['"`]/, '');
            let descripcionrecoleccion  =   $('#create-descripcionrecoleccion-door2door').val().replace(/['"`]/, '');
           
            /*<Eliminamos caracteres extraños>*/
                $('#create-nombre-door2door').val(nombre);
                $('#create-descripcion-door2door').val(descripcion);
                $('#create-tipocampana-contrasena-door2door').val(tipocampana);
                $('#create-descripcionrecoleccion-door2door').val(descripcionrecoleccion);
            /*<Eliminamos caracteres extraños>*/
            
        /*</Captura>*/
        
        /*<Consulta Datos>*/
             const ResultSelectFull = await SelectFull();
        /*</Consulta Datos>*/
        
        if( ResultSelectFull.message == 'Good' ){     
            /*<ResultSelectFull>*/   
                let ArrayData = ResultSelectFull.information;
            /*</ResultSelectFull>*/
            if(nombre != '' ){
                /*<Var>*/
                    let Accoun = 0;
                    let ResultName= '';
                /*</Var>*/

                /*<Recorrer>*/
                    for(let i = 0; i< ArrayData.length; i++){
                        if(ArrayData[i].nombre == nombre ){
                            Accoun++; 
                            ResultName += 'EL NOMBRE ¡"'+nombre+'" SE ENCUENTRA EN USO';
                        }            
                    }
                /*</Recorrer>*/
                
                /*<Validar>*/
                    if( Accoun == 0 ){     
                        let informationForm = new FormData(document.getElementById("form-create-door2door")); 
                        const ResultCreateAPI= CreateAPI( informationForm ).
                        then((result) => {    console.log(result)          
                            if(result.message == 'Good'){ 
                                /*<Respuesta>*/                                    
                                    $('#modal-create-door2door').modal('hide'); 
                                    let Information = result.RESPUETA_INSERTAR_CAMPANA.information;

                                  
                                   setTimeout( () => {
                                        /*<CARGAR HIDE>*/
                                            $('#id-main').removeClass('opacidad');
                                            $('#body-main-div').removeClass('body-main');
                                            $('#body-main-div').hide();
                                        /*</CARGAR HIDE>*/
                                        setTimeout( () => {
                                            const ResultadoModal = ButtonUpdate(
                                                    Information[0].idCampana,
                                                    Information[0].folio,
                                                    Information[0].fecha,
                                                    Information[0].nombre,
                                                    Information[0].descripcion,
                                                    Information[0].tipoCampana,                                                            
                                                    Information[0].descripcionRecoleccion,
                                                    Information[0].estatus                                           
                                            );    
                                            setTimeout( () => {
                                                $('#message-succes-door2door').html("");
                                                $('#message-succes-door2door').html('CREACIÓN EXITOSA');
                                                $('#modal-message-succes-door2door').modal('show'); 
                                            },800);                                    
                                        },800);
                                   },300);
                                   
                                /*</Respuesta>*/   

                                /*<Consultar toda la iformacion>*/ 
                                    const functionSFA = SelectFull().
                                    then( (result) => {      
                                        if(result){                                                                    
                                            if(result.message == 'Good'){
                                                /*<Consulta exitosa>*/
                                                    let ArraysRoles = [];
                                                    ArraysRoles = result.information;                                 
                                                    const functionS = functionShow(ArraysRoles);  
                                                    
                                                /*<Consulta exitosa>*/                        
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
                            }else{ 
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
                /*</Validar>*/
            }else{
                /*<CARGAR HIDE>*/
                    $('#id-main').removeClass('opacidad');
                    $('#body-main-div').removeClass('body-main');
                    $('#body-main-div').hide();
                /*</CARGAR HIDE>*/
                /*<Respuesta >*/
                    $('#message-warning-door2door').html('');
                    $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS');
                    $('#modal-message-warning-door2door').modal('show')
                /*</Respuesta>*/

                /*<Respuesta>*/
                    $('#nombre-create-door2door').addClass("is-invalid");   
                /*</Respuesta>*/             
            }                        
        }else{
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
            /*<warning al cargar la nueva informacion>*/
                $('#message-warning-door2door').html('');
                $('#message-warning-door2door').html('¡INTÉNTELO MÁS TARDE!');
                $('#modal-message-warning-door2door').modal('show');
            /*<warning al cargar la nueva informacion>*/
        }        
    }
    /*<export>*/
    /*<Events  Button ButtonUpdate # 2 >*/
        const ButtonUpdate  = ( 
                                idCampana, 
                                folio, 
                                fecha, 
                                nombre, 
                                descripcion, 
                                tipoCampana, 
                                descripcionrecoleccion, 
                                estatus 
                                ) => {


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
        export default Create;
    /*</export>*/
/*</Create>*/  
