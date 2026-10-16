

// =====================
//    Home Area Start
// =====================

// selecting parallax and slider elements
let parallax = document.querySelector('.bg-slider-1');
let bgSlideContents = document.querySelectorAll('.bg-slider');

// initialize slide index
let slideIndex = 0;

// slide left
function homeSlideLeft() {
    slideIndex--;

    if (slideIndex < 0) {
        slideIndex = bgSlideContents.length - 1;
    }

    bgSlideContents[slideIndex].classList.add('active-bg');
    parallax.style.backgroundPositionY = 0 + 'px';
    parallax = document.querySelector(`.bg-slider-${slideIndex + 1}`);

}

// slide right
function homeSlideRight() {
    slideIndex++;

    if (slideIndex >= bgSlideContents.length) {
        slideIndex = 0;
    }

    bgSlideContents[slideIndex].classList.add('active-bg');
    parallax.style.backgroundPositionY = 0 + 'px';
    parallax = document.querySelector(`.bg-slider-${slideIndex + 1}`);

}

// remove previous slide
function removePrevSlide() {
    for (let i = 0; i < bgSlideContents.length; i++) {
        bgSlideContents[i].classList.remove('active-bg');
    }
}

// auto slider
let homeSlide = setInterval(() => {
    removePrevSlide();
    homeSlideRight();
}, 8000);



// selecting navbar elements
let navbar = document.querySelector('nav');
let navItems = document.querySelectorAll('.nav-items li');

// home text
let hero = document.querySelector('#hero');

// actions while scroll up or down
window.onscroll = () => {
    let scrollTop = document.documentElement.scrollTop;
    let totalHeight = document.documentElement.scrollHeight - window.innerHeight;
    let percentage = (scrollTop / totalHeight) * 100;

    // parallax effect
    parallax.style.backgroundPositionY = scrollTop * 0.7 + 'px';

    // home text effect
    hero.style.top = 50 - percentage * 1.8 + '%';

    // sticky navbar
    if (scrollTop > navbar.offsetTop) {
        navbar.classList.add('active');
    } else {
        navbar.classList.remove('active');
    }
}

// selecting elements for menu toggle
let toggleBar = document.querySelector('#toggle-bar');
let navigationArea = document.querySelector('.nav-items');

// slelecting elements for search bar
let searchBtn = document.querySelector('#search-btn');
let searchBox = document.querySelector('.search-box');

// actions while toggle button click
toggleBar.addEventListener('click', function () {
    toggleBar.classList.toggle('active-toggler');
    navigationArea.classList.toggle('active-navbar');
    searchBox.classList.remove('active-search-box');
    for (let i = 0; i < navItems.length; i++) {
        navItems[i].addEventListener('click', function () {
            toggleBar.classList.remove('active-toggler');
            navigationArea.classList.remove('active-navbar');
        });
    }
});

// actions while search button click
searchBtn.addEventListener('click', function () {
    searchBox.classList.toggle('active-search-box');
    toggleBar.classList.remove('active-toggler');
    navigationArea.classList.remove('active-navbar');
});



