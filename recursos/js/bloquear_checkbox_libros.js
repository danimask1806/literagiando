// Esta función se encargará de deshabilitar los checkboxes y actualizar los campos ocultos
    function bloquearCheckboxes() {
        // Obtener todos los checkboxes con la clase 'input-checkbox'
        var checkboxes = document.querySelectorAll('.input-checkbox');

        // Iterar sobre cada checkbox
        checkboxes.forEach(function(checkbox) {
            // Deshabilitar el checkbox
            checkbox.disabled = true;

            // Crear un campo de texto oculto para almacenar el valor del checkbox
            var hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = checkbox.name; // Utiliza el mismo nombre
            hiddenInput.value = checkbox.value; // Almacena el valor del checkbox
            checkbox.parentNode.appendChild(hiddenInput);
        });
    }

    // Asegurarse de que la función se ejecute después de que la página se haya cargado
    document.addEventListener('DOMContentLoaded', function() {
        bloquearCheckboxes();
    });
	