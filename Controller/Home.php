<?php
// http://localhost/live/Home/Show/1/2

class Home extends Controller{

        // Must have SayHi()
        function SayHi(){
            $this->view("Home page", []);
        }

        function Show($a, $b){        
            // Call Models
            $teo = $this->model("customer");
            $tong = $teo->Tong($a, $b); // 3

            // Call Views
            $this->view("Home page", []);
        }
}
?>