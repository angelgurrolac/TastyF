$(document).ready(function(){
		$('#ver').hide();
		$('#ocultar').hide();
		$('#contenedor').hide();
		var selected = [];
     			 i=0;
		$('#sug').bind('click', function(e){    
			var codigo	=  $('#codigo').val();
			var solicitud_id = $('#solicitud_id').val();
			e.preventDefault();
			$.ajax({
				type: 'post',
				url: '/anclas/suggestions',
				data: { code: codigo, soli: solicitud_id },
				dataType: 'json',
		        beforeSend: function(){


		        },
				success: function (data) {	
					row = $('<tr></tr>');

					row.append($('<td>').
	 				attr('style','text-align :center'). 	
	 				attr('class','solicitudes_vermas').
	 				text('Se muestran empresas relacionadas con su solicitud'));			
	 				$('#sugerencias').append(row);
					mostrarSug(data);
					$('#sug').hide();
					$('#ocultar').show();
					$('#contenedor').show();					
				}
			});
		});

		$('#ver').bind('click', function(e){ 
			$('#ver').hide();
			$('#ocultar').show();
			$('#contenedor').show();
		});

		$('#ocultar').bind('click', function(e){ 
			$('#ocultar').hide();
			$('#ver').show();
			$('#contenedor').hide();
		});

		$('#more').on('click', function(e){			    
   				 $("#sugerencias").find(".visto").each(function() {
        				selected [i] = this.value;
        				i++;
				});   				    				
   				var codigo	=  $('#codigo').val();
   				var solicitud_id = $('#solicitud_id').val();
   				var vistos = selected;
		   		e.preventDefault();
				$.ajax({
					type: 'post',
					url: '/anclas/getMoreSuggestions',
					data: {code: codigo, vistos: selected, soli: solicitud_id  },
					dataType: 'json',
			        beforeSend: function(){


			        },
					success: function (data) {				
						
						mostrarSug(data);
					}

	   				
	   			});
		});

		$('#buscar').on('click', function(e){  
			var empresa = $('#nombreEmp').val();
						
   			e.preventDefault();
				$.ajax({
					type: 'post',
					url: '/anclas/searchEnte',
					data: { empresa: empresa  },
					dataType: 'json',
			        beforeSend: function(){


			        },
					success: function (data) {				
						$("#sugerencias").empty();	
						row = $('<tr></tr>');

						row.append($('<td>').
		 				attr('class','text-center'). 	
		 				text('Se muestran empresas que lleven en su nombre "' +empresa +'"'));			
	 					$('#sugerencias').append(row);				
						mostrarSug(data);
						$("#sug").show();
						$('#ver').hide();
						$('#ocultar').hide();
						var selected = [];
     			 		i=0;
					}

	   				
	   			});

		});
});

	function isEmptyJSON(obj) {
  		for(var i in obj) { return false; }
  		return true;
	}

	function mostrarSug(data){
		var i = 0;
		if(!isEmptyJSON(data)){
					for (value in data)
					{	
						if(i == 5)	{
							return;
						}
						var form = $('<form></form>').
						attr('action', '/anclas/agregar_empresa').
						attr("method", "post");

						var table = $('<table></table>').addClass("solicitudes_vermas");
					
						var row1 = $('<tr></tr>');
						var row2 = $('<tr></tr>');
						var row3 = $('<tr></tr>');
						var row4 = $('<tr></tr>');
						

						var separa = $('<td></td>').
						attr('colspan','5');

						separa.append($('<hr>').
							attr('class', 'solicitud'));

						row1.append(separa);

						var th1 = $('<th></th>').
						attr('rowspan','2').
						attr('scope','col');																														
	 					
	 					th1.append($('<img>').
	 					attr("class", "img-vermas-perfilempresa").
	 					attr("src", '/' + data[value].imagen).
	 					attr('width','72').
	 					attr('height','72')
	 					);

	 					var th2 = $('<th></th>').
						attr('scope','col').
						text( data[value].nombre);


	 					var th3 = $('<th></th>').
						attr('scope','col');
	 					
	 					th3.append($('<img>').	 			
	 					attr("src", '/assets/img/icono_4.png')
	 					);

	 					th3.append( data[value].calif_positivas);

	 					var th4 = $('<th></th>').
						attr('scope','col');
	 					
	 					th4.append($('<img>').	 			
	 					attr("src", '/assets/img/icono_3.png')
	 					);

	 					th4.append( data[value].calif_negativas);

	 					row2.append(th1);
						row2.append(th2);
						row2.append(th3);
						row2.append(th4);

	 					var td1 = $('<td></td>').
						text( data[value].producto);

						var th5 = $('<th></th>').
						attr('scope','col');
	 					
	 					th5.append($('<img>').	 			
	 					attr("src", '/assets/img/icono_1.png')
	 					);

	 					th5.append( data[value].calif_neutras);

	 					var th6 = $('<th></th>').
						attr('scope','col');
	 					
	 					th6.append($('<img>').	 			
	 					attr("src", '/assets/img/icono_2.png')
	 					);

	 					var td2 = $('<td></td>');

	 					td2.append($('<input>').
	            		attr("class", "btn btn-primary pull-right").
	             		attr("type", "submit").
	             		attr("value", "Agregar empresa")   
	         			);

	 					row3.append(td1);
	 					row3.append(th5);
	 					row3.append(th6);
	 					row3.append(td2);

	 					var separa2 = $('<td></td>').
						attr('colspan','5');

						separa2.append($('<hr>').
							attr('class', 'solicitud'));

	 					row4.append(separa2);	        		

						table.append(row1);					            		
	            		table.append(row2);						
						table.append(row3);
						table.append(row4);
						
						table.append($('<input>').
	 					attr('type', 'hidden' ).	 					
						attr('name', 'solicitud_id').
	            		attr("value", $('#solicitud_id').val() )
	            		);

	            		table.append($('<input>').
	 					attr('type', 'hidden' ).
	 					attr('class', 'visto').
						attr('name', 'empresa').
	            		attr("value", data[value].id)
	            		);

						form.append(table);

						$('#sugerencias').append(form);
						i++;
					} 
					
				}
				else
				{
					var table = $('<table></table>').addClass("solicitudes_vermas");

					
					row = $('<tr></tr>');

					row.append($('<td>').
	 				attr('class','text-center'). 	
	 				text('No se encontraron empresas relacionadas con su solicitud'));

					table.append(row);

					$('#sugerencias').append(table);
				}
	}


