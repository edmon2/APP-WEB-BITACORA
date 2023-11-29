function actualizarReloj() {
    var ahora = new Date();
    var horas = ahora.getHours();
    var minutos = ahora.getMinutes();
    var segundos = ahora.getSeconds();

    document.getElementById('reloj').innerText = horas + ':' + minutos + ':' + segundos;
}    

setInterval(actualizarReloj, 1000);