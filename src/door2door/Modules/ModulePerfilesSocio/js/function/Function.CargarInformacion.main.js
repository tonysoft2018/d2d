/*<import>*/    
    import CargandoAPI        from '../API/API.Cargando.main.js';

/*<Create>*/           
const Cargando = async() => { 
    setTimeout( () => { 
        let folio = $('#update-folio-door2door').val();
        console.log(folio)
        const FunCargandoAPI = CargandoAPI(folio).
        then( (result)=> {  console.log(result)
            if(result){
                if(result.message = 'Good'){
                    let Arrays  = result.information;
                    let Contador = 0;
                    if(Arrays.length > 0){                        
                        for(let i = 0; i < Arrays.length ; i++ ){
                            if(Arrays[i].tipoArchivo == "INE"){
                                if(Contador == 0){
                                    Contador++;
                                    $('#INE-frente').html('<img class="img-fluid"  style="width:200px;height:200px" src="'+Arrays[i].archivo+'">');
                                    $('#INE-frente-imagen').val(Arrays[i].archivo);
                                }
                                else
                                {
                                    $('#INE-atras').html('<img class="img-fluid"  style="width:200px;height:200px" src="'+Arrays[i].archivo+'">');
                                    $('#INE-atras-imagen').val(Arrays[i].archivo);
                                }
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
                        let Imagen = '<img   class="img-fluid" src="/door2door/Modules/ModulesImage/imagen.jpg">';
                        $('#INE-frente').html(Imagen);
                        $('#INE-atras').html(Imagen);
                        $('#Comprobante-domicilio').html(Imagen);
                        $('#Tarjeta-circulacion').html(Imagen);                       
                        $('#Tarjeta-bancaria').html(Imagen);
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
