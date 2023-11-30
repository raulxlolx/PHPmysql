// Obtener el elemento del disco
const disco1 = document.getElementById('disco1');
const disco2 = document.getElementById('disco2');
const disco3 = document.getElementById('disco3');

// Función para reproducir el sonido
function reproducirSonido(audio) {
    if (audio.paused) {
        audio.play();
        
    } else if (audio.play()) {
        
        audio.pause();
        audio.currentTime = 0; // Reiniciar el audio al inicio
    }

    
}



// Agregar nuevos eventos de clic al disco
disco1.addEventListener('click', function() {
    const audio = new Audio('recursos/audio/sonido1.mp3');
    reproducirSonido(audio);
});
disco2.addEventListener('click', function() {
    const audio = new Audio('recursos/audio/sonido2.mp3');
    reproducirSonido(audio);
});
disco3.addEventListener('click', function() {
    const audio = new Audio('recursos/audio/sonido3.mp3');
    reproducirSonido(audio);
});
