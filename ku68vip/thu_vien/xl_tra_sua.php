<?php
	require_once 'database.php';
	class xl_tra_sua extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM tra_sua WHERE 1 = 1 ";
			if($type == 'ten_vn')
			{
				$sql .= " and ten_vn like '%$keyword%'";
			}
			if($type == 'ten_en')
			{
				$sql .= " and ten_en like '%$keyword%'";
			}
			if($type == 'ten_tw')
			{
				$sql .= " and ten_tw like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM tra_sua";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_tra_sua()
		{
			$sql = "SELECT * FROM tra_sua WHERE trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_tra_sua_theo_ma_loai($ma_loai)
		{
			$ma_loai = intval($ma_loai);

			$sql = "SELECT * FROM tra_sua WHERE ma_loai_san_pham = {$ma_loai} AND trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM tra_sua";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_ma_loai_sp($ma, $vitri, $record)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM tra_sua WHERE ma_loai_san_pham IN($ma) AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_theo_ma_loai_sp($ma)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			
			$sql = "SELECT COUNT(*) FROM tra_sua WHERE ma_loai_san_pham IN($ma) AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM tra_sua WHERE 1 = 1 ";
			if($type == 'ten_vn')
			{
				$sql .= " and ten_vn like '%$keyword%'";
			}
			if($type == 'ten_en')
			{
				$sql .= " and ten_en like '%$keyword%'";
			}
			if($type == 'ten_tw')
			{
				$sql .= " and ten_tw like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from tra_sua where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);

			$sql ="UPDATE tra_sua SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function insert($ma_loai_san_pham, $ten_vn, $ten_en, $ten_tw, $don_gia, $trang_thai, $ngay_tao, $hinh)
		{
			$ma_loai_san_pham = intval($ma_loai_san_pham);
			$ten_vn = stripslashes($ten_vn);
			$ten_vn = addslashes($ten_vn);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$ten_tw = stripslashes($ten_tw);
			$ten_tw = addslashes($ten_tw);
			$don_gia = intval($don_gia);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into tra_sua(ma_loai_san_pham, ten_vn, ten_en, ten_tw, don_gia, trang_thai, ngay_tao, hinh) values('$ma_loai_san_pham', '$ten_vn', '$ten_en', '$ten_tw', '$don_gia', '$trang_thai', '$ngay_tao', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ma_loai_san_pham, $ten_vn, $ten_en, $ten_tw, $don_gia, $trang_thai, $ngay_tao, $hinh)
		{
			$ma = intval($ma);
			
			$ma_loai_san_pham = intval($ma_loai_san_pham);
			$ten_vn = stripslashes($ten_vn);
			$ten_vn = addslashes($ten_vn);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$ten_tw = stripslashes($ten_tw);
			$ten_tw = addslashes($ten_tw);
			$don_gia = intval($don_gia);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($hinh == '')
			{
				$sql = "UPDATE tra_sua SET ma_loai_san_pham = '$ma_loai_san_pham', 
				ten_vn = '$ten_vn', 
				ten_en = '$ten_en', 
				ten_tw = '$ten_tw', 
				don_gia = '$don_gia', 
				trang_thai = '$trang_thai', 
				ngay_tao = '$ngay_tao'				
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE tra_sua SET ma_loai_san_pham = '$ma_loai_san_pham', 
				ten_vn = '$ten_vn', 
				ten_en = '$ten_en', 
				ten_tw = '$ten_tw', 
				don_gia = '$don_gia', 
				trang_thai = '$trang_thai', 
				ngay_tao = '$ngay_tao', 
				hinh = '$hinh' 
				WHERE ma = '$ma'";
			}			
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM tra_sua WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>