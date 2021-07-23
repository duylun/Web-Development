<?php
	require_once 'database.php';
	class xl_kd_user extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM kd_user WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'username')
			{
				$sql .= " and username like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM kd_user";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM kd_user";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM kd_user WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'username')
			{
				$sql .= " and username like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from kd_user where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten, $username, $pass, $email, $rule_them, $rule_xoa, $rule_sua, $trang_thai)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$username = stripslashes($username);
			$username = addslashes($username);
			$pass = stripslashes($pass);
			$pass = addslashes($pass);
			$email = stripslashes($email);
			$email = addslashes($email);
			$rule_them = intval($rule_them);
			$rule_xoa = intval($rule_xoa);
			$rule_sua = intval($rule_sua);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "insert into kd_user(ten, username, pass, email, rule_them, rule_xoa, rule_sua, trang_thai) values('$ten', '$username', '$pass', '$email', '$rule_them', '$rule_xoa', '$rule_sua', '$trang_thai')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $username, $pass, $email, $rule_them, $rule_xoa, $rule_sua, $trang_thai)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$username = stripslashes($username);
			$username = addslashes($username);
			$pass = stripslashes($pass);
			$pass = addslashes($pass);
			$email = stripslashes($email);
			$email = addslashes($email);
			$rule_them = intval($rule_them);
			$rule_xoa = intval($rule_xoa);
			$rule_sua = intval($rule_sua);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "UPDATE kd_user SET ten = '$ten', 
				username = '$username', 
				pass = '$pass', 
				email = '$email', 
				rule_them = '$rule_them', 
				rule_xoa = '$rule_xoa', 
				rule_sua = '$rule_sua', 
				trang_thai = '$trang_thai' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM kd_user WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function kiem_tra_email($email)
		{
			$email = stripslashes($email);
			$email = addslashes($email);
			$sql = "select * from kd_user where email = '$email' LIMIT 1";			
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function kiem_tra_email_update($ma, $email)
		{
			$ma = intval($ma);
			$email = stripslashes($email);
			$email = addslashes($email);
			$sql = "select * from kd_user where email = '$email' AND ma <> '$ma' LIMIT 1";			
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function kiem_tra_username($username)
		{
			$username = stripslashes($username);
			$username = addslashes($username);
			$sql = "select * from kd_user where username = '$username' LIMIT 1";			
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function kiem_tra_username_update($ma, $username)
		{
			$ma = intval($ma);
			$username = stripslashes($username);
			$username = addslashes($username);
			$sql = "select * from kd_user where username = '$username' AND ma <> '$ma' LIMIT 1";			
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE kd_user SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function cap_nhat_quyen_them($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE kd_user SET rule_them= 1 - rule_them WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function cap_nhat_quyen_xoa($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE kd_user SET rule_xoa= 1 - rule_xoa WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function cap_nhat_quyen_sua($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE kd_user SET rule_sua= 1 - rule_sua WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function dang_nhap($username, $pass)
		{
			$username = stripslashes($username);
			$username = addslashes($username);
			$pass = stripslashes($pass);
			$pass = addslashes($pass);
			//Mã hóa mật khẩu
			//$pass = md5($pass);
			$sql = "select * from kd_user where username = '$username' and pass = '$pass' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
	}
?>