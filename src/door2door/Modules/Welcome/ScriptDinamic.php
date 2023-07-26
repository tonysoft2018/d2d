

<script>
    const mostarInformacionContacto = (
                idContacto,
                nombre,
                Pais,
                Estado,
                Municipio,
                colonia,
                calle,
                noInterior,
                noExterior,
                codigoPostal,

                email,
                estatus,
                entreCalle,
                telefono

        ) => {
        $('#create-contactos-id-door2door').val(idContacto);
        $('#create-contactos-nombre-door2door').val(nombre);
        $('#create-contactos-pais-id-door2door').val(Pais);
        $('#create-contactos-estado-door2door').val(Estado);
        $('#create-contactos-municipio-door2door').val(Municipio);
        $('#create-contactos-colonia-door2door').val(colonia);
        $('#create-contactos-calle-door2door').val(calle);
        
        $('#create-contactos-nointerior-door2door').val(noInterior);
        $('#create-contactos-noexterior-door2door').val(noExterior);

        $('#create-contactos-codigopostal-door2door').val(codigoPostal);
        $('#create-contactos-email-door2door').val(email);
        $('#create-contactos-estatus-door2door').val(estatus);
        $('#create-contactos-entreCalle-door2door').val(entreCalle);
        $('#create-contactos-telefono-door2door').val(telefono);
        setTimeout(() => {
       
            let idContacto                  = $('#create-contactos-id-door2door').val();
            let TockenOfdoor2doordoor2door  = $('#tocken-door2doors-01198756765345431234534').val(); 
                
            $.ajax({
                url: "/d2dSocioWeb/Modules/Welcome/api/door2door.controller.select.full.Visitas.php",
                type: 'post',
                async: false,
                dataType: "json",
                data: { 
                    TockenOfdoor2doordoor2door:TockenOfdoor2doordoor2door,
                    idContacto:idContacto
                }        
            }).
            then((result)=>{
                if(result){ console.log(result);
                    if(result.message == 'Good'){

                    }
                }
            });              
        
    }, 500);


        $('#modal-contactos-inicio-door2door').modal('show');
    }
</script>
