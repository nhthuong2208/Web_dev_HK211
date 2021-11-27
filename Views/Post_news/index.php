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
    <?php require_once("./Views/Navbar/index.php"); ?>
<script src="../Views/Navbar/navbarScript.js" index='4'></script>
  <div class="container mt-5 mb-5" style="max-width: 1100px;">
    <div class="mt-3 mb-4 text-center">
      <h3 class = "mt-3 mb-2 text-warning">Quản lí tin tức</h3>
    </div>
    <form method="post" action="">  
    <div class="row">    
      <?php 
        $news = $data["news"][0];
        echo "<div class=\"col-md-9\">
          <div class=\"card\">
            <div class=\"card-header\">
              <h5 class=\"text-warning\">Thêm tin tức</h5>
            </div>
            <div class=\"card-body\">        
                <div class=\"content-element\">
                  <div class=\"form-group\">
                      <label class=\"form-label\">Tiêu đề</label>
                      <input type=\"text\" name=\"post_title\" id=\"post_title\" class=\"form-control\" placeholder=\"Tiêu đề\" value= \" ". $news["title"]. "\">
                  </div>
                  <div class=\"form-group\">
                      <label class=\"form-label\">Đường dẫn ảnh</label>
                      <input type=\"text\" name=\"post_url\" id=\"post_title\" class=\"form-control\" placeholder=\"Đường dẫn\" value= \" ". $news["imgurl"]. "\">
                  </div>
      
                  <div class=\"form-group mt-3\">
                      <label class=\"form-label\">Nội dung bài viết</label>
                      <textarea class=\"form-control\" rows = \"10\" id=\"post_content\" name=\"post_content\">". $news["content"] ."</textarea>
                  </div>
                </div>
            </div>          
          </div>        
        </div> 

        <div class=\"col-md-3\">
          <div class=\"card\">
            <div class=\"card-header text-warning\">
              <h5>Thông tin chung </h5>
            </div>

            <div id=\"post-info\" class=\"collapse show\">
                <div class=\"card-body\">
                    <div class=\"post-info-item\">
                        <label class=\"form-label\" for=\"keyword\">Từ khóa:</label>
                        <input type=\"text\" name=\"post_key\" id=\"post_key\" class=\"form-control\" placeholder=\"Từ khóa\" value= \" ". $news["key"]. "\">
                    </div>

                    <div class=\"post-info-item mt-4\">
                      <label class=\"form-label\">Nội dung ngắn gọn</label>
                      <textarea class=\"form-control\" rows = \"5\" id=\"post_short_content\" name=\"post_short_content\">". $news["shortcontent"] ."</textarea>
                    </div>
                    <div class=\"mt-5 text-between\">
                        <div href=\"?url=Home/News/\">
                            <button type=\"button\" class=\"btn-sm btn btn-warning\">
                                <span>Hoàn tất</span> 
                            </button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>";
      ?>
      </div>
    </form>
  </div>
  <?php
    require_once "./Views/footer/index.php";
  ?>
  <script src="../Views/Post_news/Post_news.js"></script>
</body>
</html>