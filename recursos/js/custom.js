function configurarRecarga() {
    window.addEventListener('popstate', function () {
        location.reload();
    });
}