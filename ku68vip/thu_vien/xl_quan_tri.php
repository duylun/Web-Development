<?php
	require_once 'database.php';
	class xl_quan_tri extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM quan_tri WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'ten_dang_nhap')
			{
				$sql .= " and ten_dang_nhap like '%$keyword%'";
			}
			if($type == 'email')
			{
				$sql .= " and email like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM quan_tri";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM quan_tri";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM quan_tri WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'ten_dang_nhap')
			{
				$sql .= " and ten_dang_nhap like '%$keyword%'";
			}
			if($type == 'email')
			{
				$sql .= " and email like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			$sql = "select * from quan_tri where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE quan_tri SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function dang_nhap($ten_dang_nhap, $mat_khau)
		{
			$ten_dang_nhap = stripslashes($ten_dang_nhap);
			$ten_dang_nhap = addslashes($ten_dang_nhap);
			$mat_khau = stripslashes($mat_khau);
			$mat_khau = addslashes($mat_khau);
			//Mã hóa mật khẩu
			$mat_khau = md5($mat_khau);
			$sql = "select * from quan_tri where ten_dang_nhap = '$ten_dang_nhap' and mat_khau = '$mat_khau' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ho_ten, $ten_dang_nhap, $mat_khau, $email, $ngay_tao, $lan_dang_nhap_cuoi, $trang_thai, $is_admin)
		{
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$ten_dang_nhap = stripslashes($ten_dang_nhap);
			$ten_dang_nhap = addslashes($ten_dang_nhap);
			$mat_khau = stripslashes($mat_khau);
			$mat_khau = addslashes($mat_khau);
			$mat_khau = md5($mat_khau);
			$email = stripslashes($email);
			$email = addslashes($email);
			$trang_thai = intval($trang_thai);
			$is_admin = intval($is_admin);
			
			$sql = "insert into quan_tri(ho_ten, ten_dang_nhap, mat_khau, email, ngay_tao, lan_dang_nhap_cuoi, trang_thai, is_admin) values('$ho_ten', '$ten_dang_nhap', '$mat_khau', '$email', '$ngay_tao', '$lan_dang_nhap_cuoi', '$trang_thai', '$is_admin')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ho_ten, $ten_dang_nhap, $email, $ngay_tao, $lan_dang_nhap_cuoi, $trang_thai, $is_admin)
		{
			$ma = intval($ma);
			
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$ten_dang_nhap = stripslashes($ten_dang_nhap);
			$ten_dang_nhap = addslashes($ten_dang_nhap);
			/*$mat_khau = stripslashes($mat_khau);
			$mat_khau = addslashes($mat_khau);*/
			$mat_khau = md5($mat_khau);
			$email = stripslashes($email);
			$email = addslashes($email);
			$trang_thai = intval($trang_thai);
			$is_admin = intval($is_admin);
			
			$sql = "UPDATE quan_tri SET ho_ten = '$ho_ten', 
				ten_dang_nhap = '$ten_dang_nhap', 				
				email = '$email', 
				ngay_tao = '$ngay_tao', 
				lan_dang_nhap_cuoi = '$lan_dang_nhap_cuoi', 
				trang_thai = '$trang_thai',
				is_admin = '$is_admin'  
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			$sql = "DELETE FROM quan_tri WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		
		function dang_nhap_lan_cuoi($ma, $time)
		{
			$ma = intval($ma);
			
			$sql = "UPDATE quan_tri SET lan_dang_nhap_cuoi = '$time' WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function kiem_tra_email($email)
		{
			$email = stripslashes($email);
			$email = addslashes($email);
			
			$sql = "SELECT email FROM quan_tri WHERE email = '$email' LIMIT 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function kiem_tra_username($username)
		{
			$username = stripslashes($username);
			$username = addslashes($username);
			$sql = "SELECT * FROM quan_tri WHERE ten_dang_nhap = '$username' LIMIT 1";			
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function cap_nhat_mat_khau($email, $pass)
		{
			$email = stripslashes($email);
			$email = addslashes($email);
			
			$pass = stripslashes($pass);
			$pass = addslashes($pass);
			$pass = md5($pass);
			
			$sql = "UPDATE quan_tri SET mat_khau = '$pass' WHERE email = '$email'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function doi_mat_khau($pass)
		{		
			$pass = stripslashes($pass);
			$pass = addslashes($pass);
			$pass = md5($pass);
			
			$sql = "UPDATE quan_tri SET mat_khau = '$pass'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>