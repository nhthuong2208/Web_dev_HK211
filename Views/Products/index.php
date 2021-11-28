<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assignment</title>
    <link rel="icon" type="image/x-icon" href="../images/Logo BK_vien trang.png">

    <link href="./Views/Products/product.css" rel="stylesheet" type="text/css" />
    <link href="../Views/Navbar/navbar.css" rel="stylesheet" type="text/css" />
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
    <div class="company-product">

      <!-- Navigation -->
    <?php require_once("./Views/Navbar/index.php"); ?>
      <script src="../Views/Navbar/navbarScript.js" index='2'></script>
      
      <!-- Filter bar and sort -->
      <div class="header-product">
        <div id="myBtnContainer" class="filterBar">
          <div class="tab-filter active-filter" onclick="filterSelection('all')"> All</div>
          <?php
                if(empty($data["cate"])) echo "empty cate";
                else{
                  foreach($data["cate"] as $row){
                    echo "<div class=\"tab-filter\" onclick=\"filterSelection('" . $row["cate"] . "')\">" . $row["cate"] . "</div>";
                  }
                }
          ?>
        </div>
  
        
          <?php
            if($data["user"] == "customer" || $data["user"] == "member"){
              echo "<div class=\"form-sort\">
              <form action=\"?url=Home/sort_product\" method=\"POST\">
                <div class=\"item\">
                  <label for=\"sort-by\">Sort By</label>
                  <select name=\"sort-by\" id=\"sort-by\">
                    <option value=\"pname\">Name</option>
                    <option value=\"price\">Price</option>
                  </select>
                </div>
                <div class=\"item\">
                  <label for=\"order-by\">Order</label>
                  <select name=\"order-by\" id=\"order-by\">
                    <option value=\"ASC\">ASC</option>
                    <option value=\"DESC\">DESC</option>
                  </select>
                </div>
                <button class=\"sort-btn\" type=\"submit\">Apply</button>
            </form>
            </div>";
            } else if($data["user"] == "manager") {
              echo "<div class=\"form-sort\">
                    <button type=\"button\" id=\"add-itemBtn\"><i class=\"fas fa-plus\"></i> Thêm sản phẩm</button></div>
                    <div id=\"addItem-modal\" class=\"add-item-modal\">
                    <div class=\"addItem-modal-content\">
                      <div class=\"addItem-modal-header\">
                        <span class=\"close-modal-add\">&times;</span>
                        <h2>Thêm sản phẩm</h2>
                      </div>
                      <div class=\"addItem-modal-body\">
                        <form action=\"?url=Home/add_new_item\" method=\"POST\" enctype=\"multipart/form-data\">
                          <div class=\"row\">
                            <label class=\"col-lg-4\" for=\"iname\">
                              Tên sản phẩm:
                            </label>
                            <div class=\"col-lg-8\"><input type=\"text\" name=\"iname\" placeholder=\"Nhập tên sản phẩm\"></div>
                          </div>
                          <div class=\"row\">
                            <label class=\"col-lg-4\" for=\"price\">
                              Giá:
                            </label>
                            <div class=\"col-lg-8\"><input type=\"number\" name=\"price\" placeholder=\"Nhập giá của sản phẩm\"></div>
                          </div>
                          <div class=\"row\">
                            <label class=\"col-lg-4\" for=\"image-url\">
                              Ảnh sản phẩm:
                            </label>
                            <div class=\"col-lg-8\"><input type=\"file\" id=\"image-url\" name=\"image-url[]\" onchange=\"upload_pic(this)\" hidden></div>
                          </div>
                          <div class=\"row\">
                            <label class=\"col-lg-4\" for=\"image-url-1\">
                              Ảnh phụ thứ 1:
                            </label>
                            <div class=\"col-lg-8\"><input type=\"file\" id=\"image-url-1\" name=\"image-url[]\" onchange=\"upload_pic(this)\" hidden></div>
                          </div>
                          <div class=\"row\">
                            <label class=\"col-lg-4\" for=\"image-url-2\">
                              Ảnh phụ thứ 2:
                            </label>
                            <div class=\"col-lg-8\"><input type=\"file\" id=\"image-url-2\" name=\"image-url[]\" onchange=\"upload_pic(this)\" hidden></div>
                          </div>
                          <div class=\"row\">
                            <label class=\"col-lg-4\" for=\"image-url-3\">
                              Ảnh phụ thứ 3:
                            </label>
                            <div class=\"col-lg-8\"><input type=\"file\" id=\"image-url-3\" name=\"image-url[]\" onchange=\"upload_pic(this)\" hidden></div>
                          </div>
                          <div class=\"row\">
                            <label class=\"col-lg-4\" for=\"image-url-4\">
                              Ảnh phụ thứ 4:
                            </label>
                            <div class=\"col-lg-8\"><input type=\"file\" id=\"image-url-4\" name=\"image-url[]\" onchange=\"upload_pic(this)\" hidden></div>
                          </div>
                          <div class=\"row\">
                            <label class=\"col-lg-4\" for=\"description\">
                              Mô tả:
                            </label>
                            <div class=\"col-lg-8\"><textarea name=\"description\" placeholder=\"Nhập mô tả sản phẩm\"></textarea></div>
                          </div>
                          <div class=\"row\">
                            <label class=\"col-lg-4\" for=\"remain\">
                              Số lượng tồn kho:
                            </label>
                            <div class=\"col-lg-8\"><input type=\"number\" name=\"remain\" placeholder=\"Nhập số lượng sản phẩm\"></div>
                          </div>
                          <div class=\"row\">
                            <label class=\"col-lg-4\" for=\"category\">
                              Loại:
                            </label>
                            <div class=\"col-lg-8\">
                              <select id=\"category\" name=\"category\">
                                <option selected disabled>Chọn loại</option>
                                <option value=\"Shirt\">Áo</option>
                                <option value=\"Trousers\">Quần</option>
                                <option value=\"Accessories\">Phụ kiện</option>
                              </select>
                            </div>
                          </div>
                          <div class=\"btn-conf-add\">
                            <button type=\"submit\">Thêm</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>";
            }
          ?>
      </div>
      
      <!-- Main content -->
      <div class="container-fluid"><span hidden><?php echo $data["user"]; ?></span>
        <div class="list-product">
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
              <?php
                  if(empty($data["product"])) echo "empty product";
                  else{
                    $count = 0;
                    foreach($data["product"] as $row){
                      echo "<div class=\"col filterDiv " . $row["cate"] . "\"><div class=\"card\"><a href=\"?url=Home/Item/" . $row["id"] . "/\"><img src=\"" . $row["img"] .
                      "\"class=\"card-img-top\" alt=\"card-grid-image\" /></a>
                      <div class=\"card-body\"><h5 class=\"card-title\">" . $row["name"] .
                      "</h5>
                      <p class=\"card-text fw-bold fs-5\">" . $row["price"] . "đ</p>
                      <div class=\"d-flex justify-content-between\">";
                      if($data["user"] == "customer" || $data["user"] == "member"){
                        echo "<div style=\"text-align: left;\" class=\"quantity-section\"><div class=\"plus-qty-btn\"><i class=\"fas fa-minus-circle\" onclick=\"minus(this);\"></i></button></div>
                        <input type=\"text\" class=\"qty-buy\" value=\"1\" disabled><div class=\"minus-qty-btn\"><i class=\"fas fa-plus-circle\" onclick=\"plus(this);\"></i></div>
                        </div><div style=\"text-align: right\"><button type=\"button\" class=\"btn btn-primary addToCart\" onclick=\"add_Product(this);\"><span hidden>" . $row["id"] . "</span>Add to cart</button></div></div></div></div></div>";
                      } else if($data["user"] == "manager"){
                        echo "<div style=\"text-align: left;\" class=\"quantity-section\">
                        <button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal-" .$count . "\"><i class=\"far fa-trash-alt\"></i>
                         Xóa
                        </button>
                        <div class=\"modal fade\" id=\"exampleModal-" .$count . "\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel-" .$count . "\" aria-hidden=\"true\">
                          <div class=\"modal-dialog modal-dialog-centered\">
                            <div class=\"modal-content\">
                              <div class=\"modal-header\">
                                <h5 class=\"modal-title\" id=\"exampleModalLabel-" .$count . "\">Bạn muốn xóa sản phẩm này</h5>
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                              </div>
                              <div class=\"modal-body\">
                                
                              </div>
                              <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Đóng</button>
                                <button type=\"button\" class=\"btn btn-primary\" data-bs-dismiss=\"modal\" onclick=\"remove_item(" . (int)$row["id"] . ", this)\">Xác nhận</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div><div style=\"text-align: right\"><a href=\"?url=Home/Item/" . $row["id"] . "/\"><button type=\"button\" class=\"btn btn-primary\"><i class=\"far fa-edit\"></i>
                         Chỉnh sửa
                        </button></a></div></div></div></div></div>";
                      }
                      $count += 1;
                    }
                  }
              ?>
            <!--div class="col filterDiv accessories">
              <div class="card">
                <a href="?url=Home/Item/">
                  <img
                    src="https://media.coolmate.me/uploads/August2021/4-0_98.jpg"
                    class="card-img-top"
                    alt="card-grid-image"
                  />
                </a>
                
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a longer card with supporting text below as a
                    natural lead-in to additional content. This content is a
                    little bit longer.
                  </p>
                  <div class="d-flex justify-content-between">
                    <div style="text-align: left;" class="quantity-section">
                      <div class="plus-qty-btn"><i class="fas fa-minus-circle"></i></button></div>
                      <input type="text" class="qty-buy" value="1" disabled>
                      <div class="minus-qty-btn"><i class="fas fa-plus-circle"></i></div>
                    </div>
                    <div style="text-align: right">
                      <button type="button" class="btn btn-primary">
                        Add to cart
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col filterDiv shirt">
              <div class="card">
                <img
                  src="https://media.coolmate.me/uploads/July2021/2_26.jpg"
                  class="card-img-top"
                  alt="card-grid-image"
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a longer card with supporting text below as a
                    natural lead-in to additional content. This content is a
                    little bit longer.
                  </p>
                  <div class="d-flex justify-content-between">
                    <div style="text-align: left;" class="quantity-section">
                      <div class="plus-qty-btn"><i class="fas fa-minus-circle"></i></button></div>
                      <input type="text" class="qty-buy" value="1" disabled>
                      <div class="minus-qty-btn"><i class="fas fa-plus-circle"></i></div>
                    </div>
                    <div style="text-align: right">
                      <button type="button" class="btn btn-primary">
                        Add to cart
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col filterDiv trousers">
              <div class="card">
                <img
                  src="https://media.coolmate.me/uploads/September2021/a56_51.jpg"
                  class="card-img-top"
                  alt="card-grid-image"
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a longer card with supporting text below as a
                    natural lead-in to additional content. This content is a
                    little bit longer.
                  </p>
                  <div class="d-flex justify-content-between">
                    <div style="text-align: left;" class="quantity-section">
                      <div class="plus-qty-btn"><i class="fas fa-minus-circle"></i></button></div>
                      <input type="text" class="qty-buy" value="1" disabled>
                      <div class="minus-qty-btn"><i class="fas fa-plus-circle"></i></div>
                    </div>
                    <div style="text-align: right">
                      <button type="button" class="btn btn-primary">
                        Add to cart
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col filterDiv shirt">
              <div class="card">
                <img
                  src="https://media.coolmate.me/uploads/October2021/Mau_1.1_(1).jpg"
                  class="card-img-top"
                  alt="card-grid-image"
                />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a longer card with supporting text below as a
                    natural lead-in to additional content. This content is a
                    little bit longer.
                  </p>
                  <div class="d-flex justify-content-between">
                    <div style="text-align: left;" class="quantity-section">
                      <div class="plus-qty-btn"><i class="fas fa-minus-circle"></i></button></div>
                      <input type="text" class="qty-buy" value="1" disabled>
                      <div class="minus-qty-btn"><i class="fas fa-plus-circle"></i></div>
                    </div>
                    <div style="text-align: right">
                      <button type="button" class="btn btn-primary">
                        Add to cart
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div-->

          </div>
        </div>
        <div id="notice"></div>
        <!-- PAGINATION -->
        <ul class="pagination">
          <span>1</span>
          <span>2</span>
          <span class="icon">››</span>
          <span class="last">Last »</span>
        </ul>
      </div>
      <div id="notice"></div>
      <!--div class="footer-holder"></div>
      <script src="../Views/footer/footerScript.js"></script-->
    <?php require_once "./Views/footer/index.php ";?>
    </div>
    <script src="./Views/Products/product.js"></script>
  </body>
</html>
