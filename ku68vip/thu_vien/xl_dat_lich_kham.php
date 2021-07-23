<?php
	require_once 'database.php';
	class xl_dat_lich_kham extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM dat_lich_kham WHERE 1 = 1 ";
			if($type == 'code')
			{
				$sql .= " and code like '%$keyword%'";
			}
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM dat_lich_kham";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_theo_ma_nguoi_dung($ma_nguoi_dung)
		{
			$ma_nguoi_dung = intval($ma_nguoi_dung);

			$sql = "SELECT * FROM dat_lich_kham WHERE ma_nguoi_dung = $ma_nguoi_dung ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM dat_lich_kham";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM dat_lich_kham WHERE 1 = 1 ";
			if($type == 'code')
			{
				$sql .= " and code like '%$keyword%'";
			}
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from dat_lich_kham where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function chi_tiet_theo_ma_nguoi_dung($ma, $ma_nguoi_dung)
		{
			$ma = intval($ma);
			$ma_nguoi_dung= intval($ma_nguoi_dung);
			
			$sql = "select * from dat_lich_kham where ma = '$ma' AND ma_nguoi_dung = $ma_nguoi_dung limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
			
			$sql = "UPDATE dat_lich_kham SET trang_thai = IF(trang_thai < 2, trang_thai + 1, 0) WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}
		function insert($ma_nguoi_dung, $ma_khoa, $code, $ngay_kham, $ho_ten, $ngay_sinh, $gioi_tinh, $dien_thoai, $email, $dia_chi, $ngay_tao, $trang_thai, $hinh)
		{
			$ma_nguoi_dung = intval($ma_nguoi_dung);
			$ma_khoa = intval($ma_khoa);
			$code = stripslashes($code);
			$code = addslashes($code);
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$gioi_tinh = intval($gioi_tinh);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$email = stripslashes($email);
			$email = addslashes($email);
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			
			
			$sql = "insert into dat_lich_kham(ma_nguoi_dung, ma_khoa, code, ngay_kham, ho_ten, ngay_sinh, gioi_tinh, dien_thoai, email, dia_chi, ngay_tao, trang_thai, hinh) values('$ma_nguoi_dung', '$ma_khoa', '$code', '$ngay_kham', '$ho_ten', '$ngay_sinh', '$gioi_tinh', '$dien_thoai', '$email', '$dia_chi', '$ngay_tao', '$trang_thai', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ma_nguoi_dung, $ma_khoa, $code, $ngay_kham, $ho_ten, $ngay_sinh, $gioi_tinh, $dien_thoai, $email, $dia_chi, $ngay_tao, $trang_thai, $hinh)
		{
			$ma = intval($ma);
			
			$ma_nguoi_dung = intval($ma_nguoi_dung);
			$ma_khoa = intval($ma_khoa);
			$code = stripslashes($code);
			$code = addslashes($code);
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$gioi_tinh = intval($gioi_tinh);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$email = stripslashes($email);
			$email = addslashes($email);
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			
			
			$sql = "UPDATE dat_lich_kham SET ma_nguoi_dung = '$ma_nguoi_dung', 
				ma_khoa = '$ma_khoa', 
				code = '$code', 
				ngay_kham = '$ngay_kham', 
				ho_ten = '$ho_ten', 
				ngay_sinh = '$ngay_sinh', 
				gioi_tinh = '$gioi_tinh', 
				dien_thoai = '$dien_thoai', 
				email = '$email', 
				dia_chi = '$dia_chi', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai', 
				hinh = '$hinh' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM dat_lich_kham WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function them_hinh($ma, $hinh)
		{
			$ma = intval($ma);
			$sql = "UPDATE dat_lich_kham SET hinh = CONCAT(hinh, '$hinh') WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}
		function xoa_hinh($ma, $hinh)
		{
			$ma = intval($ma);
			$sql = "UPDATE dat_lich_kham SET hinh = '$hinh' WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}

		function kiem_tra_code($code)
		{
			$code = stripslashes($code);
			$code = addslashes($code);

			$sql = "SELECT * FROM dat_lich_kham WHERE code = '$code' LIMIT 1";			
			$this->setQuery($sql);
			return $this->loadRow();
		}
	}
?>