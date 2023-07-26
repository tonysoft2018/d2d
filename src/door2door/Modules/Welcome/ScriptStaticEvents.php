<script async src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDwQClTGJJEBxBdoDdpvZqj410LlfAb8FM&callback=initMap&'; ></script>

<script >

        
   
        /*<VARIABLES>*/
            let map;
            //let Arreglo     = JSON.parse(localStorage.getItem('JSON_LOCALIZACION'));
            let centerll    = {lat: 20.6766867, lng: -103.3786421};
        /*</VARIABLES>*/

        /*<MAP>*/                    
            function   initMap(){ 
                /*<INSTANCIACION>*/
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: centerll,
                        zoom: 12,
                        streetViewControl: false,               
                        mapTypeControl: false,
                        fullscreenControl: false,                         
                        disableDefaultUI: true,
                    });    
                /*<INSTANCIACION>*/ 
                setTimeout(() => {
                    let ArraysContactos = JSON.parse(localStorage.getItem('JSON_CONTACTOS'));
                    let marker      = new Array(ArraysContactos.length); 
                    let infowindow  = new Array(ArraysContactos.length); 
                   
                    for(let i = 0; i<ArraysContactos.length ; i++){
                       
                        /*<INFIRMACION>*/
                            infowindow[i]   = new google.maps.InfoWindow({
                                content: `
                                            <div class="row">
                                                <div class="col-12">
                                                    <label>Contactos:</label>         ${ArraysContactos[i].nombre}<br>
                                                    <label>Pais:</label>              ${ArraysContactos[i].Pais}<br>
                                                    <label>Estado:</label>            ${ArraysContactos[i].Estado}<br>
                                                    <label>Municipio:</label>         ${ArraysContactos[i].Municipio}<br>
                                                    <label>Colonia:</label>           ${ArraysContactos[i].colonia}<br>
                                                    <label>Calle:</label>             ${ArraysContactos[i].calle}<br>
                                                    <label>Entre calles:</label>      ${ArraysContactos[i].nombre}<br>
                                                    <label>No. Interior:</label>      ${ArraysContactos[i].noInterior}<br>
                                                    <label>No. Exterior:</label>      ${ArraysContactos[i].noExterior}<br>
                                                    <label>Codigo postal:</label>     ${ArraysContactos[i].codigoPostal}<br>
                                                    <label>Estatus:</label>           ${ArraysContactos[i].estatus}<br>
                                                </div>
                                            </div>
                                            <div><br>
                                                <div class="col-12">
                                                    <button 
                                                            type="button" 
                                                            onclick="mostarInformacionContacto(
                                                                 ${ArraysContactos[i].idContacto},
                                                                '${ArraysContactos[i].nombre}',
                                                                '${ArraysContactos[i].Pais}',
                                                                '${ArraysContactos[i].Estado}',
                                                                '${ArraysContactos[i].Municipio}',
                                                                '${ArraysContactos[i].colonia}',
                                                                '${ArraysContactos[i].calle}',
                                                                '${ArraysContactos[i].noInterior}',
                                                                '${ArraysContactos[i].noExterior}',
                                                                '${ArraysContactos[i].codigoPostal}',

                                                                '${ArraysContactos[i].email}',
                                                                '${ArraysContactos[i].estatus}',
                                                                '${ArraysContactos[i].entreCalle}',
                                                                '${ArraysContactos[i].telefono}'
                                                            );"
                                                            class="btn btn-info btn-block btn-sm evento-mostrar-informacio-contacto" 
                                                            id="button-info-contacto-door2door" > Mas Información </button>
                                                </div>
                                            </div>><br>
                                            
                                        `,
                                maxWidth: 300
                            });

                        /*</INFIRMACION>*/
                        /*<POSICION>*/
                            marker[i]       = new google.maps.Marker({
                                position: { 
                                    lat: parseFloat(ArraysContactos[i].latitud),
                                    lng: parseFloat(ArraysContactos[i].longitud)
                                },
                                map:map,
                                title: ArraysContactos[i].nombre,
                                icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png" }
                            });
                             /*<EVENTO POSICION>*/
                                marker[i].addListener('click', function() {                                
                                    map.setCenter(marker[i].getPosition());
                                    infowindow[i].open(map, marker[i]);
                                });
                            /*<EVENTO POSICION>*/
                        /*<POSICION>*/                      
                    }
                    
                    /*<EVENTO>*/
                  
                   
                    /*<EVENTO>*/
                }, 1200);
                
            
            
            }

        /*</MAP>*/  
  
    
</script>

<script type="module">
    /*<import librarys>*/     
        import DataTableV       from '../ModulePugins/Pluginjs/DataTable.var.main.js';
        import SelectAPIFull    from './js/API/API.SelectFull.main.js';
    /*<import librarys>*/ 

    $(document).ready(() =>{  
        /*<CARGAR SHOW>*/
            $('#id-main').addClass('opacidad');
            $('#body-main-div').show();
            $('#body-main-div').addClass('body-main');
        /*</CARGAR SHOW>*/   
        setTimeout(() => {
            /*<CARGAR HIDE>*/
                $('#id-main').removeClass('opacidad');
                $('#body-main-div').removeClass('body-main');
                $('#body-main-div').hide();
            /*</CARGAR HIDE>*/
        }, 1500);

        
        
        /*<Main Module Roles>*/     
            /*<SELECTED>*/
                const ResultSelectAPIFull = SelectAPIFull().
                then((result) =>{ console.log(result);
                    if(result){
                        if(result.message == "Good"){
                            let ArraysContactos = result.information;                       
                            localStorage.setItem('JSON_CONTACTOS', JSON.stringify(ArraysContactos));

                        }
                    }
                })

          
         
            
            
        /*</Main Module Roles>*/                                 
    });
</script>