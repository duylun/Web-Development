<?php
	require_once 'database.php';
	class xl_chuyen_khoa extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM chuyen_khoa WHERE 1 = 1 ";
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
			$sql = "SELECT * FROM chuyen_khoa";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_chuyen_khoa()
		{
			$sql = "SELECT * FROM chuyen_khoa ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM chuyen_khoa";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM chuyen_khoa WHERE 1 = 1 ";
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
			
			
			$sql = "select * from chuyen_khoa where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten, $ten_en, $gioi_thieu, $gioi_thieu_en, $thu_tu_hien_thi, $hinh)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$gioi_thieu = stripslashes($gioi_thieu);
			$gioi_thieu = addslashes($gioi_thieu);
			$gioi_thieu_en = stripslashes($gioi_thieu_en);
			$gioi_thieu_en = addslashes($gioi_thieu_en);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			
			
			$sql = "insert into chuyen_khoa(ten, ten_en, gioi_thieu, gioi_thieu_en, thu_tu_hien_thi, hinh) values('$ten', '$ten_en', '$gioi_thieu', '$gioi_thieu_en', '$thu_tu_hien_thi', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $ten_en, $gioi_thieu, $gioi_thieu_en, $thu_tu_hien_thi, $hinh)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$gioi_thieu = stripslashes($gioi_thieu);
			$gioi_thieu = addslashes($gioi_thieu);
			$gioi_thieu_en = stripslashes($gioi_thieu_en);
			$gioi_thieu_en = addslashes($gioi_thieu_en);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($hinh != "")
			{
				$sql = "UPDATE chuyen_khoa SET ten = '$ten', 
				ten_en = '$ten_en', 
				gioi_thieu = '$gioi_thieu', 
				gioi_thieu_en = '$gioi_thieu_en', 
				thu_tu_hien_thi = '$thu_tu_hien_thi', 
				hinh = '$hinh' 
			WHERE ma = '$ma'";
			}
			else{
				$sql = "UPDATE chuyen_khoa SET ten = '$ten', 
				ten_en = '$ten_en', 
				gioi_thieu = '$gioi_thieu', 
				gioi_thieu_en = '$gioi_thieu_en', 
				thu_tu_hien_thi = '$thu_tu_hien_thi'
			WHERE ma = '$ma'";
			}
			
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM chuyen_khoa WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>