const prevBtn = document.querySelector('.btn-prev');
const nextBtn = document.querySelector('.btn-next');
const slides = document.querySelectorAll('.slide');
const intervalTime = 5000;
const auto = true;
let clearTimeInterval;

prevSlide = () => {
    const currentSlide = document.querySelector('.current-slide');
    currentSlide.classList.remove('current-slide');
    if (currentSlide.previousElementSibling) {
        currentSlide.previousElementSibling.classList.add('current-slide');
    }
    else {
        slides[slides.length - 1].classList.add('current-slide');
    }
}

nextSlide = () => {
    const currentSlide = document.querySelector('.current-slide');
    currentSlide.classList.remove('current-slide');
    if (currentSlide.nextElementSibling) {
        currentSlide.nextElementSibling.classList.add('current-slide');
    }
    else {
        slides[0].classList.add('current-slide');
    }
}

prevBtn.addEventListener('click', () => {
    prevSlide();
    if (auto) {
        clearInterval(clearTimeInterval);
        clearTimeInterval = setInterval(nextSlide, intervalTime);
    }
});

nextBtn.addEventListener('click', () => {
    nextSlide();
    if (auto) {
        clearInterval(clearTimeInterval);
        clearTimeInterval = setInterval(nextSlide, intervalTime);
    }
});

if (auto) {
    clearTimeInterval = setInterval(nextSlide, intervalTime);
}