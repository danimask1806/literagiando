		// Uso de solo números
		function numeros(event) {
			const tecla = event.key;
			if (event.ctrlKey || event.altKey || event.metaKey || tecla === 'Backspace' || tecla === 'Delete') {
				return true;
			}
			if (/^\d$/.test(tecla)) {
				return true;
			} else {
				event.preventDefault();
				return false;
			}
		}
		
		
		// Uso de solo números y espacios
		function numerosyespacios(event) {
			const tecla = event.key;
			if (event.ctrlKey || event.altKey || event.metaKey || tecla === 'Backspace' || tecla === 'Delete') {
				return true;
			}
			if (/^\d| $/.test(tecla)) {
				return true;
			} else {
				event.preventDefault();
				return false;
			}
		}
		
		
		// Uso de solo letras e incluimos acentos, "ñ" y "Ñ"
		function letras(event) {
			const tecla = event.key;
			if (event.ctrlKey || event.altKey || event.metaKey || tecla === 'Backspace' || tecla === 'Delete') {
				return true;
			}
			const patron = /[A-Za-záéíóúüñÁÉÍÓÚÜÑ]/;
			if (patron.test(tecla)) {
				return true;
			} else {
				event.preventDefault();
				return false;
			}
		}
		
		
		// Uso de solo letras e incluimos acentos, "ñ", "Ñ" y números
		function letrasynumeros(event) {
			const tecla = event.key;
			if (event.ctrlKey || event.altKey || event.metaKey || tecla === 'Backspace' || tecla === 'Delete') {
				return true;
			}
			const patron = /[A-Za-záéíóúüñÁÉÍÓÚÜÑ0-9]/;
			if (patron.test(tecla)) {
				return true;
			} else {
				event.preventDefault();
				return false;
			}
		}
		
		
		// Uso de solo letras e incluimos acentos, "ñ", "Ñ" y espacios
		function letrasyespacios(event) {
			const tecla = event.key;
			if (event.ctrlKey || event.altKey || event.metaKey || tecla === 'Backspace' || tecla === 'Delete') {
				return true;
			}
			const patron = /[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]/;
			if (patron.test(tecla)) {
				return true;
			} else {
				event.preventDefault();
				return false;
			}
		}
		
		
		// Uso de solo letras e incluimos acentos, "ñ", "Ñ", espacios y caracteres específicos
		function letrasespaciosycaracteres(event) {
			const tecla = event.key;
			if (event.ctrlKey || event.altKey || event.metaKey || tecla === 'Backspace' || tecla === 'Delete') {
				return true;
			}
			const patron = /[A-Za-záéíóúüñÁÉÍÓÚÜÑ,.\-\s]/;
			if (patron.test(tecla)) {
				return true;
			} else {
				event.preventDefault();
				return false;
			}
		}
		
		
		// Uso de solo letras e incluimos acentos, "ñ", "Ñ", números, espacios y caracteres específicos
		function letrasnumerosespaciosycaracteres(event) {
			const tecla = event.key;
			if (event.ctrlKey || event.altKey || event.metaKey || tecla === 'Backspace' || tecla === 'Delete') {
				return true;
			}
			const patron = /[A-Za-záéíóúüñÁÉÍÓÚÜÑ0-9,.!¡¿?()$:&+\-\s]/;
			if (patron.test(tecla)) {
				return true;
			} else {
				event.preventDefault();
				return false;
			}
		}