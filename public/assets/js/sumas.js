 $(document).ready(function(){
 		
		$(".inicial").on("keyup", function() {
		 	var valor = $(this).val();

		 	var comision = $(this).parents('.precios').find('.comision');	
		 	var comision2 = $(this).parents('.precios').find('.comision2');	
		 	var total = $(this).parents('.precios').find('.costo_unitario');	
		 	var total2 = $(this).parents('.precios').find('.costo_unitario2');	
		 	var iva = valor * .15;
		 	var precio = iva + 2.5;
		 	var precioF = precio + Number(valor);	
		 	$(comision).val(iva.toFixed(2));
		 	$(comision2).text(iva.toFixed(2));
			 		
		 	$(total).val(precioF);
		 	$(total2).text(precioF);

		});

});