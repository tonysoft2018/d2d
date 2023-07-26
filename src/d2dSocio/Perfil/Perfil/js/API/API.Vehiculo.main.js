// Metodo de ListaCostos             
const VehiculoAPI = async(
    Vehiculo
) => {   
    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();  
    const Peticion = await $.ajax({
        url: "/d2dSocio/Perfil/Perfil/api/door2door.controller.vehiculo.php",
        type: 'post',
        async: false,
        dataType: "json",
        data: { 
            TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
            Vehiculo:Vehiculo,
        }      
    });              
    const Respuesta = Peticion;  
    return Respuesta;                            
}
export default VehiculoAPI;
