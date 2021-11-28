<?php
require_once "./Model/customer.php";
class manager extends customer{
    public function get_news(){ 
        $query =    "SELECT `news`.`ID` as `id`,
                            `news`.`CID` as `cid`, 
                            `news`.`KEY` as `key`, 
                            `news`.`TIME` as `time`,
                            `news`.`TITLE` as `title`,  
                            `news`.`CONTENT` as `content`, 
                            `news`.`IMG_URL` as `img_url`, 
                            `news`.`SHORT_CONTENT` as `short_content` 
                    FROM `news`";
        return mysqli_query($this->connect, $query);
    }
    function delete_news($id){
        echo $id;
        $query = "DELETE FROM `news` WHERE `news`.`ID`= ". $id .";";
        echo "4";
        return mysqli_query($this->connect, $query);
    }
    function insert_news($key, $title, $content, $img_url, $short_content){
        $query =    "INSERT INTO `news`(`news`.`key` , `news`.`time`, `news`.`title`, `news`.`content`, `news`.`img_url`, `news`.`short_content`)
                     VALUES (\"" . $key . "\", \"" . date("Y/m/d") . "\", \"" . $title . "\", \"" . $content . "\", \"" . $img_url . "\", \"" . $short_content . "\");";
        return mysqli_query($this->connect, $query); 
    }
    public function get_comment_news($id){
        $query = "SELECT `account`.`FNAME` as `name`,
                         `comment_news`.`CONTENT` as `content`,
                         `comment_news`.`TIME` as `time`
                FROM `comment_news`, `account`
                WHERE `comment_news`.`CID`=`account`.`ID` and `comment_news`.`NID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function add_new_item($name, $price, $desc, $remain, $cate, $path){
        $query = "INSERT INTO `product`(`product`.`NAME`, `product`.`PRICE`, `product`.`IMG_URL`, `product`.`NUMBER`, `product`.`DECS`, `product`.`CATEGORY`, `product`.`TOP_PRODUCT`)
                  VALUE (\"" . $name . "\", " . (int)$price . ", \"" . $path . "\", " . $remain . ", \"" . $desc . "\", \"" . $cate . "\", 0);";
        mysqli_query($this->connect, $query);
        return mysqli_insert_id($this->connect);
    }
    public function add_sub_img($pid, $path){
        $query = "INSERT INTO `sub_img_url`(`sub_img_url`.`PID`, `sub_img_url`.`IMG_URL`)
                  VALUE (" . (int)$pid . ", \"" . $path . "\");";
        return mysqli_query($this->connect, $query);
    }
    public function update_item_nope_img($pid, $name, $price, $desc, $remain, $cate, $top_product){
        $query = "UPDATE `product` SET `product`.`NAME` = \"" . $name . "\", `product`.`PRICE` = " . (int)$price . ", `product`.`NUMBER` = " . (int)$remain . ", `product`.`DECS` = \"" . $desc . "\", `product`.`CATEGORY` = \"" . $cate . "\", `product`.`TOP_PRODUCT` = " . (int)$top_product . " WHERE `product`.`ID` = " . (int)$pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function update_item_img($pid, $path){
        $query = "UPDATE `product` SET `product`.`IMG_URL` = \"" . $path . "\" WHERE `product`.`ID` = " . (int)$pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_sub_img_id($pid){
        $query = "SELECT `sub_img_url`.`ID` AS `id`, `sub_img_url`.`IMG_URL` AS `img` FROM `sub_img_url` WHERE `sub_img_url`.`PID` = " . (int)$pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function update_sub_img($sub_id, $path){
        $query = "UPDATE `sub_img_url` SET `sub_img_url`.`IMG_URL` = \"" . $path . "\" WHERE `sub_img_url`.`ID` = ". (int)$sub_id . ";";
        return mysqli_query($this->connect, $query);
    }
    public function delete_item($pid){
        $query = "DELETE FROM `sub_img_url` WHERE `sub_img_url`.`PID` = " . $pid . ";";
        mysqli_query($this->connect, $query);
        $query = "DELETE FROM `product_in_cart` WHERE `product_in_cart`.`PID` = " . $pid . ";";
        mysqli_query($this->connect, $query);
        $query = "DELETE FROM `product_in_combo` WHERE `product_in_combo`.`PID` = " . $pid . ";";
        mysqli_query($this->connect, $query);
        $query = "DELETE FROM `product` WHERE `product`.`ID` = " . $pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function delete_comment($cid){
        $query = "DELETE FROM `comment` WHERE `comment`.`ID` = " . $cid . ";";
        return mysqli_query($this->connect, $query);
    }
    function add_comment_news($content, $nid, $cid){
        $query = "INSERT INTO `comment_news` (`nid`, `cid`, `content`, `time`) VALUE `(`$nid`, `$cid`, `$content`, `date('Y/m/d')`)";
        return mysqli_query($this->connect, $query);
    }
    function get_news_by_nid($nid){
        $query = "SELECT `news`.`ID` as `id`,
                            `news`.`CID` as `cid`, 
                            `news`.`KEY` as `key`, 
                            `news`.`TIME` as `time`,
                            `news`.`TITLE` as `title`,  
                            `news`.`CONTENT` as `content`, 
                            `news`.`IMG_URL` as `img_url`, 
                            `news`.`SHORT_CONTENT` as `short_content`
                FROM `news`  WHERE `news`.`ID`= ". $nid .";";
        return mysqli_query($this->connect, $query);
    }
    public function get_message(){
        $query =    "SELECT    `message`.`FNAME` AS `name`, 
                                `message`.`EMAIL` AS `email`, 
                                `message`.`PHONE` AS `phone`, 
                                `message`.`SUBJECT` AS `sub`, 
                                `message`.`CONTENT` AS `content`, 
                                `message`.`CHECK` AS `check`, 
                                `message`.`ID` AS `id`
                    FROM `message`";
        return mysqli_query($this->connect, $query);
    }
    public function update_message($id){
        $query =    "UPDATE `message`
                    SET `message`.`CHECK` = 1
                    WHERE `message`.`ID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
}
?>