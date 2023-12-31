<script>
    /*<Event Button Show # 1 >*/
        const ButtonShow  = ( id,  nombre,  tipoCuestionario, descripcion) => {
            $('#show-id-door2door').val(id);
            $('#show-nombre-door2door').val(nombre); 
            $('#show-descripcion-door2door').val(descripcion); 
            $('#show-tipoCuestionario-door2door').val(tipoCuestionario);
            
            $('#modal-show-door2door').modal('show');
        }
    /*/Events  Button Show # 1 >*/

    /*<Events  Button Update # 2 >*/
        const ButtonUpdate  = ( id,  nombre,  tipoCuestionario,descripcion) => {

            $('#update-id-door2door').val(id);
            $('#update-nombre-door2door').val(nombre);  
            $('#show-descripcion-door2door').val(descripcion); 
              
            let campo = ''; 
            if(tipoCuestionario == 'SOCIO VISITANTE'){
                campo = ` <option value="SOCIO VISITANTE" selected>SOCIO VISITANTE</option>
                          <option value="SOCIO CLIENTE" >SOCIO CLIENTE</option>`;
            }else  if(tipoCuestionario == 'SOCIO CLIENTE'){
                campo = ` <option value="SOCIO VISITANTE" >SOCIO VISITANTE</option>
                          <option value="SOCIO CLIENTE" selected >SOCIO CLIENTE</option>`;
            }
            $('#update-tipoCuestionario-door2door').html(campo);  

            $('#modal-update-door2door').modal('show');
        }
    /*<Events  Button Update # 2 >*/

    /*<Events  Button Delete # 3 >*/
        const ButtonDelete  = (id) => {            
            $('#delete-id-door2door').val(id);
            $('#modal-delete-door2door').modal('show');
        }
    /*<Events Button Delete # 1 >*/

    /*<Events  Button ButtonDeletePregunta # 3 >*/
        const ButtonDeletePregunta  = (j) => {            
            let Arreglo = JSON.parse( localStorage.getItem('JSON_PREGUNTAS') );
            let Arreglo2 = [];

            console.log(Arreglo);
            for(let i = 0; i< Arreglo.length; i++ ){
                if(i != j ){
                    Arreglo2.push(Arreglo[i]);
                }
            }


            console.log(Arreglo2);
            let Information = Arreglo2;

            $('#table-questions-door2door').dataTable().fnDestroy();   
            $('#table-questions-door2door-informacion').html('');



            setTimeout(() => {
                let record = '';
                let TableBody = ''; 

                if(Information.length > 0){ 
                    /*<Construccion del la tabla>*/ 
                        for(let i = 0; i <Information.length; i++) {
                            let option = "";
                            if(Information[i].tipoPregunta == "ABIERTA"){
                                option =  `<select class="custom-select" 
                                                    id="SELECTED-${i}" 
                                                    onchange="SelectedTipoPreg(${i});" 
                                                    style="background:#D1F0F5;" >
                                                <option value="ABIERTA" selected >ABIERTA</option>
                                                <option value="CERRADA" >CERRADA</option>
                                            </select> `;   
                            }else  if(Information[i].tipoPregunta == "CERRADA"){
                                option =  `<select class="custom-select" 
                                                    id="SELECTED-${i}" 
                                                    onchange="SelectedTipoPreg(${i});" 
                                                    style="background:#D1F0F5;" >
                                                <option value="ABIERTA">ABIERTA</option>
                                                <option value="CERRADA" selected >CERRADA</option>
                                            </select> `;   
                            }else{
                                option =  `<select class="custom-select" 
                                                id="SELECTED-${i}" 
                                                onchange="SelectedTipoPreg(${i});" 
                                                style="background:#D1F0F5;" >
                                            <option value="ABIERTA">ABIERTA</option>
                                            <option value="CERRADA" >CERRADA</option>
                                        </select> `;   
                            }
                            record =  `
                            <tr>
                                <td style="width:50px;vertical-align:middle;" >                    ${i+1}</td>
                                <td style="width:400px;vertical-align:middle;" class="text-justify">
                                    <textarea type="text"   id="TextarePregunta-${i}" 
                                                            onchange="TextarePregunta(${i});"  
                                                            class="form-control" 
                                                                >${Information[i].pregunta}
                                    </textarea>
                                </td>  
                                <td style="width:200px;"> 
                                    ${option}                                    
                                </td>
                                <td style="width:50px;"> 
                                    <img        class="cursor" 
                                                title="Eliminar" 
                                                onclick="ButtonDeletePregunta(${i});" 
                                                src="/door2door/Modules/ModulesImage/basura.png" 
                                                style="width:30px;height:30px" >
                                </td>
                            </tr> `;  
                            
                            TableBody +=  record;
                        }
                    /*</Construccion del la tabla>*/              
                }
                localStorage.setItem('JSON_PREGUNTAS', JSON.stringify(Information));
                $('#table-questions-door2door-informacion').html(TableBody);   
                $('#table-questions-door2door').DataTable({
                                                                responsive: true,
                                                                rowReorder: {    selector: 'td:nth-child(2)'},                        
                                                                "language": {      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"},
                                                                "paging": true,
                                                                dom: 'lBfrtip',
                                                                order: [[0, "desc"], [1, "desc"]],
                                                                buttons: [  'excel', 'csv', 'pdf', 'print', 'copy',   ],
                                                                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                                                        });
                console.log(Arreglo4);
                let Arreglo4 = JSON.parse( localStorage.getItem('JSON_PREGUNTAS') );
            },500 );
           
        }
    /*<Events Button Delete # 1 >*/

    /*<Events  Button Delete # 3 >*/
        const TextarePregunta  = (j) => {            
            let Arreglo = JSON.parse(localStorage.getItem('JSON_PREGUNTAS'));
            let pregunta = $('#TextarePregunta-'+j).val();
            for(let i = 0; i< Arreglo.length; i++ ){
                if(i == j ){
                    Arreglo[i].pregunta = pregunta
                }
            }
            localStorage.setItem('JSON_PREGUNTAS', JSON.stringify(Arreglo));
        }
    /*<Events Button Delete # 1 >*/

    /*<Events  Button Delete # 3 >*/
        const SelectedTipoPreg  = (j) => 
        {            
            let Arreglo         = JSON.parse(localStorage.getItem('JSON_PREGUNTAS'));
            
            let tipoPregunta    = $('#SELECTED-'+j).val();
            Arreglo[j].tipoPregunta = tipoPregunta
            localStorage.setItem('JSON_PREGUNTAS', JSON.stringify(Arreglo));
        }
    /*<Events Button Delete # 1 >*/
    

   
  
</script>