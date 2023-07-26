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
    import DeleteAPI        from '../API/API.Eliminar.main.js';
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    
/*</import>*/

/*<Delete>*/  
    const Delete = async() => { 
        let Archivo = $('#archivo-eliminado').val();
        let idVisita = $('#show-idVisita-door2door').val();
        console.log("idVisita");
        console.log(idVisita);
        const Result = await DeleteAPI(Archivo, idVisita);
        console.log(Result)
        if(Result.message == 'Good'){
            switch(Archivo){
                case 'primera-evidenciar': { $('#media-primera-parte-door2door').html('<img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">'); break;}
                case 'segunda-evidencia': {  $('#media-segunda-parte-door2door').html('<img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">'); break;}
                case 'tercera-evidencia': {  $('#media-tercera-parte-door2door').html('<img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">'); break;}
                case 'cuarta-evidencia': {   $('#media-cuarta-parte-door2door').html('<img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">');  break;}
                case 'quinta-evidencia': {   $('#media-quinta-parte-door2door').html('<img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">');  break;}
            }


            /*<Mostrar>*/ 
                /*<CARGAR HIDE>*/
                    $('#id-main').removeClass('opacidad');
                    $('#body-main-div').removeClass('body-main');
                    $('#body-main-div').hide();
                /*</CARGAR HIDE>*/
                
                $('#modal-eliminar-door2door').modal('hide');   
                setTimeout(() => {
                    $('#modal-registrar-door2door').modal('show');  
                }, 500);
            /*<Mostrar>*/
            
        }else{
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
            $('#message-error-door2door').html("");n
            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
            $('#modal-message-error-door2door').modal('show');
        }
    }
       
    /*<export>*/
        export default Delete;
    /*</export>*/
/*</Delete>*/  
