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
      href="../images/Logo BK_vien trang.png"
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
<div class="navbar-holder sticky-top"></div>
<script src="../Views/Navbar/navbarScript.js" index='4'></script>

<div class="container my-5">
	<section class="pb-4 mt-3 mb-5">
		<div class="row gx-5">
		<?php

			if(empty($data["news"])) echo "empty combo";
			else {
				$new_news = $data["news"][count($data["news"])-1];
					echo 
					"<div class=\"col-md-7 mb-4\">
						<div class=\"bg-image bg-white\" >
							<img src=\""  . $new_news["imgurl"] . "\" class=\"img-fluid rounded\">
						</div>
					</div>
			
					<div class=\"col-md-5 mb-4\">
						<span class=\"badge bg-danger px-2 py-1 shadow-1-strong mb-3\">Tin mới</span>
						<h4><strong>" . $new_news["title"] . "</strong></h4>
						<p class=\"text-muted\">
							" . $new_news["shortcontent"] ."
						</p>";
						if($data["user"] == "customer"){
							echo "<a href=\"?url=Home/News_detail/". (count($data["news"])) . "\">
								<button type=\"button\" class=\"btn btn-warning mt-3\" >Đọc thêm</button>
							</a>";
						}
						else if($data["user"] == "manager"){
							echo "<a href=\"?url=Home/News_detail/\">
								<button type=\"button\" class=\"btn btn-warning mt-3\">Thêm tin mới</button>
							</a>
							";
						}
					echo "</div>";
			}
		?>
		</div>
	</section>
	<section>
		<div class="row"> 
			<?php
				if(empty($data["news"])) echo "empty combo";
				else {
					foreach($data["news"] as $row){
						echo "<div class=\"col-lg-4 mb-5\">
							<div>
								<div class=\"bg-image shadow-lg bg-white\">
									<img src=\""  . $row["imgurl"] . "\" class=\"img-fluid rounded\">
								</div>
								<div class=\"row mb-3 mt-3\">
									<div class=\"col-6\">"
									. $row["key"] .
									"</div>
									<div class=\"col-6 text-end\">
										<u class=\"text-decoration-none\">" . $row["time"] . "</u>
									</div>
								</div>
								<a href=\"?url=Home/News_detail/". $row["id"] . "\" class=\"text-dark text-decoration-none\">
									<h5>" . $row["title"] . "</h5>
									<p>" . $row["shortcontent"] . "</p>
								</a>
							</div>
						</div>";
					}
				}
					
			?>	
		</div>
	</section>   
</div>

<div class="footer-holder"></div>
<script src="../Views/footer/footerScript.js"></script>
</body>
</html>
