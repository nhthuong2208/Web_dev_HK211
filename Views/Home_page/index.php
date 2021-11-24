<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assignment</title>
    <link
      rel="icon"
      type="image/x-icon"
      href="../images/Logo BK_vien trang.png"
    />

    <link href="../Views/Home_page/home.css" rel="stylesheet" type="text/css" />
    <link href="../Views/Navbar/navbar.css" rel="stylesheet" type="text/css" />
    
    <link rel="import" href="../Navbar/navbar.html" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/721412f694.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
      integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
      crossorigin="anonymous"
    ></script>
    <!-- Latest compiled and minified CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- ======== Swiper Js ======= -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.css"
    />
    <!-- ======== SwiperJS ======= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.js"></script>
    <link
      href="https://unpkg.com/boxicons@2.0.8/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <!-- Navigation -->
    <div class="navbar-holder sticky-top"></div>
    <script src="./Views/Navbar/navbarScript.js" index='0'></script>


    <div class="homepage">
      
  <?php if(isset($_SESSION["user"])) echo $_SESSION["user"];else echo "del";?>
      <div class="hero">
        <div class="row1">
          <div class="swiper-container slider-1">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img
                  src="https://mcdn.coolmate.me/image/September2021/AU5A324913.jpg"
                  alt=""
                />
                <div class="content">
                  <h1>
                    Super market vegbox
                    <br />
                    start from
                    <span>$9</span>
                  </h1>
                  <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Corrupti ad natus facilis magni corporis alias.
                  </p>

                  <a href="../Products/product.html">Shop Now</a>
                </div>
              </div>

              <div class="swiper-slide">
                <img
                  src="https://mcdn.coolmate.me/uploads/February2019/433a822f711424934e9ab183eec0a3a4.jpg"
                  alt="hero image"
                />
                <div class="content">
                  <h1>
                    You first Order
                    <br />
                    <span>20% off</span>
                    at Juice
                  </h1>
                  <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Corrupti ad natus facilis magni corporis alias.
                  </p>
                  <a href="../Products/product.html">Shop Now</a>
                </div>
              </div>

              <div class="swiper-slide">
                <img
                  src="https://mcdn.coolmate.me/uploads/April2019/VTP_1_44.JPG"
                  alt="hero image"
                />
                <div class="content">
                  <h1>
                    You first Order
                    <br />
                    <span>20% off</span>
                    at Juice
                  </h1>
                  <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Corrupti ad natus facilis magni corporis alias.
                  </p>
                  <a href="../Products/product.html">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Carousel Navigation -->
        <div class="arrows d-flex">
          <div class="swiper-prev d-flex">
            <i class="bx bx-chevrons-left swiper-icon"></i>
          </div>
          <div class="swiper-next d-flex">
            <i class="bx bx-chevrons-right swiper-icon"></i>
          </div>
        </div>
      </div>

      <div class="shop-collection">
        <h2>--- Shop Collections ---</h2>
        <div class="container">
          <div class="collection-layout">
          <?php
            foreach($data["collection"] as $row)
            {
              echo "<div class=\"shop-item\">";
              echo "<img src=\"" . $row["img"] . "\"alt=\"image\"/><div class=\"collection-content\"><h3>" . $row["cate"] . "</h3><a href=\"?url=Home/Products\">SHOP NOW</a></div></div>";
            }
          ?>
          </div>
        </div>
      </div>

      <div class="feature-news">
        <h2>--- Attractive News ---</h2>
      </div>

      <!-- Featured -->
      <div class="featured">
        <h2>--- Featured Products ---</h2>

        <div class="row1 container">
          <div class="swiper-container slider-2">
            <div class="swiper-wrapper noneheight">
              <?php
                    if(empty($data["featured"])) echo "featured empty";
                    else{
                      if($data["user"] == "customer")
                        foreach($data["featured"] as $row){ // "
      
                          echo "<div class=\"swiper-slide\"><div class=\"product\"><div class=\"img-container\"><img src=\"" . $row["img"] ."\" alt=\"\"/>";
                          echo "<div class=\"addToCart\"><i class=\"fas fa-shopping-cart\"></i></div></div><div class=\"bottom\"><a href=\"?url=Home/Item/\">";
                          echo $row["name"] . "</a><div class=\"price\"><span>" . $row["price"] . "</span></div></div></div></div>";
                        }
                      else if($data["user"] == "manager"){
                        foreach($data["featured"] as $row){ // manager
      
                          echo "<div class=\"swiper-slide\"><div class=\"product\"><div class=\"img-container\"><img src=\"" . $row["img"] ."\" alt=\"\"/>";
                          echo "<div class=\"addToCart\"><i class=\"fas fa-shopping-cart\"></i></div></div><div class=\"bottom\"><a href=\"?url=Home/Item/\">";
                          echo $row["name"] . "</a><div class=\"price\"><span>" . $row["price"] . "</span></div></div></div></div>";
                        }
                      }
                    }
              ?>
            </div>
          </div>
        </div>

        <!-- Carousel Navigation -->
        <div class="arrows d-flex">
          <div class="custom-next d-flex">
            <i class="bx bx-chevrons-right swiper-icon"></i>
          </div>
          <div class="custom-prev d-flex">
            <i class="bx bx-chevrons-left swiper-icon"></i>
          </div>
        </div>
      </div>

      <!--div class="footer-holder"></div>
      <script src="../Views/footer/footerScript.js"></script-->
    <?php require_once "./Views/footer/index.php ";?>
    </div>
    <script src="./Views/Home_page/home.js"></script>
  </body>
</html>
