// Metodo de ListaCostos             
const ContratoAPI = async() => {   
    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();  
    const Peticion = await $.ajax({
        url: "/d2dSocio/Perfil/Perfil/api/door2door.controller.contratos.php",
        type: 'post',
        async: false,
        dataType: "json",
        data: { 
            TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door
        }      
    });              
    const Respuesta = Peticion;  
    return Respuesta;                            
}
export default ContratoAPI;
