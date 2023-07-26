<script>
    /*<Event Button Show # 1 >*/
        const ShowMap  = ( 
                            idContacto,  
                            tipoVisita,  
                            latitud,
                            longitud,
                            distancia
                        ) => {
       
             console.log("ShowMap");
            $('#show-id-door2door').val(idContacto);            
            $('#show-latitud-door2door').val(latitud);
            $('#show-logitud-door2door').val(longitud);
            $('#show-tipoDeVisita-door2doorr').val(tipoVisita);          
            
            $('#modal-show-door2door').modal('show');
        }
    /*/Events  Button Show # 1 >*/

    /*<Event Button Show # 1 >*/
        const SelectedMap  = ( 
                                idContacto,  
                                tipoVisita,  
                                latitud,
                                longitud,
                                distancia
                            ) => {
        
                console.log("SelectedMap");
                $('#selected-id-door2door').val(idContacto);            
                $('#selected-latitud-door2door').val(latitud);
                $('#selected-logitud-door2door').val(longitud);
                $('#selected-tipoDeVisita-door2doorr').val(tipoVisita);          
                
                $('#modal-seleccionar-door2door').modal('show');
            }
        /*/Events  Button Show # 1 >*/



    
    /*<Events  Button Update # 2 >*/
        const ButtonUpdate  = ( id,  nombre,  descripcion) => {

            $('#update-id-door2door').val(id);
            $('#update-nombre-door2door').val(nombre);  
            $('#update-descripcion-door2door').val(descripcion);  

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