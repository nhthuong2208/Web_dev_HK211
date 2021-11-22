<?php
// http://localhost/live/Home/Show/1/2

class Home extends Controller{

        // Must have SayHi()
        function Home_page(){
            $cus = $this->model("customer");
            $this->view("Home_page", [
                "collection" => $cus->get_swiper_slide_collection(),
                "featured" => $cus->get_products()
            ]);
        }
        function About_us(){
            $this->view("About_US", []);
        }
        function Products(){
            $cus = $this->model("customer");
            $this->view("Products", [
                "cate" => $cus->get_product_cates(),
                "product" => $cus->get_products()
            ]);
        }
        function Item(){
            $this->view("Item", []);
        }
        function Contact_us(){
            $this->view("Contact_US", []);
        }
        function News(){
            $this->view("News", []);
        }
        function Cost_table(){
            $cus = $this->model("customer");
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
        function Cart(){
            $this->view("Cart", []);
        }
        function Login(){
            $this->view("Login", []);
        }
        function Payment(){
            $this->view("Payment", []);
        }
        function forgot(){
            $this->view("forgot", []);
        }
        function register(){
            $this->view("register", []);
        }
        function insert_message($fname, $email, $phone, $subject, $content){
            echo (string)$this->model("customer")->insert_message($fname, $email, $phone, $subject, $content);
        }
}
?>