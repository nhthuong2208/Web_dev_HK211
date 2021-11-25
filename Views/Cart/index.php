<!DOCTYPE html>
<html>
  <head>
    <!-- setting page -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Cart page">
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
    <link href="./Views/Cart/style.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!---------------------->
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
      crossorigin="anonymous"></script>
    <link href="./Views/Navbar/navbar.css" rel="stylesheet">
  </head>
  <body>
    
    <!--Nav-->
    <div class="navbar-holder sticky-top"></div>
    <script src="../Views/Navbar/navbarScript.js" type="text/javascript" id></script>
    <!--Nav-->

    <!--Body-->
    <div class="container-fuild">
        <div class="row nonemg d-flex">
            <div class="col-12">
                <div class="row nonemg d-flex flex-wrap justify-content-center">
                    <div class="col-12 col-xxl-11 d-flex flex-wrap justify-content-center">
                        <h2>Giỏ hàng</h2>
                    </div>
                    <?php
                    if(!empty($data["product_in_cart"])){
                            echo "<div class=\"col-12 col-xxl-11\">
                                <div class=\"row nonemg d-flex flex-wrap\">";
                            $count = 0;
                            foreach($data["product_in_cart"] as $row){
                                $count += 1;
                                echo    "<div class=\"col-12 col-md-6 col-xl-4 col-xxl-4\">
                                            <div class=\"row node nonemg\">
                                                <div class=\"col-4 d-flex flex-wrap align-content-center justify-content-center\">
                                                    <img src=\"" . $row["img"] . "\" alt=\"item\">
                                                </div>
                                                <div class=\"demo\" hindden>" . $row["id"] . "</div>
                                                <div class=\"col-7\">
                                                    <div class=\"row\">
                                                        <div class=\"col-12\">
                                                            <h5>" . $row["name"] . "</h5>
                                                        </div>
                
                                                        <div class=\"col-12\">
                                                            <div class=\"row\">
                                                                <div class=\"col-6\">Size: </div>
                                                                <div class=\"col-6\"><select>
                                                                        <option value=\"S\" selected>S</option>
                                                                        <option value=\"M\">M</option>
                                                                        <option value=\"L\">L</option>
                                                                        <option value=\"X\">X</option>
                                                                        <option value=\"XL\">XL</option>
                                                                        <option value=\"XXL\">XXL</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
            
                                                        <div class=\"col-12\">
                                                            <div class=\"row\">
                                                                <div class=\"col-6\">Giá: </div>
                                                                <div class=\"col-6 price\">" . $row["price"] . "(đ)</div>
                                                            </div>
                                                        </div>
                
                                                        <div class=\"col-12\">
                                                            <div class=\"row d-flex flex-wrap align-content-center justify-content-center\">
                                                                <div class=\"col-2 d-flex flex-wrap align-content-center justify-content-center click\" onclick=\"minusnode(this);\"><i class=\"fas fa-minus\"></i></div>
                                                                <div class=\"col-2 d-flex flex-wrap align-content-center justify-content-center\"><div class=\"value_click\">" . $row["num"] ."</div></div>
                                                                <div class=\"col-2 d-flex flex-wrap align-content-center justify-content-center click\" onclick=\"plusnode(this);\"><i class=\"fas fa-plus\"></i></div>
                                                            </div>
                                                        </div>
                
                                                        <div class=\"col-12\">
                                                            <div class=\"row\">
                                                                <div class=\"col-6\">Tổng cộng: </div>
                                                                <div class=\"col-6 total\">" . (int)$row["price"] * (int)$row["num"] . "(đ)</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                <div class=\"col-1\" onclick=\"remove_product_incart(this)\">
                                                    <i class=\"fas fa-times\"></i>    
                                                </div>
                        
                                            </div>
                                        </div>";
                                            
                            }
                        echo "
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-12\">
                <div class=\"row nonemg d-flex flex-row-reverse\">
                    <div class=\"col-12 col-sm-8 col-md-6 col-lg-5 col-xxl-4\">
                        <h3>Tổng thanh toán (".  $count ." sản phẩm)</h3>
                        <h5></h5>
                        <div class=\"d-flex flex-wrap justify-content-center\">
                            <button id=\"myBtn\" type=\"button\" class=\"btn btn-primary\">Địa chỉ giao hàng</button>
                            <button type=\"button\" class=\"btn btn-primary\">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
            ";
            }
            else{
                echo "<h1>Không có sản phẩm</h1>";
            }
            ?>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Thông tin các nhân</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                            echo    "<div class=\"col-12\">
                                        <div class=\"row\">
                                            <div class=\"col-4\">Họ và tên:  </div>
                                            <div class=\"col-8\"><input type=\"text\" name=\"name\" value=\"" . $data["user"]["name"] .  "\"></div>
                                        </div>
                                    </div>
                        <div class=\"col-12\">
                        <div class=\"row\">
                            <div class=\"col-4\">Số điện thoại: </div>
                            <div class=\"col-8\"><input type=\"text\" name=\"numberphone\"  value=\"".  $data["user"]["phone"] . "\"></div>
                            </div>
                        </div>
                        <div class=\"col-12\">
                            <div class=\"row\">
                                <div class=\"col-4\">Địa chỉ: </div>
                                <div class=\"col-8\"><input type=\"text\" name=\"address\"  value=\"". $data["user"]["add"] . "\"></div>
                                </div>
                            </div>
                            <div hidden id=\"id\">" . $_SESSION["id"] . "</div>
                            <button type=\"button\" class=\"btn btn-primary\">Hoàn tất</button>";
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
      
    <!--Body-->

    <!--Footer-->
    <div class="footer-holder"></div>
    <script src="./Views/footer/footerScript.js"></script>
  <!--Footer-->
  
    <script src="./Views/Cart/myscript.js" type="text/javascript"></script>
  </body>
</html>
