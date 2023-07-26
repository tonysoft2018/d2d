<script>  
    /*<Events  Button Update # 2 >*/
        const ButtonShow  = ( idUsuario, nombre, apellido, estatus) => 
        {
            $('#update-estatus-door2door').val(estatus);
            $('#update-id-door2door').val(idUsuario);
            $('#update-nombre-door2door').val(nombre+ ' ' +apellido);
            $('#modal-update-door2door').modal('show');
        }
    /*<Events  Button Update # 2 >*/

    /*<Events  CheckBoxUsuarios # 2 >*/
        const CheckBoxUsuarios  = ( selecionado) => 
        {
            let Arreglo = JSON.parse(localStorage.getItem('JSON_INFORMACION_CONTACTOS_GRUPO'));  
            Arreglo[selecionado].SELECCIONADO = 1; 
            localStorage.setItem('JSON_INFORMACION_CONTACTOS_GRUPO', JSON.stringify(Arreglo));   
        }
    /*<Events  CheckBoxUsuarios # 2 >*/


    
</script>