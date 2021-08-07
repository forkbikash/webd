const controls = document.querySelector('.controls-form');
const image = document.querySelector('.image');

function editimage() {
    const grayscale = document.querySelector('.grayscale');
    const blur = document.querySelector('.blur');
    const huerotate = document.querySelector('.hue-rotate');
    const sepia = document.querySelector('.sepia');

    let gsval = grayscale.value;
    let blrval = blur.value;
    let hrval = huerotate.value;
    let spval = sepia.value;

    image.style.filter = `grayscale(${gsval}%) hue-rotate(${hrval}deg) blur(${blrval}px) sepia(${spval}%)`;
}

function resetControls() {
    //controls.reset();
    setTimeout(() => { //read 'introduction to events' fully by mdn(for significance of settimeout method here).
        editimage();
    }, 0);
}

controls.addEventListener('reset', resetControls);
controls.addEventListener('input', editimage);