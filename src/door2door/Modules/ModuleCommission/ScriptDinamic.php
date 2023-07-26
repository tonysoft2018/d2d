<script>
   
    /*<Event Button Show # 1 >*/
        const ButtonUpdate  = ( id,  folio,  fecha, estatus) => {
            $('#update-id-door2door').val(id);
            $('#update-folio-door2door').val(folio);  
            $('#update-fecha-door2door').val(fecha); 
            $('#update-estatus-door2door').val(estatus);  

            
            
            $('#modal-update-door2door').modal('show');
        }
    /*/Events  Button Show # 1 >*/


    
    /*<Events  Button cancelado # 3 >*/
        const ButtonCancelado  = (  id) => {   
            $('#cancelado-id-door2door').val(id);   
            $('#modal-cancelado-door2door').modal('show');
        }
    /*<Events Button cancelado # 1 >*/

     /*<Events  Button  Show  # 3 >*/
        const ButtonShow  = (  id,  folio,  fecha, estatus ) => {   

            $('#show-id-door2door').val(id);
            $('#show-folio-door2door').val(folio);  
            $('#show-fecha-door2door').val(fecha); 
            $('#show-estatus-door2door').val(estatus); 

            $('#modal-show-door2door').modal('show');
        }
    /*<Events Button Show   # 1 >*/

    /*<Events  Button  Show  # 3 >*/
        const ButtonOrden  = (  id,  folio,  fecha, estatus ) => {   

            $('#ordenpago-id-door2door').val(id);
            $('#ordenpago-folio-door2door').val(folio);  
            $('#ordenpago-fecha-door2door').val(fecha); 
            $('#ordenpago-estatus-door2door').val(estatus); 

            $('#modal-ordenpago-door2door').modal('show');
        }
    /*<Events Button Show   # 1 >*/

    
    /*<SelecionarVisitaProcesada>*/
        const SelecionarVisitaProcesada = (Seleccion) => {
            let ArraysDatos = JSON.parse(localStorage.getItem('JSON_VISITAS_PROCESO'));
            console.log(ArraysDatos)
                for(let i = 0; i< ArraysDatos.length; i++) {
                    if(i == Seleccion) {
                        if(ArraysDatos[i].Seleccion == 0){
                            ArraysDatos[i].Seleccion = 1;                                
                            break;
                        }else{
                            ArraysDatos[i].Seleccion = 0;
                            break;
                        }                        
                    }
                }
            localStorage.setItem('JSON_VISITAS_PROCESO', JSON.stringify(ArraysDatos));
        }
    /*</SelecionarVisitaProcesada>*/

    /*<SelecionarVisitaAceptar>*/
        const SelecionarVisitaAceptar = (Seleccion) => {
            let ArraysDatos = JSON.parse(localStorage.getItem('JSON_VISITAS_ACEPTAR'));
                for(let i = 0; i< ArraysDatos.length; i++) {
                    if(i == Seleccion) {
                        if(ArraysDatos[i].Seleccion == 0){
                            ArraysDatos[i].Seleccion = 1;                                
                            break;
                        }else{
                            ArraysDatos[i].Seleccion = 0;
                            break;
                        }                        
                    }
                }
            localStorage.setItem('JSON_VISITAS_ACEPTAR', JSON.stringify(ArraysDatos));
        }
    /*</SelecionarVisitaAceptar>*/




    
  
</script>