// Función para validar si se han seleccionado los inputs de tipo checkbox que usan el atributo "name" + una "id" asignada, esta verificación se omite si hay al menos 1 input de tipo checkbox seleccionado.
	function validarFormulario() {
		var librosSeleccionados = document.querySelectorAll('[name^="id_libro_"]:checked');
		
		if (librosSeleccionados.length < 1) {
			Swal.fire({
				title: "ERROR AL SELECCIONAR LIBROS!",
				icon: "warning",
				html: "La cantidad de libros seleccionados, fue inferior a 1 libro. Debes seleccionar mínimo 1 libro y hasta un máximo de 3 libros.",
				allowOutsideClick: false,
				showCloseButton: false,
				showCancelButton: false,
				focusConfirm: false,
				confirmButtonColor: "#ff7800",
				confirmButtonText: "OK",
			});
			return false; // Evita que se envíe el formulario si no se cumplen las condiciones.
		}
		
		// Si se llega hasta aquí, el formulario se enviará correctamente.
		return true;
	}
	