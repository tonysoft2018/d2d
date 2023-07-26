import CrearAPI       from '../API/API.Create.main.js';

// ActualizarUsuarioAPI Usuario            
const Crear = async(informationForm) => { 

    
    const FuCrear = await CrearAPI( informationForm ).
    then( (result) => {  console.log("############");  console.log(result)     
        if(result){
            if(result.message == 'Good'){
                if(result.FACE == 'FACE_PRIMERA')
                {
                    $('#update-imagen-perfil-door2door').html('<img src="'+result.DIRECCION+'" style="width:200px;height:200px;" class="img-circle elevation-2">');
                    $('#modal-imagen-perfil-door2door').modal('hide');
                }
                else if(result.FACE == 'FACE_SECUNDARIA')
                {
                    $('#form-face-primera-door2door').hide();
                    $('#form-face-segunda-door2door').hide();

                    $('#form-face-tercera-door2door').show();

                    $('#form-face-cuarta-door2door').hide();
                    $('#form-face-quinta-door2door').hide();                    
                    $('#form-face-sexta-door2door').hide();
                    $('#form-face-septima-door2door').hide();
                    $('#form-face-octavo-door2door').hide();
                }
                else if(result.FACE == 'FACE_CUARTA')
                {
                    console.log(result.FACE)
                    $('#update-comprobante-door2door').html(' <img src="'+result.DIRECCION+'" style="width:200px;height:200px;" > ');
                    $('#modal-imagen-comprobante-door2door').modal('hide');
                }
                else if(result.FACE == 'FACE_QUINTA')
                {
                    $('#update-imagen-INEF-door2door').html('<img src="'+result.DIRECCION+'" style="width:200px;height:200px;" class="">');
                    $('#modal-imagen-INEF-door2door').modal('hide');
                }
                else if(result.FACE == 'FACE_SEXTA')
                {
                    $('#update-imagen-INED-door2door').html('<img src="'+result.DIRECCION+'" style="width:200px;height:200px;" class=" ">');
                    $('#modal-imagen-INED-door2door').modal('hide');
                }
                else if(result.FACE == 'FACE_SEPTIMA')
                {
                    $('#update-imagen-TarejetCF-door2door').html('<img src="'+result.DIRECCION+'" style="width:200px;height:200px;" class=" ">');
                    $('#modal-imagen-TarejetCF-door2door').modal('hide');
                }
                else if(result.FACE == 'FACE_OCTABA')
                {
                    $('#update-imagen-bancaria-door2door').html('<img src="'+result.DIRECCION+'" style="width:200px;height:200px;" class=" ">');
                    $('#modal-imagen-bancaria-door2door').modal('hide');
                }
                
                
                $('#message-succes-door2door').html("");
                $('#message-succes-door2door').html('OPERACION EXITOSA');
                $('#modal-message-succes-door2door').modal('show');   
            
                 return  'Good';
                
            }else{

                $('#message-error-door2door').html("");
                $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
                $('#modal-message-error-door2door').modal('show');
                return  'bad';
            }
        }else{

            $('#message-error-door2door').html("");
            $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
            $('#modal-message-error-door2door').modal('show');
            return  'bad';
            
        }                           
    }).catch( (err) => { 

        $('#message-error-door2door').html("");
        $('#message-error-door2door').html('¡ERROR AL RECARGAR LA PAGUINA!');
        $('#modal-message-error-door2door').modal('show');
        return  'bad';

    });
  
}
export default Crear;
