<?php
	require_once 'database.php';
	class xl_phuong_thuc_thanh_toan extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM phuong_thuc_thanh_toan WHERE 1 = 1 ";
			if($type == 'ten_phuong_thuc')
			{
				$sql .= " and ten_phuong_thuc like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM phuong_thuc_thanh_toan";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM phuong_thuc_thanh_toan";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM phuong_thuc_thanh_toan WHERE 1 = 1 ";
			if($type == 'ten_phuong_thuc')
			{
				$sql .= " and ten_phuong_thuc like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from phuong_thuc_thanh_toan where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten_phuong_thuc, $mo_ta)
		{
			$ten_phuong_thuc = stripslashes($ten_phuong_thuc);
			$ten_phuong_thuc = addslashes($ten_phuong_thuc);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			
			
			$sql = "insert into phuong_thuc_thanh_toan(ten_phuong_thuc, mo_ta) values('$ten_phuong_thuc', '$mo_ta')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten_phuong_thuc, $mo_ta)
		{
			$ma = intval($ma);
			
			$ten_phuong_thuc = stripslashes($ten_phuong_thuc);
			$ten_phuong_thuc = addslashes($ten_phuong_thuc);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			
			
			$sql = "UPDATE phuong_thuc_thanh_toan SET ten_phuong_thuc = '$ten_phuong_thuc', 
				mo_ta = '$mo_ta' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM phuong_thuc_thanh_toan WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>