<?php
require_once("model.php");
class Cart extends Model
{
    function detail_sp($id)
    {
        $query =  "SELECT * from SanPham where MaSP = $id ";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    function get_km($id)
    {
        $query =  "SELECT * from khuyenmai where MaKM = $id ";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
}