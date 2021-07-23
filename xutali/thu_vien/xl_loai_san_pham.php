<?php
	require_once 'database.php';
	class xl_loai_san_pham extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM loai_san_pham WHERE 1 = 1 ";
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
			$sql = "SELECT * FROM loai_san_pham ";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_lsp_cha()
		{
			$sql = "SELECT * FROM loai_san_pham WHERE ma_loai_cha = 0 ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_lsp_theo_ma($ma)
		{
			$ma = intval($ma);
			$sql = "SELECT * FROM loai_san_pham WHERE ma_loai_cha = $ma ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_show_home()
		{			
			$sql = "SELECT * FROM loai_san_pham WHERE show_home = 1 ORDER BY ma_loai_cha ASC, thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_show_home_wg()
		{			
			$sql = "SELECT * FROM loai_san_pham WHERE show_home = 1 AND ma_loai_cha = 0 ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM loai_san_pham";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_loai_san_pham()
		{
			$sql = "SELECT * FROM loai_san_pham WHERE ma_loai_cha = 1 ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM loai_san_pham WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_loaicha()
		{
			$sql = "SELECT COUNT(*) FROM loai_san_pham WHERE ma_loai_cha = 0 AND show_home = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from loai_san_pham where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function cap_nhat_show_home($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE loai_san_pham SET show_home= 1 - show_home WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function insert($ten, $ten_en, $mo_ta, $mo_ta_en, $ma_loai_cha, $thu_tu_hien_thi, $show_home, $hinh)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			$mo_ta_en = stripslashes($mo_ta_en);
			$mo_ta_en = addslashes($mo_ta_en);
			$ma_loai_cha = intval($ma_loai_cha);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			$show_home = intval($show_home);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			
			$sql = "insert into loai_san_pham(ten, ten_en, mo_ta, mo_ta_en, ma_loai_cha, thu_tu_hien_thi, show_home, hinh) values('$ten', '$ten_en', '$mo_ta', '$mo_ta_en', '$ma_loai_cha', '$thu_tu_hien_thi', '$show_home', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $ten_en, $mo_ta, $mo_ta_en, $ma_loai_cha, $thu_tu_hien_thi, $show_home, $hinh)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			$mo_ta_en = stripslashes($mo_ta_en);
			$mo_ta_en = addslashes($mo_ta_en);
			$ma_loai_cha = intval($ma_loai_cha);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			$show_home = intval($show_home);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($hinh == '')
			{
				$sql = "UPDATE loai_san_pham SET ten = '$ten',
				ten_en = '$ten_en',
				mo_ta = '$mo_ta',
				mo_ta_en = '$mo_ta_en',
				ma_loai_cha = '$ma_loai_cha', 
				thu_tu_hien_thi = '$thu_tu_hien_thi',
				show_home = '$show_home' 
				WHERE ma = '$ma'";
			}
			else{
				$sql = "UPDATE loai_san_pham SET ten = '$ten', 
				ten_en = '$ten_en',
				mo_ta = '$mo_ta',
				mo_ta_en = '$mo_ta_en', 
				ma_loai_cha = '$ma_loai_cha', 
				thu_tu_hien_thi = '$thu_tu_hien_thi',
				show_home = '$show_home',
				hinh = '$hinh' 
				WHERE ma = '$ma'";
			}
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM loai_san_pham WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>