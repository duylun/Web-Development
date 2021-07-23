<?php
	require_once 'database.php';
	class xl_lich_kham extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM lich_kham WHERE 1 = 1 ";
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM lich_kham";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM lich_kham";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM lich_kham WHERE 1 = 1 ";
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from lich_kham where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ngay_tao)
		{
			
			$ngay_tao = stripslashes($ngay_tao);
			$ngay_tao = addslashes($ngay_tao);

			$sql = "insert into lich_kham(ngay_tao) values('$ngay_tao')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ngay_tao)
		{
			$ma = intval($ma);
			
			$ngay_tao = stripslashes($ngay_tao);
			$ngay_tao = addslashes($ngay_tao);
			
			$sql = "UPDATE lich_kham SET ngay_tao = '$ngay_tao' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM lich_kham WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function lich_kham_hom_nay($date)
		{
			$date = stripslashes($date);
			$date = addslashes($date);
			
			$sql = "select * from lich_kham where ngay_tao = '$date'";
			$this->setQuery($sql);
			return $this->loadRow();
		}
	}
?>