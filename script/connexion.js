//Diaporama d'image :
var slideIndex = 0;
var slideWrapper = document.querySelector('.slide-wrapper');

function moveSlides() {
    slideWrapper.style.transform = "translateX(-" + slideIndex * 100 + "%)";
}

function autoSlide() {
    slideIndex++;
    if (slideIndex >= slideWrapper.children.length) {
        slideIndex = 0;
    }
    moveSlides();
}

setInterval(autoSlide, 5000);