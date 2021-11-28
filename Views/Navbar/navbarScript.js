/*(function() {
  document.querySelector('.navbar-holder').innerHTML = `
  <div id="navbar">
    <nav>
      <h1><a href="#">Assignment</a></h1>

      <div class="burger">  
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>

      <ul class="nav-links">
        <li><a href="?url=Home/Home_page/">Home</a></li>
        <li><a href="?url=Home/About_us/">About Us</a></li>
        <li><a href="?url=Home/Products/">Products</a></li>
        <li><a href="?url=Home/Cost_table/">Cost Table</a></li>
        <li><a href="?url=Home/News/">News</a></li>
        <li><a href="?url=Home/Contact_us/">Contact</a></li>
      </ul>

      <form class="form">
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Search...">  
        </div>
        <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
      </form>

      <div class="cart">
        <button id="cart-button-nav" class="btn btn-primary" type="button"><a href="?url=Home/Cart/"><i class="fas fa-shopping-cart"></i> Cart</a></button>
      </div>

      <div class="login-button">       
        <button class="btn btn-primary" type="button"><a href="?url=Home/Login/"><i class="fas fa-sign-in-alt"></i> Login</a></button>
      </div>
    </nav>
  </div>
  `
})();
*/

let index = parseInt(document.currentScript.getAttribute('index'));
if(!isNaN(index)){document.querySelectorAll('.nav-links')[0].children[index].classList.add('active');}

$(document).ready(function () {
    // Underline to remain in navbar after click using URL
    jQuery(function ($) {
      var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
      $('nav ul a').each(function () {
        if (this.href === path) {
          $(this).addClass('active');
        }
      });
    });
});

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

function change_show(element){
  if(!isNaN(index) && index == 0){
    if(element.parentNode.getElementsByTagName("ul")[0].className == "dropdown-menu"){
      element.parentNode.getElementsByTagName("ul")[0].className = "dropdown-menu show";
    }
    else{
      element.parentNode.getElementsByTagName("ul")[0].className = "dropdown-menu";
    }
  }
}