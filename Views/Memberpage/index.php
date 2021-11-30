<!DOCTYPE html>
<html>
  <head>
    <!-- setting page -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Member page">
    <meta name="author" content="Phạm Minh Hiếu">

    <title>Thông tin khách hàng</title>
    <link
      rel="icon"
      type="image/x-icon"
      href="./Views/images/Logo BK_vien trang.png"
    />

    <!-- link icon -->
    <script src="https://kit.fontawesome.com/320d0ac08e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="./Views/Memberpage/style.css" rel="stylesheet">
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
      crossorigin="anonymous"
    ></script>
    <link href="../Views/Navbar/navbar.css" rel="stylesheet">
  </head>
  <body>
    
    <!--Nav-->
    <?php require_once("./Views/Navbar/index.php"); ?>
    <script src="./Views/Navbar/navbarScript.js"></script>
    <!--Nav-->

    <!--Body-->
    <div class="container-fuild member-info">
        <?php 
            if($data["state"] == "member"):
        ?>
        <div class="row margin-none justify-content-center align-content-stretch">
            <div class="col-sm-12 col-lg-4 max-width-400 padding-none">
                <div class="row justify-content-center margin-none">
                    <div class="col-12 mb-4 mt-4 border_bot">
                        <div class="row align-item-center align-content-center margin-none">
                            <div class="col-4 d-flex justify-content-center"><img src="<?php foreach($data["user"] as $row) echo $row["img"];?>" alt="profile"></div>
                            <div class="col-8 d-flex mt-2"><h4><?php foreach($data["user"] as $row) echo $row["name"];?></h4></div>
                        </div>
                    </div>
                    <div class="col-12 p-1 m-1 myactive border_bot">
                        <div class="row margin-none point">
                            <div class="col-2"><i class="fas fa-info-circle"></i></div>
                            <div class="col-10 paddingr-none click"><h5>Thông tin cá nhân</h5></div>
                        </div>
                    </div>
                    <div class="col-12 p-1 m-1 border_bot">
                        <div class="row margin-none point">
                            <div class="col-2"><i class="fas fa-shopping-cart"></i></div>
                            <div class="col-10 paddingr-none click"><h5>Lịch sử giao dịch</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-xl-8 pb-5">
                <div class="row click">
                    <div class="frame_profile">
                        <div class="col-12 mt-4 border_bot"><h1>Hồ sơ của tôi</h1></div>
                        <div class="col-12 border_bot mt-5 mb-3 ">
                            <div class="row justify-content-center">
                                <div class="col-5 col-md-3">Họ tên:</div>
                                <div class="col-7 col-md-8"><?php foreach($data["user"] as $row) echo $row["name"];?></div>
                                <div class="col-5 col-md-3">Email:</div>
                                <div class="col-7 col-md-8"><?php foreach($data["user"] as $row) echo $row["mail"];?></div>
                                <div class="col-5 col-md-3">Tên đăng nhập:</div>
                                <div class="col-7 col-md-8"><?php foreach($data["user"] as $row) echo $row["username"];?></div>
                                <div class="col-5 col-md-3">CMND/CCCD:</div>
                                <div class="col-7 col-md-8"><?php foreach($data["user"] as $row) echo $row["cmnd"];?></div>
                                <div class="col-5 col-md-3">Số điện thoại:</div>
                                <div class="col-7 col-md-8"><?php foreach($data["user"] as $row) echo $row["phone"];?></div>
                                <div class="col-5 col-md-3">Địa chỉ:</div>
                                <div class="col-7 col-md-8"><?php foreach($data["user"] as $row) echo $row["add"];?></div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 edit-profile-btn"><button type="button" class="btn btn-primary" onclick="changeProfile(this)">Thiết lập tài khoản</button><button type="button" class="btn btn-primary" onclick="changePwd()">Thay đổi mật khẩu</button></div>
                    </div>
                    <div class="frame_edit_profile">
                        <form action="?url=Home/update_profile" id="edit-profile" method="POST" enctype="multipart/form-data">
                            <div class="col-12 mt-4 border_bot"><h1>Hồ sơ của tôi</h1></div>
                            <div class="col-12 border_bot mt-5 mb-3 ">
                                <div class="row justify-content-center">
                                <div class="col-12 d-flex justify-content-center mb-5"><label for="file_pic" style="cursor: pointer;" class="pic"><img src="<?php foreach($data["user"] as $row) echo $row["img"] ?>" alt="profile" class="profile"/></label><input type="file" id="file_pic" name="file_pic" onchange="upload_pic(this)"hidden></div>
                                    <div class="col-5 col-md-3">Họ tên:</div>
                                    <div class="col-7 col-md-8"><input type="text" name="fname" value="<?php foreach($data["user"] as $row) echo $row["name"];?>"></div>
                                    <div class="col-5 col-md-3">Email:</div>
                                    <div class="col-7 col-md-8"><input type="email"  name="mail" value="<?php foreach($data["user"] as $row) echo $row["mail"];?>"></div>
                                    <div class="col-5 col-md-3">Tên đăng nhập:</div>
                                    <div class="col-7 col-md-8"><input type="text"  name="username" value="<?php foreach($data["user"] as $row) echo $row["username"];?>"></div>
                                    <div class="col-5 col-md-3">CMND/CCCD:</div>
                                    <div class="col-7 col-md-8"><input type="text"  name="cmnd" value="<?php foreach($data["user"] as $row) echo $row["cmnd"];?>"></div>
                                    <div class="col-5 col-md-3">Số điện thoại:</div>
                                    <div class="col-7 col-md-8"><input type="text"  name="phone" value="<?php foreach($data["user"] as $row) echo $row["phone"];?>"></div>
                                    <div class="col-5 col-md-3">Địa chỉ:</div>
                                    <div class="col-7 col-md-8"><input type="text"  name="address" value="<?php foreach($data["user"] as $row) echo $row["add"];?>"></div>
                                </div>
                            </div>
                            <div class="col-7 mt-3 edit-profile-btn"><button type="button" class="btn btn-primary" onclick="changeProfile(this)">Xong</button><button type="button" class="btn btn-primary" onclick="changePwd()">Thay đổi mật khẩu</button></div>
                        </form>
                    </div>


                    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Thay đổi mật khẩu</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                        <div class="col-5 col-ms-4">Mật khẩu hiện tại:</div>
                        <div class="col-5 col-ms-7"><input type="text" name="" value="<?php foreach($data["user"] as $row) echo $row["pwd"];?>" disabled></div>
                        <div class="col-5 col-ms-4">Mật khẩu mới:</div>
                        <div class="col-5 col-ms-7"><input type="password"  name="pwd" value=""></div>
                        <div class="col-5 col-ms-4">Xác thực mật khẩu:</div>
                        <div class="col-5 col-ms-7"><input type="password"  name="re_pwd" value=""></div>
                        <div class="col-6 mt-3 edit-profile-btn d-flex justify-content-center"><button type="button" class="btn btn-primary" onclick="completechange(this)">Hoàn tất</button></div>
                </div>
            </div>
        </div>
    </div>


                </div>
                <div class="row justify-content-center click">
                    <div class="col-12 mt-4 border_bot"><h1>Đơn hàng đã đặt</h1></div>
                    <div class="col-12 mt-3 d-flex flex-wrap">
                        <?php 
                        if(!empty($data["product_in_cart"])){
                            foreach($data["product_in_cart"] as $row){
                                if(empty(mysqli_fetch_array($row["product"]))) continue;
                                $total = 0;
                                $h4 = "";
                                if((int)$row["cartid"]["state"] == 0) $h4 = "Chưa thanh toán";
                                else $h4 = $row["cartid"]["time"];
                                echo "<div class=\"row justify-content-between node\">
                                <div class=\"col-12 border_bot\"><div class=\"d-flex justify-content-between\"><h4>Mã hóa đơn: #" . $row["cartid"]["id"] . "</h4><h5>" . $h4 . "</h5></div></div>";
                                foreach($row["product"] as $product){
                                    $total += (int)$product["price"]*(int)$product["num"];

                                    echo "<div class=\"col-12 col-md-6\">
                                        <div class=\"row\">
                                            <div class=\"col-5 d-flex justify-content-center\"><img src=\"" . $product["img"] . "\" alt=\"item\"></div>
                                            <div class=\"col-7\">
                                                <div class=\"row\">
                                                    <div class=\"col-12\"><h5>" . $product["name"] . "</h5></div>
                                                    <div class=\"col-12\">Số lượng: " . $product["num"] . "</div>
                                                    <div class=\"col-12\">Size: " . $product["size"] . "</div>
                                                    <div class=\"col-12 price\">Tổng tiền: " . $product["num"] * $product["price"] . "</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                }
                                echo "<div class=\"col-12 price\">Tổng cộng: " . $total ."</div>
                                </div>";
                            }
                        }
                        if(!empty($data["order_combo"])){
                            echo "<div class=\"row \"><div class=\"row nonemg text-center center_my\">";
                            foreach($data["order_combo"] as $row){
                                echo "<div class=\"col-lg-6 mb-4\">
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
                                            <div class=\"d-flex justify-content-between py-3\">
                                            <h5>Chu kì: " . $row["cycle"] . "</h5><h5>Size: " . $row["size"] . "</h5>
                                            </div>
                                            </div>
                                            <div class=\"card-footer d-flex justify-content-end py-3\">
                                            <h5 class=\"mb-0 fw-bold\">" . $row["time"] . "</h5>";
                              echo "</div></div></div>";
                            }
                            echo "</div></div></div>";
                        }
                        ?> 
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if($data["state"] == "manager"):?>
        <div class="row flex-wrap">
            <h2>Danh sách thành viên</h2>
            <?php if(!empty($data["member"])):?>
                <?php foreach($data["member"] as $row): ?>
            <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card card_node">
                <img class="card-img-top" src="<?php echo $row["img"]; ?>" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row["name"]; ?></h4>
                    <p class="card-text"><?php if($row["rank"] / 1000000 > 20) echo "Thành viên Vàng"; else if($row["rank"] / 1000000 > 10) echo "Thành viên Bạc"; else if($row["rank"] / 1000000 > 5) echo "Thành viên Đồng"; else echo "Thành viên tiềm năng"; ?></p>
                    <button type="button" class="btn btn-primary" onclick="see_profile(this)" value="<?php echo $row["id"]; ?>">Chi tiết</button>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif;?>
        </div>
        <?php endif;?>
    </div>

    

    <!--Body-->
    <?php if($data["state"] == "manager") echo "<div id=\"myModal\" class=\"modal\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h2>Thông tin khách hàng</h2>
                <span class=\"close\">&times;</span>
            </div>
            <div class=\"modal-body\">
            </div>
            <div class=\"modal-footer justify-content-end d-inline-flex\">
            <button type=\"button\" class=\"btn btn-danger modal-button\" onclick=\"remove_account(this)\">Xóa tài khoản</button>
            <button type=\"button\" class=\"btn btn-danger modal-button\" onclick=\"ban_account(this)\">Cấm tài khoản</button>
        </div>
        </div>
    </div>";
     ?>
    <?php require_once "./Views/footer/index.php ";?>
    <?php if($data["state"] == "member") echo "<script src=\"./Views/Memberpage/myscript.js\"></script>"; 
    else if($data["state"] == "manager") echo "<script src=\"./Views/Memberpage/manascript.js\"></script>";
    ?>  
    <!--Footer-->
  </body>
</html>
