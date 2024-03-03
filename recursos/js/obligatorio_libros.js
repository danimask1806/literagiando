		// ---------------------------------------------------------------------------
		// Manejar el evento de pegar en el campo de entrada
		function letrasespacios_caracteres(event) {
			const clipboardData = event.clipboardData || window.clipboardData;
			const pastedData = clipboardData.getData('text');
			// Expresión regular para validar el contenido pegado
			const patron = /^[A-Za-záéíóúüñÁÉÍÓÚÜÑ,.\-\s]*$/;
			if (!patron.test(pastedData)) {
				event.preventDefault();
			}
		}
		// Asignar la función de manejo de pegar al campo de entrada
		const inputField_autor = document.getElementById('autor');
		inputField_autor.addEventListener('paste', letrasespacios_caracteres);
		
		const inputField_tema = document.getElementById('tema');
		inputField_tema.addEventListener('paste', letrasespacios_caracteres);
		
		const inputField_condicion = document.getElementById('condicion');
		inputField_condicion.addEventListener('paste', letrasespacios_caracteres);
		
		
		// ---------------------------------------------------------------------------
		// Manejar el evento de pegar en el campo de entrada
		function letrasnumerosespacios_caracteres(event) {
			const clipboardData = event.clipboardData || window.clipboardData;
			const pastedData = clipboardData.getData('text');
			// Expresión regular para validar el contenido pegado
			const patron = /^[A-Za-záéíóúüñÁÉÍÓÚÜÑ0-9,.!¡¿?()$:&+\-\s]*$/;
			if (!patron.test(pastedData)) {
				event.preventDefault();
			}
		}
		// Asignar la función de manejo de pegar al campo de entrada
		const inputField_titulo = document.getElementById('titulo');
		inputField_titulo.addEventListener('paste', letrasnumerosespacios_caracteres);