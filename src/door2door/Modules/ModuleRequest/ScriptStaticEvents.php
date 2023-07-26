<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV   from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        import functionShow             from './js/function/Function.Show.main.js';        
        import functionUpdate           from './js/function/Function.Update.main.js';  

        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';


     
        import functionRechazar         from './js/function/Function.Rechazada.main.js';
        import functionContrato         from './js/function/Function.Contrato.main.js';
        import functionIncompleto       from './js/function/Function.Incompleta.main.js';
        import functionDelete           from './js/function/Function.delete.main.js';
        import functionActiva           from './js/function/Function.Activar.main.js';
        import functionInactivo         from './js/function/Function.Inactivo.main.js';

    /*<import librarys>*/ 
    
    


    $(document).ready(() =>{  

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
                then( (result) => {     console.log(result)
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
                    /*<Error de query>*/  console.log(err)
                        $('#message-error-door2door').html("");
                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                        $('#modal-message-error-door2door').modal('show');
                    /*</Error de query>*/  
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
                $('#button-inactivo-door2door').on(     'click', () => {  const Result = functionInactivo(); });
            /*</si-functionRechazar>*/   
         

            
            /*<si-functionRechazar>*/ 
                $('#button-rechazar-door2door').on(     'click', () => {  const Result = functionRechazar(); });
            /*</si-functionRechazar>*/            
          

            /*<si-functionDelete>>*/
                $('#button-delete-door2door').on(       'click', () => {   const Result = functionDelete(); });
            /*</si-functionDelete>>*/

            /*<si-functionContrato>*/
                $('#button-contrato-door2door').on(     'click', () => {   const Result = functionContrato(); });
            /*</si-functionContrato>*/   

            /*<si-functionContrato>*/
                $('#button-incompleto-door2door').on(   'click', () => {   const Result = functionIncompleto(); });
            /*</si-functionContrato>*/     

            /*<si-functionContrato>*/
                $('#button-activa-door2door').on(       'click', () => {   const Result = functionActiva(); });
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
            
          
            
            
            
            

            

           
        /*</Main Module Roles>*/                                 
    });
</script>