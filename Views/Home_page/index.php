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
      href="./Views/images/Logo BK_vien trang.png"
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
    <!--div class="navbar-holder sticky-top"></div-->
    <?php require_once("./Views/Navbar/index.php"); ?>
    <script src="./Views/Navbar/navbarScript.js" index='0'></script>

    <div class="homepage">
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
                    Sản phẩm đa dạng
                    <br />
                    giá từ
                    <span>$9</span>
                  </h1>
                  <p>
                    Cửa hàng cung cấp các loại sản phẩm đa dạng, với nhiều mẫu mã và phù hợp với giới trẻ
                  </p>

                  <a href="?url=Home/Products/">Mua ngay</a>
                </div>
              </div>

              <div class="swiper-slide">
                <img
                  src="./Views/images/Presentation2.png"
                  alt="hero image"
                />
                <div class="content">
                  <h1>
                    Hỗ trợ đặt combo
                    <br />
                    <span>20% off</span>
                    tại cửa hàng
                  </h1>
                  <p>
                    Cung cấp các gói chứa đầy đủ một bộ sưu tập phù hợp với từng sở thích, tính cách
                  </p>
                  <a href="?url=Home/Products/">Mua ngay</a>
                </div>
              </div>

              <div class="swiper-slide">
                <img
                  src="./Views/images/Presentation1.png"
                  alt="hero image"
                />
                <div class="content">
                  <h1>
                    Đăng ký ngay
                    
                  </h1>
                  <p>
                    Nhanh tay đăng ký tài khoản để nhận được nhiều ưu đãi hấp dẫn cũng như những trải nghiệm thú vị nhé!
                  </p>
                  <a href="?url=Home/Products/">Mua ngay</a>
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
        <h2><i class="far fa-hand-point-right"></i> Các sản phẩm của Shop <i class="far fa-heart"></i></h2>
        <div class="container">
          <div class="collection-layout">
          <?php
          $shirt = false;
          $pant = false;
          $ass = false;
            foreach($data["collection"] as $row)
            {
              if(($row["cate"] == "Shirt" && !$shirt) || ($row["cate"] == "Trousers" && !$pant) || ($row["cate"] == "Accessories" && !$ass)){
                if($row["cate"] == "Shirt") {$shirt = true;}
                if($row["cate"] == "Trousers") {$pant = true;}
                if($row["cate"] == "Accessories") {$ass = true;}
                echo "<div class=\"shop-item\">";
                echo "<img src=\"" . $row["img"] . "\"alt=\"image\"/><div class=\"collection-content\"><h3>" . $row["cate"] . "</h3><a href=\"?url=Home/Products\">MUA NGAY</a></div></div>";
              }
            }
          ?>
          </div>
        </div>
      </div>

      <div class="feature-news">
        <h2><i class="far fa-hand-point-right"></i> Tin tức nổi bật <i class="fas fa-fire-alt"></i></h2>
        <div class="container">
        <?php
          echo "<div class=\"attractive-new\">";
                  for ($x = count($data["news"]) - 1; ($x >= count($data["news"])-3 && $x >= 0); $x--){
                    $row = $data["news"][$x];
                    echo "
                    <div class=\"card\">	
                      <div class=\"card-body\">
                        <div class=\"row\">						
                          <div class=\"bg-image bg-white col-md-12\">
                            <img src=\""  . $row["imgurl"] . "\" class=\"img-fluid rounded\">
                          </div>
                          <div class=\"row mb-3 col-md-12 mt-3\">
                            <div style=\"font-size:15px;\">"
                            . $row["key"] .
                            "</div>
                            <div style=\"font-size:15px;\">
                              <u class=\"text-decoration-none\">" . $row["time"] . "</u>
                            </div>
                          </div>
                          <a href=\"?url=Home/News_detail/". $row["id"] . "\" class=\"text-dark text-decoration-none mb-3 mt-1\">
                            <div style=\"font-size:25px; font-weight:500;\">" . $row["title"] . "</div>
                          </a>
                        </div>	
                      </div>
                    </div>							
                    ";
                  }
          echo "</div>";
        ?>
        </div>
      </div>

      <!-- Featured -->
      <div class="featured">
        <h2><i class="far fa-hand-point-right"></i> Sản phẩm được ưa chuộng <i class="fas fa-chart-line"></i></h2>

        <div class="row1 container">
          <div class="swiper-container slider-2">
            <div class="swiper-wrapper noneheight">
              <?php
                    if(empty($data["featured"])) echo "featured empty";
                    else{
                      if($data["user"] != "manager"){
                        echo "<span hidden>" . $data["user"] . "</span>";
                        foreach($data["featured"] as $row){ // "
                          if($row["top_seller"] == 1){
                            echo "<div class=\"swiper-slide\"><div class=\"product\"><div class=\"img-container\"><img src=\"" . $row["img"] ."\" alt=\"\"/>";
                            echo "<div class=\"addToCart\" onclick=\"add_Product(this);\"><i class=\"fas fa-shopping-cart\"></i><span hidden>" . $row["id"] . "</span></div></div><div class=\"bottom\"><a href=\"?url=Home/Item/" . $row["id"] . "\">";
                            echo $row["name"] . "</a><div class=\"price\"><span class=\"feature-item-price\">" . $row["price"] . "đ</span></div></div></div></div>";
                          }
                        }
                      }
                      else if($data["user"] == "manager"){
                        foreach($data["featured"] as $row){ // manager
                          if($row["top_seller"] == 1){
                            echo "<div class=\"swiper-slide\">
                                    <div class=\"product\"><div class=\"img-container\"><img src=\"" . $row["img"] ."\" alt=\"\"/>";
                            echo "</div><div class=\"bottom\"><a href=\"?url=Home/Item/" . $row["id"] . "\">";
                            echo $row["name"] . "</a><div class=\"price\"><span class=\"feature-item-price\">" . $row["price"] . "đ</span></div></div></div></div>";
                          }
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
