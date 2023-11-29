// Elementos del DOM
const propietarioInput = document.getElementById('autocompleteInput');
const selectedPropietarioIdInput = document.getElementById('selectedPropietarioId');
const propietarioList = document.getElementById('propietarioList');

// Escucha el evento de entrada en el campo de texto
propietarioInput.addEventListener('input', function () {
    selectedPropietarioIdInput.value = "";
    const query = propietarioInput.value.toLowerCase();

    // Filtra los propietarios que coinciden con la consulta
    const filteredPropietarios = propietarios.filter(propietario => propietario.nombre_completo.toLowerCase().includes(query));

    // Muestra la lista de propietarios
    displayPropietarioList(filteredPropietarios);
});

// Muestra la lista de propietarios
function displayPropietarioList(propietarios) {
    // Limpia la lista existente
    propietarioList.innerHTML = '';

    // Muestra la lista de propietarios filtrados
    propietarios.forEach(propietario => {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item';
        listItem.textContent = propietario.nombre_completo;
        listItem.addEventListener('click', function () {
            // Cuando se hace clic en un propietario, establece la ID en el campo oculto y el valor en el campo de texto
            selectedPropietarioIdInput.value = propietario.id;
            propietarioInput.value = propietario.nombre_completo;
            // Oculta la lista
            propietarioList.style.display = 'none';
        });
        propietarioList.appendChild(listItem);
    });

    // Muestra la lista si hay propietarios filtrados, de lo contrario, la oculta
    propietarioList.style.display = propietarios.length > 0 ? 'block' : 'none';
}

// Cierra la lista cuando se hace clic fuera del campo de texto y la lista
document.addEventListener('focus', function (event) {
    if (!event.target.closest('#autocompleteInput') && !event.target.closest('#propietarioList')) {
        propietarioList.style.display = 'none';
    }
});

document.addEventListener('DOMContentLoaded', function() {
    propietarioInput.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' || event.key === 'Tab') {
            propietarioList.style.display = 'none';
        }
    });
});