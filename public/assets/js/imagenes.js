 jQuery(document).ready(function($) {
	 $('#imgbann').on('change', function(event) {
	 	loadFile(event);		
	 });
	var loadFile = function(event) {
	    var output2 = document.getElementById('crop');
	    output2.src = URL.createObjectURL(event.target.files[0]);

  	};

	$('#crop').Jcrop({
		aspectRatio: 1,
		onSelect: actualizaCoordenadas
	});
    
    $('#continuar').click(function(){
		$("#myModal").modal('show');
	});

	function actualizaCoordenadas(c){	
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	}

	function checkCoords(){
		if(parseInt($('#w').val())) return true;
		alert("seleccion alguna parte");
		return false;
	}



 });
