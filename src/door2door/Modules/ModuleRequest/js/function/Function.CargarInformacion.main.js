/*<import>*/    
    import CargandoAPI        from '../API/API.Cargando.main.js';

/*<Create>*/           
const Cargando = async() => { 
    setTimeout( () => { 
        let folio       = $('#update-folio-door2door').val();
        let idSolicitud = $('#update-id-door2door').val();
        console.log(folio)
        const FunCargandoAPI = CargandoAPI(folio, idSolicitud).
        then( (result)=> {  console.log(result)
            if(result){
                if(result.message = 'Good'){
                    let Arrays  = result.information;
                    let ArraysComentarios   = result.informationComentarios;
                    let ArraysPreguntas     = result.informationCuesntionarios;
                    let Contador = 0;
                    if(Arrays.length > 0){                        
                        for(let i = 0; i < Arrays.length ; i++ ){
                            if(Arrays[i].tipoArchivo == "INE FRENTE"){
                                $('#INE-frente').html('<img class="img-fluid"  style="width:200px;height:200px" src="'+Arrays[i].archivo+'">');
                                $('#INE-frente-imagen').val(Arrays[i].archivo);

                            }else if(Arrays[i].tipoArchivo == "INE ATRAS"){
                                $('#INE-atras').html('<img class="img-fluid"  style="width:200px;height:200px" src="'+Arrays[i].archivo+'">');
                                $('#INE-atras-imagen').val(Arrays[i].archivo);
                            
                            }else if(Arrays[i].tipoArchivo == "COMPREBATE DE DOMICILIO")
                            {
                                $('#Comprobante-domicilio').html('<img class="img-fluid"   style="width:200px;height:200px" src="'+Arrays[i].archivo+'">');
                                $('#Comprobante-domicilio-imagen').val(Arrays[i].archivo);
                            }
                            else if(Arrays[i].tipoArchivo == "TARJETA DE CIRCULACION")
                            {
                                $('#Tarjeta-circulacion').html('<img  class="img-fluid"  style="width:200px;height:200px"  src="'+Arrays[i].archivo+'">');
                                $('#Tarjeta-circulacion-imagen').val(Arrays[i].archivo);
                            }
                            else if(Arrays[i].tipoArchivo == "TARJETA BANCARIA")
                            {
                                $('#Tarjeta-bancaria').html('<img  class="img-fluid"  style="width:200px;height:200px"  src="'+Arrays[i].archivo+'">');
                                $('#Tarjeta-bancaria-imagen').val(Arrays[i].archivo);
                            }

                            
                           

                           
                        
                        }
                    }else{
                        let Imagen = '<img   class="img-fluid" style="width:200px;height:200px" src="/door2door/Modules/ModulesImage/imagen.jpg">';
                        $('#INE-frente').html(Imagen);
                        $('#INE-atras').html(Imagen);
                        $('#Comprobante-domicilio').html(Imagen);
                        $('#Tarjeta-circulacion').html(Imagen);                       
                        $('#Tarjeta-bancaria').html(Imagen);
                    }

                    if(ArraysComentarios.length > 0 ){
                        let Campo = '';
                        for(let i = 0; i < ArraysComentarios.length ; i++ ){
                            Campo +=  ` 
                                       <div class="row">
                                            <div class="col-sm-12">
                                                <h5>Comentario  # ${i+1} </h5>
                                                <textarea class="form-control" disabled  style="background:#BAE4ED;" placeholder="Comentario" rows="4">${ArraysComentarios[i].comentario}
                                                </textarea> 
                                            </div>
                                        </div><br>
                                    `; 
                        }
                        $('#lista-de-comentarios').html(Campo);
                        $('#lista-de-comentarios').show();
                        $('#lista-de-comentarios-titulo').show()
                    }else{
                        $('#lista-de-comentarios-titulo').hide()
                        $('#lista-de-comentarios').hide()
                    }

                    if(ArraysPreguntas.length > 0 ){
                        let Campo = '';
                        for(let i = 0; i < ArraysPreguntas.length ; i++ ){
                            Campo +=  ` 
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4>Pregunta  # ${i+1}  ${ArraysPreguntas[i].Pregunta} </h4>
                                                <textarea class="form-control" disabled  style="background:#BAE4ED;" placeholder="Comentario" rows="4">
                                                     ${ArraysPreguntas[i].respuesta}
                                                </textarea> 
                                            </div>
                                        </div><br>
                                    `; 
                        }
                        $('#lista-de-comentarios').html(Campo);
                    }

                    
                }else{
                   

                    
                }
            }
        }).catch( (error) => {
            console.log(error)
        });
    }, 300);  
}
/*<export>*/
    export default Cargando;
/*</export>*/
/*</Create>*/  
