<?php
class customer extends DB{
    public function get_swiper_slide_collection(){
        $query = "SELECT `product`.`IMG_URL` AS \"img\", `product`.`CATEGORY` AS \"cate\" FROM `product` WHERE `product`.`TOP_PRODUCT` = 1;";
        return mysqli_query($this->connect, $query);
    }

    public function get_product_cates(){
        $query = "SELECT `product`.`CATEGORY` AS \"cate\" FROM `product` GROUP BY `product`.`CATEGORY` ORDER BY `product`.`ID`;";
        return mysqli_query($this->connect, $query);
    }

    public function get_products($sort_1, $sort_2){
        $query = "";
        if($sort_1 == "" && $sort_2 == ""){
            $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` AS \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_seller\" FROM `product`;";
        }
        else if($sort_1 == "pname" && $sort_2 == "ASC"){
            $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` AS \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_seller\" FROM `product` ORDER BY `product`.`NAME` ASC;";
        }
        else if($sort_1 == "pname" && $sort_2 == "DESC"){
            $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` AS \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_seller\" FROM `product` ORDER BY `product`.`NAME` DESC;";
        }
        else if($sort_1 == "price" && $sort_2 == "ASC"){
            $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` AS \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_seller\" FROM `product` ORDER BY `product`.`PRICE` ASC;";
        }
        else if($sort_1 == "price" && $sort_2 == "DESC"){
            $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` AS \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_seller\" FROM `product` ORDER BY `product`.`PRICE` DESC;";
        }
        
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
    public function get_cycle_id($id){
        $query =    "SELECT `cycle`.`CYCLE` AS `cycle` FROM `cycle` WHERE `cycle`.`ID` = " . $id .";";
        return mysqli_query($this->connect, $query);
    }
    function insert_message($fname, $email, $phone, $subject, $content){
        $query =    "INSERT INTO `message`(`message`.`FNAME`, `message`.`EMAIL`, `message`.`PHONE`, `message`.`SUBJECT`, `message`.`CONTENT`) VALUES
                    (\"" . $fname . "\", \"" . $email . "\", \"" . $phone . "\", \"" . $subject . "\", \"" . $content . "\");";
        return mysqli_query($this->connect, $query); //insert delete update => true false -> 
    }

    public function get_product_at_id($pid) {
        $query = "SELECT `product`.`ID` AS `id`, `product`.`IMG_URL` AS \"img\", `product`.`NAME` \"name\", `product`.`PRICE` AS \"price\", `product`.`NUMBER` AS \"num\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_item\" FROM `product` WHERE `product`.`ID` = " . (int)$pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_sub_img($pid) {
        $query = "SELECT `sub_img_url`.IMG_URL AS \"img\" FROM `sub_img_url` WHERE `sub_img_url`.`PID` = " . (int)$pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_product_same_cate($pid) {
        $sql = "SELECT `product`.`CATEGORY` as \"cate\" FROM `product` WHERE `product`.`ID` = " . (int)$pid . ";";
        $cate_temp = mysqli_query($this->connect, $sql);
        $cate = mysqli_fetch_array($cate_temp)["cate"];
        $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\" FROM `product` WHERE `product`.`CATEGORY` = \"" . $cate . "\";";
        return mysqli_query($this->connect, $query);
    }
    public function get_item_comment($pid, $sort) {
        $query = "";
        if($sort == ""){
            $query = "SELECT `comment`.ID AS \"id\", `comment`.PID AS \"pid\", `comment`.UID AS \"uid\", `comment`.STAR AS \"star\", `comment`.CONTENT AS \"content\", `comment`.TIME AS \"time\" FROM `comment` WHERE `comment`.`PID` = " . (int)$pid . ";";
        } else if($sort == "high-first"){
            $query = "SELECT `comment`.ID AS \"id\", `comment`.PID AS \"pid\", `comment`.UID AS \"uid\", `comment`.STAR AS \"star\", `comment`.CONTENT AS \"content\", `comment`.TIME AS \"time\" FROM `comment` WHERE `comment`.`PID` = " . (int)$pid . " ORDER BY `comment`.STAR DESC;";
        } else if($sort == "low-first"){
            $query = "SELECT `comment`.ID AS \"id\", `comment`.PID AS \"pid\", `comment`.UID AS \"uid\", `comment`.STAR AS \"star\", `comment`.CONTENT AS \"content\", `comment`.TIME AS \"time\" FROM `comment` WHERE `comment`.`PID` = " . (int)$pid . " ORDER BY `comment`.STAR ASC;";
        }
        
        return mysqli_query($this->connect, $query);
    }
    public function get_cmt_user_name($uid) {
        $query = "SELECT `account`.FNAME AS \"uname\" FROM `account` WHERE `account`.`ID` = " . (int)$uid . ";";
        return mysqli_query($this->connect, $query);
    }
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
        $query = "DELETE FROM `news` WHERE `news`.`id`= ".$id;
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
    
    public function get_id_user($username, $pwd){
        $query =    "SELECT `account`.`ID` AS `id` FROM `account`
                    WHERE `account`.`USERNAME` = \"" . $username . "\"
                            AND `account`.`PWD` = \"" . $pwd ."\";";
        return mysqli_query($this->connect, $query);
    }
    function add_item_comment($content, $rating, $pid, $uid){
        $query = "INSERT INTO `comment`(`comment`.PID, `comment`.UID, `comment`.STAR, `comment`.CONTENT, `comment`.TIME) VALUE
                  (" . $pid . ", " . $uid . ", " . (int)$rating . ", \"" . $content . "\", \"" . date("Y/m/d") . "\")";
        return mysqli_query($this->connect, $query);
    }
    public function change_passwork($mail){
        $query =    "SELECT `account`.`EMAIL` AS `mail` FROM `account` WHERE `account`.`EMAIL` = \"" . $mail . "\";";
        return mysqli_query($this->connect, $query);
    }
    public function change_passwork_mail($mail, $pwd){
        $query =    "UPDATE `account`
                    SET `account`.`PWD` = \"" . $pwd . "\"
                    WHERE `account`.`EMAIL` = \"" . $mail . "\"";
        return mysqli_query($this->connect, $query);
    }
    public function get_sum_cart($id){
        $query =    "SELECT SUM(`product_in_cart`.`QUANTITY`*`product`.`PRICE`) 
                    FROM `product`, `product_in_cart`, `cart`, `account`
                    WHERE   `product_in_cart`.`PID` = `product`.`ID`
                        AND `product_in_cart`.`OID` = `cart`.`ID`
                        AND `cart`.`UID` = `account`.`ID`
                        AND `cart`.`STATE` = 1
                        AND `account`.`ID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function get_sum_order_Combo($id){
        $query =    "SELECT SUM(`combo`.`COST`) FROM `combo`, `order_combo`, `account`
                    WHERE `order_combo`.`CBID` = `combo`.`ID`
                        AND `order_combo`.`UID` = `account`.`ID`
                        AND `account`.`ID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function check_account_ban($cmnd){
        $query =    "SELECT `ban_account`.`ID` as `id`   FROM `ban_account` WHERE `ban_account`.`CMND` = \"" . $cmnd . "\"";
        return mysqli_query($this->connect, $query);
    }
    public function check_account_inside($cmnd, $mail){
        $query =    "SELECT `account`.`ID` as `id` FROM `account` WHERE `account`.`EMAIL` = \"" . $mail ."\" OR `account`.`CMND` = \"" . $cmnd . "\";";
        return mysqli_query($this->connect, $query);
    }
    public function create_account($fname, $cmnd, $mail, $user, $pwd){
        $query =    "INSERT INTO `account` (`account`.`CMND`, `account`.`FNAME`, `account`.`USERNAME`, `account`.`EMAIL`, `account`.`PWD`, `account`.`IMG_URL`)
                    VALUES (\"" . $cmnd . "\", \"" . $fname . "\", \"" . $user . "\", \"" . $mail . "\", \"" . $pwd . "\", \"./Views/images/np.png\")" ;
        return mysqli_query($this->connect, $query);
    }
}
?>