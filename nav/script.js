const navSlide = () => {
    const burger = document.querySelector('.burger');
    const navToggle = document.querySelector('.nav .ul');
    burger.addEventListener('click', () => {
        if (navToggle.style.display === 'flex') {
            navToggle.style.display = 'none';
        } else {
            navToggle.style.display = 'flex';
        }
    });
};
navSlide();