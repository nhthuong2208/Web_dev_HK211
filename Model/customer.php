<?php
class customer extends DB{
    public function get_swiper_slide_collection(){
        $query = "SELECT `product`.`IMG_URL` AS \"img\", `product`.`CATEGORY` AS \"cate\" FROM `product` WHERE `product`.`TOP_PRODUCT` = 1;";
        return mysqli_query($this->connect, $query);
    }
    public function get_product_cates(){
        $query = "SELECT `product`.`CATEGORY` AS \"cate\" FROM `product` GROUP BY `product`.`CATEGORY`;";
        return mysqli_query($this->connect, $query);
    }
    public function get_products(){
        $query = "SELECT `product`.`IMG_URL` AS \"img\", `product`.`NAME` \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\" FROM `product`;";
        return mysqli_query($this->connect, $query);
    } 
    public function get_combo(){
        $query =    "SELECT `combo`.`NAME` AS `cbname`,
                            `combo`.`COST` AS `cost`, 
                            `combo`.`ID` AS `id` 
                    FROM `combo`";
        return mysqli_query($this->connect, $query);
    }
    public function get_product_in_combo($id){
        $query =    "SELECT `product`.`NAME` AS `name` 
                    FROM `product_in_combo`, `product`
                    WHERE `product_in_combo`.`PID` = `product`.`ID`
                    AND `product_in_combo`.`CBID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function get_cycle(){
        $query =    "SELECT `cycle`.`CYCLE` AS `cycle` FROM `cycle`;";
        return mysqli_query($this->connect, $query);
    }
    function insert_message($fname, $email, $phone, $subject, $content){
        $query =    "INSERT INTO `message`(`message`.`FNAME`, `message`.`EMAIL`, `message`.`PHONE`, `message`.`SUBJECT`, `message`.`CONTENT`) VALUES
                    (\"" . $fname . "\", \"" . $email . "\", \"" . $phone . "\", \"" . $subject . "\", \"" . $content . "\");";
        return mysqli_query($this->connect, $query); //insert delete update => true false -> 
    }
}
?>