<?php
	require_once 'database.php';
	class xl_thanh_vien extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM thanh_vien WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'username')
			{
				$sql .= " and username like '%$keyword%'";
			}
			if($type == 'dia_chi')
			{
				$sql .= " and dia_chi like '%$keyword%'";
			}
			if($type == 'email')
			{
				$sql .= " and email like '%$keyword%'";
			}
			if($type == 'dien_thoai')
			{
				$sql .= " and dien_thoai like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM thanh_vien";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM thanh_vien";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_email()
		{
			$sql = "SELECT email FROM thanh_vien";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM thanh_vien WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'username')
			{
				$sql .= " and username like '%$keyword%'";
			}
			if($type == 'dia_chi')
			{
				$sql .= " and dia_chi like '%$keyword%'";
			}
			if($type == 'email')
			{
				$sql .= " and email like '%$keyword%'";
			}
			if($type == 'dien_thoai')
			{
				$sql .= " and dien_thoai like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			$sql = "select * from thanh_vien where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE thanh_vien SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function cap_nhat_giam_gia($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE thanh_vien SET giam_gia = 1 WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function dang_nhap($username, $mat_khau)
		{
			$username = stripslashes($username);
			$username = addslashes($username);
			$mat_khau = stripslashes($mat_khau);
			$mat_khau = addslashes($mat_khau);
			//Mã hóa mật khẩu
			$mat_khau = md5($mat_khau);
			$sql = "select * from thanh_vien where username = '$username' and mat_khau = '$mat_khau' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ho_ten, $username, $mat_khau, $ngay_sinh, $gioi_tinh, $dia_chi, $email, $dien_thoai, $ten_cong_ty, $ma_so_thue, $trang_thai, $code)
		{
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$username = stripslashes($username);
			$username = addslashes($username);
			$mat_khau = stripslashes($mat_khau);
			$mat_khau = addslashes($mat_khau);
			$mat_khau = md5($mat_khau);
			$gioi_tinh = intval($gioi_tinh);
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);
			$email = stripslashes($email);
			$email = addslashes($email);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$ten_cong_ty = stripslashes($ten_cong_ty);
			$ten_cong_ty = addslashes($ten_cong_ty);
			$ma_so_thue = stripslashes($ma_so_thue);
			$ma_so_thue = addslashes($ma_so_thue);
			$trang_thai = intval($trang_thai);
			$code = stripslashes($code);
			$code = addslashes($code);
			if($ngay_sinh == '')
				$ngay_sinh = date('Y-m-d');
			
			$sql = "insert into thanh_vien(ho_ten, username, mat_khau, ngay_sinh, gioi_tinh, dia_chi, email, dien_thoai, ten_cong_ty, ma_so_thue, trang_thai, code) values('$ho_ten', '$username', '$mat_khau', '$ngay_sinh', '$gioi_tinh', '$dia_chi', '$email', '$dien_thoai', '$ten_cong_ty', '$ma_so_thue', '$trang_thai', '$code')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ho_ten, $username, $mat_khau, $dia_chi, $email, $dien_thoai, $ten_cong_ty, $ma_so_thue, $trang_thai)
		{
			$ma = intval($ma);
			
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$username = stripslashes($username);
			$username = addslashes($username);
			$mat_khau = stripslashes($mat_khau);
			$mat_khau = addslashes($mat_khau);
			//$mat_khau = md5($mat_khau);
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);
			$email = stripslashes($email);
			$email = addslashes($email);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$ten_cong_ty = stripslashes($ten_cong_ty);
			$ten_cong_ty = addslashes($ten_cong_ty);
			$ma_so_thue = stripslashes($ma_so_thue);
			$ma_so_thue = addslashes($ma_so_thue);
			$trang_thai = intval($trang_thai);
			
			$sql = "UPDATE thanh_vien SET ho_ten = '$ho_ten', 
				username = '$username', 
				mat_khau = '$mat_khau', 
				dia_chi = '$dia_chi', 
				email = '$email', 
				dien_thoai = '$dien_thoai', 
				ten_cong_ty = '$ten_cong_ty', 
				ma_so_thue = '$ma_so_thue', 
				trang_thai = '$trang_thai' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			$sql = "DELETE FROM thanh_vien WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function update_thong_tin($ma, $ho_ten, $dia_chi, $dien_thoai, $ten_cong_ty, $ma_so_thue)
		{
			$ma = intval($ma);
			
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);					
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);			
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$ten_cong_ty = stripslashes($ten_cong_ty);
			$ten_cong_ty = addslashes($ten_cong_ty);
			$ma_so_thue = stripslashes($ma_so_thue);
			$ma_so_thue = addslashes($ma_so_thue);
			$sql = "UPDATE thanh_vien SET ho_ten = '$ho_ten', 								
				dia_chi = '$dia_chi', 
				dien_thoai = '$dien_thoai', 
				ten_cong_ty = '$ten_cong_ty', 
				ma_so_thue = '$ma_so_thue'
				WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function update_thanh_vien($ma, $ho_ten, $username, $dia_chi, $email, $dien_thoai, $ten_cong_ty, $ma_so_thue)
		{
			$ma = intval($ma);
			
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$username = stripslashes($username);
			$username = addslashes($username);			
			$dia_chi = stripslashes($dia_chi);
			$dia_chi = addslashes($dia_chi);
			$email = stripslashes($email);
			$email = addslashes($email);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$ten_cong_ty = stripslashes($ten_cong_ty);
			$ten_cong_ty = addslashes($ten_cong_ty);
			$ma_so_thue = stripslashes($ma_so_thue);
			$ma_so_thue = addslashes($ma_so_thue);		
			
			$sql = "UPDATE thanh_vien SET ho_ten = '$ho_ten', 
				username = '$username', 				
				dia_chi = '$dia_chi', 
				email = '$email', 
				dien_thoai = '$dien_thoai', 
				ten_cong_ty = '$ten_cong_ty', 
				ma_so_thue = '$ma_so_thue'				
				WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function kiem_tra_email($email)
		{
			$email = stripslashes($email);
			$email = addslashes($email);
			$sql = "select * from thanh_vien where email = '$email' LIMIT 1";			
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function kiem_tra_username($username)
		{
			$username = stripslashes($username);
			$username = addslashes($username);
			$sql = "select * from thanh_vien where username = '$username' LIMIT 1";			
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function kiem_tra_confirm($username)
		{
			$username = stripslashes($username);
			$username = addslashes($username);
			$sql = "select * from thanh_vien where username = '$username' and trang_thai = 1 LIMIT 1";			
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function confirm($username)
		{
			$username = stripslashes($username);
			$username = addslashes($username);
			$sql = "update thanh_vien set trang_thai = 1 where username = '$username'";
			$this->setQuery($sql);
			return $this->query();
		}
		function update_code($email, $code)
		{
			$code = stripslashes($code);
			$code = addslashes($code);
			$email = stripslashes($email);
			$email = addslashes($email);
			
			$sql = "update thanh_vien set code = '$code' where email = '$email'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update_pass($email, $code, $pass)
		{
			$code = stripslashes($code);
			$code = addslashes($code);
			$email = stripslashes($email);
			$email = addslashes($email);
			$pass = stripslashes($pass);
			$pass = addslashes($pass);
			$pass = md5($pass);
			
			$sql = "update thanh_vien set mat_khau = '$pass' WHERE code = '$code' AND email = '$email'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function change_pass($ma, $pass)
		{
			$ma = intval($ma);
			$pass = stripslashes($pass);
			$pass = addslashes($pass);
			$pass = md5($pass);
			
			$sql = "update thanh_vien set mat_khau = '$pass' WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
	}
?>