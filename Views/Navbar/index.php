<div id="navbar" class="sticky-top">
    <nav>
      <h1><i class="fab fa-shopify"></i><a href="?url=Home/Home_page/">HTD</a></h1>

      <div class="burger">  
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>

      <ul class="nav-links">
        <li><a href="?url=Home/Home_page/">Trang chủ</a></li>
        <li><a href="?url=Home/About_us/">Về chúng tôi</a></li>
        <li><a href="?url=Home/Products/">Sản phẩm</a></li>
        <li><a href="?url=Home/Cost_table/">Bảng giá</a></li>
        <li><a href="?url=Home/News/">Tin tức</a></li>
        <li><a href="?url=Home/Contact_us/">Liên hệ</a></li>
      </ul>

      <form class="form">
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Search...">  
        </div>
        <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
      </form>

      <div class="cart">
        <button id="cart-button-nav" class="btn btn-primary" type="button"><a href="<?php if(!isset($_SESSION["user"]) || isset($_SESSION["user"]) && $_SESSION["user"] != "manager") echo "?url=Home/Cart/"; else echo "#";?>"><i class="fas fa-shopping-cart"></i> Giỏ</a></button>
      </div>

      <div class="login-button">
        <?php if(!isset($_SESSION["user"]) || $_SESSION["user"] == "customer"){
            echo "<button class=\"btn btn-primary\" type=\"button\"><a href=\"?url=Home/Login/\"><i class=\"fas fa-sign-in-alt\"></i> Login</a></button>";
          }
          else if(isset($_SESSION["user"])){
            if($_SESSION["user"] != "custommer"){
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