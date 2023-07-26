
/*<import>*/    
    import createAPI        from '../API/API.Update.main.js';
 
/*</import>*/    


/*<create>*/   
    const create = async() => { 
       /*<Captura>*/
            let id              =   $('#create-id-door2door').val();
            let nombre          =   $('#create-contrato-door2doorr').val();
          
        /*</Captura>*/
        if(nombre != ''  ){         
            let informationForm = new FormData(document.getElementById("form-create-door2door"));  
            const ResultcreateAPI = await createAPI( informationForm ).
            then((result) => {  console.log(result)                       
                if(result.message == 'Good'){
                    /*<Respuesta>*/
                        $('#message-succes-door2door').html("");
                        $('#message-succes-door2door').html('ACTUALIZACIÓN EXITOSA');
                        $('#modal-message-succes-door2door').modal('show');      
                        
                        let Arrays= result.information;
                                            
                        $('#create-contrato-door2door').removeClass("is-invalid");   
                        $('#Contrato-mostar').html('<iframe class="embed-responsive-item" src="'+ Arrays[0].contrato+'" allowfullscreen></iframe>');                                                    
                        
                        $('#create-nombre-door2door').val('');
                        $('#create-descripcion-door2door').val('');
                        $('#create-imagen-door2door').val('');

                        $('#modal-create-door2door').modal('hide'); 
                    /*</Respuesta>*/     

                                                                         
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

            /*<Respuesta>*/ 

                $('#create-contrato-door2door').addClass("is-invalid"); 
                
            /*</Respuesta>*/     
        }
    
    }
    /*<export>*/
        export default create;
    /*</export>*/
/*<create>*/
