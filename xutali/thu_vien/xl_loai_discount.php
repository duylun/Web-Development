<?php
	require_once 'database.php';
	class xl_loai_discount extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM loai_discount WHERE 1 = 1 ";
			if($type == 'phan_tram')
				{
					$sql .= " and phan_tram = $keyword ";
				}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM loai_discount";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM loai_discount";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM loai_discount WHERE 1 = 1 ";
			if($type == 'phan_tram')
				{
					$sql .= " and phan_tram = $keyword ";
				}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from loai_discount where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($phan_tram)
		{
			$phan_tram = intval($phan_tram);
			
			
			$sql = "insert into loai_discount(phan_tram) values('$phan_tram')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $phan_tram)
		{
			$ma = intval($ma);
			
			$phan_tram = intval($phan_tram);
			
			
			$sql = "UPDATE loai_discount SET phan_tram = '$phan_tram' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM loai_discount WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>