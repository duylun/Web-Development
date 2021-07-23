<?php
	require_once 'database.php';
	class xl_loai_bang_gia_vat_tu extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM loai_bang_gia_vat_tu WHERE 1 = 1 ";
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
			$sql = "SELECT * FROM loai_bang_gia_vat_tu";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_du_an()
		{
			$sql = "SELECT * FROM loai_bang_gia_vat_tu WHERE ma_loai_cha = 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_tu_van()
		{
			$sql = "SELECT * FROM loai_bang_gia_vat_tu WHERE ma_loai_cha = 10";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM loai_bang_gia_vat_tu";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM loai_bang_gia_vat_tu WHERE 1 = 1 ";
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
			
			
			$sql = "select * from loai_bang_gia_vat_tu where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten, $ma_loai_cha, $mo_ta, $hinh, $thu_tu_hien_thi)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_loai_cha = intval($ma_loai_cha);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			
			
			$sql = "insert into loai_bang_gia_vat_tu(ten, ma_loai_cha, mo_ta, hinh, thu_tu_hien_thi) values('$ten', '$ma_loai_cha', '$mo_ta', '$hinh', '$thu_tu_hien_thi')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $ma_loai_cha, $mo_ta, $hinh, $thu_tu_hien_thi)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_loai_cha = intval($ma_loai_cha);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			if($hinh != '')
			{
				$sql = "UPDATE loai_bang_gia_vat_tu SET ten = '$ten', 
					ma_loai_cha = '$ma_loai_cha',
					mo_ta = '$mo_ta', 
					hinh = '$hinh', 
					thu_tu_hien_thi = '$thu_tu_hien_thi' 
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE loai_bang_gia_vat_tu SET ten = '$ten', 
					ma_loai_cha = '$ma_loai_cha',
					mo_ta = '$mo_ta', 					 
					thu_tu_hien_thi = '$thu_tu_hien_thi' 
				WHERE ma = '$ma'";

			}
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM loai_bang_gia_vat_tu WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>