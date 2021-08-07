const input = document.querySelector('.input-text');

const filterList = () => {
    const lis = document.querySelectorAll('.li');
    lis.forEach((item) => {
        if (item.innerHTML.indexOf(input.value) > -1) {
            item.style.display = '';
        }
        else {
            item.style.display = 'none';
        }
        /***same thing using regular expression***/
        /*const regex=new RegExp(**regular expression here**, 'gi');
        if (item.innerHTML.match(regex)) {
            item.style.display = '';
        }
        else {
            item.style.display = 'none';
        }*/
    });
};

input.addEventListener('input', filterList);