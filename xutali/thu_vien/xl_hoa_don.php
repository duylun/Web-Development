<?php
	require_once 'database.php';
	class xl_hoa_don extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM hoa_don WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'gioi_tinh')
			{
				$sql .= " and gioi_tinh = $keyword ";
			}
			if($type == 'dia_chi')
			{
				$sql .= " and dia_chi like '%$keyword%'";
			}
			if($type == 'dien_thoai')
			{
				$sql .= " and dien_thoai like '%$keyword%'";
			}
			if($type == 'ngay_tao')
			{
				$sql .= " and ngay_tao = $keyword ";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM hoa_don";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_ma_nguoi_dung($ma)
		{
			$ma = intval($ma);
			
			$sql = "SELECT * FROM hoa_don WHERE ma_nguoi_dung = $ma";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM hoa_don";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_theo_ngay($ngay)
		{
			$from = date("$ngay 0:0:0");
			$to = date("$ngay 23:59:59");
			
			$sql = "select count(*) from hoa_don where ngay_tao between '$from' and '$to'";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM hoa_don WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'gioi_tinh')
			{
				$sql .= " and gioi_tinh = $keyword ";
			}
			if($type == 'dia_chi')
			{
				$sql .= " and dia_chi like '%$keyword%'";
			}
			if($type == 'dien_thoai')
			{
				$sql .= " and dien_thoai like '%$keyword%'";
			}
			if($type == 'ngay_tao')
			{
				$sql .= " and ngay_tao = $keyword ";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
			
			$sql = "UPDATE hoa_don SET trang_thai = IF(trang_thai < 3, trang_thai + 1, 0) WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			$sql = "select * from hoa_don where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function chi_tiet_theo_ma_nguoi_dung($ma, $ma_nguoi_dung)
		{
			$ma = intval($ma);
			$ma_nguoi_dung= intval($ma_nguoi_dung);
			
			$sql = "select * from hoa_don where ma = '$ma' AND ma_nguoi_dung = $ma_nguoi_dung limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function chi_tiet_theo_code($code)
		{
			$code = stripslashes($code);
			$code = addslashes($code);
			
			$sql = "select * from hoa_don where code = '$code' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($code, $ma_nguoi_dung, $ho_ten, $gioi_tinh, $ngay_sinh, $dia_chi, $email, $dien_thoai, $ngay_tao, $trang_thai, $ghi_chu, $tong_tien, $ho_ten_nguoi_nhan, $dia_chi_nguoi_nhan, $dien_thoai_nguoi_nhan, $ma_cuoc_phi_van_chuyen, $ma_phuong_thuc_thanh_toan, $ten_cong_ty, $ma_so_thue, $dia_chi_cong_ty)
		{
			$code = stripslashes($code);
			$code = addslashes($code);
			$ma_nguoi_dung = intval($ma_nguoi_dung);
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$gioi_tinh = intval($gioi_tinh);
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);
			$email = stripslashes($email);
			$email = addslashes($email);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$trang_thai = intval($trang_thai);
			$ghi_chu = stripslashes($ghi_chu);
			$ghi_chu = addslashes($ghi_chu);
			$tong_tien = intval($tong_tien);
			$ho_ten_nguoi_nhan = stripslashes($ho_ten_nguoi_nhan);
			$ho_ten_nguoi_nhan = addslashes($ho_ten_nguoi_nhan);
			$dia_chi_nguoi_nhan = stripslashes($dia_chi_nguoi_nhan);
			$dia_chi_nguoi_nhan = addslashes($dia_chi_nguoi_nhan);
			$dien_thoai_nguoi_nhan = stripslashes($dien_thoai_nguoi_nhan);
			$dien_thoai_nguoi_nhan = addslashes($dien_thoai_nguoi_nhan);
			$ma_cuoc_phi_van_chuyen = stripslashes($ma_cuoc_phi_van_chuyen);
			$ma_cuoc_phi_van_chuyen = addslashes($ma_cuoc_phi_van_chuyen);
			$ma_phuong_thuc_thanh_toan = stripslashes($ma_phuong_thuc_thanh_toan);
			$ma_phuong_thuc_thanh_toan = addslashes($ma_phuong_thuc_thanh_toan);
			$ten_cong_ty = stripslashes($ten_cong_ty);
			$ten_cong_ty = addslashes($ten_cong_ty);
			$ma_so_thue = stripslashes($ma_so_thue);
			$ma_so_thue = addslashes($ma_so_thue);
			$dia_chi_cong_ty = stripslashes($dia_chi_cong_ty);
			$dia_chi_cong_ty = addslashes($dia_chi_cong_ty);
			
			$sql = "insert into hoa_don(code, ma_nguoi_dung, ho_ten, gioi_tinh, ngay_sinh, dia_chi, email, dien_thoai, ngay_tao, trang_thai, ghi_chu, tong_tien, ho_ten_nguoi_nhan, dia_chi_nguoi_nhan, dien_thoai_nguoi_nhan, ma_cuoc_phi_van_chuyen, ma_phuong_thuc_thanh_toan, ten_cong_ty, ma_so_thue, dia_chi_cong_ty) values('$code', '$ma_nguoi_dung', '$ho_ten', '$gioi_tinh', '$ngay_sinh', '$dia_chi', '$email', '$dien_thoai', '$ngay_tao', '$trang_thai', '$ghi_chu', '$tong_tien', '$ho_ten_nguoi_nhan', '$dia_chi_nguoi_nhan', '$dien_thoai_nguoi_nhan', '$ma_cuoc_phi_van_chuyen', '$ma_phuong_thuc_thanh_toan', '$ten_cong_ty', '$ma_so_thue', '$dia_chi_cong_ty')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $code, $ho_ten, $gioi_tinh, $ngay_sinh, $dia_chi, $email, $dien_thoai, $ngay_tao, $trang_thai, $ghi_chu, $tong_tien, $ho_ten_nguoi_nhan, $dia_chi_nguoi_nhan, $dien_thoai_nguoi_nhan, $ma_cuoc_phi_van_chuyen, $ma_phuong_thuc_thanh_toan, $ten_cong_ty, $ma_so_thue, $dia_chi_cong_ty)
		{
			$ma = intval($ma);
			$code = stripslashes($code);
			$code = addslashes($code);
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$gioi_tinh = intval($gioi_tinh);
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);
			$email = stripslashes($email);
			$email = addslashes($email);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$trang_thai = intval($trang_thai);
			$ghi_chu = stripslashes($ghi_chu);
			$ghi_chu = addslashes($ghi_chu);
			$tong_tien = intval($tong_tien);
			$ho_ten_nguoi_nhan = stripslashes($ho_ten_nguoi_nhan);
			$ho_ten_nguoi_nhan = addslashes($ho_ten_nguoi_nhan);
			$dia_chi_nguoi_nhan = stripslashes($dia_chi_nguoi_nhan);
			$dia_chi_nguoi_nhan = addslashes($dia_chi_nguoi_nhan);
			$dien_thoai_nguoi_nhan = stripslashes($dien_thoai_nguoi_nhan);
			$dien_thoai_nguoi_nhan = addslashes($dien_thoai_nguoi_nhan);
			$ma_cuoc_phi_van_chuyen = stripslashes($ma_cuoc_phi_van_chuyen);
			$ma_cuoc_phi_van_chuyen = addslashes($ma_cuoc_phi_van_chuyen);
			$ma_phuong_thuc_thanh_toan = stripslashes($ma_phuong_thuc_thanh_toan);
			$ma_phuong_thuc_thanh_toan = addslashes($ma_phuong_thuc_thanh_toan);
			$ten_cong_ty = stripslashes($ten_cong_ty);
			$ten_cong_ty = addslashes($ten_cong_ty);
			$ma_so_thue = stripslashes($ma_so_thue);
			$ma_so_thue = addslashes($ma_so_thue);
			$dia_chi_cong_ty = stripslashes($dia_chi_cong_ty);
			$dia_chi_cong_ty = addslashes($dia_chi_cong_ty);
			
			$sql = "UPDATE hoa_don SET code = '$code',
				ho_ten = '$ho_ten', 
				gioi_tinh = '$gioi_tinh', 
				ngay_sinh = '$ngay_sinh', 
				dia_chi = '$dia_chi', 
				email = '$email', 
				dien_thoai = '$dien_thoai', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai', 
				ghi_chu = '$ghi_chu', 
				tong_tien = '$tong_tien', 
				ho_ten_nguoi_nhan = '$ho_ten_nguoi_nhan', 
				dia_chi_nguoi_nhan = '$dia_chi_nguoi_nhan', 
				dien_thoai_nguoi_nhan = '$dien_thoai_nguoi_nhan', 
				ma_cuoc_phi_van_chuyen = '$ma_cuoc_phi_van_chuyen', 
				ma_phuong_thuc_thanh_toan = '$ma_phuong_thuc_thanh_toan',
				ten_cong_ty = '$ten_cong_ty',
				ma_so_thue = '$ma_so_thue',
				dia_chi_cong_ty = '$dia_chi_cong_ty'  
				WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			$sql = "DELETE FROM hoa_don WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update_tong_tien($ma, $tong_tien)
		{
			$ma = intval($ma);						
			$tong_tien = intval($tong_tien);			
			
			$sql = "UPDATE hoa_don SET tong_tien = '$tong_tien' WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function danh_sach_email()
		{
			$sql = "SELECT DISTINCT email FROM hoa_don";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_all_email()
		{
			$sql = "SELECT email FROM hoa_don UNION SELECT email FROM subcribe UNION SELECT email FROM thanh_vien";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>