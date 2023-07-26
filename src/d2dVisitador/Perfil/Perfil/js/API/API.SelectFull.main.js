// Metodo de ListaCostos             
const ConsultarTodoAPI = async(idUsuario) => {   
    let TockenOfdoor2doordoor2door = $('#tocken-door2doors-01198756765345431234534').val();   
    const Peticion = await $.ajax({
        url: "/d2dVisitador/Perfil/Perfil/api/door2door.controller.select.php",
        type: 'post',
        async: false,
        dataType: "json",
        data: { 
            TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
            idUsuario:idUsuario 
        }        
    });              
    const Respuesta = Peticion;  
    return Respuesta;   
                         
}

export default ConsultarTodoAPI;
