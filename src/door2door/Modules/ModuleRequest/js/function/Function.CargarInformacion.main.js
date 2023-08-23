/*<import>*/    
    import CargandoAPI        from '../API/API.Cargando.main.js';

/*<Create>*/           
const Cargando = async() => { 
    setTimeout( () => { 
        let folio       = $('#update-folio-door2door').val();
        let idSolicitud = $('#update-id-door2door').val();
        let idUsuario   = $('#update-idUsuario-door2door').val();
        let tipoSocio   = $('#update-tiposocio-door2door').val();
        console.log("################################");
        console.log(idUsuario);
        const FunCargandoAPI = CargandoAPI(folio, idSolicitud, idUsuario, tipoSocio).
        then( (result)=> { console.log(result);
            if(result){
                if(result.message = 'Good'){
                    let Arrays  = result.information;
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
                    if( result.information_CUESNTIONARIOS.length > 0 )
                    {
                        let Preguntas = result.information_CUESNTIONARIOS[0].PREGUNTAS;
                        let record = '';
                        let TableBody= ''; 
                        localStorage.setItem('JSON_CUESTIONARIO', JSON.stringify(Preguntas));   

                        for(let i = 0; i< Preguntas.length; i++)
                        {
                            if(Preguntas[i].tipoPregunta == "CERRADA"){
                                if(Preguntas[i].respuesta == 'SI'){ 
                                    record = `  <div class="row">
                                                    <div class="col-sm-12">
                                                        <label for="">${Preguntas[i].pregunta}</label><br>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" disabled  onclick="guadarRespuestaCerrada(${i},'SI');"  class="form-check-input" name="optradio-${i}" checked>Si
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="" disabled onclick="guadarRespuestaCerrada(${i},'NO');"class="form-check-input" name="optradio-${i}" radio>No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div> `

                                }if(Preguntas[i].respuesta == 'NO'){
                                    record = `  <div class="row">
                                                    <div class="col-sm-12">
                                                        <label for="">${Preguntas[i].pregunta}</label><br>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" disabled  onclick="guadarRespuestaCerrada(${i},'SI');"  class="form-check-input" name="optradio-${i}">Si
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" disabled  onclick="guadarRespuestaCerrada(${i},'NO');"class="form-check-input" name="optradio-${i}" checked>No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> `;
                                }else{
                                    record = `  <div class="row">
                                                    <div class="col-sm-12">
                                                        <label for="">${Preguntas[i].pregunta}</label><br>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" disabled onclick="guadarRespuestaCerrada(${i},'SI');"  class="form-check-input" name="optradio-${i}">Si
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" disabled onclick="guadarRespuestaCerrada(${i},'NO');"class="form-check-input" name="optradio-${i}">No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> `;
                                }
                                

                            }else{
                                record = `  <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">${Preguntas[i].pregunta}</label>
                                                    <textarea   class="form-control" 
                                                                onkeyup="GuadarRespuesta(${i});"  
                                                                id="create-respuesta-door2door-${i}"  disabled
                                                                value="" placeholder="Respuesta" rows="2">${Preguntas[i].respuesta}</textarea>
                                                </div>
                                            </div>
                                        </div>   `;
                            }
                            
                            TableBody += record;
                        }
                        $('#Cuesntionario-mostrar').html(TableBody);
                    }  
                }else{
                }
            }
        }).catch( (error) => {
            console.log(error)
        });
    }, 500);  
}
/*<export>*/
    export default Cargando;
/*</export>*/
/*</Create>*/  
