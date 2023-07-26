<script type="">
     /*<Events  Button ButtonCancelar # 3 >*/
            const MostrarChatMain = (
                                idUsuario,
                                idUsuarioEmisor,
                                nombres,
                                apellidos
                        
                    )=> {
                $('#show-id-mensajes-main-door2door').val(idUsuario);
                $('#show-idUsuarioEmisor-mensajes-main-door2door').val(idUsuarioEmisor);
                $('#show-nombre-mensajes-main-door2door').val(nombres+ ' ' +apellidos);
                $('#modal-mensajes-main-door2door').modal('show');
             }
    /*<Events Button ButtonCancelar # 1 >*/
</script>