/*<import>*/    
    import SelectFullSessions       from '../API/API.SelectFull.Sessions.main.js';
    import DataTableV       from '../../../ModulePugins/Pluginjs/DataTable.var.main.js';
/*</import>*/    

/*<TrakingShow>*/           
    const ShowSessions = async() => { 
        let idUser = $('#update-id-door2door').val();        
        if(idUser > 0){
            const funSelectFull = SelectFullSessions(idUser). 
            then( (result) => { console.log(result.information)
                if(result){ 
                    if(result.message == 'Good'){
                        let Information = result.information;
                        $('#table-session-door2door').dataTable().fnDestroy();    
                        if(Information.length > 0){ 
                            let record = '';
                            let TableBody = '';
                            for(let i = 0; i <Information.length; i++) {
                                if(Information[i].fechaSalida == 'null' || Information[i].fechaSalida === null){
                                    Information[i].fechaSalida = 'Sin sesión cerrada';
                                }
                                record =  `
                                        <tr>
                                            <td style="width:50px;vertical-align:middle;" >                    ${i+1}</td>
                                            <td style="width:250px;vertical-align:middle;" class="text-justify">${Information[i].nombre}</td>
                                            <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].ip}</td>     
                                            <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].fechaEntrada}</td>                     
                                            <td style="width:200px;vertical-align:middle;" class="text-justify">${Information[i].fechaSalida}</td>    
                                        </tr> `;  
                                TableBody +=  record;
                            }           
                            
                            $('#table-session-door2door-informacion').html(TableBody)   
                           
                            
                        }     
                        $('#modal-ShowSessions-door2door').modal('show');
                        $('#table-session-door2door').DataTable(DataTableV);
                    }else{
                        
                    }
                }else{

                }
            }).catch((error) => {

            })
        }
        
        
    }
/*<export>*/
    export default ShowSessions;
/*</export>*/
/*</TrakingShow>*/   
