(function() {
  document.querySelector('.navbar-holder').innerHTML = `
  <div>
    <nav class="navbar sticky-top">
      <h1><a href="#">Assignment</a></h1>

      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>

      <ul class="nav-links">
        <li><a href="../Home page/home.html">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="../Products/product.html">Products</a></li>
        <li><a href="#">Cost Table</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>

      <form class="form">
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Search...">  
        </div>
        <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i> Search</button>
      </form>

      <div class="cart">
        <button class="btn btn-primary" type="button"><i class="fas fa-shopping-cart"></i> Cart</button>
      </div>

      <div class="login-button">
        <button class="btn btn-primary" type="button"><i class="fas fa-sign-in-alt"></i> Login</button>
      </div>
    </nav>
  </div>
  `
})();



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

