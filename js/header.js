// Effet de parallax à droite sur les img de classe "parallax"

document.addEventListener('DOMContentLoaded', function() {
    var images = document.querySelectorAll('.parallax');
    new simpleParallax(images, {
        orientation: 'right'
    });
});