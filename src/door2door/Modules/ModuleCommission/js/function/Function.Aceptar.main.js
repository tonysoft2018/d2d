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
import AceptarAPI        from '../API/API.Aceptar.main.js';
import SelectFull       from '../API/API.SelectFull.main.js';
import functionShow     from './Function.Show.main.js';
import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    

/*<Create>*/           
const Aceptar = async() => { 
    /*<Captura>*/
        let ArraysDatos = JSON.parse(localStorage.getItem('JSON_VISITAS_ACEPTAR'));   
        let idCorte = $('#update-id-door2door').val()
        let Contador = 0;     

        console.log(idCorte);
        for(let i = 0; i< ArraysDatos.length; i++) {
            if(ArraysDatos[i].Seleccion == 1){
                Contador++;
            }      
        } 

    /*</Captura>*/
    if(Contador > 0 && idCorte > 0){
        const ResultCreateAPI= AceptarAPI( ArraysDatos, idCorte ).
        then((result) => {    console.log(result)          
            if(result.message == 'Good'){ 
                /*<Respuesta>*/
                                                 
                    
                  

                    $('#modal-update-door2door').modal('hide'); 
                    $('#message-succes-door2door').html("");
                    $('#message-succes-door2door').html('CREACIÓN EXITOSA');
                    $('#modal-message-succes-door2door').modal('show');      
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
                                /*<Error de query>*/ 
                                    $('#message-error-door2door').html("");
                                    $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                    $('#modal-message-error-door2door').modal('show');
                                /*</Error de query>*/   
                            }       
                        }                           
                    }).catch( (err) => {                                         
                        /*<Error desconocido>*/
                            $('#message-error-door2door').html("");
                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                            $('#modal-message-error-door2door').modal('show');
                        /*<Error desconocido>*/
                    });
                /*<Consultar toda la iformacion>*/                                                            
            }else{ 
                /*<Respuesta>*/
                    $('#message-error-door2door').html('');
                    $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE! ERROR AL CREAR.');
                    $('#modal-message-error-door2door').modal('show');
                /*</Respuesta>*/
            }                           
        }).catch( (err) => { 
            /*<Respuesta>*/
                $('#message-error-door2door').html('');
                $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE! ERROR AL CREAR.');
                $('#modal-message-error-door2door').modal('show');
            /*</Respuesta>*/
        });
    }else{
        console.log("No tiene ")
        $('#message-warning-door2door').html('');
        $('#message-warning-door2door').html('FAVOR DE SELECCIONAR UNA VISITA');
        $('#modal-message-warning-door2door').modal('show');
    }
       
    
   
}
/*<export>*/
    export default Aceptar;
/*</export>*/
/*</Create>*/  
