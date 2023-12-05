let datos = [];
// Datos de ejemplo (puedes reemplazarlos con tus propios datos)
document.addEventListener('DOMContentLoaded', function () {
    // Realizar la solicitud GET para obtener los datos

    // Configurar el evento de búsqueda
    document.getElementById('busqueda').addEventListener('input', function () {
        obtenerDatos(this.value);
        // filtrarDatos(this.value);

    });
});

function cargarDatosTabla(datos) {
    const tbody = document.querySelector('#tabla tbody');
    tbody.innerHTML = '';

    datos.forEach(dato => {
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>${dato.name}</td>
            <td>${dato.rol}</td>
        `;

        tbody.appendChild(fila);
    });

}
function filtrarDatos(terminoBusqueda) {
    const datosFiltrados = datos.filter(dato => {
        console.log(dato);
        return Object.values(dato).some(valor =>
            String(valor).toLowerCase().includes(terminoBusqueda.toLowerCase())
        );
    });

    cargarDatosTabla(datosFiltrados);
}

function ordenarTabla(columna) {
    datos.sort((a, b) => {
        const valorA = a[Object.keys(a)[columna]];
        const valorB = b[Object.keys(b)[columna]];

        if (typeof valorA === 'string' && typeof valorB === 'string') {
            return valorA.localeCompare(valorB);
        } else {
            return valorA - valorB;
        }
    });

    cargarDatosTabla(datos);
}
function obtenerDatos(value) {
    // Reemplaza la URL con la ruta correcta de tu API
    urlapi =urlapi +value;
    fetch(urlapi)
        .then(response => response.json())
        .then(data => {
            // Asigna los datos obtenidos a la variable global 'datos'
            datos = data.data.data;
            console.log(urlapi);
            console.log(datos);
            // Inicializar la tabla con los datos
            cargarDatosTabla(datos);
        })
        .catch(error => console.error('Error al obtener los datos:', error));
}
