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
        function Item($user){
            $this->view("Item", []);
        }
        function Contact_us($user){
            $this->view("Contact_US", []);
        }
        function News($user){
            $this->view("News", []);
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
            $this->view("Cart", []);
        }
        function Login($user){
            $this->view("Login", []);
        }
        function Payment($user){
            $this->view("Payment", []);
        }
        function forgot($user){
            $this->view("forgot", []);
        }
        function register($user){
            $this->view("register", []);
        }
        function insert_message($fname, $email, $phone, $subject, $content){
            $this->model("customer")->insert_message($fname, $email, $phone, $subject, $content);
        }
}
?>