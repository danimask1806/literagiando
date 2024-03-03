// Función para contar cuántos radios han sido seleccionados
    function contarcheckboxsSeleccionados() {
        var radiosSeleccionados = document.querySelectorAll('input[type="checkbox"]:checked');
        return radiosSeleccionados.length;
    }
	
    // Función para manejar el evento de cambio en los radios
    function manejarCambiocheckbox() {
        if (contarcheckboxsSeleccionados() > 3) {
            Swal.fire({
				title: "ERROR AL SELECCIONAR LIBROS!",
				icon: "warning",
				html: "La cantidad de libros seleccionados, fue superior a 3 libros. Debes seleccionar hasta un máximo de 3 libros y no menos de 1 libro.",
				allowOutsideClick: false,
				showCloseButton: false,
				showCancelButton: false,
				focusConfirm: false,
				confirmButtonColor: "#ff7800",
				confirmButtonText: "OK",
			});
            // Desmarca el checkbox que se acaba de seleccionar
            this.checked = false;
        }
    }
	
    // Agregar un manejador de eventos para los radios
    var radios = document.querySelectorAll('input[type="checkbox"]');
    radios.forEach(function(checkbox) {
        checkbox.addEventListener('change', manejarCambiocheckbox);
    });
	