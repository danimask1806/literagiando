    // Obtener la fecha actual
    var fechaActual = new Date();

    // Asignar la fecha actual al primer input
    var fechaPrestamoInput = document.getElementById("fecha_prestamo");
    fechaPrestamoInput.valueAsDate = fechaActual;

    // Calcular la fecha de devolución (15 días después)
    var fechaDevolucion = new Date(fechaActual);
    fechaDevolucion.setDate(fechaDevolucion.getDate() + 15);

    // Asignar la fecha de devolución al segundo input
    var fechaDevolucionInput = document.getElementById("fecha_devolucion");
    fechaDevolucionInput.valueAsDate = fechaDevolucion;