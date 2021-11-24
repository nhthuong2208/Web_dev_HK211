<?php
require_once "./Model/customer.php";
class member extends customer{
    public function get_id_user($username, $pwd){
        $query =    "SELECT `account`.`ID` AS `id` FROM `account`
                    WHERE `account`.`USERNAME` = \"" . $username . "\"
                            AND `account`.`PWD` = \"" . $pwd ."\";";
        return mysqli_query($this->connect, $query);
    }
    public function get_product_in_cart($id){
        $query =    "SELECT `product`.`ID` AS `id`,
                            `product`.`NAME` AS `name`, 
                            `product`.`PRICE` AS `price`,
                            `product`.`IMG_URL` AS `img`,
                            `product_in_cart`.`QUANTITY` AS `num` 
                    FROM `cart`, `product_in_cart`, `product`, `account`
                    WHERE `cart`.`ID` = `product_in_cart`.`OID`
                        AND `cart`.`STATE` = 0
                        AND `product`.`ID` = `product_in_cart`.`PID`
                        AND `account`.`ID` = " . $id . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_user($id){
        $query =    "SELECT `account`.`FNAME` AS `name`,
                            `account`.`PHONE` AS `phone`, 
                            `account`.`ADDRESS` AS `add` 
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
    public function delete_product_incart($id){
        $query =    "DELETE FROM `product_in_cart` WHERE `product_in_cart`.`ID` = " . $id .";";
        echo $query;
        return mysqli_query($this->connect, $query);
    }
}
?>