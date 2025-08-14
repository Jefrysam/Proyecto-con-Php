document.addEventListener('DOMContentLoaded', function() {
    const modalidadRadios = document.querySelectorAll('input[name="modalidad"]');
    const campoMesa = document.getElementById('campo-mesa');

    modalidadRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'restaurante') {
                campoMesa.style.display = 'block';
            } else {
                campoMesa.style.display = 'none';
            }
        });
    });
});
