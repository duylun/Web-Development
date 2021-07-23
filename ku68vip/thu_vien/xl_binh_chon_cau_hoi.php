<?php
	require_once 'database.php';
	class xl_binh_chon_cau_hoi extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM binh_chon_cau_hoi WHERE 1 = 1 ";
			if($type == 'cau_hoi')
			{
				$sql .= " and cau_hoi like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM binh_chon_cau_hoi";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_trang_thai()
		{
			$sql = "SELECT * FROM binh_chon_cau_hoi WHERE trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM binh_chon_cau_hoi";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE binh_chon_cau_hoi SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM binh_chon_cau_hoi WHERE 1 = 1 ";
			if($type == 'cau_hoi')
			{
				$sql .= " and cau_hoi like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from binh_chon_cau_hoi where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($cau_hoi, $trang_thai)
		{
			$cau_hoi = stripslashes($cau_hoi);
			$cau_hoi = addslashes($cau_hoi);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "insert into binh_chon_cau_hoi(cau_hoi, trang_thai) values('$cau_hoi', '$trang_thai')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $cau_hoi, $trang_thai)
		{
			$ma = intval($ma);
			
			$cau_hoi = stripslashes($cau_hoi);
			$cau_hoi = addslashes($cau_hoi);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "UPDATE binh_chon_cau_hoi SET cau_hoi = '$cau_hoi', 
				trang_thai = '$trang_thai' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM binh_chon_cau_hoi WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>