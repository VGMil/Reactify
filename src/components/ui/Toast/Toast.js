

    document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('toast-container');
    if (!container) {
        console.warn("El contenedor de toasts (#toast-container) no fue encontrado.");
        return;
    }

    // Busca todos los toasts que ya fueron renderizados por PHP
    const toasts = container.querySelectorAll('.toast');

    toasts.forEach((toast, index) => {
        // 1. Añadir el botón de cerrar a cada toast
        const closeButton = document.createElement('button');
        closeButton.classList.add('toast-close-btn');
        closeButton.innerHTML = '&times;'; // Símbolo ×
        closeButton.onclick = () => hideToast(toast);
        toast.appendChild(closeButton);

        // 2. Animación de entrada escalonada (stagger)
        // Cada toast aparecerá 100ms después del anterior
        setTimeout(() => {
            toast.classList.add('show');
        }, index * 100);

        // 3. Configurar el auto-ocultado
        const autoHideTimer = setTimeout(() => {
            hideToast(toast);
        }, 5000); // El toast durará 5 segundos

        // Si el usuario hace clic en cerrar, cancelamos el auto-ocultado
        closeButton.addEventListener('click', () => {
            clearTimeout(autoHideTimer);
        });
    });

    /**
     * Función para ocultar un toast con animación y luego removerlo del DOM.
     * @param {HTMLElement} toast - El elemento toast a ocultar.
     */
    function hideToast(toast) {
        if (toast.classList.contains('hiding')) return;

        toast.classList.remove('show');
        toast.classList.add('hiding');

        // Esperar a que termine la animación de salida para eliminar el elemento
        setTimeout(() => {
            toast.remove();
        }, 300); // Debe coincidir con la duración de la transición de .hiding
    }
});
