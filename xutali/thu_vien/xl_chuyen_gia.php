<?php
	require_once 'database.php';
	class xl_chuyen_gia extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM chuyen_gia WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'ten_en')
			{
				$sql .= " and ten_en like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM chuyen_gia";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_chuyen_gia()
		{
			$sql = "SELECT * FROM chuyen_gia WHERE trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cung_loai($ma, $chuyen_khoa)
		{
			$ma = intval($ma);
			$chuyen_khoa = stripslashes($chuyen_khoa);
			$chuyen_khoa = addslashes($chuyen_khoa);

			$sql = "SELECT *, LOCATE('$chuyen_khoa', chuyen_khoa) FROM chuyen_gia WHERE LOCATE('$chuyen_khoa', chuyen_khoa) > 0 AND ma <> $ma AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cung_loai_2($ma)
		{
			$ma = intval($ma);
			
			$sql = "SELECT * FROM chuyen_gia WHERE ma <> $ma AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_theo_chuyen_khoa($chuyen_khoa)
		{
			$chuyen_khoa = stripslashes($chuyen_khoa);
			$chuyen_khoa = addslashes($chuyen_khoa);
			
			$sql = "SELECT *, LOCATE('$chuyen_khoa', chuyen_khoa) FROM chuyen_gia WHERE LOCATE('$chuyen_khoa', chuyen_khoa) > 0 AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM chuyen_gia";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM chuyen_gia WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'ten_en')
			{
				$sql .= " and ten_en like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from chuyen_gia where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}

		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);

			$sql ="UPDATE chuyen_gia SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function insert($ten, $ten_en, $chuc_danh, $chuc_danh_en, $thong_tin, $thong_tin_en, $chuyen_khoa, $trang_thai, $hinh)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$chuc_danh = stripslashes($chuc_danh);
			$chuc_danh = addslashes($chuc_danh);
			$chuc_danh_en = stripslashes($chuc_danh_en);
			$chuc_danh_en = addslashes($chuc_danh_en);
			$thong_tin = stripslashes($thong_tin);
			$thong_tin = addslashes($thong_tin);
			$thong_tin_en = stripslashes($thong_tin_en);
			$thong_tin_en = addslashes($thong_tin_en);
			$chuyen_khoa = stripslashes($chuyen_khoa);
			$chuyen_khoa = addslashes($chuyen_khoa);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			
			
			$sql = "insert into chuyen_gia(ten, ten_en, chuc_danh, chuc_danh_en, thong_tin, thong_tin_en, chuyen_khoa, trang_thai, hinh) values('$ten', '$ten_en', '$chuc_danh', '$chuc_danh_en', '$thong_tin', '$thong_tin_en', '$chuyen_khoa', '$trang_thai', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $ten_en, $chuc_danh, $chuc_danh_en, $thong_tin, $thong_tin_en, $chuyen_khoa, $trang_thai, $hinh)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$chuc_danh = stripslashes($chuc_danh);
			$chuc_danh = addslashes($chuc_danh);
			$chuc_danh_en = stripslashes($chuc_danh_en);
			$chuc_danh_en = addslashes($chuc_danh_en);
			$thong_tin = stripslashes($thong_tin);
			$thong_tin = addslashes($thong_tin);
			$thong_tin_en = stripslashes($thong_tin_en);
			$thong_tin_en = addslashes($thong_tin_en);
			$chuyen_khoa = stripslashes($chuyen_khoa);
			$chuyen_khoa = addslashes($chuyen_khoa);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($hinh != "")
			{
				$sql = "UPDATE chuyen_gia SET ten = '$ten', 
				ten_en = '$ten_en', 
				chuc_danh = '$chuc_danh', 
				chuc_danh_en = '$chuc_danh_en', 
				thong_tin = '$thong_tin', 
				thong_tin_en = '$thong_tin_en', 
				chuyen_khoa = '$chuyen_khoa',
				trang_thai = '$trang_thai', 
				hinh = '$hinh' 
			WHERE ma = '$ma'";
			}
			else{
				$sql = "UPDATE chuyen_gia SET ten = '$ten', 
				ten_en = '$ten_en', 
				chuc_danh = '$chuc_danh', 
				chuc_danh_en = '$chuc_danh_en', 
				thong_tin = '$thong_tin', 
				thong_tin_en = '$thong_tin_en', 
				chuyen_khoa = '$chuyen_khoa',
				trang_thai = '$trang_thai'
			WHERE ma = '$ma'";
			}
			
			
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM chuyen_gia WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function tim_kiem_theo_ten($keyword)
		{
			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);

			$sql = "SELECT * FROM chuyen_gia WHERE ten LIKE '%$keyword%' OR chuc_danh LIKE '%$keyword%' AND trang_thai = 1";			
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function tim_kiem_theo_ten_en($keyword)
		{
			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);

			$sql = "SELECT * FROM chuyen_gia WHERE ten_en LIKE '%$keyword%' OR chuc_danh_en LIKE '%$keyword%' AND trang_thai = 1";			
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>