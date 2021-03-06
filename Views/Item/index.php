<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assignment</title>
    <link rel="icon" type="image/x-icon" href="./Views/images/Logo BK_vien trang.png">

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
    <?php require_once("./Views/Navbar/index.php"); ?>
      <script src="../Views/Navbar/navbarScript.js"></script>

      <div class="container-fluid"><span hidden><?php echo $data["user"]; ?></span>
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
              
              $sum = 0;
              $sum_1 = 0;
              $sum_2 = 0;
              $sum_3 = 0;
              $sum_4 = 0;
                if(empty($data["product_id"])) echo "empty product";
                else {
                  echo "<h2 class=\"title-item\">" . $row_product["name"] . "</h2>
                  <p class=\"rating-star\">";
                  if(empty($data["comment"])) {
                    echo "Ch??a c?? ????nh gi??";
                  } else {
                    foreach($data["comment"] as $cmt) {
                      $sum += $cmt["star"];
                      if ($cmt["star"] == "1") {
                        $sum_1 += 1;
                      } else if ($cmt["star"] == "2") {
                        $sum_2 += 1;
                      } else if ($cmt["star"] == "3") {
                        $sum_3 += 1;
                      } else if ($cmt["star"] == "4") {
                        $sum_4 += 1;
                      }
                    }
                    $sum = round($sum / count($data["comment"]), 1);
                    echo $sum . "/5 <i class=\"fas fa-star\"></i> <a href=\"#rate-cmt\"><span>(Xem " . count($data["comment"]) . " ????nh gi??)</span></a>";
                  }
                  echo "
                  </p>
                  <p class=\"item-price\">" . $row_product["price"] . "??</p>";
                  if($data["user"] == "customer" || $data["user"] == "member"){
                  echo "<div class=\"select-quantity\">
                    Ch???n s??? l?????ng
                    <div style=\"text-align: left;\" class=\"quantity-section\">
                      <div class=\"minus-qty-btn\"><i class=\"fas fa-minus-circle\"></i></div>
                      <input type=\"text\" class=\"qty-buy\" value=\"1\" disabled>
                      <div class=\"plus-qty-btn\"><i class=\"fas fa-plus-circle\"></i></div>
                    </div>
                  </div>
                  <div class=\"addtocart-btn\">
                    <button type=\"button\" class=\"btn btn-primary\" onclick=\"add_Product(this);\" value=\"" . $row_product["id"] . "\">Add to cart <i class=\"fas fa-shopping-cart\"></i></button>
                  </div>";
                  echo "<div class=\"descript-item\">
                          <h3>Chi ti???t s???n ph???m</h3>
                          <p>" . $row_product["decs"] . "</p>
                        </div>";
                }
                  else if($data["user"] == "manager"){
                    echo "<div class=\"descript-item\">
                          <h3>Chi ti???t s???n ph???m</h3>
                          <p>" . $row_product["decs"] . "</p>
                        </div>";
                    echo "<button type=\"button\" id=\"edit-itemBtn\">Ch???nh s???a</button>
                    <span hidden id=\"get_name_val\">" . $row_product["name"] . "</span>
                    <div id=\"editItem-modal\" class=\"edit-item-modal\">
                      <div class=\"editItem-modal-content\">
                        <div class=\"editItem-modal-header\">
                          <span class=\"close-modal-edit\">&times;</span>
                          <h2>Ch???nh s???a s???n ph???m</h2>
                        </div>
                        <div class=\"editItem-modal-body\">
                          <form action=\"?url=Home/update_item/" . $row_product["id"] . "/\" method=\"POST\" enctype=\"multipart/form-data\">
                            <div class=\"row\">
                              <label class=\"col-lg-4\" for=\"name\">
                                T??n s???n ph???m:
                              </label>
                              <div class=\"col-lg-8\"><input type=\"text\" name=\"name\" value=\"\" placeholder=\"Nh???p t??n s???n ph???m\" class=\"form-control is-valid\" id=\"validationSuccess\" required></div>
                            </div>
                            <div class=\"row\">
                              <label class=\"col-lg-4\" for=\"price\">
                                Gi??:
                              </label>
                              <div class=\"col-lg-8\"><input type=\"number\" name=\"price\" value=\"" . $row_product["price"] . "\" placeholder=\"Nh???p gi?? c???a s???n ph???m\" class=\"form-control is-valid\" id=\"validationSuccess\" required></div>
                            </div>
                            <div class=\"row\">
                              <label class=\"col-lg-4\" for=\"e-image-url\">
                              <i class=\"far fa-image\"></i> ???nh s???n ph???m: 
                              </label>
                              <div class=\"col-lg-8\"><img src=\"" . $row_product["img"] . "\" alt=\"main_img\" style=\"width: 50%; margin-bottom: 1rem;\"><input type=\"file\" id=\"e-image-url\" name=\"e-image-url[]\" onchange=\"upload_pic(this)\" hidden></div>
                            </div>";
                            $count = 1;
                            foreach($data["sub_img"] as $row){
                              echo"<div class=\"row\">
                              <label class=\"col-lg-4\" for=\"e-image-url-" . $count . "\">
                              <i class=\"far fa-image\"></i> ???nh ph??? th??? " . $count . ": 
                              </label>
                              <div class=\"col-lg-8\"><img src=\"" . $row["img"] . "\" alt=\"main_img\" style=\"width: 50%; margin-bottom: 1rem;\"><input type=\"file\" id=\"e-image-url-" . $count . "\" name=\"e-image-url[]\" onchange=\"upload_pic(this)\" hidden></div>
                            </div>";
                              $count += 1;
                            }
                            echo "<div class=\"row\">
                              <label class=\"col-lg-4\" for=\"description\">
                                M?? t???:
                              </label>
                              <div class=\"col-lg-8\"><textarea rows=\"10\" name=\"description\" placeholder=\"Nh???p m?? t??? s???n ph???m\" class=\"form-control is-valid\" id=\"validationSuccess\" required>" . $row_product["decs"] . "</textarea></div>
                            </div>
                            <div class=\"row\">
                              <label class=\"col-lg-4\" for=\"remain\">
                                S??? l?????ng t???n kho:
                              </label>
                              <div class=\"col-lg-8\"><input type=\"number\" name=\"remain\" value=\"" . $row_product["num"] . "\" placeholder=\"Nh???p s??? l?????ng s???n ph???m\" class=\"form-control is-valid\" id=\"validationSuccess\" required></div>
                            </div>
                            <div class=\"row\">
                              <label class=\"col-lg-4\" for=\"featured_product\">
                                Top s???n ph???m:
                              </label>
                              <div class=\"col-lg-8\">
                                <select id=\"featured_product\" name=\"featured_product\">
                                  <option value=\"0\""; if ($row_product["top_item"] == 0) echo "selected"; 
                                  echo">0</option>
                                  <option value=\"1\""; if ($row_product["top_item"] == 1) echo "selected"; 
                                  echo">1</option>
                                </select>
                              </div>
                            </div>
                            <div class=\"row\">
                              <label class=\"col-lg-4\" for=\"category\">
                                Lo???i:
                              </label>
                              <div class=\"col-lg-8\">
                                <select id=\"category\" name=\"category\">
                                  <option selected=\"\" disabled=\"\" value=\"Shirt\""; if ($row_product["cate"] == "Shirt") echo "selected"; 
                                  echo">??o</option>
                                  <option value=\"Trousers\""; if ($row_product["cate"] == "Trousers") echo "selected"; 
                                  echo">Qu???n</option>
                                  <option value=\"Accessories\""; if ($row_product["cate"] == "Accessories") echo "selected"; 
                                  echo">Ph??? ki???n</option>
                                </select>
                              </div>
                            </div>
                            <div class=\"btn-conf-edit\">
                              <button type=\"submit\">X??c nh???n</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>";
                  }
                  
                }
              ?>
              <!-- <h2 class="title-item">M?? Bucket Hat th??u Be Cool!!!</h2>
              <p class="rating-star">
                5/5 <i class="fas fa-star"></i> <span>(Xem n ????nh gi??)</span>
              </p>
              <p class="item-price">169.000VND</p>
              <div class="select-quantity">
                Ch???n s??? l?????ng
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
                <h3>Chi ti???t s???n ph???m</h3>
                <p>N???u b???n ???? s??? h???u nh???ng chi???c m?? l?????i trai thu???n nam t??nh ho???c nh???ng d??ng m?? fedora l???ch l??m, ki???u d??ng m?? cao b???i c??ch ??i???u b???i b???m, 
                  v?? ??ang mu???n t??m cho m??nh m???t chi???c m?? mang ?????n v??? tr??? trung, n??ng ?????ng th?? Bucket Hat ch??nh l?? c??u tr??? l???i c???a b???n ????y. Care & Share 
                  ra m???t phi??n b???n m?? Bucket Hat c??ng v???i nhi???u thi???t k??? ???n t?????ng nh??ng kh??ng h??? m???t ??i v??? nam t??nh, ????n gi???n c???a b???n khi mang chi???c m?? n??y nh??! </p>
              </div> -->
            </div>
            
          </div>
        </div>
        <div class="bottom">
          <h2>S???n ph???m t????ng t???</h2>
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
                          <p class=\"card-text related-item-price\">
                            " . $row["price"] . "
                          ??</p>
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
              <div class="col-lg-2 star-numbers">
                <?php
                  if(empty($data["comment"])) {
                    echo "Ch??a c?? ????nh gi??";
                  } else {
                    echo "<div class=\"sum-of-star\">" . 
                    $sum .
                    "<span>
                      <i class=\"fas fa-star\"></i>
                    </span>
                  </div>
                  <div class=\"according-to\">Theo " . count($data["comment"]) .  " ????nh gi??</div>";
                  }
                ?>
              </div>
              <div class="col-lg-10">
                <p>L???c ????nh gi??</p>
                <div class="filter-rating">
                  <span id="filter-rating-btn">
                    <button type="button" class="button-filter btn btn-primary current-btn" onclick="filterComment('all')">T???t c??? (<?php echo count($data["comment"]) ?>)</button>
                    <button type="button" class="button-filter btn btn-primary" onclick="filterComment('5-star-num')">5 <span><i class="fas fa-star"></i></span> (<?php echo count($data["comment"]) - $sum_1 - $sum_2 - $sum_3 - $sum_4 ?>)</button>
                    <button type="button" class="button-filter btn btn-primary" onclick="filterComment('4-star-num')">4 <span><i class="fas fa-star"></i></span> (<?php echo $sum_4 ?>)</button>
                    <button type="button" class="button-filter btn btn-primary" onclick="filterComment('3-star-num')">3 <span><i class="fas fa-star"></i></span> (<?php echo $sum_3 ?>)</button>
                    <button type="button" class="button-filter btn btn-primary" onclick="filterComment('2-star-num')">2 <span><i class="fas fa-star"></i></span> (<?php echo $sum_2 ?>)</button>
                    <button type="button" class="button-filter btn btn-primary" onclick="filterComment('1-star-num')">1 <span><i class="fas fa-star"></i></span> (<?php echo $sum_1 ?>)</button>
                  </span>
                  <div>
                    <select name="sort-with" id="sort-with"<?php echo "onchange=\"sort_comment(" . $row_product["id"] . ")\""?>>
                      <option value="show" selected="selected" disabled>Hi???n th???</option>
                      <option value="high-first">????nh gi?? cao nh???t tr?????c</option>
                      <option value="low-first">????nh gi?? th???p nh???t tr?????c</option>
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
                $count = 0;
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
                    <div class=\"comment-content\">
                      <div class=\"script-cmt\">
                        <p>" . $row["content"] . "</p>
                      </div>";
                    if($data["user"] == "manager"){
                      echo "<div><i class=\"fas fa-trash-alt\" data-bs-toggle=\"modal\" data-bs-target=\"#delcmtModal-" .$count . "\"></i></div>";
                      echo "<div class=\"modal fade\" id=\"delcmtModal-" .$count . "\" tabindex=\"-1\" aria-labelledby=\"delcmtModalLabel-" .$count . "\" aria-hidden=\"true\">
                        <div class=\"modal-dialog modal-dialog-centered\">
                          <div class=\"modal-content\">
                            <div class=\"modal-header\">
                              <h5 class=\"modal-title\" id=\"delcmtModalLabel-" .$count . "\">B???n mu???n x??a b??nh lu???n n??y</h5>
                              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body\">
                              
                            </div>
                            <div class=\"modal-footer\">
                              <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">????ng</button>
                              <button type=\"button\" class=\"btn btn-primary\" data-bs-dismiss=\"modal\" onclick=\"delete_comment(" . $row["id"] . ", this)\">X??c nh???n</button>
                            </div>
                          </div>
                        </div>
                      </div>";
                      $count += 1;
                    }
                echo "</div>
                    </div>
                </div>";
                }
              }
            ?>
          </div>
          <span class="get-item-id" hidden><?php echo $row_product["id"];?></span>
          <?php
            if($data["user"] == "member") {
              echo "<div class=\"add-comment\">
                      <form action=\"\" onsubmit=\"return false;\">
                        <div class=\"row\">
                          <textarea name=\"comment-content\" placeholder=\"Vi???t b??nh lu???n ...\"></textarea>
                          <select>
                            <option selected disabled>Ch???n s??? sao</option>
                            <option>5</option>
                            <option>4</option>
                            <option>3</option>
                            <option>2</option>
                            <option>1</option>
                          </select>
                        </div>
                        <button type=\"button\" class=\"btn-add-cmt\">B??nh lu???n</button>
                      </form>
                    </div>";
            } 
          ?>
          
        </div>
        
      </div>

      <!--div class="footer-holder"></div>
      <script src="./Views/footer/footerScript.js"></script-->
    <?php require_once "./Views/footer/index.php ";?>
    </div>
    
    <script src="./Views/Item/item.js"></script>
  </body>
</html>
