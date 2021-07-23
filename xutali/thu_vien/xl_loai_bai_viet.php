<?php
	require_once 'database.php';
	class xl_loai_bai_viet extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM loai_bai_viet WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'mo_ta')
			{
				$sql .= " and mo_ta like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM loai_bai_viet";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_full_theo_ttht()
		{
			$sql = "SELECT * FROM loai_bai_viet ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_loai_home()
		{
			$sql = "SELECT * FROM loai_bai_viet WHERE ma <> 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_ma_loai_cha($ma)
		{
			$ma = intval($ma);
			$sql = "SELECT * FROM loai_bai_viet WHERE ma_loai_cha = $ma";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM loai_bai_viet";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_lbv_theo_ma($ma)
		{
			$ma = intval($ma);
			$sql = "SELECT * FROM loai_bai_viet WHERE ma_loai_cha = $ma ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM loai_bai_viet WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'mo_ta')
			{
				$sql .= " and mo_ta like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			$sql = "select * from loai_bai_viet where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten, $ten_en, $mo_ta, $ma_loai_cha, $thu_tu_hien_thi)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			$ma_loai_cha = intval($ma_loai_cha);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			
			$sql = "insert into loai_bai_viet(ten, ten_en, mo_ta, ma_loai_cha, thu_tu_hien_thi) values('$ten', '$ten_en', '$mo_ta', '$ma_loai_cha', '$thu_tu_hien_thi')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $ten_en, $mo_ta, $ma_loai_cha, $thu_tu_hien_thi)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			$ma_loai_cha = intval($ma_loai_cha);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			
			$sql = "UPDATE loai_bai_viet SET ten = '$ten', ten_en = '$ten_en', 
				mo_ta = '$mo_ta', 
				ma_loai_cha = '$ma_loai_cha', 
				thu_tu_hien_thi = '$thu_tu_hien_thi' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			$sql = "DELETE FROM loai_bai_viet WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>