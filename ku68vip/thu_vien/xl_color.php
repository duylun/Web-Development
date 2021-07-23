<?php
	require_once 'database.php';
	class xl_color extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM color WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM color ORDER BY ten ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM color";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM color WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from color where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten, $hinh)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			
			
			$sql = "insert into color(ten, hinh) values('$ten', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $hinh)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($hinh == '')
			{
				$sql = "UPDATE color SET ten = '$ten'
				WHERE ma = '$ma'";			
			}
			else
			{
				$sql = "UPDATE color SET ten = '$ten', 
				hinh = '$hinh' 
				WHERE ma = '$ma'";			
			}
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM color WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>