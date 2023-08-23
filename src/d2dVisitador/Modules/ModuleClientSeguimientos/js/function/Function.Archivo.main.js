/*
*   <Information>
*       <Author> 
*           Carlos Andres González Gómez
*       </Author>
*       <Description> 
*           Funcion de javascrit para realizar peticiones
*       </Description>
*   </Information>
*/ 

/*<import>*/    
    import CreateAPI        from '../API/API.Archivos.main.js';
/*</import>*/    

/*<Create>*/           
    const Archivos = async() => { 
          
        let Archivo     = $('#tipo-evidencia').val();
        let idVisita    = $('#show-idVisita-door2door').val();

        let informationForm = new FormData(document.getElementById("form-evidencia-door2door")); 

        informationForm.append("idVisita",idVisita);        
        informationForm.append("Archivo",Archivo);     

        const ResultF   = await CreateAPI(informationForm);
        console.log(ResultF)
        if(ResultF.message == 'Good'){

            let ArchivoHtml      = '';
            
            let Direccion        = ResultF.direccion;
            let ArregloExtencion = ResultF.direccion.split('.');
            let ArchivoIMPUT     = '';

            let  tamano          = ArregloExtencion.length;
            tamano = tamano -1;

            if(
                    ArregloExtencion[tamano] == 'mp3' ||
                    ArregloExtencion[tamano] == 'ogg' ||
                    ArregloExtencion[tamano] == 'wav' 
                ){
                    if(ArregloExtencion[tamano] == 'mp3'){
                        ArchivoHtml = `
                            <audio controls  src="${Direccion}" type="audio/mp3" controls  loop ></audio>
                     `;
                     
                    }else if(ArregloExtencion[tamano] == 'ogg'){
                        ArchivoHtml = `
                                <audio controls  src="${Direccion}" type="audio/ogg" controls  loop ></audio>
                        `;
                    }else if(ArregloExtencion[tamano] == 'wav'){
                        ArchivoHtml = `
                                <audio controls  src="${Direccion}" type="audio/wav" controls  loop ></audio>
                        `;
                    }
               
            }else if(
                        ArregloExtencion[tamano] == 'png' ||
                        ArregloExtencion[tamano] == 'jpg' ||
                        ArregloExtencion[tamano] == 'jpeg' 
                    ){
                    ArchivoHtml  = ` <img src="${Direccion}"  style="width:200px;height:200px;" class=""> `;
                    ArchivoIMPUT = ` <img src="${Direccion}"   class="img-fluid" > `;
            }else if(
                    ArregloExtencion[tamano] == 'mp4'  ||
                    ArregloExtencion[tamano] == 'webm' ||
                    ArregloExtencion[tamano] == 'ogv' 
                    ){
                    ArchivoHtml = `
                             <video src="${Direccion}" width=\"200\" height="\"200\"  controls></video>
                    `;
            }else{
               
                $('#message-error-door2door').html("");
                $('#message-error-door2door').html('¡ERROR TU ARCHVIO NO ES FORMATO COMPATIBLE!<BR> ');
                $('#modal-message-error-door2door').modal('show');
                ArchivoHtml = '<img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">'
            }

            switch(Archivo){
                case 'primera-evidencia':  { $('#media-primera-parte-door2door').html(ArchivoHtml); break;}
                case 'segunda-evidencia':  { $('#media-segunda-parte-door2door').html(ArchivoHtml); break;}
                case 'tercera-evidencia':  { $('#media-tercera-parte-door2door').html(ArchivoHtml); break;}
                case 'cuarta-evidencia':   { $('#media-cuarta-parte-door2door').html(ArchivoHtml);  break;}
                case 'quinta-evidencia':   { $('#media-quinta-parte-door2door').html(ArchivoHtml);  break;}
                case 'sexta-evidencia':    { $('#media-sexta-parte-door2door').html(ArchivoHtml);  break;}
            }
            /*<EVIDENCIAS>*/
                if(ResultF.evidencias.length > 0){                                      
                    for(let i = 0; i < ResultF.evidencias.length; i++ ){
                        let ArchivoIMPUT        = '';
                        let ArchivoHtml         = '';
                        let Direccion           = ResultF.evidencias[i].archivo;
                        let ArregloExtencion    = Direccion.split('.');

                        let tamano              = ArregloExtencion.length;
                        tamano                  = tamano -1;

                        if(
                                ArregloExtencion[tamano] == 'mp3' ||
                                ArregloExtencion[tamano] == 'ogg' ||
                                ArregloExtencion[tamano] == 'wav' 
                            ){
                                if(ArregloExtencion[tamano] == 'mp3'){
                                    ArchivoHtml = `
                                        <audio controls  src="${Direccion}" type="audio/mp3" controls  loop ></audio>
                                    `;
                                    ArchivoIMPUT = ArchivoHtml;
                                }else if(ArregloExtencion[tamano] == 'ogg'){
                                    ArchivoHtml = `
                                            <audio controls  src="${Direccion}" type="audio/ogg" controls  loop ></audio>
                                    `;
                                    ArchivoIMPUT = ArchivoHtml;
                                }else if(ArregloExtencion[tamano] == 'wav'){
                                    ArchivoHtml = `
                                            <audio controls  src="${Direccion}" type="audio/wav" controls  loop ></audio>
                                    `;
                                    ArchivoIMPUT = ArchivoHtml;
                                }
                        
                        }else if(
                                    ArregloExtencion[tamano] == 'png' ||
                                    ArregloExtencion[tamano] == 'jpg' ||
                                    ArregloExtencion[tamano] == 'jpeg' 
                                ){
                                ArchivoHtml = ` <img src="${Direccion}"  style="width:200px;height:200px;" class="">`;
                                ArchivoIMPUT = `<img src="${Direccion}"  class="img-fluid">`;

                        }else if(
                                ArregloExtencion[tamano] == 'mp4'  ||
                                ArregloExtencion[tamano] == 'webm' ||
                                ArregloExtencion[tamano] == 'ogv' 
                                ){
                                ArchivoHtml = `
                                        <video src="${Direccion}"  width=\"300\" height="\"300\" controls ></video>
                                `;
                                ArchivoIMPUT = ArchivoHtml;
                        }else{     
                            ArchivoHtml = '<img src="/door2door/Modules/ModulesImage/imagen.jpg"  style="width:200px;height:200px;" class="">'
                            ArchivoIMPUT = ArchivoHtml;
                        }
                            
                        ResultF.evidencias[i].INPUT = ArchivoIMPUT;                                   
                    }
                }
                localStorage.setItem('JSON_EVIDENCIAS_VISITAS', JSON.stringify(ResultF.evidencias));
            /*</EVIDENCIAS>*/

            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
        }else{
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
            $('#message-error-door2door').html("");
            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
            $('#modal-message-error-door2door').modal('show');
        }
    }
    /*<export>*/
        export default Archivos;
    /*</export>*/
/*</Create>*/  
