<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Dan">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Assignment</title>
	<link
      rel="icon"
      type="image/x-icon"
      href="../images/Logo BK_vien trang.png"
    />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../Navbar/navbar.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link href="../Navbar/navbar.css" rel="stylesheet" type="text/css" />
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
    <div class="container ">
        <div class="columns">
            <div class="column col-md-12 col-8 ">
                <div class="post-main">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title h3">BST SS21 Nonnative brand phân lớp theo mùa cao điểm</div>
                            <div class="text-gray"><i class="far fa-calendar-alt"></i> 
                                20/10/2020 
                                <div href="" class="text-link-gray">
                                    Global brand
                                </div>
                            </div>	
                        </div>

                        <div class="card-body">
                            <strong></strong>
                            <div class="bg-image shadow-lg bg-white">
                                <img src="../images/news_4.png" class="rounded img-fluid mx-auto d-block"> 
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <ul>
                        
                    </ul>
                </div>
            </div>
            <div class="column col-2"></div>
        </div>
    </div>


<div class="footer-holder"></div>
<script src="../Navbar/footerScript.js"></script>

<script src="news.js"></script>
</body>
</html>
 -->
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

	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

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
</head>

<body>
    <?php require_once("./Views/Navbar/index.php"); ?>
<script src="../Views/Navbar/navbarScript.js" index='4'></script>

<div class="container my-5">
	<section class="pb-4 mt-3 mb-5">
		<div class="row gx-5">
		<?php
			if(empty($data["news"])) echo "empty combo";
			else {
				$id = 3;
				$news = $data["news"][$id-1];
				$content = str_replace("\n\n\n", "<div class=\"w-50 mx-auto mt-3 mb-5\">
															<img src=\"" . $news["imgurl"] . "\" class=\"rounded img-fluid\"> 
															</div>", $news["content"]);
				$content = str_replace("\n", "<br/>", $content);
					echo 
					"<div class=\"col-md-9\" >
						<div>
							<div class=\"\">
								<div class=\"card-title h3 text-secondary\">" . ($news["title"]) . "</div>
								<div class=\"text-secondary\"><i class=\"far fa-calendar-alt\"></i> 
									" . $news["time"] . " 
									<div href=\"\" class=\" text-secondary\">
										" . $news["key"] . "
									</div>
								</div>	
							</div>";

							if($data["user"] == "customer"){
								echo "<div class=\"text-end\">
									<button type=\"button\" class=\"btn  btn-block\" data-bs-toggle=\"modal\"
										data-bs-target=\"#myModal_del\">
										<i class=\"fas fa-trash\"></i> Xóa
									</button>
									<button type=\"button\" class=\"btn btn-block\" data-bs-toggle=\"modal\"
										data-bs-target=\"#myModal\">
										<i class=\"fas fa-edit\"></i> Chỉnh sửa </button>
								</div>

								<div class=\"modal fade\" id=\"myModal_del\">
									<div class=\"modal-dialog\">
										<div class=\"modal-content\">

											<!-- Modal Header -->
											<div class=\"modal-header\">
												<h4 class=\"modal-title\">Xác nhận</h4>
											</div>
											<!-- Modal body -->
											<div class=\"modal-body container text-start\">
												Bạn có chắc chắn muốn xóa gói hàng này
											</div>

											<!-- Modal footer -->
											<div class=\"modal-footer\">
												<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Hủy</button>
												<button type=\"submit\" class=\"btn btn-success\">Xóa</button>
											</div>

										</div>
									</div>
								</div>";
							}

							echo "<hr>

							<div class=\"mb-3\">
								<p>
									". $content ." 
								</p>
							</div>
						</div>
                	</div>";
					
					echo "<div class=\"col-md-3\" >
						<div class=\"card\">
							<div class=\"card-header\">
								<h5 class=\"text-center\">Tin mới</h5>
							</div>";
					echo "<div class=\"card-body\">
						<div class=\"\">
							<div>";
							for ($x = count($data["news"]) - 1; $x >= count($data["news"])-3; $x--){
								$row = $data["news"][$x];
								echo "			
								<div class=\"row\">						
									<div class=\"bg-image bg-white col-md-6\">
										<img src=\""  . $row["imgurl"] . "\" class=\"img-fluid rounded\">
									</div>
									<div class=\"row mb-3 col-md-6 mt-3\">
										<div style=\"font-size:10px;\">"
										. $row["key"] .
										"</div>
										<div style=\"font-size:10px;\">
											<u class=\"text-decoration-none\">" . $row["time"] . "</u>
										</div>
									</div>
									<a href=\"\" class=\"text-dark text-decoration-none mb-3 mt-1\">
										<div style=\"font-size:13px; font-weight:500;\">" . $row["title"] . "</div>
									</a>
									<hr>
								</div>									
								";
							}
					echo "</div></div></div></div>";
			}
		?>
		</div>
	</section>
</div>

<!--iv class="footer-holder"></div>
<script src="../Views/footer/footerScript.js"></script-->

<?php require_once "./Views/footer/index.php ";?>
</body>
</html>
 