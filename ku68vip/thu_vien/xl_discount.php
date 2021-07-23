<?php
	require_once 'database.php';
	class xl_discount extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM discount WHERE 1 = 1 ";
			if($type == 'code')
			{
				$sql .= " and code like '%$keyword%'";
			}
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
			$sql = "SELECT * FROM discount";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM discount";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM discount WHERE 1 = 1 ";
			if($type == 'code')
			{
				$sql .= " and code like '%$keyword%'";
			}
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
			
			
			$sql = "select * from discount where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function chi_tiet_theo_code($code)
		{
			$code = stripslashes($code);
			$code = addslashes($code);
			
			$sql = "select * from discount where code = '$code' AND trang_thai = 0 limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function cap_nhat_theo_code($code)
		{
			$code = stripslashes($code);
			$code = addslashes($code);
			
			$sql = "UPDATE discount SET trang_thai = 1 where code = '$code'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function insert($code, $ten, $ma_loai_discount, $trang_thai)
		{
			$code = stripslashes($code);
			$code = addslashes($code);
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_loai_discount = intval($ma_loai_discount);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "insert into discount(code, ten, ma_loai_discount, trang_thai) values('$code', '$ten', '$ma_loai_discount', '$trang_thai')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $code, $ten, $ma_loai_discount, $trang_thai)
		{
			$ma = intval($ma);
			
			$code = stripslashes($code);
			$code = addslashes($code);
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_loai_discount = intval($ma_loai_discount);
			$trang_thai = intval($trang_thai);
			
			
			$sql = "UPDATE discount SET code = '$code', 
				ten = '$ten', 
				ma_loai_discount = '$ma_loai_discount', 
				trang_thai = '$trang_thai' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM discount WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>