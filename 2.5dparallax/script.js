function parallax(element, scrollY, speed) {
    const item = document.querySelector(element);
    item.style.transform = `translateY(${scrollY * speed}px)`;
}

window.addEventListener('scroll', () => {
    parallax('.section1', window.scrollY, 1);
    parallax('.content1', window.scrollY, 0.2);
    parallax('.content2', window.scrollY, 0.5);
});