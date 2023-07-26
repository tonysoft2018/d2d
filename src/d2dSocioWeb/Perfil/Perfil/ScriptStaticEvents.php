<script type="module">
    /*<import librarys>*/ 

        import functionCreate           from './js/function/Function.Update.main.js';  
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';
    /*<import librarys>*/ 
    
    


    $(document).ready(() =>{  
        /*<Main Module Roles>*/               
            /*<Consultar toda la iformacion>*/ 
                const functionSFA = functionSelectFullAPI().
                then( (result) => {  console.log(result);
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let Arrays = [];
                                Arrays = result.information;
                                if(Arrays.length > 0)      {
                                    $('#create-id-door2door').val(           Arrays[0].idEmpresa);
                                    $('#create-razonsocial-door2door').val(  Arrays[0].razonSocial);
                                    $('#create-rfc-door2door').val(          Arrays[0].rfc);
                                    $('#create-domicilio-door2door').val(    Arrays[0].domicilio);
                                    $('#create-noexterior-door2door').val(   Arrays[0].noExterior);
                                    $('#create-nointerior-door2door').val(   Arrays[0].noInterior);
                                    $('#create-colonia-door2door').val(      Arrays[0].colonia);
                                    $('#create-ciudad-door2door').val(       Arrays[0].ciudad);
                                    $('#create-estado-door2door').val(       Arrays[0].estado);
                                    $('#create-pais-door2door').val(         Arrays[0].pais);
                                    $('#create-codigopostal-door2door').val( Arrays[0].codigoPostal);
                                    $('#create-telefono-door2door').val(     Arrays[0].telefono);
                                    $('#create-celular-door2door').val(      Arrays[0].celular);
                                    $('#create-email-door2door').val(        Arrays[0].email);
                                    $('#imagen-epmresa').html('<img src="'+Arrays[0].imagen+'" style="width:200px;height:200px"  >');


                                }else{
                                    $('#create-razonsocial-door2door').val('');
                                    $('#create-rfc-door2door').val('');
                                    $('#create-domicilio-door2door').val('');
                                    $('#create-noexterior-door2door').val('');
                                    $('#create-nointerior-door2door').val('');
                                    $('#create-colonia-door2door').val('');
                                    $('#create-ciudad-door2door').val('');
                                    $('#create-estado-door2door').val('');
                                    $('#create-pais-door2door').val('');
                                    $('#create-codigopostal-door2door').val('');
                                    $('#create-telefono-door2door').val('');
                                    $('#create-celular-door2door').val('');
                                    $('#create-email-door2door').val('');   
                                    $('#create-imagen-door2door').html('');
                                }
                                                                  
                                                            
                            /*<Consulta exitosa>*/                        
                        }else{
                           /*<Error de query>*/ 
                                $('#message-error-platform').html("");
                                $('#message-error-platform').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-error-platform').modal('show');
                            /*</Error de query>*/  
                        }       
                    }                           
                }).catch( (err) => { 
                    /*<Error de query>*/ 
                        $('#message-error-platform').html("");
                        $('#message-error-platform').html('¡ERROR AL RECARGAR LA PAGUINA!');
                        $('#modal-message-error-platform').modal('show');
                    /*</Error de query>*/  
                });
            /*<Consultar toda la iformacion>*/ 

            /*<Evento creacion de un nuevo>*/
                $('#button-create-door2door').on('click', () =>{ console.log("=>"); const Funresult = functionCreate(); }); 
            /*</Evento creacion de un nuevo>*/

           
        /*</Main Module Roles>*/                                 
    });
</script>