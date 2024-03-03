    // Obtén los elementos de fecha
    const fechaPrestamoInput = document.querySelector('input[name="fecha_prestamo"]');
    const fechaDevolucionInput = document.querySelector('input[name="fecha_devolucion"]');

    // Agrega un evento para detectar cambios en el campo de fecha de préstamo
    fechaPrestamoInput.addEventListener('change', function () {
        // Obtén la fecha ingresada en el campo de fecha de préstamo
        const fechaPrestamo = new Date(this.value);
        
        // Calcula la fecha de devolución sumando 15 días a la fecha de préstamo
        const fechaDevolucion = new Date(fechaPrestamo);
        fechaDevolucion.setDate(fechaPrestamo.getDate() + 15);
        
        // Formatea la fecha de devolución como YYYY-MM-DD para establecerla en el campo de fecha de devolución
        const formattedFechaDevolucion = fechaDevolucion.toISOString().split('T')[0];
        fechaDevolucionInput.value = formattedFechaDevolucion;
    });