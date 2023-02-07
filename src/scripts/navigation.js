

const NAVIGATIONCONTAINER = document.querySelector('#navigation-container');
const NAVIGATIONPLACEHOLDER = document.querySelector('.nav-placeholder');

window.onscroll = function() {navigationMinimze()};
window.onload = function() {navigationMinimze()};

function navigationMinimze() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        NAVIGATIONCONTAINER.classList.remove('nav-big')
        NAVIGATIONCONTAINER.classList.add('nav-small')
        NAVIGATIONPLACEHOLDER.style.height = '50px';
      } else {
        NAVIGATIONCONTAINER.classList.add('nav-big')
        NAVIGATIONCONTAINER.classList.remove('nav-small')
        NAVIGATIONPLACEHOLDER.style.height = '180px';
      }
}