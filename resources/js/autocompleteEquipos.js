// Elementos del DOM para equipos
/* @vite-ignore */
const inputEquipo = document.getElementById('autocompleteInputEquipo');
/* @vite-ignore */
const selectedEquipoIdInput = document.getElementById('selectedEquipoId');
/* @vite-ignore */
const equipoList = document.getElementById('equipoList');

// Escucha el evento de entrada en el campo de texto para equipos
inputEquipo.addEventListener('input', function() {
    selectedEquipoIdInput.value = "";
    const query = inputEquipo.value.toLowerCase();

    // Filtra los equipos que coinciden con la consulta
    const filteredEquipos = equipos.filter(equipo => (equipo.tipo_equipo + ' - ' + equipo.no_serie)
        .toLowerCase().includes(query));

    // Muestra la lista de equipos
    displayEquipoList(filteredEquipos.slice(0, 10));
});

// Muestra la lista de equipos
function displayEquipoList(equipos) {
    // Limpia la lista existente
    equipoList.innerHTML = '';

    // Muestra la lista de equipos filtrados
    equipos.forEach(equipo => {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item';
        listItem.textContent = equipo.tipo_equipo + ' - ' + equipo.no_serie;
        listItem.addEventListener('click', function() {
            // Cuando se hace clic en un equipo, establece la ID en el campo oculto y el valor en el campo de texto
            selectedEquipoIdInput.value = equipo.id;
            inputEquipo.value = equipo.tipo_equipo + ' - ' + equipo.no_serie;
            // Oculta la lista
            equipoList.style.display = 'none';
        });
        equipoList.appendChild(listItem);
    });

    // Muestra la lista solo si hay equipos filtrados
    equipoList.style.display = equipos.length > 0 ? 'block' : 'none';
}

// Agrega un evento focus a todos los inputs para equipos
var inputs = document.querySelectorAll('input, textarea, select, div, form');
inputs.forEach(function(input) {
    inputEquipo.addEventListener('focus', function() {
        // Oculta la lista cuando se cambia de input
        equipoList.style.display = 'none';
    });
});

document.addEventListener('DOMContentLoaded', function() {
    inputEquipo.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' || event.key === 'Tab') {
            equipoList.style.display = 'none';
        }
    });
});