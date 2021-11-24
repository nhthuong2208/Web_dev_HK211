<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assignment</title>
    <link rel="icon" type="image/x-icon" href="../images/Logo BK_vien trang.png">

    <link href="../Views/Item/itemDescript.css" rel="stylesheet" type="text/css" />
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
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div class="product-item">
      <div class="navbar-holder sticky-top"></div>
      <script src="../Views/Navbar/navbarScript.js"></script>

      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-5 col-lg-12">
            <div class="product-image">
              <p>Home > Product</p>
              <div class="main-img">
                <?php $row_product = null;
                  if(empty($data["product_id"])) echo "empty product";
                  else {
                    $row_product = mysqli_fetch_array($data["product_id"]);
                    echo "<img
                    src=\"" . $row_product["img"] . "\"
                    alt=\"image\"
                    />";
                  }
                ?>
              </div>
            </div>
            <div class="addition-img">
              <?php
                if(empty($data["sub_img"])) echo "empty sub image";
                else {
                    echo "<img
                    src=\"" . $row_product["img"] . "\"
                    alt=\"image\"
                    />";
                  foreach ($data["sub_img"] as $row) {
                    echo "<img src=\"" . $row["img"] . "\" alt=\"image\"/>";
                  }
                }
              ?>
            </div>
          </div>
          
          <div class="col-xl-7">
            <div class="right-content">
              <?php
                if(empty($data["product_id"])) echo "empty product";
                else {
                  echo "<h2 class=\"title-item\">" . $row_product["name"] . "</h2>
                  <p class=\"rating-star\">";
                  if(empty($data["comment"])) {
                    echo "Chưa có đánh giá";
                  } else {
                    $sum = 0;
                    foreach($data["comment"] as $cmt) {
                      $sum += $cmt["star"];
                    }
                    $sum = $sum / count($data["comment"]);
                    echo $sum . "/5 <i class=\"fas fa-star\"></i> <a href=\"#rate-cmt\"><span>(Xem " . count($data["comment"]) . " đánh giá)</span></a>";
                  }
                  echo "
                  </p>
                  <p class=\"item-price\">" . $row_product["price"] . "đ</p>
                  <div class=\"select-quantity\">
                    Chọn số lượng
                    <div style=\"text-align: left;\" class=\"quantity-section\">
                      <div class=\"minus-qty-btn\"><i class=\"fas fa-minus-circle\"></i></div>
                      <input type=\"text\" class=\"qty-buy\" value=\"1\" disabled>
                      <div class=\"plus-qty-btn\"><i class=\"fas fa-plus-circle\"></i></div>
                    </div>
                  </div>
                  <div class=\"addtocart-btn\">
                    <button type=\"button\" class=\"btn btn-primary\">Add to cart <i class=\"fas fa-shopping-cart\"></i></button>
                  </div>
                  <div class=\"descript-item\">
                    <h3>Chi tiết sản phẩm</h3>
                    <p>" . $row_product["decs"] . "</p>
                  </div>";
                }
              ?>
              <!-- <h2 class="title-item">Mũ Bucket Hat thêu Be Cool!!!</h2>
              <p class="rating-star">
                5/5 <i class="fas fa-star"></i> <span>(Xem n đánh giá)</span>
              </p>
              <p class="item-price">169.000VND</p>
              <div class="select-quantity">
                Chọn số lượng
                <div style="text-align: left;" class="quantity-section">
                  <div class="plus-qty-btn"><i class="fas fa-minus-circle"></i></button></div>
                  <input type="text" class="qty-buy" value="1" disabled>
                  <div class="minus-qty-btn"><i class="fas fa-plus-circle"></i></div>
                </div>
              </div>
              <div class="addtocart-btn">
                <button type="button" class="btn btn-primary">Add to cart <i class="fas fa-shopping-cart"></i></button>
              </div>
              <div class="descript-item">
                <h3>Chi tiết sản phẩm</h3>
                <p>Nếu bạn đã sở hữu những chiếc mũ lưỡi trai thuần nam tính hoặc những dáng mũ fedora lịch lãm, kiểu dáng mũ cao bồi cách điệu bụi bặm, 
                  và đang muốn tìm cho mình một chiếc mũ mang đến vẻ trẻ trung, năng động thì Bucket Hat chính là câu trả lời của bạn đây. Care & Share 
                  ra mắt phiên bản mũ Bucket Hat cùng với nhiều thiết kế ấn tượng nhưng không hề mất đi vẻ nam tính, đơn giản của bạn khi mang chiếc mũ này nhé! </p>
              </div> -->
            </div>
            
          </div>
        </div>
        <div class="bottom">
          <h2>Sản phẩm tương tự</h2>
          <div class="related-items">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
              <?php
                if(empty($data["cate_product"])) echo "empty product";
                else {
                  foreach ($data["cate_product"] as $row) {
                    echo "<div class=\"col\">
                      <div class=\"card\">
                        <a href=\"?url=Home/Item/" . $row["id"] . "\">
                          <img
                            src=\"" . $row["img"] . "\"
                            class=\"card-img-top\"
                            alt=\"card-grid-image\"
                          />
                        </a>
                        <div class=\"card-body\">
                          <h5 class=\"card-title\">" . $row["name"] . "</h5>
                          <p class=\"card-text\">
                            " . $row["price"] . "
                          đ</p>
                        </div>
                      </div>
                    </div>";
                  }
                }
              ?>
            </div>
          </div>
          <div class="comment-rating" id="rate-cmt">
            <div class="row">
              <div class="col-lg-3 star-numbers">
                <?php
                  if(empty($data["comment"])) {
                    echo "Chưa có đánh giá";
                  } else {
                    echo "<div class=\"sum-of-star\">" . 
                    $sum .
                    "<span>
                      <i class=\"fas fa-star\"></i>
                      <i class=\"fas fa-star\"></i>
                      <i class=\"fas fa-star\"></i>
                      <i class=\"fas fa-star\"></i>
                      <i class=\"fas fa-star\"></i>
                    </span>
                  </div>
                  <div class=\"according-to\">Theo " . count($data["comment"]) .  " đánh giá</div>";
                  }
                ?>
              </div>
              <div class="col-lg-9">
                <p>Lọc đánh giá</p>
                <div class="filter-rating">
                  <span id="filter-rating-btn">
                    <button type="button" class="button-filter btn btn-primary current-btn" onclick="filterComment('all')">Tất cả (<?php echo count($data["comment"]) ?>)</button>
                    <button type="button" class="button-filter btn btn-primary" onclick="filterComment('5-star-num')">5 <span><i class="fas fa-star"></i></span></button>
                    <button type="button" class="button-filter btn btn-primary" onclick="filterComment('4-star-num')">4 <span><i class="fas fa-star"></i></span></button>
                    <button type="button" class="button-filter btn btn-primary" onclick="filterComment('3-star-num')">3 <span><i class="fas fa-star"></i></span></button>
                    <button type="button" class="button-filter btn btn-primary" onclick="filterComment('2-star-num')">2 <span><i class="fas fa-star"></i></span></button>
                    <button type="button" class="button-filter btn btn-primary" onclick="filterComment('1-star-num')">1 <span><i class="fas fa-star"></i></span></button>
                  </span>
                  <div>
                    <select name="sort-with" id="sort-with">
                      <option value="show" selected="selected" disabled>Hiển thị</option>
                      <option value="high-first">Đánh giá cao nhất trước</option>
                      <option value="low-first">Đánh giá thấp nhất trước</option>
                    </select>
                  </div>
                </div>
                
              </div>
            </div>
          </div>

          <div class="comment-script">
            <div class="no-filter-cmt"></div>
            <?php
              if(empty($data["comment"])) echo "<div class=\"card\">
                                                  <div class=\"card-body\" id=\"if-no-cmt\">No comment</div></div>";
              else {
                foreach ($data["comment"] as $row) {
                  echo "<div class=\"card filterCmt " . $row["star"] . "-star-num\">
                  <div class=\"card-body\">
                    <div class=\"header-cmt\">
                      <div>
                        <i class=\"fas fa-user-circle\"></i>";
                        foreach($row["uname"] as $name) {
                          echo "<span> " . $name["uname"] . "</span>";
                        }
                        echo "
                        <div class=\"star-cus-rate\">";
                          for($i = 0; $i < $row["star"]; $i++) {
                            echo "<i class=\"fas fa-star\"></i>";
                          }
                          for($i = 0; $i < 5 - $row["star"]; $i++) {
                            echo "<i class=\"far fa-star\"></i>";
                          }
                        echo "  
                        </div>
                      </div>
                      <div>
                        <p>" . $row["time"] . "</p>
                      </div>
                    </div>
                    <div class=\"script-cmt\">
                      <p>" . $row["content"] . "</p>
                    </div>
                  </div>
                </div>";
                }
              }
            ?>
          </div>
          <div class="add-comment">
            <form action="" onsubmit="return false;">
              <div class="row">
                <textarea name="comment-content" placeholder="Viết bình luận ..."></textarea>
                <select>
                  <option selected disabled>Chọn số sao</option>
                  <option>5</option>
                  <option>4</option>
                  <option>3</option>
                  <option>2</option>
                  <option>1</option>
                </select>
              </div>
              <button type="button" class="btn-add-cmt">Bình luận</button>
            </form>
          </div>
        </div>
        
      </div>

      <div class="footer-holder"></div>
      <script src="./Views/footer/footerScript.js"></script>
    </div>
    <script src="./Views/Item/item.js"></script>
  </body>
</html>
