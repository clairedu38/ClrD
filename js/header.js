document.addEventListener('DOMContentLoaded', function() {
    var images = document.querySelectorAll('.parallax');
    new simpleParallax(images, {
        orientation: 'right'
    });
});