
/*<import>*/    
import CreateAPI        from '../API/API.Create.Imagen.main.js';
import SelectFull       from '../API/API.SelectFull.main.js';
import functionShow     from './Function.Show.main.js';
/*</import>*/    


/*<imagen>*/   
const CreateImagen = async() => { 
   /*<Captura>*/
        let id              =   $('#update-id-door2door').val();
        let imagen          =   $('#imagen-imagen-door2door').val();
       
        console.log(imagen)
    /*</Captura>*/
    if(imagen != '' && id > 0 )
    {         
        let informationForm = new FormData(document.getElementById("form-imagen-door2door"));  
        informationForm.append('update-id-door2door',id);

        const ResultimagenAPI = await CreateAPI( informationForm ).
        then((result) => {  console.log(result)                       
            if(result.message == 'Good'){
                /*<Respuesta>*/
                    $('#message-succes-door2door').html("");
                    $('#message-succes-door2door').html('ACTUALIZACIÓN EXITOSA');
                    $('#modal-message-succes-door2door').modal('show');      
                    $('#update-imagen-door2door').html('<img class="imagen-fluid img-circle elevation-2" style="width:350px;height:350px" src="'+result.information+'"  >');
                    $('#modal-imagen-door2door').modal('hide'); 
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
                        /*<Error de query>*/ 
                            $('#message-error-door2door').html("");
                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                            $('#modal-message-error-door2door').modal('show');
                        /*</Error de query>*/ 
                    });
                /*<Consultar toda la iformacion>*/                                                            
            }else{ 
                /*<Respuesta>*/
                    $('#message-error-door2door').html('');
                    $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE! ERROR EN LA ACTUALIZACIÓN.');
                    $('#modal-message-error-door2door').modal('show');
                /*</Respuesta>*/
            }                           
        }).catch( (err) => { 
            /*<Respuesta>*/
                $('#message-error-door2door').html('');
                $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE! ERROR EN LA  ACTUALIZAR.');
                $('#modal-message-error-door2door').modal('show');
            /*</Respuesta>*/
        });
     
    }else{
        /*<Respuesta>*/
            $('#message-warning-door2door').html('');
            $('#message-warning-door2door').html('FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS');
            $('#modal-message-warning-door2door').modal('show')
        /*</Respuesta>*/

     
    }

}
/*<export>*/
    export default CreateImagen;
/*</export>*/
/*<imagen>*/
