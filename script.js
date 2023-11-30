// Obtener el elemento del disco
const disco1 = document.getElementById('disco1');
const disco2 = document.getElementById('disco2');
const disco3 = document.getElementById('disco3');

// Crear instancias de Audio una sola vez
const audio1 = new Audio('recursos/audio/sonido1.mp3');
const audio2 = new Audio('recursos/audio/sonido2.mp3');
const audio3 = new Audio('recursos/audio/sonido3.mp3');

// Función para reproducir el sonido
function reproducirSonido(audio) {
    if (audio.paused) {
        audio.play();
    } else {
        audio.pause();
        audio.currentTime = 0;
    }
}

// Agregar nuevos eventos de clic al disco
disco1.addEventListener('click', function() {
    reproducirSonido(audio1);
});
disco2.addEventListener('click', function() {
    reproducirSonido(audio2);
});
disco3.addEventListener('click', function() {
    reproducirSonido(audio3);
});
