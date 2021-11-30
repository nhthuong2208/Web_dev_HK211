<?php
require_once "./Model/customer.php";
class member extends customer{
    public function get_product_in_cart($id){
        $query =    "SELECT `product_in_cart`.`ID` AS `id`,
                            `product`.`NAME` AS `name`, 
                            `product`.`PRICE` AS `price`,
                            `product`.`IMG_URL` AS `img`,
                            `product_in_cart`.`QUANTITY` AS `num`,
                            `product_in_cart`.`SIZE` AS `size`,
                            `product_in_cart`.`OID` AS `oid`
                    FROM `cart`, `product_in_cart`, `product`, `account`
                    WHERE `cart`.`ID` = `product_in_cart`.`OID`
                        AND `cart`.`STATE` = 0
                        AND `product`.`ID` = `product_in_cart`.`PID`
                        AND `cart`.`UID` = " . $id . "
                        AND `account`.`ID` = " . $id . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_product_in_cart_mem($id){
        $query =    "SELECT `product`.`ID` AS `id`,
                            `product`.`NAME` AS `name`, 
                            `product`.`PRICE` AS `price`,
                            `product`.`IMG_URL` AS `img`,
                            `product_in_cart`.`QUANTITY` AS `num`,
                            `product_in_cart`.`SIZE` AS `size`
                    FROM `cart`, `product_in_cart`, `product`, `account`
                    WHERE `cart`.`ID` = `product_in_cart`.`OID`
                        AND `product`.`ID` = `product_in_cart`.`PID`
                        AND `cart`.`UID` = `account`.`ID`
                        AND `cart`.`ID` = " . $id . ";";
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
    public function update_user($id, $fname, $phone, $add){
        $query =    "UPDATE `account`
                    SET `account`.`FNAME` = \"" . $fname . "\", `account`.`PHONE` = \"" . $phone ."\", `account`.`ADDRESS` = \"" . $add . "\"
                    WHERE `account`.`ID` = " . $id .";";
        return mysqli_query($this->connect, $query);
    }
    public function update_password_profile($id, $pwd){
        $query =    "UPDATE `account`
                    SET `account`.`PWD` = \"" . $pwd . "\"
                    WHERE `account`.`ID` = " . $id .";";
        return mysqli_query($this->connect, $query);
    }
    public function delete_product_incart($id){
        $query =    "DELETE FROM `product_in_cart` WHERE `product_in_cart`.`ID` = " . $id .";";
        return mysqli_query($this->connect, $query);
    }
    public function update_product_in_cart($id, $quantity, $size){
        if($quantity == 0){
            $this->delete_product_incart($id);
        }
        else{
            $query =    "UPDATE `product_in_cart`
                        SET `product_in_cart`.`QUANTITY` = " . $quantity . ", `product_in_cart`.`SIZE` = \"" . $size ."\"
                        WHERE `product_in_cart`.`ID` = " . $id;
            return  mysqli_query($this->connect, $query);
        }
    }
    public function update_cart($id){
        $query =    "UPDATE `product`
                    SET `product`.`NUMBER` = `product`.`NUMBER` - (SELECT `ABC`.`num` FROM
                        (SELECT `product_in_cart`.`QUANTITY` AS `num`, `product_in_cart`.`PID` AS `pid` FROM  `product_in_cart`, `product`, `cart`
                        WHERE `product_in_cart`.`PID` = `product`.`ID` AND `product_in_cart`.`OID` = `cart`.`ID` AND `cart`.`ID` = " . $id . ") AS `ABC` WHERE `ABC`.`pid` = `product`.`ID`)
                    WHERE `product`.`ID` IN  (SELECT `ABC`.`pid` FROM
                        (SELECT `product_in_cart`.`QUANTITY` AS `num`, `product_in_cart`.`PID` AS `pid` FROM  `product_in_cart`, `product`, `cart`
                        WHERE `product_in_cart`.`PID` = `product`.`ID` AND `product_in_cart`.`OID` = `cart`.`ID` AND `cart`.`ID` = " . $id . ") AS `ABC`);";
        
        mysqli_query($this->connect, $query);
        $query =    "UPDATE `cart`
                    SET `cart`.`STATE` = 1
                    WHERE `cart`.`ID` = " . $id;
        return mysqli_query($this->connect, $query);
    } 
    public function get_cart($id){
        $query =    "SELECT     `cart`.`ID` AS `id`,   
                                `cart`.`TIME` AS `time`, 
                                `cart`.`STATE` AS `state`
                    FROM `cart`, `account`
                    WHERE `cart`.`UID` = " . $id ."
                    GROUP BY `cart`.`ID`";
        return  mysqli_query($this->connect, $query);
    }
    public function update_profile_nope_img($id, $fname, $user, $cmnd, $phone, $add, $mail){
        $query =    "UPDATE `account`
                    SET `account`.`CMND` = \"" . $cmnd . "\",
                        `account`.`FNAME` = \"" . $fname . "\",
                        `account`.`PHONE` = \"" . $phone . "\",
                        `account`.`ADDRESS` = \"" . $add . "\",
                        `account`.`USERNAME` = \"" . $user . "\",
                        `account`.`EMAIL` = \"" . $mail . "\"
                    WHERE `account`.`ID` = " . $id ;
        return mysqli_query($this->connect, $query);
    }
    public function get_cart_for_session(){
        $query =    "SELECT MAX(`cart`.`ID`) AS `id` FROM `cart`" ;
        return mysqli_query($this->connect, $query);
    }
    public function create_cart($id, $time){
        $query =    "INSERT INTO `cart` (`cart`.`UID`, `cart`.`TIME`)
                    VALUES(" . $id . ", \"" . $time . "\");";
        return mysqli_query($this->connect, $query);
    }
    public function create_product_incart($pid, $oid, $quantity){
        $query =    "INSERT INTO `product_in_cart`(`product_in_cart`.`PID`, `product_in_cart`.`OID`, `product_in_cart`.`QUANTITY`)
                    VALUES (" . $pid . ", " . $oid . ", " . $quantity . ");";
        return mysqli_query($this->connect, $query);
    }
    public function update_pic($id ,$path){
        $query =    "UPDATE `account`
                    SET `account`.`IMG_URL` = \"" . $path . "\"
                    WHERE `account`.`ID` = " . $id ;
        return mysqli_query($this->connect, $query);
    }
    public function create_order_combo($uid, $time, $cbid, $cycle, $size){
        $query =    "INSERT INTO `order_combo`(`order_combo`.`UID`, `order_combo`.`CBID`, `order_combo`.`TIME`, `order_combo`.`CYCLE`, `order_combo`.`SIZE`)
                    VALUES(" . $uid . ", " . $cbid . ", \"" . $time . "\", " . $cycle . ", \"" . $size . "\");";
        return mysqli_query($this->connect, $query);
    }
    public function get_order_combo($id){
        $query =    "SELECT `order_combo`.`ID` AS `id`, 
                            `order_combo`.`TIME` AS `time`, 
                            `order_combo`.`CBID` AS `cbid`, 
                            `order_combo`.`CYCLE` AS `cycle`, 
                            `order_combo`.`SIZE` AS `size`, 
                            `combo`.`NAME` AS `name`, 
                            `combo`.`COST` AS `price`
                    FROM `order_combo`, `combo`
                    WHERE   `order_combo`.`STATE` = 0
                            AND `order_combo`.`CBID` = `combo`.`ID`
                            AND `order_combo`.`UID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function update_order_combo($id){
        $query =    "UPDATE `order_combo`
                    SET `order_combo`.`STATE` = 1
                    WHERE `order_combo`.`UID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function delete_order_combo($id){
        $query =    "DELETE FROM `order_combo` WHERE `order_combo`.`STATE` = 0 AND `order_combo`.`UID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function get_order_combo_mem($id){
        $query =    "SELECT `order_combo`.`ID` AS `id`, 
                            `order_combo`.`TIME` AS `time`, 
                            `order_combo`.`CBID` AS `cbid`, 
                            `order_combo`.`CYCLE` AS `cycle`, 
                            `order_combo`.`SIZE` AS `size`, 
                            `combo`.`NAME` AS `name`, 
                            `combo`.`COST` AS `price`
                    FROM `order_combo`, `combo`
                    WHERE   `order_combo`.`STATE` = 1
                            AND `order_combo`.`CBID` = `combo`.`ID`
                            AND `order_combo`.`UID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    function delete_order_combo_cbid($id, $cbid){
        $query =    "DELETE FROM `order_combo` WHERE `order_combo`.`UID` = " . $id . " AND `order_combo`.`CBID` = " . $cbid . " AND `order_combo`.`STATE` = 0";
        return mysqli_query($this->connect, $query);
    }
    function add_comment_news($content, $nid, $cid){
        $query = "INSERT INTO `comment_news` (`nid`, `cid`, `content`, `time`) VALUE (" . $nid . ", " . $cid . ", \"" . $content . "\", \"" . date("Y/m/d") . "\")";
        return mysqli_query($this->connect, $query);
    }
    public function get_sum_cart($id){
        $query =    "SELECT SUM(`product_in_cart`.`QUANTITY`*`product`.`PRICE`)  as `sum`
                    FROM `product`, `product_in_cart`, `cart`, `account`
                    WHERE   `product_in_cart`.`PID` = `product`.`ID`
                        AND `product_in_cart`.`OID` = `cart`.`ID`
                        AND `cart`.`UID` = `account`.`ID`
                        AND `cart`.`STATE` = 1
                        AND `account`.`ID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function get_sum_order_Combo($id){
        $query =    "SELECT SUM(`combo`.`COST`)  as `sum`
                    FROM `combo`, `order_combo`, `account`
                    WHERE `order_combo`.`CBID` = `combo`.`ID`
                        AND `order_combo`.`UID` = `account`.`ID`
                        AND `account`.`ID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function update_Rank($id, $rank){
        $query =    "UPDATE `account`
                    SET `account`.`RANK` = " . $rank . "
                    WHERE `account`.`ID` = " . $id ;
        return mysqli_query($this->connect, $query);
    }
    public function clear_cart(){
        $query =    "DELETE FROM `cart` 
                    WHERE `cart`.`ID` NOT IN (  SELECT `cart`.`ID` FROM `product_in_cart`, `cart`
                                                WHERE `product_in_cart`.`OID` = `cart`.`ID`
                                                GROUP BY `cart`.`ID`)";
        return mysqli_query($this->connect, $query);
    }
    public function delete_order_combo_id($id){
        $query =    "DELETE FROM `order_combo` WHERE `order_combo`.`ID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
}
?>