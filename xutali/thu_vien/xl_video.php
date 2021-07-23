<?php
require_once 'database.php';
class xl_video extends database
{
    function danh_sach($keyword, $type, $vitri, $record)
    {
        $sql = "SELECT * FROM video WHERE 1 = 1 ";
        if ($type == 'ten') {
            $sql .= " and ten like '%$keyword%'";
        }
        if ($type == 'link') {
            $sql .= " and link like '%$keyword%'";
        }
        if ($type == 'trang_thai') {
            $sql .= " and trang_thai = $keyword ";
        }
        $sql .= " LIMIT $vitri, $record";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
    function danh_sach_full()
    {
        $sql = "SELECT * FROM video";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
    function video()
    {
        $sql = "SELECT * FROM video WHERE trang_thai = 1 LIMIT 1";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
    function danh_sach_cot()
    {
        $sql = "SHOW COLUMNS FROM video";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
    function danh_sach_theo_chuoi_ma($ma)
    {
        $ma  = stripslashes($ma);
        $ma  = addslashes($ma);
        $sql = "SELECT * FROM video WHERE ma_loai IN($ma) AND trang_thai = 1";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
    function danh_sach_cung_loai($ma, $ma_loai)
    {
        $ma      = intval($ma);
        $ma_loai = intval($ma_loai);
        $sql     = "SELECT * FROM video WHERE ma_loai = $ma_loai AND ma <> $ma ORDER BY RAND() LIMIT 0, 15";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
    function so_luong($keyword, $type)
    {
        $sql = "SELECT COUNT(*) FROM video WHERE 1 = 1 ";
        if ($type == 'ten') {
            $sql .= " and ten like '%$keyword%'";
        }
        if ($type == 'link') {
            $sql .= " and link like '%$keyword%'";
        }
        if ($type == 'trang_thai') {
            $sql .= " and trang_thai = $keyword ";
        }
        $this->setQuery($sql);
        return $this->loadResult();
    }
    function cap_nhat_trang_thai($ma)
    {
        $ma  = intval($ma);
        $sql = "UPDATE video SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
        $this->setQuery($sql);
        return $this->query();
    }
    function chi_tiet($ma)
    {
        $ma  = intval($ma);
        $sql = "select * from video where ma = '$ma' limit 0, 1";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    function insert($ten, $ma_loai, $link, $trang_thai, $hinh)
    {
        $ten        = stripslashes($ten);
        $ten        = addslashes($ten);
        $ma_loai    = intval($ma_loai);
        $link       = stripslashes($link);
        $link       = addslashes($link);
        $trang_thai = intval($trang_thai);
        $hinh       = stripslashes($hinh);
        $hinh       = addslashes($hinh);
        $sql        = "insert into video(ten, ma_loai, link, trang_thai, hinh) values('$ten', '$ma_loai', '$link', '$trang_thai', '$hinh')";
        $this->setQuery($sql);
        return $this->query();
    }
    function update($ma, $ten, $ma_loai, $link, $trang_thai, $hinh)
    {
        $ma         = intval($ma);
        $ten        = stripslashes($ten);
        $ten        = addslashes($ten);
        $ma_loai    = intval($ma_loai);
        $link       = stripslashes($link);
        $link       = addslashes($link);
        $trang_thai = intval($trang_thai);
        $hinh       = stripslashes($hinh);
        $hinh       = addslashes($hinh);
        if ($hinh == '') {
            $sql = "UPDATE video SET ten = '$ten', 

					ma_loai = '$ma_loai', 

					link = '$link', 

					trang_thai = '$trang_thai'				

					WHERE ma = '$ma'";
        } else {
            $sql = "UPDATE video SET ten = '$ten', 

					ma_loai = '$ma_loai', 

					link = '$link', 

					trang_thai = '$trang_thai', 

					hinh = '$hinh' 

					WHERE ma = '$ma'";
        }
        $this->setQuery($sql);
        return $this->query();
    }
    function delete($ma)
    {
        $ma  = intval($ma);
        $sql = "DELETE FROM video WHERE ma = '$ma'";
        $this->setQuery($sql);
        return $this->query();
    }
    function danh_sach_video()
    {
        $sql = "SELECT * FROM video WHERE trang_thai = 1";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
}
?>