// Metodo de ListaCostos             
const CrearAPI = async(PlataformaForm) => {   
    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();
    console.log(TockenOfdoor2doordoor2door)
    PlataformaForm.append("TockenOfPlatformdoor2door",TockenOfdoor2doordoor2door);               
    const Peticion = await $.ajax({
        url: "/d2dVisitador/Perfil/Perfil/api/door2door.controller.create.php",
        type: 'post',
        async: false,
        data: PlataformaForm,        
        dataType:"json",
        contentType:false,
        processData:false,
        cache:false            
    });              
    const Respuesta = Peticion;  
    return Respuesta;                            
}
export default CrearAPI;
