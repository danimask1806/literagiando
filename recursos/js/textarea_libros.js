// controlador del alto y ancho del textareas
$("textarea").keyup(function(){
	var height = $(this).prop("scrollHeight")+3+"px";
	$(this).css({"height":height});
})


// Llama a la función para controlar el primer textarea
limitador_textarea('textarea_libro', 500, 50);

// Función para controlar la cantidad de caracteres permitidos por textarea
function limitador_textarea(id, maxLength, minLength) {
    const textarea = document.getElementById(id);
    const form = textarea.closest('form'); // Encuentra el formulario más cercano al textarea

    textarea.addEventListener('input', function () {
        if (textarea.value.length > maxLength) {
            Swal.fire({
                title: "Exceso de caracteres!",
                icon: "error",
                html: "Ha superado la longitud máxima permitida.",
                allowOutsideClick: false,
                showCloseButton: false,
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonColor: "#d51a1a",
                confirmButtonText: "OK",
            });

            // Aquí deshacemos el último carácter introducido
            textarea.value = textarea.value.slice(0, maxLength);

            // También puedes deshabilitar el textarea para evitar más entrada
            textarea.disabled = true;

            // Puedes habilitar el textarea después de cierto tiempo si lo deseas
            setTimeout(function () {
                textarea.disabled = false;
            }, 3000); // Habilitar después de 3 segundos (puedes ajustar el tiempo)
        }
    });

    // Agrega un oyente para el evento "clic" de los botones dentro del formulario
    form.addEventListener('click', function (event) {
        if (event.target.tagName === 'BUTTON') {
            if (textarea.value.length < minLength) {
                event.preventDefault(); // Detiene el envío del formulario
                Swal.fire({
                    title: "Faltan caracteres!",
                    icon: "error",
                    html: "Debe ingresar al menos " + minLength + " caracteres.",
                    allowOutsideClick: false,
                    showCloseButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                    confirmButtonColor: "#d51a1a",
                    confirmButtonText: "OK",
                });
            }
        }
    });
}
