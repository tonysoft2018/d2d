
// Crear Usuario            
const Crear = async() => { 
    let FechaInicio    =  $('#crear-fechainicio-2box').val();
    let FechaFinal     =  $('#crear-fechafinal-2box').val();
    let file           =    '';
    
    if( $('#create-excel-create-excel').is(':checked') ) {
        file = $('#create-excel-create-excel').val();
    }else if( $('#create-pdf-create-pdf').is(':checked') ) {
        file = $('#create-pdf-create-pdf').val();
    }
    console.log(file)
    if( 
        FechaInicio != ''  &&
        FechaFinal  != ''  
    ){
        let win = window.open( `/d2dSocioWeb/Modules/ModuleReportCampaign/api/door2door.controller.create.php?file=${file}&FechaInicio=${FechaInicio}&FechaFinal=${FechaFinal}&token=423421342442134242134214412421342341234234`, '_blank');
        
    }else{
        $('#mensaje-advertencia').html("");
        $('#mensaje-advertencia').html("FAVOR DE INTRODUCIR LOS CAMPOS OBLIGATORIOS");
        $('#modal-mensajes-advertencia-2box').modal('show');

        $('#crear-fechainicio-2box').addClass("is-invalid");
        $('#crear-fechafinal-2box').addClass("is-invalid");
        $('#crear-sucursal-2box').addClass("is-invalid");
        $('#crear-cajas-2box').addClass("is-invalid");

        
    }
                     
}
export default Crear;
