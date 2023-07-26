<script>  
    /*<Events  Button Update # 2 >*/
        const MensjaeMostra  = ( 
                                    idUsuario, 
                                    nombre, 
                                    apellido,
                                    mensajes
                                ) => {
            $('#show-id-door2door').val(idUsuario);
            $('#show-nombre-door2door').val(nombre+ ' ' +apellido);
            $('#show-mensaje-door2door').val(mensajes);
            $('#modal-show-door2door').modal('show');
        }
    /*<Events  Button Update # 2 >*/

 
</script>