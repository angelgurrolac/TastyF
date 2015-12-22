$(document).ready(function(){	
	$('button').on('click', function(e){  
		var miboton=$(this);		
		var empresa = $(this).prev('input').val();									
   		e.preventDefault();
				$.ajax({
					type: 'post',
					url: '/sedeco/searchEnte',
					data: { empresa: empresa  },
					dataType: 'json',
			        beforeSend: function(){


			        },
					success: function (data) {										
						var divEmpresas = miboton.parents('.panel-body').find('.empresas');			
						row = $('<tr></tr>').addClass('col-md-12');
						row.append($('<td>').
		 				attr('class','text-center'). 	
		 				text('Se muestran empresas que lleven en su nombre "' +empresa +'"'));			
	 					divEmpresas.append(row);
	 								
						mostrarSug(data, divEmpresas);
						$("#sug").show();
						$('#ver').hide();
						$('#ocultar').hide();
						var selected = [];
     			 		i=0;
					}

	   				
	   			});

		});
	$('.avanzado').on('click', function(e){  
			
	});
});
function isEmptyJSON(obj) {
  		for(var i in obj) { return false; }
  		return true;
	}

	function mostrarSug(data,divEmpresas){
		var i = 0;
		if(!isEmptyJSON(data)){
					for (value in data)
					{	
						if(i == 5)	{
							return;
						}
						var form = $('<form></form>').
						attr('action', '/sedeco/vincular_empresa').
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
	             		attr("value", "Vincular empresa")   
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

	     //        		table.append($('<input>').
	 				// 	attr('type', 'hidden' ).	 					
						// attr('name', 'categoria').
	     //        		attr("value", data[value].categoria_id)
	     //        		);

	            		table.append($('<input>').
	 					attr('type', 'hidden' ).
	 					attr('class', 'visto').
						attr('name', 'empresa_id').
	            		attr("value", data[value].id)
	            		);

						form.append(table);

						divEmpresas.append(form);
						i++;
					} 
					
				}
				else
				{
					divEmpresas.empty();
					var table = $('<table></table>').addClass("solicitudes_vermas");

					
					row = $('<tr></tr>');

					row.append($('<td>').
	 				attr('class','text-center'). 	
	 				text('No se encontraron empresas con este nombre'));

					table.append(row);

					divEmpresas.append(table);
				}
	}


