<?php

class Home extends Controller{
        function Home_page($user){
            $cus = $this->model($user);
            $this->view("Home_page", [
                "user" => $user,
                "collection" => $cus->get_swiper_slide_collection(), //$data["collection"] = $cus->get_swiper_slide_collection() 
                "featured" => $cus->get_products()
            ]);
        }
        function About_us($user){
            $this->view("About_US", []);
        }
        function Products($user){
            $cus = $this->model($user);
            $this->view("Products", [
                "cate" => $cus->get_product_cates(),
                "product" => $cus->get_products(),
                "user" => $user
            ]);
        }
        function Item($user, $pid){
            $cus = $this->model($user);
            $comment = $cus->get_item_comment($pid[2]);
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
            $this->view("Contact_US", []);
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
            $this->model("manager")->delete_news((int)$id[2]);
        }
        function insert_news($user, $array){
            echo var_dump($array);

            $this->model("manager")->insert_news($array[2], $array[3], $array[4], $array[5], $array[6]);
        }
        function add_comment_news($user, $array){
            $this->model($user)->add_comment_news($array[2], $array[3], $_SESSION["id"]);
        }

        function Cost_table($user){
            $cus = $this->model($user);
            $combo = $cus->get_combo();
            $product_in_combo = array();
            foreach($combo as $cb){
                array_push($product_in_combo, (["id" => $cb["id"], "name" => $cb["cbname"], "price" => $cb["cost"], "product" => $cus->get_product_in_combo($cb["id"])]));
            }
            $this->view("Cost_table", [
                "combo" => $product_in_combo,
                "cycle" => $cus->get_cycle(),
                "user" => $user
            ]);
        }
        function Cart($user){
            if($user == "member"){
                $mem = $this->model($user);
                $this->view("Cart", [
                    "product_in_cart" => $mem-> get_product_in_cart($_SESSION["id"]),
                    "user" => mysqli_fetch_array($mem->get_user($_SESSION["id"]))
                ]);
            }
            else{
                $this->Login($user, "Cart");
            }
        }
        function Login($user, $array=""){
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
            $this->model($user)->insert_message($array[2], $array[3], $array[4], $array[5], $array[6]);
        }
        function update_user($user, $array){
            $this->model($user)->update_user($array[2], $array[3], $array[4], $array[5]);
        }
        function delete_product_incart($user, $array){
            $this->model($user)->delete_product_incart((int)$array[2]);
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
        function update_cart($user, $array){
            $action = $this->model($user);
            for($i = 0; $i < (int)$array[2]; $i++){
                if(!($action->update_cart($array[2 + $i + 1]))) echo "null";
            }
            echo "?url=/Home/Home_page/";
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
                    "order_combo" => $product_in_combo
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
            if( isset($_POST["fname"]) && isset($_POST["username"]) && isset($_POST["pwd"]) && isset($_POST["cmnd"]) && isset($_POST["phone"]) && isset($_POST["address"]))
            {
                if(isset($_FILES["file_pic"])&& $_FILES["file_pic"]['name'] != ""){
                    if(!file_exists("./Views/images/" . $_FILES["file_pic"]['name']))
                        move_uploaded_file($_FILES['file_pic']['tmp_name'], './Views/images/' . $_FILES['file_pic']['name']);
                    $this->model($user)->update_pic($_SESSION["id"], './Views/images/' . $_FILES['file_pic']['name']);
                }
                $this->model($user)->update_profile_nope_img($_SESSION["id"], $_POST["fname"], $_POST["username"], $_POST["pwd"], $_POST["cmnd"], $_POST["phone"], $_POST["address"]);
            }
            $this->member_page($user);
            
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
            if($this->model($user)->delete_order_combo($_SESSION["id"])) echo "?url=Home/Cost_table/";
            else echo "null";
        }
}
?>