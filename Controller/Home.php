<?php
// http://localhost/live/Home/Show/1/2

class Home extends Controller{

        // Must have SayHi()
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
                "product" => $cus->get_products()
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
                "comment" => $cmt_info
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
        function delete_news($id){
            $this->model("customer")->delete_news($id);
        }
        function Cost_table($user){
            $cus = $this->model($user);
            $combo = $cus->get_combo();
            $product_in_combo = array();
            foreach($combo as $cb){
                array_push($product_in_combo, (["name" => $cb["cbname"], "price" => $cb["cost"], "product" => $cus->get_product_in_combo($cb["id"])]));
            }
            $this->view("Cost_table", [
                "combo" => $product_in_combo,
                "cycle" => $cus->get_cycle()
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
                $this->view("Payment", [
                    "product_in_cart" => $mem-> get_product_in_cart($_SESSION["id"])
                ]);
            }
            else{
                $this->Login($user);
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
            }
            else{ 
                $id = mysqli_fetch_array($this->model($user)->get_id_user($array[2],  $array[3]), MYSQLI_NUM);
                if($id == null) echo "null";
                else {
                    $_SESSION["id"] = (int)$id[0];
                    $_SESSION["user"] = "member";
                    if(!isset($array[4])) $array[4] = "Home_page";
                    echo "?url=/Home/" . $array[4] . "/"; // ?url=h/f/user/pwd => 
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
                    array_push($product_in_cart, $mem->get_product_in_cart_mem((int)$id));
                }
                $this->view("Memberpage", [
                    "user" => $mem->get_user($_SESSION["id"]),
                    "idcart" => $cartid,
                    "product_in_cart" => $product_in_cart
                ]);
            }
            else{
                $this->Login($user, "member_page");
            }
        }
        function update_profile($user){
            if( isset($_POST["fname"]) && isset($_POST["username"]) && isset($_POST["pwd"]) && isset($_POST["cmnd"]) && isset($_POST["phone"]) && isset($_POST["address"]))
            {
                if(isset($_FILES["file_pic"])){
                    if(!file_exists("./Views/images/" . $_FILES["file_pic"]['name']))
                        move_uploaded_file($_FILES['file_pic']['tmp_name'], './Views/images/' . $_FILES['file_pic']['name']);
                    $this->model($user)->update_profile($_SESSION["id"], $_POST["fname"], $_POST["username"], $_POST["pwd"], $_POST["cmnd"], $_POST["phone"], $_POST["address"], './Views/images/' . $_FILES['file_pic']['name']);
                }
                else{
                    $this->model($user)->update_profile_nope_img($_SESSION["id"], $_POST["fname"], $_POST["username"], $_POST["pwd"], $_POST["cmnd"], $_POST["phone"], $_POST["address"]);
                }
            }
            $this->Home_page($user);
            
        }
}
?>