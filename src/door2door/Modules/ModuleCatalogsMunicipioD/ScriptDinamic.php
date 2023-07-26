<script>
    /*<Event Button Show # 1 >*/
        const ButtonShow  = ( id,  nombre,  Estado,Pais) => {
            $('#show-id-door2door').val(id);
            $('#show-nombre-door2door').val(nombre);  
            $('#show-pais-door2door').val(Pais);  
            $('#show-estado-door2door').val(Estado);  
            
            $('#modal-show-door2door').modal('show');
        }
    /*/Events  Button Show # 1 >*/

    /*<Events  Button Update # 2 >*/
        const ButtonUpdate  = ( id,  nombre,  idEstado,idPais) => {

            $('#update-id-door2door').val(id);
            $('#update-nombre-door2door').val(nombre);  
            $('#update-idEstado-door2door').val(idEstado);  
            $('#update-idPais-door2door').val(idPais);  

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