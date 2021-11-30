<?php

class Home extends Controller{
        function Home_page($user){
            $cus = $this->model($user);
            $news = $cus->get_news();
            $news_list = array();
            foreach($news as $snews){
                array_push($news_list, ([
                    "id" => $snews["id"],
                    "cid" => $snews["cid"],
                    "key" => $snews["key"], 
                    "time" => $snews["time"],
                    "title" => $snews["title"],
                    "content" => $snews["content"],
                    "imgurl" => $snews["img_url"],
                    "shortcontent" => $snews["short_content"],
                    "comment" => $cus->get_comment_news($snews["id"])]));
            }
            $this->view("Home_page", [
                "user" => $user,
                "news" => $news_list,
                "collection" => $cus->get_swiper_slide_collection(), //$data["collection"] = $cus->get_swiper_slide_collection() 
                "featured" => $cus->get_products("", "")
            ]);
        }
        function About_us($user){
            $this->view("About_US", []);
        }
        function Products($user, $sort_1="", $sort_2=""){
            $cus = $this->model($user);
            $this->view("Products", [
                "cate" => $cus->get_product_cates(),
                "product" => $cus->get_products($sort_1, $sort_2),
                "user" => $user
            ]);
        }
        function Item($user, $pid){
            $cus = $this->model($user);
            $comment = $cus->get_item_comment($pid[2], "");
            $cmt_info = array();
            foreach($comment as $cmt){
                array_push($cmt_info, (["id" => $cmt["id"], "pid" => $cmt["pid"], "uid" => $cmt["uid"], "uname" => $cus->get_cmt_user_name($cmt["uid"]), "star" => $cmt["star"], "content" => $cmt["content"], "time" => $cmt["time"]]));
            }
            $this->view("Item", [
                "product_id" => $cus->get_product_at_id($pid[2]),
                "sub_img" => $cus->get_sub_img($pid[2]),
                "cate_product" => $cus->get_product_same_cate($pid[2]),
                "comment" => $cmt_info,
                "user" => $user
            ]);
        }
        function Contact_us($user){
            if($user == "manager"){
                $this->view("Contact_US", [
                    "user" => $user,
                    "message" => $this->model($user)->get_message()
                ]);
            }
            else{
                $this->view("Contact_US", [
                    "user" => $user
                ]);
            }
        }
        function News($user){
            $cus = $this->model($user);
            $news = $cus->get_news();
            $news_list = array();
            foreach($news as $snews){
                array_push($news_list, ([
                    "id" => $snews["id"],
                    "cid" => $snews["cid"],
                    "key" => $snews["key"], 
                    "time" => $snews["time"],
                    "title" => $snews["title"],
                    "content" => $snews["content"],
                    "imgurl" => $snews["img_url"],
                    "shortcontent" => $snews["short_content"]]));
            }
            $this->view("News", [
                "news" => $news_list,
                "user" => $user
            ]);
        }
        function News_detail($user, $params){
            $cus = $this->model($user);
            $news = $cus->get_news();
            $news_list = array();
            foreach($news as $snews){
                array_push($news_list, ([
                    "id" => $snews["id"],
                    "cid" => $snews["cid"],
                    "key" => $snews["key"], 
                    "time" => $snews["time"],
                    "title" => $snews["title"],
                    "content" => $snews["content"],
                    "imgurl" => $snews["img_url"],
                    "shortcontent" => $snews["short_content"],
                    "comment" => $cus->get_comment_news($snews["id"])]));
            }   
            $this->view("News_detail", [
                "news" => $news_list,
                "user" => $user,
                "params"=> $params[2]
            ]);
        }

