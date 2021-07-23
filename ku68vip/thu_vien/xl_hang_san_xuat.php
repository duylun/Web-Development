<?php
	require_once 'database.php';
	class xl_hang_san_xuat extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM hang_san_xuat WHERE 1 = 1 ";
			if($type == 'ten_hang')
			{
				$sql .= " and ten_hang like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM hang_san_xuat";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM hang_san_xuat";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM hang_san_xuat WHERE 1 = 1 ";
			if($type == 'ten_hang')
			{
				$sql .= " and ten_hang like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from hang_san_xuat where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten_hang)
		{
			$ten_hang = stripslashes($ten_hang);
			$ten_hang = addslashes($ten_hang);
			
			
			$sql = "insert into hang_san_xuat(ten_hang) values('$ten_hang')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten_hang)
		{
			$ma = intval($ma);
			
			$ten_hang = stripslashes($ten_hang);
			$ten_hang = addslashes($ten_hang);
			
			
			$sql = "UPDATE hang_san_xuat SET ten_hang = '$ten_hang' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM hang_san_xuat WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>