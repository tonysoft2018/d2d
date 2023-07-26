<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV                           from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        import functionShow                         from './js/function/Function.Show.main.js';          
        import functionUpdate                       from './js/function/Function.Update.main.js';
        import functionDeleteImagen                 from './js/function/Function.Delete.Imagen.main.js';
        import functionCrearImagen                  from './js/function/Function.Crear.Imagen.main.js';
      
        
        import functionSelectFullAPI                from './js/API/API.SelectFull.main.js';
        import functionSelectFullVisitasAPI         from './js/API/API.SelectFull.VIsitas.main.js';
        import functionSelectFullComisionesAPI      from './js/API/API.SelectFull.Comisiones.main.js';        

    /*<import librarys>*/ 

    /*<import librarys solicitudes>*/ 
    

        import functionShowSolicitudes             from './ModuleRequest/js/function/Function.Show.main.js';        
        import functionUpdateSolicitudes           from './ModuleRequest/js/function/Function.Update.main.js';  
        import functionCargarInformacion           from './ModuleRequest/js/function/Function.CargarInformacion.main.js';

        import functionSelectFullAPISolicitudes    from './ModuleRequest/js/API/API.SelectFull.main.js';


     
        import functionRechazarSolicitudes         from './ModuleRequest/js/function/Function.Rechazada.main.js';
        import functionContratoSolicitudes         from './ModuleRequest/js/function/Function.Contrato.main.js';
        import functionIncompletoSolicitudes       from './ModuleRequest/js/function/Function.Incompleta.main.js';
        import functionDeleteSolicitudes           from './ModuleRequest/js/function/Function.delete.main.js';
        import functionActivaSolicitudes           from './ModuleRequest/js/function/Function.Activar.main.js';
        import functionInactivoSolicitudes         from './ModuleRequest/js/function/Function.Inactivo.main.js';

    /*<import librarys solicitudes>*/ 

    /*<import librarys Campanas>*/ 
    


        import CampanafunctionShow                     from './ModuleCampaign/js/function/Function.Show.main.js';        
        import CampanafunctionUpdate                   from './ModuleCampaign/js/function/Function.Update.main.js';
        import CampanafunctionCreate                   from './ModuleCampaign/js/function/Function.Create.main.js';
        import CampanafunctionDelete                   from './ModuleCampaign/js/function/Function.Delete.main.js';
        import CampanafunctionCreateContactos          from './ModuleCampaign/js/function/Function.Create.Contactos.main.js';
        import CampanafunctionDeleteContactos          from './ModuleCampaign/js/function/Function.Delete.Contactos.main.js';

        
        import CampanafunctionAbrir                    from './ModuleCampaign/js/function/Function.Abrir.main.js';
        import CampanafunctionPausar                   from './ModuleCampaign/js/function/Function.Pausar.main.js';
        import CampanafunctionReanudar                 from './ModuleCampaign/js/function/Function.Reanudar.main.js';



        import CampanafunctionSelectFullAPI            from './ModuleCampaign/js/API/API.SelectFull.main.js';

        import CampanafunctionSelectFullContactos      from './ModuleCampaign/js/API/API.SelectFull.Contactos.main.js';
        import CampanafunctionShowContactos            from './ModuleCampaign/js/function/Function.Show.Contactos.main.js';   

        
        import CampanafunctionSelectFullPaisesAPI      from '../ModuleCatalogsPaises/js/API/API.SelectFull.main.js';
        import CampanafunctionSelectFullEstadosAPI     from '../ModuleCatalogsEstados/js/API/API.SelectFull.main.js';
        import CampanafunctionSelectFullMunicipiosAPI  from '../ModuleCatalogsMunicipioD/js/API/API.SelectFull.main.js';


        

    /*<import librarys Campanas>*/ 
    
    
    


    $(document).ready(() =>{  
        
        setTimeout(() => {
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
        }, 1500);
        
        
        /*<Main Module Socios>*/               
            /*<Consultar toda la iformacion>*/ 
                const functionSFA = functionSelectFullAPI().
                then( (result) => {  console.log(result);   
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysRoles = [];
                                ArraysRoles = result.information;                                                
                                const functionS =  functionShow(ArraysRoles);  
                              
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
            /*<Consultar toda la iformacion>*/ 

            /*<Evento creacion de un nuevo>*/
                $('#button-create-door2door').on('click', () =>{ const Funresult = functionCreate(); }); 
            /*</Evento creacion de un nuevo>*/

            /*<Evento actualizacion>*/              
                $('#button-update-door2door').on('click', () =>{ const Funresult = functionUpdate();  });
            /*<Evento actualizacion>*/ 

            /*<Evento eliminacion>*/  
                $('#button-delete-door2door').on('click', ()=> { const Funresult = functionDelete();  });
            /*</Evento eliminacion>*/ 

            /*<Evento imegen>*/  
                $('#button-imegen-door2door').on('click', ()=> { $('#modal-imagen-door2door').modal('show');  });
            /*</Evento imegen>*/ 

            /*<Evento visitas>*/  
                $('#button-visitas-door2door').on('click', ()=> { 
                    let idUsuario = $('#update-id-door2door').val()
                    const functionSFA = functionSelectFullVisitasAPI(idUsuario).
                    then( (result) => {  console.log(result);   
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/

                                    let Arrays = result.information;
                                    let record = '';
                                    let TableBody ='';
                                    
                                    $('#table-visitas-door2door').dataTable().fnDestroy();  
                                    $('#table-visitas-door2door-informacion').html('');

                                    if(Arrays.length > 0){
                                        for(let i = 0; i <Arrays.length; i++) {
                                            let FECHA = Arrays[i].fecha.split(' ');
                                            record =  ` <tr>
                                                            <td style="width:50px;vertical-align:middle;" class="text-justify">${Arrays[i].nombre}</td>
                                                            <td style="width:50px;vertical-align:middle;" class="text-justify">${Arrays[i].telefono}</td>
                                                            <td style="width:50px;vertical-align:middle;" class="text-justify">${Formato(FECHA[0])}</td>
                                                            <td style="width:50px;vertical-align:middle;" class="text-justify">${Arrays[i].estatus}</td>
                                                            <td>
                                                            
                                                                <div class="row">
                                                                    <div classs="col-sm-6">
                                                                        <img    class="cursor "   
                                                                                title="Mostrar "       
                                                                                onclick="ButtonDetalleVisita( ${Arrays[i].idContacto} );"                                                                                   
                                                                                src="/door2door/Modules/ModulesImage/mostrar.png"   
                                                                                style="width:30px;height:30px" > 
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>`
                                            TableBody +=  record;
                                        }
                                        $('#table-visitas-door2door-informacion').html(TableBody);
                                    }
                                   
                                    $('#table-visitas-door2door').dataTable(DataTableV);

                                    $('#modal-visitas-door2door').modal('show'); 
                                
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
            /*</Evento visitas>*/ 

            /*<Evento visitas>*/  
                $('#button-comisiones-door2door').on('click', ()=> { 
                   
                    let idUsuario = $('#update-id-door2door').val()
                    const functionSFA = functionSelectFullComisionesAPI(idUsuario).
                    then( (result) => {  console.log(result);   
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                $('#modal-comisiones-door2door').modal('show');  
                                    let Arrays = result.information;
                                    let record = '';
                                    let TableBody ='';
                                    
                                    $('#table-comisiones-visitas-door2door').dataTable().fnDestroy();  
                                    $('#table-comisiones-door2door-informacion').html('');

                                    if(Arrays.length > 0){
                                        for(let i = 0; i <Arrays.length; i++) {
                                            let FECHA = Arrays[i].fecha.split(' ');
                                            record =  ` <tr>
                                                            <td style="width:50px;vertical-align:middle;" class="text-justify">${Arrays[i].Visitador}</td>
                                                            <td style="width:50px;vertical-align:middle;" class="text-justify">${Arrays[i].estatus}</td>
                                                            <td style="width:50px;vertical-align:middle;" class="text-justify">${Formato(FECHA[0])}</td>
                                                            <td style="width:50px;vertical-align:middle;" class="text-justify">${Arrays[i].comision}</td>                                                            
                                                        </tr>`
                                            TableBody +=  record;
                                        }
                                        $('#table-comisiones-door2door-informacion').html(TableBody);
                                    }
                                   
                                    $('#table-comisiones-visitas-door2door').dataTable(DataTableV);
                                   
                                    
                                    
                                
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
            /*</Evento visitas>*/ 


            
            /*<Evento imegen>*/  
                $('#button-eliminar-imagen-door2door').on('click', ()=> { const Funresult = functionDeleteImagen();  });
            /*</Evento imegen>*/ 

            /*<Evento imegen>*/  
                $('#button-imagen-door2door').on('click', ()=> { const Funresult = functionCrearImagen();  });
            /*</Evento imegen>*/ 
            
            
            
        /*</Main Module Socios>*/  
        
        /*<Main Module Solicitudes>*/     

            /*<Consultar toda la iformacion>*/     
            $('#button-solicitud-mostrar-door2door').on('click', () => {       console.log(" ########### >")  
                    $('#modal-solicitudes-mostrar-door2door').modal('show');
                    let idUsuario = $('#update-id-door2door').val();
                    const functionSFA = functionSelectFullAPISolicitudes(idUsuario).
                    then( (result) => {     console.log(result)
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                    let Arrays = [];
                                    Arrays = result.information;      
                                    $('#solicitudes-update-idUsuario-door2door').val(Arrays[0].idUsuario);
                                    $('#solicitudes-update-id-door2door').val(Arrays[0].idSolicitud);
                                    $('#solicitudes-update-folio-door2door').val(Arrays[0].folio);
                                    $('#solicitudes-update-usuario-door2door').val(Arrays[0].usuario);
                                    $('#solicitudes-update-nombre-door2door').val(Arrays[0].nombres);
                                    $('#solicitudes-update-apellido-door2door').val(Arrays[0].apellidos);
                                    $('#solicitudes-update-tiposocio-door2door').val(Arrays[0].tipoPerfil);
                                    $('#solicitudes-update-estatus-door2door').val(Arrays[0].estatus);
                                    $('#solicitudes-update-Tipo-vehículo-door2door').val(Arrays[0].TipoDeVehiculo);
                                    $('#solicitudes-update-numeroCLABE-door2door').val(Arrays[0].numeroCuenta);
                                
                                    $('#Fotografia-frente').html('<img  style="width:200px;height:200px" class="img-fluid" src="'+Arrays[0].imagen+'">');

                                    switch(Arrays[0].estatus){
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
                                                      
                                    const functionS =  functionCargarInformacion(Arrays[0].folio, Arrays[0].idSolicitud);  
                                
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
                        /*<Error de query>*/  console.log(err)
                            $('#message-error-door2door').html("");
                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                            $('#modal-message-error-door2door').modal('show');
                        /*</Error de query>*/  
                    });
                });
            /*<Consultar toda la iformacion>*/ 

            /*<regresar>*/ 
                $('#regresar-modal-imagen').on('click', () => { 
                    $('#modal-imagen-door2door').modal("hide"); 
                    setTimeout(() => {
                        $('#modal-update-door2door').modal("show");
                    }, 500);                    
                });
            /*<regresar>*/          
            
            
      
            /*<button-Rechazada>*/
                $('#button-rechazar').on('click', () => {
                    let idSolicitud   = $('#update-id-door2door').val();
                    $('#rechazar-id-door2door').val(idSolicitud);
                    $('#modal-rechazar-door2door').modal('show');
                });
            /*</button-Rechazada>*/

            /*<button-incompleto>*/
                $('#button-incompleto').on('click', () => {
                    let idSolicitud   = $('#update-id-door2door').val();
                    $('#incompleto-id-door2door').val(idSolicitud);
                    $('#modal-incompleto-door2door').modal('show');
                });
            /*</button-incompleto>*/

            /*<button-contrato>*/
                $('#button-contrato').on('click', () => {
                    let idSolicitud   = $('#update-id-door2door').val();
                    $('#contrato-id-door2door').val(idSolicitud);
                    $('#modal-contrato-door2door').modal('show');
                });
            /*</button-contrato>*/

            /*<button-contrato>*/
                $('#button-activa').on('click', () => {
                    let idSolicitud   = $('#update-id-door2door').val();
                    $('#activa-id-door2door').val(idSolicitud);
                    $('#modal-activa-door2door').modal('show');
                });
            /*</button-contrato>*/

            /*<button-contrato>*/
                $('#button-inactivo').on('click', () => {
                    let idSolicitud   = $('#update-id-door2door').val();
                    $('#inactivo-id-door2door').val(idSolicitud);
                    $('#modal-inactivo-door2door').modal('show');
                });
            /*</button-contrato>*/

            /*<si-functionRechazar>*/ 
                $('#button-inactivo-door2door').on(     'click', () => {  const Result = functionInactivoSolicitudes(); });
            /*</si-functionRechazar>*/   
         

            
            /*<si-functionRechazar>*/ 
                $('#button-rechazar-door2door').on(     'click', () => {  const Result = functionRechazarSolicitudes(); });
            /*</si-functionRechazar>*/            
          

            /*<si-functionDelete>>*/
                $('#button-delete-door2door').on(       'click', () => {   const Result = functionDeleteSolicitudes(); });
            /*</si-functionDelete>>*/

            /*<si-functionContrato>*/
                $('#button-contrato-door2door').on(     'click', () => {   const Result = functionContratoSolicitudes(); });
            /*</si-functionContrato>*/   

            /*<si-functionContrato>*/
                $('#button-incompleto-door2door').on(   'click', () => {   const Result = functionIncompletoSolicitudes(); });
            /*</si-functionContrato>*/     

            /*<si-functionContrato>*/
                $('#button-activa-door2door').on(       'click', () => {   const Result = functionActivaSolicitudes(); });
            /*</si-functionContrato>*/     
            
            

            
            

            /*<INE>*/
                $('#INE-frente').on('click', ()=> {
                    let Componente = $('#INE-frente-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"    src="'+Componente+'">');
                    $('#modal-imagen-door2door').modal('show');
                    $('#modal-update-door2door').modal("hide");
                });
                /*<>*/
                $('#INE-atras').on('click', ()=> {                               
                    let Componente = $('#INE-frente-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"    src="'+Componente+'">');
                    $('#modal-imagen-door2door').modal('show');
                    $('#modal-update-door2door').modal("hide");
                });
            /*</INE>*/

            /*<Comprobante>*/
                $('#Comprobante-domicilio').on('click', ()=> {
                    let Componente = $('#Comprobante-domicilio-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"    src="'+Componente+'">');
                    $('#modal-imagen-door2door').modal('show');
                    $('#modal-update-door2door').modal("hide");
                });
            /*</Comprobante>*/

            /*<Tarjeta-circulacion>*/
                $('#Tarjeta-circulacion').on('click', ()=> {
                    let Componente = $('#Tarjeta-circulacion-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"   src="'+Componente+'">');
                    $('#modal-imagen-door2door').modal('show');
                    $('#modal-update-door2door').modal("hide");
                });
            /*</Tarjeta-circulacion>*/


            /*<Tarjeta-bancaria>*/
                $('#Tarjeta-bancaria').on('click', ()=> {
                    let Componente = $('#Tarjeta-bancaria-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"  style="width:600px;height:600px"  src="'+Componente+'">');
                    $('#modal-imagen-door2door').modal('show');
                    $('#modal-update-door2door').modal("hide");
                });
            /*</Tarjeta-bancaria>*/

            /*<Tarjeta-bancaria>*/
                $('#Fotografia-frente').on('click', ()=> {
                    let Componente = $('#Fotografia-frente-imagen').val();
                    $('#show-imagen-door2door').html('<img  class="zoom img-fluid"  style="width:600px;height:600px"  src="'+Componente+'">');
                    $('#modal-imagen-door2door').modal('show');
                    $('#modal-update-door2door').modal("hide");
                });
            /*</Tarjeta-bancaria>*/
        /*</Main Module Solicitudes>*/    
        
        /*<Main Module Campanas>*/               
            /*<Consultar toda la iformacion>*/        
                $('#button-campana-door2door').on('click', () => {
                    let idUsuario = $('#update-id-door2door').val();
                    const CampanafunctionSFA = CampanafunctionSelectFullAPI(idUsuario).
                    then( (result) => {     console.log(result)
                        if(result){                                                                    
                            if(result.message == 'Good'){
                                /*<Consulta exitosa>*/
                                    let ArraysRoles = [];
                                    ArraysRoles = result.information;     
                                    const functionS =  CampanafunctionShow(ArraysRoles);  
                                    $('#Campana-modal-main-door2door').modal('show');
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
                        /*<Error de query>*/  console.log(err)
                            $('#message-error-door2door').html("");
                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                            $('#modal-message-error-door2door').modal('show');
                        /*</Error de query>*/  
                    });
                })    
                

               
            /*<Consultar toda la iformacion>*/ 

          
            


            

            /*<function update>*/
                $('#button-update-door2door').on( 'click', () => {    const FunDelete = CampanafunctionUpdate(); });
            /*<function update>*/

            

           

            
            
        /*</Main Module Campanas>*/      
        
        const  Formato = (texto) =>{
            return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
        }
        const  FormatoHora = (texto) =>{
            return texto.replace(/^(\d{4}):(\d{2}):(\d{2})$/g,'$3:$2');
    }
    });
</script>