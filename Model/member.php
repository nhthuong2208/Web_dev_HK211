<?php
class member extends customerModel{

    public function SinhVien(){
        $qr = "SELECT * FROM sinhvien";
        return mysqli_query($this->con, $qr);
    }

}
?>