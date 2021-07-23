<?php
	require_once 'database.php';
	class xl_san_pham_size extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM san_pham_size WHERE 1 = 1 ";
			if($type == 'size')
			{
				$sql .= " and size like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM san_pham_size";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM san_pham_size";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM san_pham_size WHERE 1 = 1 ";
			if($type == 'size')
			{
				$sql .= " and size like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from san_pham_size where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($size)
		{
			$size = stripslashes($size);
			$size = addslashes($size);
			
			
			$sql = "insert into san_pham_size(size) values('$size')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $size)
		{
			$ma = intval($ma);
			
			$size = stripslashes($size);
			$size = addslashes($size);
			
			
			$sql = "UPDATE san_pham_size SET size = '$size' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM san_pham_size WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>