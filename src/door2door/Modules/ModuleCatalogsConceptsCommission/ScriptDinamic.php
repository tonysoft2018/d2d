<script>
    /*<Event Button Show # 1 >*/
        const ButtonShow  = ( id,  nombre,  descripcion) => {

            $('#show-id-door2door').val(id);
            $('#show-nombre-door2door').val(nombre);  
            $('#show-descripcion-door2door').val(descripcion);  
            
            $('#modal-show-door2door').modal('show');
        }
    /*/Events  Button Show # 1 >*/

    /*<Events  Button Update # 2 >*/
        const ButtonUpdate  = ( 
                                    id,  
                                    nombre, 
                                    descripcion,
                                    tipo,
                                    comision,
                                    cantidad,
                                    idZona


                                ) => {

            $('#update-id-door2door').val(id);
            $('#update-nombre-door2door').val(nombre);  
            $('#update-descripcion-door2door').val(descripcion);  

            $('#update-comision-door2door').val(comision);  
            $('#update-cantidad-door2door').val(cantidad); 
            
            let campo = '';   
            if(tipo == 'RECUPERACION'){
                campo = `   
                    
                    <option value="RECUPERACION" selected >RECUPERACION</option>
                    <option value="VALIDACION">VALIDACION</option>
                    <option value="COBRANZA">COBRANZA</option>`;

            }else if(tipo == 'VALIDACION'){
                campo = `  
                    
                    <option value="RECUPERACION"  >RECUPERACION</option>
                    <option value="VALIDACION" selected>VALIDACION</option>
                    <option value="COBRANZA">COBRANZA</option>`;

            }else if(tipo == 'COBRANZA'){
                campo = `  
                    
                    <option value="RECUPERACION"  >RECUPERACION</option>
                    <option value="VALIDACION" >VALIDACION</option>
                    <option value="COBRANZA" selected>COBRANZA</option>`;

            }else{
                campo = `  
                    
                    <option value="RECUPERACION"  >RECUPERACION</option>
                    <option value="VALIDACION" >VALIDACION</option>
                    <option value="COBRANZA" >COBRANZA</option>`;
            }

            $('#update-tipo-door2door').html(campo); 
            let ArraysDatos = JSON.parse(localStorage.getItem('JSON_ZONAS'));
            campo = '';
            for(let i = 0; i<ArraysDatos.length; i++ ){
                campo += `<option value="${ArraysDatos[i].idZona}"  >${ArraysDatos[i].nombre}</option>`;
            }
            $('#update-zona-door2door').html(campo);
            

            $('#modal-update-door2door').modal('show');
        }
    /*<Events  Button Update # 2 >*/

    /*<Events  Button Delete # 3 >*/
        const ButtonDelete  = (id) => {            
            $('#delete-id-door2door').val(id);
            $('#modal-delete-door2door').modal('show');
        }
    /*<Events Button Delete # 1 >*/
    
  
</script>