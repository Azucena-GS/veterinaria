document.addEventListener('DOMContentLoaded', function() {
    const rolSelect = document.getElementById('rol');
    const vetSection = document.getElementById('veterinario_section');
    const especialidadInput = document.getElementById('especialidad');
    const cedulaInput = document.getElementById('cedula_profesional');

    function toggleVeterinarioFields() {
        if (rolSelect.value === 'veterinario') {
            vetSection.style.display = 'block';
            especialidadInput.setAttribute('required', 'required');
            cedulaInput.setAttribute('required', 'required');
        } else {
            vetSection.style.display = 'none';
            especialidadInput.removeAttribute('required');
            cedulaInput.removeAttribute('required');
        }
    }

    // Ejecutar al cargar la página
    toggleVeterinarioFields();

    // Ejecutar al cambiar el selector
    rolSelect.addEventListener('change', toggleVeterinarioFields);
});
