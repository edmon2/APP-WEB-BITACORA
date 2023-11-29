// Elementos del DOM
const input = document.getElementById('autocompleteInput');
const selectedUserIdInput = document.getElementById('selectedUserId');
const userList = document.getElementById('userList');

// Escucha el evento de entrada en el campo de texto
input.addEventListener('input', function() {
    selectedUserIdInput.value = "";
    const query = input.value.toLowerCase();

    // Filtra los usuarios que coinciden con la consulta
    const filteredUsers = users.filter(user => user.name.toLowerCase().includes(query));

    // Muestra la lista de usuarios
    displayUserList(filteredUsers);
});

// Muestra la lista de usuarios
function displayUserList(users) {
    // Limpia la lista existente
    userList.innerHTML = '';

    // Muestra la lista de usuarios filtrados
    users.forEach(user => {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item';
        listItem.textContent = user.name;
        listItem.addEventListener('click', function() {
            // Cuando se hace clic en un usuario, establece la ID en el campo oculto y el valor en el campo de texto
            selectedUserIdInput.value = user.id;
            input.value = user.name;
            // Oculta la lista
            userList.style.display = 'none';
        });
        userList.appendChild(listItem);
    });

    // Muestra la lista solo si hay usuarios filtrados
    userList.style.display = users.length > 0 ? 'block' : 'none';
}

// Agrega un evento focus a todos los inputs
var inputs = document.querySelectorAll('input, textarea, select, div, form');
inputs.forEach(function(input) {
    input.addEventListener('focus', function() {
        // Oculta la lista cuando se cambia de input
        userList.style.display = 'none';
    });
});

document.addEventListener('DOMContentLoaded', function() {
    input.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' || event.key === 'Tab') {
            userList.style.display = 'none';
        }
    });
});