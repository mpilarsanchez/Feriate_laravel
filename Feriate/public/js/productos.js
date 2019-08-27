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


  function eliminar() {
    if ( confirm("Esta seguro que quiere Eliminar?") == false ) {
       return false ;
    } else {
       return true ;
    }
 }
} );
