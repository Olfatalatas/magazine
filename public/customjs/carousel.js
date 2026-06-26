document.addEventListener("DOMContentLoaded", function() {
    var carouselElem = document.querySelector('.main-carousel');
    if (!carouselElem) return;
    
    var flkty = new Flickity(carouselElem, {
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        wrapAround: true
    });

    var prevButtons = document.querySelectorAll('.button--previous');
    prevButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            flkty.previous(true);
        });
    });

    var nextButtons = document.querySelectorAll('.button--next');
    nextButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            flkty.next(true);
        });
    });
});