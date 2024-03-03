// Función para validar si están seleccionados los inputs de tipo checkbox que usen la clase CSS .input-checkbox, esta verificación se omite si hay al menos 1 input de tipo checkbox seleccionado.
	function updateSelectedCount() {
		var selectedCount = 0;
		var checkboxes = document.querySelectorAll('.input-checkbox');
		
		checkboxes.forEach(function (checkbox) {
			if (checkbox.checked) {
				selectedCount++;
			}
		});
		
		document.getElementById('verificar').value = selectedCount;
	}
	