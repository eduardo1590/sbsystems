$(document).ready(function() {
	$('#contactanos').bootstrapValidator({
		 feedbackIcons: {
			 valid: 'glyphicon glyphicon-ok',
			 invalid: 'glyphicon glyphicon-remove',
			 validating: 'glyphicon glyphicon-refresh'
		 },
		 fields: {
			 nombre: {
				 validators: {
					 notEmpty: {
						 message: 'El nombre es requerido'
					 }
				 }
			 },
			 /*apellido: {
				 validators: {
					 notEmpty: {
						 message: 'El apellido es requerido'
					 }
				 }
			 },*/
			 email: {
				 validators: {
					 notEmpty: {
						 message: 'El correo es requerido y no puede ser vacio'
					 },
					 emailAddress: {
						 message: 'El correo electronico no es valido'
					 }
				 }
			 },
			 /*telefono: {
				 message: 'El teléfono no es valido',
				 validators: {
					 notEmpty: {
						 message: 'El teléfono es requerido y no puede ser vacio'
					 },
					 regexp: {
						 regexp: /^[0-9]+$/,
						 message: 'El teléfono solo puede contener números'
					 }
				 }
			 },*/
			 mensaje: {
				 validators: {
					 notEmpty: {
						 message: 'Debe escribir un mensaje'
					 }
				 }
			 },
		 }
	});
});