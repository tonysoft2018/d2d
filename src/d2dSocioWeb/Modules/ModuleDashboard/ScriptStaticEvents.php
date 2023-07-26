<script type="module">
            // Evento inicio de sistema 
            
          
            import ConsultaAPI                  from './js/API.ConsultarTodos.main.js';

            let Datatable = {
                responsive: true,
                rowReorder: {    selector: 'td:nth-child(2)'},                        
                "language": {      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
                "paging": true,
                dom: 'Bfrtip',
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            };

            let ArregloColores = [
                'rgb(0,0,0)',
                'rgb(255,255,255)',
                'rgb(0,255,0)',
                'rgb(0,0,255)',
                'rgb(255,255,0)',
                'rgb(0,255,255)',
                'rgb(255,0,255)',
                'rgb(192,192,192)',
                'rgb(128,128,128)',
                'rgb(219,112,147)',
                'rgb(255,160,122)',
                'rgb(128,0,0)',
                'rgb(240,230,140)',
                'rgb(107,142,35)',
                'rgb(0,250,154)',
                'rgb(0,255,127)',
                'rgb(46,139,87)',
                'rgb(0,255,255)',
                'rgb(224,255,255)',
                'rgb(95,158,160)',
                'rgb(75,0,130)',
                'rgb(153,50,204)',
                'rgb(255,105,180',
                'rgb(255,235,205)',
                'rgb(160,82,45)',
                'rgb(210,105,30)',
                'rgb(222,184,135)',
                'rgb(255,228,181)',
                'rgb(176,196,222)',
                'rgb(211,211,211)',
                'rgb(123,104,238)',
                'rgb(165,42,42)',
                'rgb(240,255,255)'
            ]
           

            $(document).ready(() =>{      
                setTimeout(() => {
                    /*<CARGAR HIDE>*/
                        $('#id-main').removeClass('opacidad');
                        $('#body-main-div').removeClass('body-main');
                        $('#body-main-div').hide();
                    /*</CARGAR HIDE>*/
                }, 1500);  

                 /*<Asignamos Fecha>*/
                    let fecha   = new Date(); //Fecha actual
                    let mes     = fecha.getMonth()+1; //obteniendo mes
                    let dia     = fecha.getDate(); //obteniendo dia
                    let ano     = fecha.getFullYear(); //obteniendo año
                    if(dia<10)
                        dia     ='0'+   dia; 
                    if( mes<10)
                        mes     ='0'+   mes; 
                    let FechaInicial    = ano+"-"+mes+"-"+dia; 

                    $('#crear-fechainicio-2box').val(FechaInicial);
                    $('#crear-fechafinal-2box').val(FechaInicial);
                /*</Asignamos Fecha>*/



                /*<Tipo de dashboard>*/
                    $('#crear-tipo-door2door').on( 'change', () =>
                    {
                        let Tipo = $('#crear-tipo-door2door').val();  
                      
                        switch(Tipo){
                            case 'CAMPANAS':{       const FunConsultar1 = CAMPANAS();   break;  }
                            case 'VISITAS':{        const FunConsultar1 = VISITAS();    break;  } 
                            case 'COMISIONES':{     const FunConsultar1 = COMISIONES(); break;    }                            
                        }
                     });
                /*</Tipo de dashboard>*/  
                
            });

               
            const CAMPANAS = () => {

                /*<Mostrar Informacion >*/
                    $('#dashboar-campanas').show();

                    $('#dashboar-visitas').hide();
                    $('#dashboar-comisiones').hide();
                /*<Mostrar Informacion >*/

                /*<Consulta>*/ 
                    let fechainicio = $('#crear-fechainicio-2box').val();
                    let fechafinal = $('#crear-fechafinal-2box').val();

                    const Consulta = ConsultaAPI('CAMPANAS',  fechainicio, fechafinal ).
                    then((res) => { console.log(res);
                        if(res){
                            if(res.message == 'Good'){
                                let Arreglo = res.information;

                                /*<Variables>*/
                                    let ArregloCampo        = '';
                                    let NombreSocio = [];
                                /*</Variables>*/

                                /*<JSON>*/                                    
                                    for(let i = 0; i <Arreglo.length; i++) {                                        
                                        NombreSocio.push(Arreglo[i].NombreCorto);                                       
                                        
                                    }                                   
                                  
                                
                                /*</JSON>*/
                                /*<Grafica>*/
                                    let ctx     = document.getElementById('dashboar-campanas-canvas').getContext('2d');
                                    let myChart = new Chart(ctx,{
                                        type:"bar",
                                        data:{
                                                labels:"Campañas",
                                                datasets:[
                                                    {
                                                        label:'Campañas',
                                                        data:[34,45,67],
                                                        backgroundColor:ArregloColores,
                                                        hoverOffset: 4
                                                    }
                                                ],
                                                option:{
                                                    scales:{
                                                        yAxes:[{
                                                            beginAtZero:true
                                                        }]
                                                    }
                                                }
                                        }
                                    });
                                    console.log("Grafica campanas "+myChart);
                                /*</Grafica>*/
                            }
                        }
                    }).catch( (err) => {
                        console.log(err);
                    });
                /*<Consulta>*/
            }

            const VISITAS = () => {
                /*<Mostrar Informacion >*/
                    $('#dashboar-campanas').hide();

                    $('#dashboar-visitas').show();

                    $('#dashboar-comisiones').hide();
                /*<Mostrar Informacion >*/

                /*<Conssulta>*/
                    let fechainicio = $('#crear-fechainicio-2box').val();
                    let fechafinal  = $('#crear-fechafinal-2box').val();

                    const Consulta = ConsultaAPI('VISITAS',  fechainicio, fechafinal ).
                    then((res) => { console.log(res);
                        if(res){
                            if(res.message == 'Good'){
                                let Arreglo = res.information;
                               
                                /*<Variables>*/
                                    let Campo               = '';
                                    let CampoFoot           = '';
                                    let ArregloCampo        = '';
                                    let Total               = 0;
                                    let ArregloSucursales   = [];
                                    let ArregloVentaDiaAnterior        = [];
                                    let ArregloVentaDiaSeleccionado    = [];
                                /*</Variables>*/

                                /*<JSON>*/                                    
                                    for(let i = 0; i <Arreglo.length; i++) { 
                                        ArregloVentaDiaAnterior.push(Arreglo[i].SocioVisitador);
                                        
                                    }
                                    

                                /*</JSON>*/

                                /*<Grafica>*/

                                    let ctx     = document.getElementById('dashboar-visitas-canvas').getContext('2d');
                                    let myChart = new Chart(ctx,{
                                        type:"bar",
                                        data:{
                                                labels:ArregloVentaDiaAnterior,
                                                datasets:[
                                                    {
                                                        label:'Visitas',
                                                        data:[  34,45,67,34,45,67,34,42,62,31,45,67,34,45,67,34,45,67,34,45,67,34,45,67,34,45,67,34,42,62,31,45,
                                                                67,34,45,67,34,45,67,34,45,67,34,45,67,34,45,67,34,42,62,31,45,67,34,45,67,34,45,67,34,45,67,34,
                                                                45,67,34,45,67,34,42,62,31,45,67,34,45,67,34,45,67,34,45,67
                                                            ],
                                                        backgroundColor:ArregloColores,
                                                        hoverOffset: 4
                                                    }
                                                ],
                                                option:{
                                                    scales:{
                                                        yAxes:[{
                                                            beginAtZero:true
                                                        }]
                                                    }
                                                }
                                        }
                                    });
                                    console.log("Grafica visitas "+myChart);
                                /*</Grafica>*/
                            }
                        }
                    }).catch( (err) => {
                        console.log(err);
                    });
                /*<Conssulta>*/
            }

            const COMISIONES = () => {
                /*<Mostrar Informacion >*/
                   $('#dashboar-campanas').hide();

                    $('#dashboar-visitas').hide();
                    
                    $('#dashboar-comisiones').show();
                /*<Mostrar Informacion >*/

                /*<Conssulta>*/
                    let fechainicio = $('#crear-fechainicio-2box').val();
                    let fechafinal = $('#crear-fechafinal-2box').val();

                    const Consulta = ConsultaAPI('COMISIONES',  fechainicio, fechafinal ).
                    then((res) => { console.log(res);
                        if(res){
                            if(res.message == 'Good'){
                                let Arreglo = res.information;
                                /*<Variables>*/
                                let Campo               = '';
                                    let CampoFoot           = '';
                                    let ArregloCampo        = '';
                                    let Total               = 0;
                                    let ArregloSucursales   = [];
                                    let ArregloVenta        = [];
                                /*</Variables>*/

                                /*<JSON>*/                                    
                                    for(let i = 0; i <Arreglo.length; i++) {   
                                        ArregloSucursales.push(Arreglo[i].NombreCorto);
                                        ArregloVenta.push(Arreglo[i].TotalVenta)
                                        
                                    }   
                                
                                /*</JSON>*/
                                /*<Grafica>*/
                                    let ctx     = document.getElementById('dashboar-comisiones-canvas').getContext('2d');
                                    let myChart = new Chart(ctx,{
                                        type:"bar",
                                        data:{
                                                labels:ArregloSucursales,
                                                datasets:[
                                                    {
                                                        label:'Comiciones',
                                                        data:[34,45,67],
                                                        backgroundColor:ArregloColores,
                                                        hoverOffset: 4
                                                    }
                                                ],
                                                option:{
                                                    scales:{
                                                        yAxes:[{
                                                            beginAtZero:true
                                                        }]
                                                    }
                                                }
                                        }
                                    });
                                    console.log("Grafica comisiones "+myChart);
                                /*</Grafica>*/
                            }
                        }
                    }).catch( (err) => {
                        console.log(err);
                    });
                /*<Conssulta>*/
            }

          


        </script>
      