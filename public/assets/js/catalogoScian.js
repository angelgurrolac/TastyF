$(document).ready(function(){
   var i = 0;
    $('#add').click(function(){

         if($("#tipo_de_servicio").val().length < 1){
          alert('Necesita escribir una categoria para agregarla');
         }
         else{
          i++;
             $('#serv')
              .append(
                  ('<br />'));
              $('#serv')
              .append(
                 $(document.createElement('input')).attr({
                    name:  $('#response').val().concat(i)
                    ,value: $('#response').val()
                    ,type:  'checkbox'
                    ,checked: 'true'
                    ,class: 'clase'
                 })
              );
              $('#serv')
              .append(
                  $(document.createElement('label')).attr({
                    htmlFor: $('#response').val().concat(i)
                    ,id: $('#response').val().concat(i)
                 })
              );
              var myLabel = $('#response').val().concat(i);
              $('#'+myLabel).text($('#tipo_de_servicio').val());
              $('#tipo_de_servicio').val("");
        }
    });


   $('#formulario').submit(function(){

      var selected = [];
      i=0;
    $("#serv").find("input:checked").each(function() {
        selected [i] = this.name;
        i++;
         });
      if(selected.length == 0){
    alert("Debe agregar una categoria al servicio/producto");
    return false;
   }
    var myJsonString = JSON.stringify(selected);
    $('#control').val(myJsonString);
        console.log("test");
    });
 
});
