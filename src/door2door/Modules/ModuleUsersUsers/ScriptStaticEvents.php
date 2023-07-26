<script type="module">
    /*<import librarys>*/ 
    
        import DataTableV   from '../ModulePugins/Pluginjs/DataTable.var.main.js';

        import functionShow             from './js/function/Function.Show.main.js';
        import functionCreate           from './js/function/Function.Create.main.js';           
        import functionUpdate           from './js/function/Function.Update.main.js';
        import functionDelete           from './js/function/Function.Delete.main.js';
        import functionNewPasswordUser  from './js/function/Function.Password.main.js';

        import functionSessionsShow     from './js/function/Function.SessionsShow.main.js';
        
        import functionSelectFullAPI    from './js/API/API.SelectFull.main.js';

    /*<import librarys>*/ 
    
    


    $(document).ready(() =>{  

        setTimeout(() => {
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
        }, 1500);

        localStorage.setItem('JSON_ASSIGNMENTROLES', JSON.stringify([]));
        
        /*<Main Module Roles>*/               
            /*<Consultar toda la iformacion>*/ 
                const functionSFA = functionSelectFullAPI().
                then( (result) => {     
                    if(result){                                                                    
                        if(result.message == 'Good'){
                            /*<Consulta exitosa>*/
                                let ArraysRoles = [];
                                ArraysRoles = result.information;                                                
                                const functionS =  functionShow(ArraysRoles);  
                              
                            /*<Consulta exitosa>*/                        
                        }else{
                           /*<Error de query>*/ 
                                $('#message-error-door2door').html("");
                                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                                $('#modal-message-error-door2door').modal('show');
                            /*</Error de query>*/  
                        }       
                    }                           
                }).catch( (err) => { 
                    /*<Error de query>*/ 
                        $('#message-error-door2door').html("");
                        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                        $('#modal-message-error-door2door').modal('show');
                    /*</Error de query>*/  
                });
            /*<Consultar toda la iformacion>*/ 

            /*<Evento creacion de un nuevo>*/
                $('#button-create-door2door').on('click', () =>{ const Funresult = functionCreate(); }); 
            /*</Evento creacion de un nuevo>*/

            /*<Evento actualizacion>*/              
                $('#button-update-door2door').on('click', () =>{ const Funresult = functionUpdate();  });
            /*<Evento actualizacion>*/ 

            /*<Evento eliminacion>*/  
                $('#button-delete-door2door').on('click', ()=> { const Funresult = functionDelete();  });
            /*</Evento eliminacion>*/ 
            
            /*<update-cambiarcontrasena-door2door>*/
                $('#update-cambiarcontrasena-door2door').on('click', ()=> { $('#modal-new-password-door2door').modal('show');  });
            /*</update-cambiarcontrasena-door2door>*/

            /*<update-cambiarcontrasena-door2door>*/
                $('#button-password-door2door').on('click', ()=> { const Funresult = functionNewPassword();  });
            /*</update-cambiarcontrasena-door2door>*/

            /*<resultetear Modal de creacion>*/
                $('#button-back-create').on('click', ()=> {                   
                    $('#nombre-cajas-door2door-crear').removeClass("is-invalid");   
                }); 
            /*<resultetear Modal de creacion>*/  

            /*<listar-roles>*/
                $('#listar-sesiones').on('click', ()=> { const Funresult = functionSessionsShow();  });
            /*<listar-roles>*/
        

            /*<update password>*/
                $('#button-update-password-door2door').on('click', ()=> { const Funresult = functionNewPasswordUser();  });
            /*<update password>*/

            
            
        /*</Main Module Roles>*/                                 
    });
</script>