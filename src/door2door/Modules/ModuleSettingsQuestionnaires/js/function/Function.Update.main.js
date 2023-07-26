
/*<import>*/    
    import createAPI        from '../API/API.Update.main.js';


/*<create>*/   
    const create = async() => { 
      
        let informationForm = new FormData(document.getElementById("form-create-door2door"));  
        const ResultcreateAPI = await createAPI( informationForm ).
        then((result) => {  console.log(result)                       
            if(result.message == 'Good'){
                /*<Respuesta>*/
                    $('#message-succes-door2door').html("");
                    $('#message-succes-door2door').html('ACTUALIZACIÓN EXITOSA');
                    $('#modal-message-succes-door2door').modal('show');      
                    $('#create-id-door2door').val(Arrays[0].idACuestionarios);
                  
                /*</Respuesta>*/     

                                                                     
            }else{ 
                /*<Respuesta>*/
                    $('#message-error-door2door').html('');
                    $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE! ERROR EN LA ACTUALIZACIÓN.');
                    $('#modal-message-error-door2door').modal('show');
                /*</Respuesta>*/
            }   
        }).
        catch( (error) => {
            $('#message-error-door2door').html('');
            $('#message-error-door2door').html('¡INTÉNTELO MÁS TARDE!');
            $('#modal-message-error-door2door').modal('show');
        });           
    
    }
    /*<export>*/
        export default create;
    /*</export>*/
/*<create>*/
