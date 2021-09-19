let conHeight = document.querySelector('.container').offsetHeight;
let winHeight = window.innerHeight;
let footer = document.querySelector('footer');

if (conHeight + 150 < winHeight) {
    footer.classList.toggle('bottom');
}