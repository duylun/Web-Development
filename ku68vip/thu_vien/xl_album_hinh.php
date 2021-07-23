<?php
	require_once 'database.php';
	class xl_album_hinh extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM album_hinh WHERE 1 = 1 ";
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
			$sql = "SELECT * FROM album_hinh";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM album_hinh";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM album_hinh WHERE 1 = 1 ";
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
			
			
			$sql = "select * from album_hinh where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			
			
			$sql = "insert into album_hinh(ten) values('$ten')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			
			
			$sql = "UPDATE album_hinh SET ten = '$ten' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM album_hinh WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>