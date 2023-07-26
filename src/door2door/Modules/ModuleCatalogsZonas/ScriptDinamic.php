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