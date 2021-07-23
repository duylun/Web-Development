<?php
	require_once 'database.php';
	class xl_tuyen_dung extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM tuyen_dung WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'ngay_sinh')
			{
				$sql .= " and ngay_sinh like '%$keyword%' ";
			}
			if($type == 'gioi_tinh')
			{
				$sql .= " and gioi_tinh = $keyword ";
			}
			if($type == 'vi_tri_ung_tuyen')
			{
				$sql .= " and vi_tri_ung_tuyen like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM tuyen_dung";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM tuyen_dung";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM tuyen_dung WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'ngay_sinh')
			{
				$sql .= " and ngay_sinh = $keyword ";
			}
			if($type == 'gioi_tinh')
			{
				$sql .= " and gioi_tinh = $keyword ";
			}
			if($type == 'vi_tri_ung_tuyen')
			{
				$sql .= " and vi_tri_ung_tuyen like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			$sql = "select * from tuyen_dung where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE tuyen_dung SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function insert($ho_ten, $ngay_sinh, $gioi_tinh, $dia_chi, $dien_thoai, $email, $vi_tri_ung_tuyen, $tu_gioi_thieu, $trang_thai)
		{
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$gioi_tinh = intval($gioi_tinh);
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$email = stripslashes($email);
			$email = addslashes($email);
			$vi_tri_ung_tuyen = stripslashes($vi_tri_ung_tuyen);
			$vi_tri_ung_tuyen = addslashes($vi_tri_ung_tuyen);
			$tu_gioi_thieu = stripslashes($tu_gioi_thieu);
			$tu_gioi_thieu = addslashes($tu_gioi_thieu);
			$trang_thai = intval($trang_thai);
			
			$sql = "insert into tuyen_dung(ho_ten, ngay_sinh, gioi_tinh, dia_chi, dien_thoai, email, vi_tri_ung_tuyen, tu_gioi_thieu, trang_thai) values('$ho_ten', '$ngay_sinh', '$gioi_tinh', '$dia_chi', '$dien_thoai', '$email', '$vi_tri_ung_tuyen', '$tu_gioi_thieu', '$trang_thai')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ho_ten, $ngay_sinh, $gioi_tinh, $dia_chi, $dien_thoai, $email, $vi_tri_ung_tuyen, $tu_gioi_thieu, $trang_thai)
		{
			$ma = intval($ma);
			
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$gioi_tinh = intval($gioi_tinh);
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$email = stripslashes($email);
			$email = addslashes($email);
			$vi_tri_ung_tuyen = stripslashes($vi_tri_ung_tuyen);
			$vi_tri_ung_tuyen = addslashes($vi_tri_ung_tuyen);
			$tu_gioi_thieu = stripslashes($tu_gioi_thieu);
			$tu_gioi_thieu = addslashes($tu_gioi_thieu);
			$trang_thai = intval($trang_thai);
			
			$sql = "UPDATE tuyen_dung SET ho_ten = '$ho_ten', 
				ngay_sinh = '$ngay_sinh', 
				gioi_tinh = '$gioi_tinh', 
				dia_chi = '$dia_chi', 
				dien_thoai = '$dien_thoai', 
				email = '$email', 
				vi_tri_ung_tuyen = '$vi_tri_ung_tuyen', 
				tu_gioi_thieu = '$tu_gioi_thieu', 
				trang_thai = '$trang_thai' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			$sql = "DELETE FROM tuyen_dung WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>