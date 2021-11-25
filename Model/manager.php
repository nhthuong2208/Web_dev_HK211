<?php
class manager extends DB{

    public function SinhVien(){
        $qr = "SELECT * FROM sinhvien";
        return mysqli_query($this->con, $qr);
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

}
?>