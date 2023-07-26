<script>
    /*<Event Button Show # 1 >*/
        const ButtonShow  = ( id, usuario, nombre, apellido, email, tipoUsuario) => {
            $('#show-id-door2door').val(id);
            $('#show-usuario-door2door').val(usuario);
            $('#show-nombre-door2door').val(nombre);  
            $('#show-apellidos-door2door').val(apellido);    
            $('#show-email-door2door').val(email);   

            let Options = '';   

            if(tipoUsuario == 'ADMINISTRADOR'){
                Options =   '<option value="ADMINISTRADOR" selected>ADMINISTRADOR</option>';
            }else if(tipoUsuario == 'USUARIO CON ROL'){ 
                Options =   '<option value="USUARIO CON ROL" selected>USUARIO CON ROL</option>';
                            
            }

            $('#show-tipousuario-door2door').html(Options);  
            $('#modal-show-door2door').modal('show');
        }
    /*/Events  Button Show # 1 >*/

    /*<Events  Button Update # 2 >*/
        const ButtonUpdate  = ( id, usuario, nombre, apellido, email, tipoUsuario) => {

            $('#update-id-door2door').val(id);
            $('#update-usuario-door2door').val(usuario);
            $('#update-nombre-door2door').val(nombre);
            $('#update-apellidos-door2door').val(apellido);    
            $('#update-email-door2door').val(email);   

            let Options = '';   

            if(tipoUsuario == 'ADMINISTRADOR'){
                Options =   '<option value="ADMINISTRADOR" selected>ADMINISTRADOR</option>'+
                            '<option value="USUARIO CON ROL">USUARIO CON ROL</option>';
            }else if(tipoUsuario == 'USUARIO CON ROL'){ 
                Options =   '<option value="ADMINISTRADOR" >ADMINISTRADOR</option>'+
                            '<option value="USUARIO CON ROL" selected>USUARIO CON ROL</option>';
            }

            $('#update-tipousuario-door2door').html(Options);   

            $('#modal-update-door2door').modal('show');
        }
    /*<Events  Button Update # 2 >*/

    /*<Events  Button Delete # 3 >*/
        const ButtonDelete  = (id) => {            
            $('#delete-id-door2door').val(id);
            $('#modal-delete-door2door').modal('show');
        }
    /*<Events Button Delete # 1 >*/
    
    /*<Events Button checkboxRoless >*/
        const ChecboxSelecionarRol = (id) => {
            let Arrays = JSON.parse(localStorage.getItem('JSON_ASSIGNMENTROLES'));
                for(let i = 0; i< Arrays.length; i++) {
                    if(i == id) {
                        if(Arrays[i].Existe == 0){
                            Arrays[i].Existe = 1;
                            break;
                        }else{
                            Arrays[i].Existe = 0;
                            break;
                        }                        
                    }
                }
                localStorage.setItem('JSON_ASSIGNMENTROLES', JSON.stringify(Arrays));
        }
    /*<Events Button checkboxRoless >*/
</script>