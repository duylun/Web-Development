<?php
	require_once 'database.php';
	class xl_chi_tiet_hoa_don extends database
	{
		
		function san_pham_ban_chay()
		{
			$sql = "SELECT ma_san_pham FROM chi_tiet_hoa_don GROUP BY ma_san_pham";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM chi_tiet_hoa_don WHERE 1 = 1 ";
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM chi_tiet_hoa_don";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_ma_don_hang($ma)
		{
			$ma = intval($ma);
			
			$sql = "SELECT * FROM chi_tiet_hoa_don WHERE ma_hoa_don = $ma";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM chi_tiet_hoa_don";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM chi_tiet_hoa_don WHERE 1 = 1 ";
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			$sql = "select * from chi_tiet_hoa_don where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ma_hoa_don, $ma_san_pham, $ten_san_pham, $so_luong, $don_gia, $thanh_tien)
		{
			$ma_hoa_don = intval($ma_hoa_don);
			$ma_san_pham = intval($ma_san_pham);
			$ten_san_pham = stripslashes($ten_san_pham);
			$ten_san_pham = addslashes($ten_san_pham);
			$so_luong = intval($so_luong);
			$don_gia = intval($don_gia);
			$thanh_tien = intval($thanh_tien);
			
			$sql = "insert into chi_tiet_hoa_don(ma_hoa_don, ma_san_pham, ten_san_pham, so_luong, don_gia, thanh_tien) values('$ma_hoa_don', '$ma_san_pham', '$ten_san_pham', '$so_luong', '$don_gia', '$thanh_tien')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ma_hoa_don, $ma_san_pham, $ten_san_pham, $so_luong, $don_gia, $thanh_tien)
		{
			$ma = intval($ma);
			
			$ma_hoa_don = intval($ma_hoa_don);
			$ma_san_pham = intval($ma_san_pham);
			$ten_san_pham = stripslashes($ten_san_pham);
			$ten_san_pham = addslashes($ten_san_pham);
			$so_luong = intval($so_luong);
			$don_gia = intval($don_gia);
			$thanh_tien = intval($thanh_tien);
			
			$sql = "UPDATE chi_tiet_hoa_don SET ma_hoa_don = '$ma_hoa_don', 
				ma_san_pham = '$ma_san_pham', 
				ten_san_pham = '$ten_san_pham', 
				so_luong = '$so_luong', 
				don_gia = '$don_gia', 
				thanh_tien = '$thanh_tien' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			$sql = "DELETE FROM chi_tiet_hoa_don WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>