        function Post_news($user, $params){
            if((int)$params[2] !== -1){
                $cus = $this->model($user);
                $news = $cus->get_news_by_nid((int)$params[2]);
                $news_list = array();
                foreach($news as $snews){
                    array_push($news_list, ([
                        "id" => $snews["id"],
                        "cid" => $snews["cid"],
                        "key" => $snews["key"], 
                        "time" => $snews["time"],
                        "title" => $snews["title"],
                        "content" => $snews["content"],
                        "imgurl" => $snews["img_url"],
                        "shortcontent" => $snews["short_content"]]));
                }   
                $this->view("Post_news", [
                    "news" => $news_list,
                    "user" => $user,
                    "params"=> $params[2]
                ]);
                $this->view("Post_news", []);
            }
            else {
                $cus = $this->model($user);
                $news_list = array();
                array_push($news_list, ([
                    "id" => "",
                    "cid" => "",
                    "key" => "", 
                    "time" => "",
                    "title" => "",
                    "content" => "",
                    "imgurl" => "",
                    "shortcontent" => "" ]));
                $this->view("Post_news", [
                    "news" => $news_list,
                    "user" => $user,
                    "params"=> $params[2]
                ]);
                $this->view("Post_news", []);
            }
        }
        function delete_news($user, $id){
            echo (int)$id[2];
            $this->model($user)->delete_news((int)$id[2]);
        }

        function add_comment_news($user, $array){
            $this->model($user)->add_comment_news($array[2], $array[3], $_SESSION["id"]);
        }

        function insert_news($user){
            if(isset($_POST["key"]) && isset($_POST["title"]) && isset($_POST["url"]) && isset($_POST["content"]) && isset($_POST["shortcontent"]))
            {
                if(isset($_FILES["e-image-url"])){
                    if($_FILES['e-image-url']['name'][0] != ""){
                        if(!file_exists("./Views/images/" . $_FILES["e-image-url"]['name'][0])){
                            move_uploaded_file($_FILES['e-image-url']['tmp_name'][0], './Views/images/' . $_FILES['e-image-url']['name'][0]);
                        }
                        if((int)$_POST["url"] != -1){
                            $this->model($user)->update_news((int)$_POST["url"], $_POST["key"], $_POST["title"], $_POST["content"], './Views/images/' . $_FILES['e-image-url']['name'][0], $_POST["shortcontent"]);
                        }
                        else{
                            $this->model($user)->insert_news($_POST["key"], $_POST["title"], $_POST["content"], './Views/images/' . $_FILES['e-image-url']['name'][0], $_POST["shortcontent"]);
                        }
                        
                    }
                    
                }
            }
            $this->News($user);
        }

