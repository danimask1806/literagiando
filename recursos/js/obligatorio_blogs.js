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
		
		const inputField_sub_titulo_1 = document.getElementById('sub_titulo_1');
		inputField_sub_titulo_1.addEventListener('paste', letrasnumerosespacios_caracteres);
		
		const inputField_sub_titulo_2 = document.getElementById('sub_titulo_2');
		inputField_sub_titulo_2.addEventListener('paste', letrasnumerosespacios_caracteres);