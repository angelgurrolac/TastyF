$(document).ready(function(){
	$('#filtrar').hide();

	$('#criterios').bind('click', function(e){    
			
		if ( $('#filtrar').is(':visible') ){
			$('#filtrar').hide();
		}
		else
		{
			$('#filtrar').show();
		}
	});

	$('#buscar').bind('click', function(e){  
			
			if($('#nomb_s').is(":checked")){				
				var nombre=$("#nomb_sol").val();
			}
			else
			{

				var nombre="";
			}
			if($('#desc_s').is(":checked")){
				var descripcion=$("#desc_sol").val();
			}
			else
			{
					var descripcion="";
			}
			if($('#estatus').is(":checked")){
				var estatus=obtenerValor();
			}
			else
			{
				var estatus="";
			}    		    	
    		var texto = $('').val();    		
    		$.ajax({
    			type: 'post',
				url: '/anclas/buscarSoli',
				data: { nombre: nombre, descripcion: descripcion, estatus: estatus },
				dataType: 'json',
		        beforeSend: function(){


		        },
				success: function (data) {						
					$("#contenedor").empty();				
					mostrarSoli(data);								
				}

    		});


	});

		$('#nomb_s').change(function() {
    		$('#nomb_sol').attr('disabled',!this.checked);
		});


		$('#desc_s').change(function() {
    		$('#desc_sol').attr('disabled',!this.checked);
		});

	// $('#estatus').change(function(){		
	// 	$("#tipos_estatus").find("input:radio").each(function() {
	// 		 $('.radio-inline').prop('disabled',this.checked);
	// 	});
	// });


	function obtenerValor()
	{
		return $("#tipos_estatus input[type='radio']:checked").val()

	}



});

function isEmptyJSON(obj) {
  		for(var i in obj) { return false; }
  		return true;
	}

function mostrarSoli(data){
		
		if(!isEmptyJSON(data)){
					for (value in data)
					{	
					
						var div1 = $('<div></div>').
						attr('class', 'panel panel-default');

						var div2 = $('<div></div>').
						attr('class', 'panel-body');

						var table = $('<table></table>').addClass("solicitudes");
					
						var row1 = $('<tr></tr>');
						var row2 = $('<tr></tr>');
						var row3 = $('<tr></tr>');
						
						

						var th1 = $('<th></th>').
						attr('class','imagen').
						attr('scope','col').
						attr('rowspan','3');
						string = data[value].producto_id.toString().split("");
						th1.append($('<img>').	 			
	 					attr("src", '/assets/img/'+string[0]+string[1]+'.png')
	 					);

						row1.append(th1);

						var th2 = $('<th></th>').
						attr('class','datos').
						attr('scope','col').
						text( data[value].nombre_especifico);																														
	 					
						row1.append(th2);	 					

	 					var th3 = $('<th></th>').
	 					attr('class','opciones').
						attr('scope','col').
						attr('rowspan','3');
	 					
	 					var a1 = $('<a></a>').
	 					attr('href','/anclas/'+data[value].id+'/vermas')

	 					a1.append($('<img>').	 			
	 					attr("src", '/assets/img/vermas.png')
	 					);

	 					th3.append(a1);

	 					row1.append(th3);	 	 		

	 					var td1 = $('<td></td>').
	 					attr('class','datos').
						text( data[value].rama);

						row2.append(td1);

						var td2 = $('<td></td>');

						td2.append($('<img>').	 			
	 					attr("src", '/assets/img/icono-S_gray.png')
	 					);

	 					td2.append($('<img>').	 			
	 					attr("src", '/assets/img/icono-O_gray.png')
	 					);

	 					td2.append($('<img>').	 			
	 					attr("src", '/assets/img/icono-V_gray.png')
	 					);

	 					row3.append(td2);

						table.append(row1);					            		
	            		table.append(row2);						
						table.append(row3);
											            
						div2.append(table);
						div1.append(div2);

						$('#contenedor').append(div1);
						
					} 
					
				}
				else
				{
					var table = $('<table></table>').addClass("solicitudes");

					
					row = $('<tr></tr>');

					row.append($('<td>').
	 				attr('class','text-center'). 	
	 				text('No se encontraron solicitudes con sus criterios de busqueda'));

					table.append(row);

					$('#contenedor').append(table);
				}
	}
