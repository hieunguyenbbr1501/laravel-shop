/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
var caretprev = document.getElementById("slider-prev");
var caretnext = document.getElementById("slider-next");
var slider = document.getElementsByClassName('floater-products-items');
var closebutton = document.getElementById('close-button');
var slideindex = 0;
var header = document.getElementById('hd');
var slidescount = slider.length;
console.log(slidescount);
for (i = 1; i < slidescount; i++) {
    slider[i].style.display = "none";
}

function nextSlide() {
    slideindex++;
    if (slideindex == slider.length) {
        slider[slideindex - 1].style.display = "none";
        slider[0].style.display = "flex";
        slideindex = 0;
        return;
    }
    slider[slideindex - 1].style.display = "none";
    slider[slideindex].style.display = "flex";
    console.log(slideindex);
}

function prevSlide() {
    if (slideindex == 0) {
        slider[slideindex].style.display = "none";
        slider[slider.length - 1].style.display = "flex";
        slideindex = slider.length - 1;
        return;
    }
    slideindex--;
    slider[slideindex + 1].style.display = "none";
    slider[slideindex].style.display = "flex";
}
//setInterval(nextSlide, 3000);
console.log(closebutton);
closebutton.addEventListener('click', function() {
    this.parentNode.parentNode.parentNode
        .removeChild(this.parentNode.parentNode);
    return false;
});
var menu = document.querySelector('#menu');
var main = document.querySelector('body');
var drawer = document.querySelector('.nav');

menu.addEventListener('click', function(e) {
    drawer.classList.toggle('open');
    e.stopPropagation();
});
main.addEventListener('click', function() {
    drawer.classList.remove('open');
});