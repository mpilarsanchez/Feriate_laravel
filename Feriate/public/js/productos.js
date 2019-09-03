$( function() {
  function readURL(input) {
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $(".profile").attr('src', e.target.result);
         }
         reader.readAsDataURL(input.files[0]);
     }
 }
 $("#foto1").change(function(){
     readURL(this);
 });
 $("#foto2").change(function(){
     readURL(this);
 });
 $("#foto3").change(function(){
     readURL(this);
 });

 function showHiddeTalle(){
   $('.categoria').change(function(){
     if($('.categoria'+ ' option:selected').text() == 'Ropa '){
        $('.talle').show();
     }else{
        $('.talle').hide();
     }
   })
 }
 showHiddeTalle();


 function confirmarEliminacion(){
   $("#eliminar").click(function(){ //al hacer click on el boton con el id=eliminar
     event.preventDefault(); //previene la accion por defecto, que es hacer el submit para eliminar el usuario
      $( "#dialog-confirm" ).dialog({ //crea el dialogo con el id=dialog-confirm , que ya esta en el html (oculto)
        resizable: false, //estas son las propiedades del pop up
        height: "auto",
        width: 400,
        modal: true,
        draggable: false, //no se puede arrastrar el pop up
        buttons: {  //botones eliminar, cancelar
          "Eliminar": function() {  //cuando haces click en el boton eliminar
            $('form#eliminarproducto').submit(); // envia el submit del form , eliminarUsuario
            $( this ).dialog( "close" ); //cierra el dialogo
          },
          "Cancelar": function(event) {
            event.preventDefault(); //previene la accion por defecto (que ya lo habia echo anteriormente)
            $( this ).dialog( "close" ); //cierra el dialogo
          }
        }
      });
   });
 }

 confirmarEliminacion();
} );
