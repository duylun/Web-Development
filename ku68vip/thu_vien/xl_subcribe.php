<?php
	require_once 'database.php';
	class xl_subcribe extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM subcribe WHERE 1 = 1 ";
			
			$sql .= " ORDER BY ma DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM subcribe";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM subcribe";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM subcribe WHERE 1 = 1 ORDER BY ma DESC";
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from subcribe where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($email)
		{
			$email = stripslashes($email);
			$email = addslashes($email);
			
			
			$sql = "insert into subcribe(email) values('$email')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $email)
		{
			$ma = intval($ma);
			
			$email = stripslashes($email);
			$email = addslashes($email);
			
			
			$sql = "UPDATE subcribe SET email = '$email' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM subcribe WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function kiem_tra($email)
		{
			$email = stripslashes($email);
			$email = addslashes($email);
			$sql = "select * from subcribe where email = '$email' LIMIT 1";			
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function unsubcribe($email)
		{
			$email = stripslashes($email);
			$email = addslashes($email);
						
			$sql = "DELETE FROM subcribe WHERE email = '$email'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>