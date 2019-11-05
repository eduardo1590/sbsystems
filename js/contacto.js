/*function enviar(){
	var n=document.getElementById("nombre").value;
	var a=document.getElementById("apellido").value;
	var e=document.getElementById("email").value;
	var t=document.getElementById("telefono").value;
	var empresa=document.getElementById("empresa").value;
	var m=document.getElementById("mensaje").value;

	var url="php/contacto.php";

	$.ajax({
		type:"post",
		url:url,
		data:{nombre:n,apellido:a,email:e,telefono:t,empresa:empresa,mensaje:m},
		success:function(datos){
			alert("bien");
		}
	})
}*/


$(document).ready(function(){
	$('#contactanos').submit(function(e){
		e.preventDefault();
		e.stopImmediatePropagation();

		var data = 	$(this).serialize();

		$.ajax({
			url:'php/contacto.php',
			type: 'POST',
			//datatyoe:'json',
			data:data,
			beforeSend: function(){
				$('.fa').css('display','inline');
			}
		})
		.done(function(){
			   alertify.alert("SBSystems C.A.","<b>Tu mensaje fue enviado con exito</b>", function () {
            //aqui introducimos lo que haremos tras cerrar la alerta.
            //por ejemplo -->  location.href = 'http://www.google.es/';  <-- Redireccionamos a GOOGLE.
             });
		})
		.fail(function(){
			alertify.alert("SBSystems C.A.","<b>No pudimos enviar tu mensaje, intentalo de nuevo</b>", function () {
            //aqui introducimos lo que haremos tras cerrar la alerta.
            //por ejemplo -->  location.href = 'http://www.google.es/';  <-- Redireccionamos a GOOGLE.
            });
		})
		.always(function(){
			$('.fa').hide();
		})
	})
})

