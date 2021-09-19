const menu = document.body.querySelector('.menu');
const nav = document.body.querySelector('nav');

menu.addEventListener('click', () => {
    nav.classList.toggle('show');
});