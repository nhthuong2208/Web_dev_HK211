function click_Checkbox() {
    if(window.innerWidth <= 880 ||  screen.width <= 880)
        if(document.getElementById('check').checked ==  true) {
            document.getElementById('main').style.left = '0%';
        }
        else{
            document.getElementById('main').style.left = '-100%';
        }
    else{
        if(document.getElementById('check').checked ==  true) 
            document.getElementById('mid_nav').style.left = '0%';
        else
            document.getElementById('mid_nav').style.left = '-100%';
    }

}
<<<<<<< HEAD:myScript.js

const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links, .form');
    const navLinks = document.querySelectorAll('.nav-links li, .form');

    burger.addEventListener('click', () => {
        // Toggle nav
        nav.classList.toggle('nav-active');

        // Animate Links
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            }
            else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
            }
        })

        // Burger animation
        burger.classList.toggle('toggle');
    })
}

navSlide();
=======
>>>>>>> 6b8d3f707d0873a1262d7c08a6d4105ec4089477:Contact US/myScript.js
