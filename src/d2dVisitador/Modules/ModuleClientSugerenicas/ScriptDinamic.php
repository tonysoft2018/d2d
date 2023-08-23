<script>
    /*<Event Button Show # 1 >*/
        const ShowMap  = ( comentarioAgenda ) => {
            $('#comentario-agenda-contacto').val(comentarioAgenda);    
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
                
                let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
                 
                $.ajax({
                    url: "/d2dVisitador/Modules/ModuleClientSugerenicas/api/door2door.controller.Selected.php",
                    type: 'post',
                    async: false,
                    dataType: "json",
                    data: { 
                        TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                        idContacto:idContacto
                    }    
                        
                }).then((result) => { console.log(result);
                    if(result){
                        if(result.message == "Good"){
                            window.location.href = "/d2dVisitador/Modules/ModuleClientSeguimientos"
                        }else{
                            $('#message-error-door2door').html("");
                            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                            $('#modal-message-error-door2door').modal('show');
                        } 
                    }
                }) ;          
                
               
            }
        /*/Events  Button Show # 1 >*/



    
    
    
  
</script>