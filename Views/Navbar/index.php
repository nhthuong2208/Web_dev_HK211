<div id="navbar" class="sticky-top">
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
        <?php if(!isset($_SESSION["user"]) || $_SESSION["user"] == "customer"){
            echo "<button class=\"btn btn-primary\" type=\"button\"><a href=\"?url=Home/Login/\"><i class=\"fas fa-sign-in-alt\"></i> Login</a></button>";
          }
          else if(isset($_SESSION["user"])){
            if($_SESSION["user"] != "customer"){
                  echo "<div class=\"dropdown\">
                  <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-bs-toggle=\"dropdown\" onclick=\"change_show(this)\">
                  <i class=\"fas fa-user\"></i>
                  </button>
                  <ul class=\"dropdown-menu\">
                    <li><a class=\"dropdown-item\" href=\"?url=/Home/member_page/\">Hồ sơ cá nhân</a></li>
                    <li><a class=\"dropdown-item\" href=\"?url=/Home/logout/\">Thoát <i class=\"fas fa-sign-out-alt\"></i></a></li>
                  </ul>
                </div>";
            }
          }
        ?>   
      </div>
    </nav>
  </div>