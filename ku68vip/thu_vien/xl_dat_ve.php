<?php
	require_once 'database.php';
	class xl_dat_ve extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM dat_ve WHERE 1 = 1 ";
			if($type == 'diem_di')
			{
				$sql .= " and diem_di like '%$keyword%'";
			}
			if($type == 'diem_den')
			{
				$sql .= " and diem_den like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM dat_ve";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM dat_ve";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM dat_ve WHERE 1 = 1 ";
			if($type == 'diem_di')
			{
				$sql .= " and diem_di like '%$keyword%'";
			}
			if($type == 'diem_den')
			{
				$sql .= " and diem_den like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from dat_ve where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
			
			$sql = "UPDATE dat_ve SET trang_thai = IF(trang_thai < 3, trang_thai + 1, 0) WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}
		function insert($hang_may_bay, $loai_ve, $diem_di, $diem_den, $ngay_di, $ngay_ve, $hang_ve, $nguoi_lon, $tre_em, $em_be, $ho_ten, $email, $dia_chi, $dien_thoai, $cmnd, $yeu_cau, $trang_thai)
		{
			$hang_may_bay = stripslashes($hang_may_bay);
			$hang_may_bay = addslashes($hang_may_bay);
			$loai_ve = intval($loai_ve);
			$diem_di = stripslashes($diem_di);
			$diem_di = addslashes($diem_di);
			$diem_den = stripslashes($diem_den);
			$diem_den = addslashes($diem_den);
			$hang_ve = stripslashes($hang_ve);
			$hang_ve = addslashes($hang_ve);
			$nguoi_lon = intval($nguoi_lon);
			$tre_em = intval($tre_em);
			$em_be = intval($em_be);
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$email = stripslashes($email);
			$email = addslashes($email);
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$cmnd = intval($cmnd);
			$yeu_cau = stripslashes($yeu_cau);
			$yeu_cau = addslashes($yeu_cau);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "insert into dat_ve(hang_may_bay, loai_ve, diem_di, diem_den, ngay_di, ngay_ve, hang_ve, nguoi_lon, tre_em, em_be, ho_ten, email, dia_chi, dien_thoai, cmnd, yeu_cau, trang_thai) values('$hang_may_bay', '$loai_ve', '$diem_di', '$diem_den', '$ngay_di', '$ngay_ve', '$hang_ve', '$nguoi_lon', '$tre_em', '$em_be', '$ho_ten', '$email', '$dia_chi', '$dien_thoai', '$cmnd', '$yeu_cau', '$trang_thai')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $hang_may_bay, $loai_ve, $diem_di, $diem_den, $ngay_di, $ngay_ve, $hang_ve, $nguoi_lon, $tre_em, $em_be, $ho_ten, $email, $dia_chi, $dien_thoai, $cmnd, $yeu_cau, $trang_thai)
		{
			$ma = intval($ma);
			
			$hang_may_bay = stripslashes($hang_may_bay);
			$hang_may_bay = addslashes($hang_may_bay);
			$loai_ve = intval($loai_ve);
			$diem_di = stripslashes($diem_di);
			$diem_di = addslashes($diem_di);
			$diem_den = stripslashes($diem_den);
			$diem_den = addslashes($diem_den);
			$hang_ve = stripslashes($hang_ve);
			$hang_ve = addslashes($hang_ve);
			$nguoi_lon = intval($nguoi_lon);
			$tre_em = intval($tre_em);
			$em_be = intval($em_be);
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$email = stripslashes($email);
			$email = addslashes($email);
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$cmnd = intval($cmnd);
			$yeu_cau = stripslashes($yeu_cau);
			$yeu_cau = addslashes($yeu_cau);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "UPDATE dat_ve SET hang_may_bay = '$hang_may_bay', 
				loai_ve = '$loai_ve', 
				diem_di = '$diem_di', 
				diem_den = '$diem_den', 
				ngay_di = '$ngay_di', 
				ngay_ve = '$ngay_ve', 
				hang_ve = '$hang_ve', 
				nguoi_lon = '$nguoi_lon', 
				tre_em = '$tre_em', 
				em_be = '$em_be', 
				ho_ten = '$ho_ten', 
				email = '$email', 
				dia_chi = '$dia_chi', 
				dien_thoai = '$dien_thoai', 
				cmnd = '$cmnd', 
				yeu_cau = '$yeu_cau', 
				trang_thai = '$trang_thai' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM dat_ve WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>