        function Cost_table($user){
            $cus = $this->model($user);
            $combo = $cus->get_combo();
            $product_in_combo = array();
            foreach($combo as $cb){
                array_push($product_in_combo, (["id" => $cb["id"], "name" => $cb["cbname"], "price" => $cb["cost"], "product" => $cus->get_product_in_combo($cb["id"])]));
            }
            $this->view("Cost_table", [
                "product" => $cus->get_products("", ""),
                "combo" => $product_in_combo,
                "cycle" => $cus->get_cycle(),
                "user" => $user
            ]);
        }
        function Cart($user){
            if($user == "member"){
                $mem = $this->model($user);
                $combo =  $mem->get_order_combo($_SESSION["id"]);
                $product_in_combo = array();
                foreach($combo as $cb){
                    array_push($product_in_combo, (["id" => $cb["id"], "name" => $cb["name"], "price" => $cb["price"], "size" => $cb["size"], "cycle" => mysqli_fetch_array($mem->get_cycle_id($cb["cycle"]))["cycle"], "product" => $mem->get_product_in_combo($cb["cbid"])]));
                }
                $this->view("Cart", [
                    "product_in_cart" => $mem->get_product_in_cart($_SESSION["id"]),
                    "user" => mysqli_fetch_array($mem->get_user($_SESSION["id"])),
                    "order_combo" => $product_in_combo
                ]);
            }
            else{
                $this->Login($user, "Cart");
            }
        }
        function Login($user, $array=""){
            if(!isset($_SESSION["user"]) || $_SESSION["user"] == "customer")
                $this->view("Login", ["key" => $array]);
        }
        function Payment($user){
            if($user == "member"){
                $mem = $this->model($user);
                $combo =  $mem->get_order_combo($_SESSION["id"]);
                $product_in_combo = array();
                foreach($combo as $cb){
                    array_push($product_in_combo, (["name" => $cb["name"], "price" => $cb["price"], "size" => $cb["size"], "cycle" => mysqli_fetch_array($mem->get_cycle_id($cb["cycle"]))["cycle"], "product" => $mem->get_product_in_combo($cb["cbid"])]));
                }
                $this->view("Payment", [
                    "product_in_cart" => $mem-> get_product_in_cart($_SESSION["id"]),
                    "order_combo" => $product_in_combo
                ]);
            }
            else{
                $this->Login($user, "Payment");
            }
        }
        function forgot($user){
            $this->view("forgot", []);
        }
        function register($user){
            $this->view("register", []);
        }
        function insert_message($user, $array){
            if($this->model($user)->insert_message($array[2], $array[3], $array[4], $array[5], $array[6])) echo "ok";
            else echo "null";
        }
        function update_user($user, $array){
            if($this->model($user)->update_user($array[2], $array[3], $array[4], $array[5])) echo "ok";
            else echo "null";
        }
        function delete_product_incart($user, $array){
            if($this->model($user)->delete_product_incart((int)$array[2])) echo "ok";
            else echo "null";
        }
        function check_login($user, $array){
            if($array[2] == "admin" &&  $array[3] == "admin"){ // bình luận trang tin tức / bình luần trang item // add to cart
                $_SESSION["user"] = "manager";
                if(!isset($array[4])) $array[4] = "Home_page";
                echo "?url=/Home/" . $array[4] . "/";
            }
            else{ 
                $id = mysqli_fetch_array($this->model($user)->get_id_user($array[2],  $array[3]), MYSQLI_NUM);
                if($id == null) echo "null";
                else {
                    $_SESSION["id"] = (int)$id[0];
                    $_SESSION["user"] = "member";
                    if(!isset($array[4])) $array[4] = "Home_page";
                    echo "?url=/Home/" . $array[4] . "/";
                }
            }
        }
        function update_product_in_cart($user, $array){
            $action = $this->model($user);
            for($i = 0; $i < (int)$array[2]; $i++){
                $action->update_product_in_cart((int)$array[2 + 3*$i + 1], (int)$array[2 + 3*$i +2], $array[2 + 3*$i + 3]);
            }
            echo "?url=/Home/Payment/";
        }
        function delete_order_combo_id($user, $array){
            if($this->model($user)->delete_order_combo_id($array[2])) echo "ok";
            else echo "null";
        }
        function update_cart_combo($user, $array){
            $action = $this->model($user);
            for($i = 0; $i < (int)$array[2]; $i++){
                if(!($action->update_cart($array[2 + $i + 1]))) echo "null";
            }
            $this->model($user)->update_order_combo($_SESSION["id"]);
            $_SESSION["id_cart"] = null;
            echo "?url=/Home/member_page/";
        }
        function member_page($user){
            if($user == "member"){
                $mem = $this->model($user);
                $cartid = $mem->get_cart($_SESSION["id"]);
                $product_in_cart = array();
                foreach($cartid as $id){
                    array_push($product_in_cart,(["cartid" => $id, "product" =>  $mem->get_product_in_cart_mem((int)$id["id"])]));
                }
                $combo =  $mem->get_order_combo_mem($_SESSION["id"]);
                $product_in_combo = array();
                foreach($combo as $cb){
                    array_push($product_in_combo, (["time" => $cb["time"], "name" => $cb["name"], "price" => $cb["price"], "size" => $cb["size"], "cycle" => mysqli_fetch_array($mem->get_cycle_id($cb["cycle"]))["cycle"], "product" => $mem->get_product_in_combo($cb["cbid"])]));
                }
                $this->view("Memberpage", [
                    "user" => $mem->get_user($_SESSION["id"]),
                    "product_in_cart" => $product_in_cart,
                    "order_combo" => $product_in_combo,
                    "state" => $user
                ]);
            }
            else if($user == "manager"){
                $this->view("Memberpage", [
                    "state" => $user,
                    "member" => $this->model($user)->get_all_user_info()
                ]);
            }
            else{
                $this->Login($user, "member_page");
            }
        }
        function add_item_comment($user, $array){
            $this->model($user)->add_item_comment($array[2], $array[3], $array[4], $_SESSION["id"]);
        }   
        function update_profile($user){
            if( isset($_POST["fname"]) && isset($_POST["mail"]) && isset($_POST["username"]) && isset($_POST["cmnd"]) && isset($_POST["phone"]) && isset($_POST["address"]))
            {
                if(isset($_FILES["file_pic"])&& $_FILES["file_pic"]['name'] != ""){
                    if(!file_exists("./Views/images/" . $_FILES["file_pic"]['name']))
                        move_uploaded_file($_FILES['file_pic']['tmp_name'], './Views/images/' . $_FILES['file_pic']['name']);
                    $this->model($user)->update_pic($_SESSION["id"], './Views/images/' . $_FILES['file_pic']['name']);
                }
                $this->model($user)->update_profile_nope_img($_SESSION["id"], $_POST["fname"], $_POST["username"], $_POST["cmnd"], $_POST["phone"], $_POST["address"], $_POST["mail"]);
            }
            $this->member_page($user);
            
        }
        function update_password_profile($user, $array){
            if($this->model($user)->update_password_profile($_SESSION["id"], (string)$array[2])){
                echo "ok";
            }
            else echo "null";
        }
        function create_cart($user, $array){
            if(!isset($_SESSION["id_cart"]) || !isset($_SESSION["cart_date"]) || $_SESSION["cart_date"] != $array[2]){
                $_SESSION["cart_date"] = $array[2];
                if($this->model($user)->create_cart($_SESSION["id"], $_SESSION["cart_date"])){
                    $_SESSION["cart_date"] = $array[2];
                    $_SESSION["id_cart"] = mysqli_fetch_array($this->model($user)->get_cart_for_session())["id"];
                }
            }
            echo $this->model($user)->create_product_incart($array[3], $_SESSION["id_cart"], $array[4]);
        }
        function add_new_item($user){
            if(isset($_POST["iname"]) && isset($_POST["price"]) && isset($_FILES["image-url"]) && isset($_POST["description"]) && isset($_POST["remain"]) && isset($_POST["category"]))
            {
                if(!file_exists("./Views/images/" . $_FILES["image-url"]['name'][0])){
                    move_uploaded_file($_FILES['image-url']['tmp_name'][0], './Views/images/' . $_FILES['image-url']['name'][0]);
                }
                if(!file_exists("./Views/images/" . $_FILES["image-url"]['name'][1])){
                    move_uploaded_file($_FILES['image-url']['tmp_name'][1], './Views/images/' . $_FILES['image-url']['name'][1]);
                }  
                if(!file_exists("./Views/images/" . $_FILES["image-url"]['name'][2])){
                    move_uploaded_file($_FILES['image-url']['tmp_name'][2], './Views/images/' . $_FILES['image-url']['name'][2]);
                }    
                if(!file_exists("./Views/images/" . $_FILES["image-url"]['name'][3])){
                    move_uploaded_file($_FILES['image-url']['tmp_name'][3], './Views/images/' . $_FILES['image-url']['name'][3]);
                }
                if(!file_exists("./Views/images/" . $_FILES["image-url"]['name'][4])){
                    move_uploaded_file($_FILES['image-url']['tmp_name'][4], './Views/images/' . $_FILES['image-url']['name'][4]);
                }
                $pid = $this->model($user)->add_new_item($_POST["iname"], $_POST["price"], $_POST["description"], $_POST["remain"], $_POST["category"], './Views/images/' . $_FILES['image-url']['name'][0]);
                $this->model($user)->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][1]);
                $this->model($user)->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][2]);
                $this->model($user)->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][3]);
                $this->model($user)->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][4]);
            }
            $this->Products($user);
        }
        function update_item($user, $pid){
            if(isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["description"]) && isset($_POST["remain"]) && isset($_POST["category"]))
            {
                $sub_id = mysqli_fetch_all($this->model($user)->get_sub_img_id($pid[2]), MYSQLI_ASSOC);
                if(isset($_FILES["e-image-url"])){
                    if($_FILES['e-image-url']['name'][0] != ""){
                        if(!file_exists("./Views/images/" . $_FILES["e-image-url"]['name'][0])){
                            move_uploaded_file($_FILES['e-image-url']['tmp_name'][0], './Views/images/' . $_FILES['e-image-url']['name'][0]);
                        }
                        $this->model($user)->update_item_img($pid[2], './Views/images/' . $_FILES['e-image-url']['name'][0]);
                    }
                    if($_FILES['e-image-url']['name'][1] != ""){
                        if(!file_exists("./Views/images/" . $_FILES["e-image-url"]['name'][1])){
                            move_uploaded_file($_FILES['e-image-url']['tmp_name'][1], './Views/images/' . $_FILES['e-image-url']['name'][1]);
                        }
                        $this->model($user)->update_sub_img($sub_id[0]["id"], './Views/images/' . $_FILES['e-image-url']['name'][1]);
                    }
                    if($_FILES['e-image-url']['name'][2] != ""){
                        if(!file_exists("./Views/images/" . $_FILES["e-image-url"]['name'][2])){
                            move_uploaded_file($_FILES['e-image-url']['tmp_name'][2], './Views/images/' . $_FILES['e-image-url']['name'][2]);
                        }
                        $this->model($user)->update_sub_img($sub_id[1]["id"], './Views/images/' . $_FILES['e-image-url']['name'][2]);
                    }
                    if($_FILES['e-image-url']['name'][3] != ""){
                        if(!file_exists("./Views/images/" . $_FILES["e-image-url"]['name'][3])){
                            move_uploaded_file($_FILES['e-image-url']['tmp_name'][3], './Views/images/' . $_FILES['e-image-url']['name'][3]);
                        }
                        $this->model($user)->update_sub_img($sub_id[2]["id"], './Views/images/' . $_FILES['e-image-url']['name'][3]);
                    }
                    if($_FILES['e-image-url']['name'][4] != ""){
                        if(!file_exists("./Views/images/" . $_FILES["e-image-url"]['name'][4])){
                            move_uploaded_file($_FILES['e-image-url']['tmp_name'][4], './Views/images/' . $_FILES['e-image-url']['name'][4]);
                        }
                        $this->model($user)->update_sub_img($sub_id[3]["id"], './Views/images/' . $_FILES['e-image-url']['name'][4]);
                    }
                }
                $this->model($user)->update_item_nope_img($pid[2], $_POST["name"], $_POST["price"], $_POST["description"], $_POST["remain"], $_POST["category"], $_POST["featured_product"]);  
            }
            $this->Item($user, $pid);
        }
        function delete_item($user, $array){
            if($this->model($user)->delete_item((int)$array[2])){
                echo "OK";
            } else {
                echo "Nope";
            }
        }
        function create_order_combo($user, $array){
            $this->model($user)->delete_order_combo_cbid($_SESSION["id"], $array[3]);
            if($this->model($user)->create_order_combo($_SESSION["id"], $array[2], $array[3], $array[4], $array[5])) echo "?url=Home/Payment/";
            else echo "null";
        }
        function update_order_combo($user){
            if($this->model($user)->update_order_combo($_SESSION["id"])) echo "?url=Home/member_page/";
            else echo "null";
        }
        function delete_order_combo($user){
            if($this->model($user)->delete_order_combo($_SESSION["id"])) echo "?url=/Home/Cost_table/";
            else echo "null";
        }
        function sendmessage($user, $array){
            $to = explode("-", $array[2])[1];
            $subject = explode("-", $array[3])[1];
            $message = explode("-", $array[4])[1];
            if(mail($to, $subject, $message)){
                $this->model($user)->update_message((int)$array[5]);
            }
            else echo "null";
        }
        function delete_comment($user, $array){
            if($this->model($user)->delete_comment((int)$array[2])){
                echo "OK";
            } else {
                echo "Nope";
            }
        }
        function sort_product($user){
            if(isset($_POST["sort-by"]) && isset($_POST["order-by"])){
                $sort_1 = $_POST["sort-by"];
                $sort_2 = $_POST["order-by"];
                $this->Products($user, $sort_1, $sort_2);
            }
        }
        function sort_comment($user, $array){
            $result = $this->model($user)->get_item_comment((int)$array[2], $array[3]);
            $cmt_info = array();
            foreach($result as $cmt){
                array_push($cmt_info, (["id" => $cmt["id"], "pid" => $cmt["pid"], "uid" => $cmt["uid"], "uname" => $this->model($user)->get_cmt_user_name($cmt["uid"]), "star" => $cmt["star"], "content" => $cmt["content"], "time" => $cmt["time"]]));
            }
            echo "<div class=\"no-filter-cmt\"></div>";
            if(empty($cmt_info)) echo "<div class=\"card\">
                                                  <div class=\"card-body\" id=\"if-no-cmt\">No comment</div></div>";
              else {
                $count = 0;
                foreach ($cmt_info as $row) {
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
                    if($user == "manager"){
                      echo "<div><i class=\"fas fa-trash-alt\" data-bs-toggle=\"modal\" data-bs-target=\"#delcmtModal-" .$count . "\"></i></div>";
                      echo "<div class=\"modal fade\" id=\"delcmtModal-" .$count . "\" tabindex=\"-1\" aria-labelledby=\"delcmtModalLabel-" .$count . "\" aria-hidden=\"true\">
                        <div class=\"modal-dialog modal-dialog-centered\">
                          <div class=\"modal-content\">
                            <div class=\"modal-header\">
                              <h5 class=\"modal-title\" id=\"delcmtModalLabel-" .$count . "\">Bạn muốn xóa bình luận này</h5>
                              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body\">
                              
                            </div>
                            <div class=\"modal-footer\">
                              <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Đóng</button>
                              <button type=\"button\" class=\"btn btn-primary\" data-bs-dismiss=\"modal\" onclick=\"delete_comment(" . $row["id"] . ", this)\">Xác nhận</button>
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
        }
        function logout($user){
            if($user == "member"){
                $cart = mysqli_fetch_array($this->model($user)->get_sum_cart($_SESSION["id"]))["sum"];
                $combo = mysqli_fetch_array($this->model($user)->get_sum_order_Combo($_SESSION["id"]))["sum"];
                $total = 0;
                if($cart != NULL) $total += (int)$cart;
                if($combo != NULL) $total += (int)$combo;
                $this->model($user)->update_Rank($_SESSION["id"], $total);
                $this->model($user)->clear_cart();
            }
            session_unset(); 
           $this->Home_page("customer");
        }
        function change_passwork($user, $array){
            $to = mysqli_fetch_array($this->model($user)->change_passwork($array[2]))["mail"];
            echo $to;
            if( $to != ""){
                $subject = "CHANGE PASSWORD";
                $message = "Chào bạn, \nMật khẩu mới của bạn sẽ là: 123456hello\n";
                if(mail($to, $subject, $message)){
                    $this->model($user)->change_passwork_mail($to, "123456hello");
                    echo "OK";
                }
                else{ echo "null";}
            }
            else{ echo "null";}
        }
        function add_new_combo($user){
            if(isset($_POST["cname"]) && isset($_POST["price"]) && isset($_POST["c-shirt"]) && isset($_POST["c-pants"]) && isset($_POST["c-ass"])){
                $result = $this->model($user)->add_new_combo($_POST["cname"], $_POST["price"]);
                $this->model($user)->add_product_in_combo($result, $_POST["c-shirt"], $_POST["c-pants"], $_POST["c-ass"]);
            }
            $this->Cost_table($user);
        }
        function update_new_combo($user){
            if(isset($_POST["cid"]) && isset($_POST["cname"]) && isset($_POST["price"]) && isset($_POST["c-shirt"]) && isset($_POST["c-pants"]) && isset($_POST["c-ass"])){
                $result = $this->model($user)->update_new_combo($_POST["cid"], $_POST["cname"], $_POST["price"]);
                $this->model($user)->update_product_in_combo($_POST["cid"], $_POST["c-shirt"], $_POST["c-pants"], $_POST["c-ass"]);
            }
            $this->Cost_table($user);
        }
        function add_cycle($user){
            if(isset($_POST["cycle-time"])){
                $this->model($user)->add_cycle($_POST["cycle-time"]);
            }
            $this->Cost_table($user);
        }
        function delete_combo($user, $array){
            if($this->model($user)->delete_combo((int)$array[2])){
                echo "OK";
            } else {
                echo "Nope";
            }
        }
        function get_user($user, $array){
            $data = $this->model($user)->get_user((int)$array[2]);
            if(!empty($data)){
                foreach($data as $row){
                    echo "</div class=\"row\">";
                    echo "<div class=\"col-12\">
                            <div class=\"row\">
                                <div class=\"col-4\"><strong>Họ và tên:</strong></div>
                                <div class=\"col-8\"><h5>" . $row["name"] .  "</h5></div>
                            </div>
                        </div>";
                    echo "<div class=\"col-12\">
                            <div class=\"row\">
                                <div class=\"col-4\"><strong>CMND/CCCD:</strong></div>
                                <div class=\"col-8\"><h5>" . $row["cmnd"] .  "</h5></div>
                            </div>
                        </div>";
                    echo "<div class=\"col-12\">
                            <div class=\"row\">
                                <div class=\"col-4\"><strong>SĐT:</strong></div>
                                <div class=\"col-8\"><h5>" . $row["phone"] .  "</h5></div>
                            </div>
                        </div>";
                    echo "<div class=\"col-12\">
                            <div class=\"row\">
                                <div class=\"col-4\"><strong>Email:</strong></div>
                                <div class=\"col-8\"><h5>" . $row["mail"] .  "</h5></div>
                            </div>
                        </div>";
                    echo "</div>";
                }
            }
            else echo "null";
        }
        function remove_user($user, $array){
            if($this->model($user)->remove_user((int)$array[2])) echo "ok";
            else echo "null";
        }
        function ban_user($user, $array){
            if($this->model($user)->ban_user((int)$array[2])){
                if($this->model($user)->remove_user($array[2])) echo "ok";
                else echo "null";
            }
            else echo "null";
        }
        function create_account($user, $array){
            if(mysqli_fetch_array($this->model($user)->check_account_ban($array[3]))["id"] == NULL){
                if(mysqli_fetch_array($this->model($user)->check_account_inside($array[3], $array[4]))["id"] == NULL){
                    if($this->model($user)->create_account($array[2], $array[3], $array[4], $array[5], $array[6])){
                        echo "ok";
                    }
                    else echo "null3";
                }
                else echo "null2";
            }
            else echo "null1";
        }
    }
?>