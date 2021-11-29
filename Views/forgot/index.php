<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Dan">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Assignment</title>
	<link
      rel="icon"
      type="image/x-icon"
      href="./Views/images/Logo BK_vien trang.png"
    />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" type="text/css" href="./Views/Login/login.css">
	<link rel="stylesheet" type="text/css" href="./Views/forgot/style.css">
	<link href="./Views/Navbar/navbar.css" rel="stylesheet" type="text/css" />
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
</head>

<body>
    <?php require_once("./Views/Navbar/index.php"); ?>
	<script src="../Views/Navbar/navbarScript.js"></script>
	<div class="login" style="margin-bottom: 180px !important;min-height: 50vh">
		<div class="container">
			<div class="row justify-content-md-center h-100">		
				<div class="card-wrapper col-md-8 border-warning">
					<div class="card fat p-1">
						<div class="card-body">
							<h3 class="card-title mb-4">Quên mật khẩu</h3>
							<form method="POST" class="my-login-validation" novalidate="" onsubmit="return false">
								<div class="form-group">
									<label for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email không hợp lệ!
									</div>
									<div class="form-text text-muted">
										Chúng tôi sẽ gửi Email chứa liên kết để bạn thiết lập lại mật khẩu
									</div>
								</div>
	
								<div class="card mt-3">
									<button type="submit" class="btn btn-warning btn-block w-100">
										Đặt lại mặt khẩu
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--div class="footer-holder"></div>
	<script src="../Views/footer/footerScript.js"></script-->
	
    <?php require_once "./Views/footer/index.php ";?>
	<script src="../Views/forgot/forgot.js"></script>
</body>
</html>