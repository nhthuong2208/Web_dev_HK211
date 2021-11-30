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
    function update_news($id, $key, $title, $content, $img_url, $short_content){
        echo ("$img_url");
        $content_mod = explode("\"", $content);
        $content = $content_mod[0];
        for($i = 1; $i < count($content_mod); $i++){
            $content = $content . "\\\"" . $content_mod[$i];
        }
        $title_mod = explode("\"", $title);
        $title = $title_mod[0];
        for($i = 1; $i < count($title_mod); $i++){
            $title = $title . "\\\"" . $title_mod[$i];
        }
        $short_content_mod = explode("\"", $short_content);
        $short_content = $short_content_mod[0];
        for($i = 1; $i < count($short_content_mod); $i++){
            $short_content = $short_content . "\\\"" . $short_content_mod[$i];
        }
        $query = "UPDATE `news` SET `news`.`key` = \"" . $key . "\", `news`.`title` = \"" . $title . "\", `news`.`content` = \"" . $content . "\",  `news`.`img_url` = \"" . $img_url . "\", `news`.`short_content` = \"" . $short_content . "\" WHERE `news`.`ID` = " . (int)$id . ";";
        mysqli_query($this->connect, $query);
        echo mysqli_error($this->connect);
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
        $name_mod = explode("\"", $name);
        $desc_mod = explode("\"", $desc); 
        $name = $name_mod[0];
        $desc = $desc_mod[0];
        for($i = 1; $i < count($name_mod); $i++){
            $name = $name . "\\\"" . $name_mod[$i];
        }
        for($i = 1; $i < count($desc_mod); $i++){
            $desc = $desc . "\\\"" . $desc_mod[$i];
        }
        $query = "INSERT INTO `product`(`product`.`NAME`, `product`.`PRICE`, `product`.`IMG_URL`, `product`.`NUMBER`, `product`.`DECS`, `product`.`CATEGORY`, `product`.`TOP_PRODUCT`)
                  VALUE (\"" . $name . "\", " . (int)$price . ", \"" . $path . "\", " . $remain . ", \"" . $desc . "\", \"" . $cate . "\", 0);";
        mysqli_query($this->connect, $query);
        return mysqli_insert_id($this->connect);
    }
    public function add_sub_img($pid, $path){
        if($path == "./Views/images/"){
            $path = './Views/images/default_image.png';
        }
        $query = "INSERT INTO `sub_img_url`(`sub_img_url`.`PID`, `sub_img_url`.`IMG_URL`)
                  VALUE (" . (int)$pid . ", \"" . $path . "\");";
        return mysqli_query($this->connect, $query);
    }
    public function update_item_nope_img($pid, $name, $price, $desc, $remain, $cate, $top_product){
        $desc_mod = explode("\"", $desc);
        $name_mod = explode("\"", $name);
        $desc = $desc_mod[0];
        $name = $name_mod[0];
        for($i = 1; $i < count($desc_mod); $i++){
            $desc = $desc . "\\\"" . $desc_mod[$i];
        }
        for($i = 1; $i < count($name_mod); $i++){
            $name = $name . "\\\"" . $name_mod[$i];
        }
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
    public function get_all_user_info(){
        $query =    "SELECT `account`.`ID` AS `id`,
                            `account`.`FNAME` AS `name`, 
                            `account`.`CMND` AS `cmnd`, 
                            `account`.`PHONE` AS `phone`, 
                            `account`.`ADDRESS` AS `add`,
                            `account`.`EMAIL` AS `mail`,
                            `account`.`IMG_URL` AS `img`, 
                            `account`.`RANK` AS `rank` 
                    FROM `account`";
        return mysqli_query($this->connect, $query);
    }
    public function add_new_combo($name, $price){
        $query = "INSERT INTO `combo` (`combo`.`NAME`, `combo`.`COST`) VALUE (\"" . $name . "\", " . (int)$price . ");";
        mysqli_query($this->connect, $query);
        return mysqli_insert_id($this->connect);
    }
    public function update_new_combo($id, $name, $price){
        $query = "UPDATE `combo` SET `combo`.`NAME` =\"" . $name . "\", `combo`.`COST`=" . (int)$price. " WHERE `combo`.`ID`=" .$id;
        return mysqli_query($this->connect, $query);
    }
    public function add_product_in_combo($cbid, $shirt, $pant, $ass){

        $query = "INSERT INTO `product_in_combo` (`product_in_combo`.`CBID`, `product_in_combo`.`PID`) VALUE (" . (int)$cbid . ", " . (int)$shirt . ");";
        mysqli_query($this->connect, $query);
        $query = "INSERT INTO `product_in_combo` (`product_in_combo`.`CBID`, `product_in_combo`.`PID`) VALUE (" . (int)$cbid . ", " . (int)$pant . ");";
        mysqli_query($this->connect, $query);
        $query = "INSERT INTO `product_in_combo` (`product_in_combo`.`CBID`, `product_in_combo`.`PID`) VALUE (" . (int)$cbid . ", " . (int)$ass . ");";
        return mysqli_query($this->connect, $query);
    }
    public function update_product_in_combo($cbid, $shirt, $pant, $ass){
        $query = "select id FROM product_in_combo WHERE cbid = '$cbid' limit 1";
        $id = "";
        $result = mysqli_query($this->connect, $query);
        while($row = $result->fetch_assoc()) {
            $id = $row["id"];                 
        }
        // echo ($id);
        // echo ($cbid);
        $query = "UPDATE `product_in_combo` SET `product_in_combo`.`PID`=" . (int)$shirt. " WHERE `product_in_combo`.`ID`=" .(int)$id;
        mysqli_query($this->connect, $query);
        $query = "UPDATE `product_in_combo` SET `product_in_combo`.`PID`=" . (int)$pant. " WHERE `product_in_combo`.`ID`=" .(int)$id+1;
        mysqli_query($this->connect, $query);
        $query = "UPDATE `product_in_combo` SET `product_in_combo`.`PID`=" . (int)$ass. " WHERE `product_in_combo`.`ID`=" .(int)$id+2;
        mysqli_query($this->connect, $query);
    }
    public function add_cycle($time){
        $time = $time . " ngày";
        $query = "INSERT INTO `cycle` (`cycle`.`CYCLE`) VALUE (\"" . $time . "\");";
        return mysqli_query($this->connect, $query);
    }
    public function delete_combo($cid){
        $query = "DELETE FROM `order_combo` WHERE `order_combo`.`CBID` = " . $cid . ";";
        mysqli_query($this->connect, $query);
        $query = "DELETE FROM `product_in_combo` WHERE `product_in_combo`.`CBID` = " . $cid . ";";
        mysqli_query($this->connect, $query);
        $query = "DELETE FROM `combo` WHERE `combo`.`ID` = " . $cid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_user($id){
        $query =    "SELECT `account`.`FNAME` AS `name`,
                            `account`.`PHONE` AS `phone`, 
                            `account`.`ADDRESS` AS `add`, 
                            `account`.`USERNAME` AS `username`, 
                            `account`.`IMG_URL` AS `img`, 
                            `account`.`CMND` AS `cmnd`, 
                            `account`.`PWD` AS `pwd`, 
                            `account`.`EMAIL` AS `mail`
                    FROM    `account`
                    WHERE   `account`.`ID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function remove_user($id){
        $query =    "DELETE FROM `comment_news` WHERE `comment_news`.`CID` = " . $id;
        echo $query;
        mysqli_query($this->connect, $query);
        $query =    "DELETE FROM `comment` WHERE `comment`.`UID` = " . $id;
        mysqli_query($this->connect, $query);
        $query =    "DELETE FROM `product_in_cart` WHERE `product_in_cart`.`OID` IN (SELECT `cart`.`ID` FROM `cart` WHERE `cart`.`UID` = " . $id . ")";
        echo $query;
        mysqli_query($this->connect, $query);
        $query =    "DELETE FROM `cart` WHERE `cart`.`UID` = " . $id;
        echo $query;
        mysqli_query($this->connect, $query);
        $query =    "DELETE FROM `order_combo` WHERE `order_combo`.`UID` = " . $id;
        echo $query;
        mysqli_query($this->connect, $query);
        $query =    "DELETE FROM `account` WHERE `account`.`ID` = " . $id;
        echo $query;
        return mysqli_query($this->connect, $query);
    }
    public function ban_user($id){
        $query =    "INSERT INTO `ban_account`(`ban_account`.`CMND`) VALUES ((SELECT `account`.`CMND` FROM `account` WHERE `account`.`ID` = " . $id ."));";
        return mysqli_query($this->connect, $query);
    }
}
?>