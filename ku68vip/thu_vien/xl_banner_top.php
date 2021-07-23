<?php
	require_once 'database.php';
	class xl_banner_top extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM banner_top WHERE 1 = 1 ";
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM banner_top";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM banner_top";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM banner_top WHERE 1 = 1 ";
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from banner_top where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($tieu_de, $hinh, $trang_thai)
		{
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "insert into banner_top(tieu_de, hinh, trang_thai) values('$tieu_de', '$hinh', '$trang_thai')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $tieu_de, $hinh, $trang_thai)
		{
			$ma = intval($ma);
			
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "UPDATE banner_top SET tieu_de = '$tieu_de', 
				hinh = '$hinh', 
				trang_thai = '$trang_thai' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM banner_top WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>