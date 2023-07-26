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
import FinalizadaAPI        from '../API/API.Finalizada.main.js';
import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    
/*</import>*/

/*<Delete>*/  
    const Cacelacion = async() => { 
        let idVisita    = $('#show-idVisita-door2door').val();
        let comentarios = $('#create-comentarios-door2doo').val();
        const ResultF = await FinalizadaAPI(idVisita, comentarios);
        console.log(ResultF)
        if(ResultF.message == 'Good'){
            
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
            $('#modal-message-cancelacion-door2door').modal('show');
            $('#message-cancelacion-door2door').html('VISITA REGISTRADA EXITOSAMENTE');
        }else{
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
            $('#message-error-door2door').html("");
            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
            $('#modal-message-error-door2door').modal('show');
        }
    }
   
/*<export>*/
    export default Cacelacion;
/*</export>*/
/*</Delete>*/  
