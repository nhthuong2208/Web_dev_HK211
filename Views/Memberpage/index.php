<!DOCTYPE html>
<html>
  <head>
    <!-- setting page -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Member page">
    <meta name="author" content="Phạm Minh Hiếu">

    <title>Thông tin khác hàng</title>
    <link
      rel="icon"
      type="image/x-icon"
      href="../images/Logo BK_vien trang.png"
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
    <div class="navbar-holder sticky-top"></div>
    <script src="../Views/Navbar/navbarScript.js" index='5' type="text/javascript"></script>
    <!--Nav-->

    <!--Body-->
    <div class="container-fuild">
        <div class="row margin-none justify-content-center align-content-stretch">
            <div class="col-sm-12 col-lg-4 max-width-400 padding-none">
                <div class="row justify-content-center margin-none">
                    <div class="col-12 mb-4 mt-4 border_bot">
                        <div class="row align-item-center align-content-center margin-none">
                            <div class="col-4 d-flex justify-content-center"><img src="./profile.jpg" alt="profile"></div>
                            <div class="col-8 d-flex mt-2"><h4>Phạm Minh Hiếu</h4></div>
                        </div>
                    </div>
                    <div class="col-12 p-1 m-1 myactive border_bot">
                        <div class="row margin-none">
                            <div class="col-2"><i class="fas fa-info-circle"></i></div>
                            <div class="col-10 paddingr-none"><h5>Thông tin cá nhân</h5></div>
                        </div>
                    </div>
                    <div class="col-12 p-1 m-1 border_bot">
                        <div class="row margin-none">
                            <div class="col-2"><i class="fas fa-shopping-cart"></i></div>
                            <div class="col-10 paddingr-none"><h5>Lịch sử giao dịch</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-xl-8 pb-5">
                <div class="row">
                    <div class="col-12 mt-4 border_bot"><h1>Hồ sơ của tôi</h1></div>
                    <div class="col-12 border_bot mt-5 mb-3 ">
                        <div class="row justify-content-center">
                            <div class="col-5 col-md-3">Họ tên:</div>
                            <div class="col-7 col-md-8">Phạm Minh Hiếu</div>
                            <div class="col-5 col-md-3">Tên đăng nhập:</div>
                            <div class="col-7 col-md-8">hieu.phamgc</div>
                            <div class="col-5 col-md-3">Email:</div>
                            <div class="col-7 col-md-8">hieu.phamgc@gmail.com</div>
                            <div class="col-5 col-md-3">Số điện thoại:</div>
                            <div class="col-7 col-md-8">0973409127</div>
                            <div class="col-5 col-md-3">Địa chỉ:</div>
                            <div class="col-7 col-md-8">165 Trương Định, khu phố 2, phường 5, tx Gò Công, tỉnh Tiền Giang</div>
                        </div>
                    </div>
                    <div class="col-6 mt-3"><button type="button" class="btn btn-primary">Thiết lập tài khoản</button></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 mt-4 border_bot"><h1>Đơn hàng đã đặt</h1></div>
                    <div class="col-12 mt-3 d-flex flex-wrap">
                        <div class="row justify-content-center node">
                            <div class="col-12 border_bot"><div class="d-flex justify-content-between"><h4>Mã hóa đơn: #123</h4><h4>Đã giao</h4></div></div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-3 d-flex justify-content-center"><img src="./profile.jpg" alt="profile"></div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-12"><h5>Tên sản phẩm</h5></div>
                                            <div class="col-12">Số lượng: 2</div>
                                            <div class="col-12">Tổng tiền: 1000000(VND)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-3 d-flex justify-content-center"><img src="./profile.jpg" alt="profile"></div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-12"><h5>Tên sản phẩm</h5></div>
                                            <div class="col-12">Số lượng: 2</div>
                                            <div class="col-12">Tổng tiền: 1000000(VND)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">Tổng cộng: 2000000(VND)</div>
                        </div>
                        <div class="row justify-content-center node">
                            <div class="col-12 border_bot"><div class="d-flex justify-content-between"><h4>Mã hóa đơn: #123</h4><h4>Đã giao</h4></div></div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-3 d-flex justify-content-center"><img src="./profile.jpg" alt="profile"></div>
                                    <div class="col-9">
                                        <div class="row flex-column justify-content-between">
                                            <div class="col-12"><h5>Tên sản phẩm</h5></div>
                                            <div class="col-12">Số lượng: 2</div>
                                            <div class="col-12">Tổng tiền: 1000000(VND)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-3 d-flex justify-content-center"><img src="./profile.jpg" alt="profile"></div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-12"><h5>Tên sản phẩm</h5></div>
                                            <div class="col-12">Số lượng: 2</div>
                                            <div class="col-12">Tổng tiền: 1000000(VND)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">Tổng cộng: 2000000(VND)</div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Body-->

    <!--Footer-->
      <div class="footer-holder"></div>
      <script src="../Views/Navbar/footerScript.js"></script>
    <!--Footer-->
  </body>
</html>
