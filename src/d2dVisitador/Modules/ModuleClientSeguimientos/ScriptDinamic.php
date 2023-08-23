<script>
           
    /*<Event Button Show # 1 >*/
        const mostrarEvidencia  = ( evidencia ) => {
            let Arrays = JSON.parse(localStorage.getItem('JSON_EVIDENCIAS_VISITAS'));
            for(let i = 0; i < Arrays.length; i++ ){
                if(evidencia == 'primera-evidencia'         && Arrays[i].tipoArchivo == 'primera-evidencia'){     $('#evidencias-detalles').html(Arrays[i].INPUT);
                }else if(evidencia == 'segunda-evidencia'   && Arrays[i].tipoArchivo == 'segunda-evidencia'){ $('#evidencias-detalles').html(Arrays[i].INPUT);
                }else if(evidencia == 'tercera-evidencia'   && Arrays[i].tipoArchivo == 'tercera-evidencia'){ $('#evidencias-detalles').html(Arrays[i].INPUT);
                }else if(evidencia == 'cuarta-evidencia'    && Arrays[i].tipoArchivo == 'cuarta-evidencia'){   $('#evidencias-detalles').html(Arrays[i].INPUT);
                }else if(evidencia == 'quinta-evidencia'    && Arrays[i].tipoArchivo == 'quinta-evidencia'){   $('#evidencias-detalles').html(Arrays[i].INPUT);
                }else if(evidencia == 'sexta-evidencia'     && Arrays[i].tipoArchivo == 'sexta-evidencia'){     $('#evidencias-detalles').html(Arrays[i].INPUT);
                }
            }         
    
            $('#modal-registrar-door2door').modal('hide');

            setTimeout(() => {                       
                /*<CARGAR SHOW>*/
                    $('#id-main').addClass('opacidad');
                    $('#body-main-div').show();
                    $('#body-main-div').addClass('body-main');
                /*</CARGAR SHOW>*/   
                setTimeout(() => {
                    /*<CARGAR SHOW>*/
                        $('#id-main').removeClass('opacidad');
                        $('#body-main-div').hide();
                        $('#body-main-div').removeClass('body-main');
                    /*</CARGAR SHOW>*/   
                    $('#modal-evidencia-detalle-door2door').modal('show');  
                }, 500);
            }, 500);
        }
          
        const ButtonDomicilio = () => {            
            let texto     =  $('#domicilio-contacto-hidden').val(); 
            console.log(texto);
            navigator.clipboard.writeText(texto)
            .then(() => {   console.log('Texto copiado al portapapeles'); })
            .catch(err => {     console.error('Error al copiar al portapapeles:', err) });

            $('#button-domicilio-copy-door2door').html('¡Copiado!');
            setTimeout(() => {
                $('#button-domicilio-copy-door2door').html('Copiar');                   
            }, 5000);
                
            
        }

        const ButtonTelefono = () => {
            let texto     =  $('#telefono-contacto').val(); 
            console.log(texto);
            navigator.clipboard.writeText(texto)
            .then(() => {   console.log('Texto copiado al portapapeles'); })
            .catch(err => {     console.error('Error al copiar al portapapeles:', err) });

            $('#button-telefono-copy-door2door').html('¡Copiado!');
            setTimeout(() => {
                $('#button-telefono-copy-door2door').html('Copiar');                   
            }, 5000);
            
                
        }


        const ButtonEntreCalle = () => {
            let texto     =  $('#entreCalle-contacto').val(); 
            console.log(texto);
            navigator.clipboard.writeText(texto)
            .then(() => {   console.log('Texto copiado al portapapeles'); })
            .catch(err => {     console.error('Error al copiar al portapapeles:', err) });

            $('#button-entreCalle-copy-door2door').html('¡Copiado!');
            setTimeout(() => {
                $('#button-entreCalle-copy-door2door').html('Copiar');                   
            }, 5000);
          
                
        }

        const ButtonInstrucciones = () => {
            let texto     =  $('#instrucciones-contacto-1').val(); 
            console.log(texto);
            navigator.clipboard.writeText(texto)
            .then(() => {   console.log('Texto copiado al portapapeles'); })
            .catch(err => {     console.error('Error al copiar al portapapeles:', err) });

            $('#button-Instrucciones-copy-door2door').html('¡Copiado!');
            setTimeout(() => {
                $('#button-Instrucciones-copy-door2door').html('Copiar');                   
            }, 5000);


            
        }

        
            
         

       
       
    /*/Events  Button Show # 1 >*/

   
    
</script>