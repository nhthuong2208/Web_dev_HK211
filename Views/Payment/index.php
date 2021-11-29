<!DOCTYPE html>
<html>
  <head>
    <!-- setting page -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Payment page">
    <meta name="author" content="Phạm Minh Hiếu">

    <title>Assignment</title>
    <link
      rel="icon"
      type="image/x-icon"
      href="../images/Logo BK_vien trang.png"
    />

    <!-- link icon -->
    <script src="https://kit.fontawesome.com/320d0ac08e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="./Views/Payment/style.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
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
    <script src="https://use.fontawesome.com/721412f694.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <link href="./Views/Navbar/navbar.css" rel="stylesheet">
  </head>
  <body>
    <!--Nav-->
    <?php require_once("./Views/Navbar/index.php"); ?>
    <script src="./Views/Navbar/navbarScript.js" type="text/javascript"></script>
    <!--Nav-->

    <!--Body-->
    <div class="container-fuild payment">
        <div class="row nonemg d-flex justify-content-center">
          <div class="col-12 col-md-6 white nonepad">
            <h3>Các sản phẩm của bạn</h3>
            <div class="row nonemg text-center">
              <?php
              $count = 0;
              $total = 0;
              $check = 0;
                if(!empty($data["order_combo"])){

                    foreach($data["order_combo"] as $row){
                      $count += 1;
                      $total += (int)$row["price"];
                        echo "<div class=\"col-12 mb-4\">
                        <section>
                            <div class=\"card\">
                                <div class=\"card-header text-center py-1\">
                                    <h5 class=\"mb-0 fw-bold\">" . $row["name"] . "</h5>
                                    </div>		
                                    <div class=\"card-body\">
                                        <h3 class=\"text-warning mb-2\">" . $row["price"] . "/tháng</h3>
                                        <h6>Mỗi hộp bao gồm: </h6>
                                        <ol class=\"list-group list-group-numbered\">";
                                        foreach($row["product"] as $product){
                                            echo "<li class=\"list-group-item\">" . $product["name"] . "</li>";
                                        }
                        echo        "</ol>
                                    </div>
                                    <div class=\"card-footer d-flex justify-content-between py-3\">
                                    <h4>Chu kì: " . $row["cycle"] . "</h4><h4>Size: " . $row["size"] . "</h4>";
                      echo "</div></div></section></div>";
                    }
                }
                    if(!empty($data["product_in_cart"]))
                    {
                      foreach($data["product_in_cart"] as $row){
                        $count += 1;
                        $total += (int)$row["price"]*$row["num"];
                        echo "<div class=\"col-12\">
                        <div class=\"row node nonemg\"><span hidden>" . $row["oid"] . "</span>
                            <div class=\"col-4 d-flex flex-wrap align-content-center justify-content-center\">
                                <img src=\"" . $row["img"] . "\" alt=\"item\">
                            </div>
                            <div class=\"col-8\">
                                <div class=\"row\">
                                    <div class=\"col-12\">
                                        <h5>" . $row["name"] . "</h5>
                                    </div>
        
                                    <div class=\"col-12\">Size: <span>" . $row["size"] . "</span></div>
                                    <div class=\"col-12\">Số lượng: <span>" . $row["num"] . "</span></div>
                                    <div class=\"col-12\">Tổng cộng: <span class=\"price\">" . $row["price"]*$row["num"] . "(đ)</span></div>
                                </div>
                            </div>
                        </div>
                      </div>";
                    }
                }
              ?>
            </div>
          </div>
          <div class="col-12 col-md-6 col-xl-4 white nonepad body_2">
              <h3>Phương thức thanh toán</h3>
              <div class="row d-flex justify-content-center nonemg">
                <div class="col-12 cart_node">
                  <div class="row">
                    <div class="col-2"><input type="radio" name="cart_node" id="credit"></div>
                    <div class="col-5"><label for="credit"><h5>Credit Card</h5></label></div>
                    <div class="col-5 d-flex justify-content-end"><label for="credit"><img src="./Views/images/visa.png" alt="Visa picture" ></label></div>
                  </div>
                </div>
                <div class="col-12 cart_node">
                  <div class="row">
                    <div class="col-2"><input type="radio" name="cart_node" id="momo"></div>
                    <div class="col-5"><label for="momo"><h5>MoMo</h5></label></div>
                    <div class="col-5 d-flex justify-content-end"><label for="momo"><img src="./Views/images/MoMo Logo.png" alt="MoMo picture" ></label></div>
                  </div>
                </div>
                <div class="col-12 cart_node">
                  <div class="row">
                    <div class="col-2"><input type="radio" name="cart_node" id="paypal"></div>
                    <div class="col-5"><label for="paypal"><h5>Paypal</h5></label></div>
                    <div class="col-5 d-flex justify-content-end"><label for="paypal"><img src="./Views/images/paypal.png" alt="paypal picture" ></label></div>
                  </div>
                </div>
              </div>

              <div class="row nonemg flex-wrap total">
                <h4>Tổng kết hóa đơn</h4>
                <div class="col-12">
                  <div class="d-flex justify-content-between">
                    <h6>Tổng phụ (<?php echo $count;?> sản phẩm)</h6><span><?php echo $total ?></span>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-flex justify-content-between">
                    <h6>Phí ship</h6><span>23,000(đ)</span>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-flex justify-content-between">
                    <h6>Giảm giá</h6><span>5,000(đ)</span>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="d-flex justify-content-between line-top">
                    <h6>Tổng cộng </h6><span></span>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-flex flex-wrap justify-content-end">
                    <?php 
                          echo "<button id=\"myBtn\" type=\"button\" class=\"btn btn-primary\">Hủy đơn</button>";
                    ?>
                    <button type="button" class="btn btn-primary">Thanh toán</button>
                  </div>
                </div>
              </div>

          </div>
        </div>
    </div>

    <div id="myModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <h2>Credit Card <i class="fab fa-cc-visa"></i></h2>
          <span class="close">&times;</span>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-12"><div class="row">
                  <div class="col-4">Số card:  </div>
                  <div class="col-8"><input type="number" name="number" placeholder="Credit card number">
              </div></div></div>
              <div class="col-12"><div class="row">
                  <div class="col-4">Hiệu lực thẻ: </div>
                  <div class="col-8"><input type="text" name="date" placeholder="mm/yyyy">
              </div></div></div>
               <div class="col-12"><div class="row">
                  <div class="col-4">CVV: </div>
                  <div class="col-8"><input type="number" name="cvv">
              </div></div></div>
              <button type="button" class="btn btn-primary">Hoàn tất</button>
          </div>
        </div>
      </div>
    </div>
    <!--Body-->

    <!--Footer-->
    <!--div class="footer-holder"></div>
    <script src="./Views/footer/footerScript.js"></script-->
    
    <?php require_once "./Views/footer/index.php ";?>
    <!--Footer-->
  <?php
        echo "<script src=\"./Views/Payment/myScript.js\"></script>";
  ?>
  </body>
</html>
