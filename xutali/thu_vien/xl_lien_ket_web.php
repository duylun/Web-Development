<?php
	require_once 'database.php';
	class xl_lien_ket_web extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM lien_ket_web WHERE 1 = 1 ";
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
			$sql = "SELECT * FROM lien_ket_web";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM lien_ket_web";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM lien_ket_web WHERE 1 = 1 ";
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
			
			
			$sql = "select * from lien_ket_web where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE lien_ket_web SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function insert($ten, $link, $trang_thai)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$link = stripslashes($link);
			$link = addslashes($link);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "insert into lien_ket_web(ten, link, trang_thai) values('$ten', '$link', '$trang_thai')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $link, $trang_thai)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$link = stripslashes($link);
			$link = addslashes($link);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "UPDATE lien_ket_web SET ten = '$ten', 
				link = '$link', 
				trang_thai = '$trang_thai' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM lien_ket_web WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>