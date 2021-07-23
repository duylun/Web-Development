<?php
	require_once 'database.php';
	class xl_du_an extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM du_an WHERE 1 = 1 ";
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM du_an";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_du_an()
		{
			$sql = "SELECT * FROM du_an WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 6";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_du_an_page()
		{
			$sql = "SELECT * FROM du_an WHERE trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_dich_vu_theo_khoa($ma)
		{
			$ma = intval($ma);

			$sql = "SELECT * FROM du_an WHERE ma_khoa = $ma AND trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cung_loai($ma)
		{
			$ma = intval($ma);
			$sql = "SELECT * FROM du_an WHERE trang_thai = 1 AND ma <> $ma ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM du_an";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM du_an WHERE 1 = 1 ";
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from du_an where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function cap_nhat_trang_thai($ma)

		{

			$ma = intval($ma);

	

			$sql ="UPDATE du_an SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";

			$this->setQuery($sql);

			return $this->query();

		}
		
		function insert($ma_khoa, $ten, $ten_en, $mota, $mota_en, $ngay_tao, $trang_thai, $hinh)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$ma_khoa = intval($ma_khoa);
			$mota = stripslashes($mota);
			$mota = addslashes($mota);
			$mota_en = stripslashes($mota_en);
			$mota_en = addslashes($mota_en);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into du_an(ma_khoa, ten, ten_en, mota, mota_en, ngay_tao, trang_thai, hinh) values('$ma_khoa', '$ten', '$ten_en', '$mota', '$mota_en', '$ngay_tao', '$trang_thai', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ma_khoa, $ten, $ten_en, $mota, $mota_en, $ngay_tao, $trang_thai, $hinh)
		{
			$ma = intval($ma);
			$ma_khoa = intval($ma_khoa);
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$mota = stripslashes($mota);
			$mota = addslashes($mota);
			$mota_en = stripslashes($mota_en);
			$mota_en = addslashes($mota_en);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			if($hinh != '')
			{
				$sql = "UPDATE du_an SET ten = '$ten', 
				ten_en = '$ten_en',
				ma_khoa = '$ma_khoa',  
				mota = '$mota', 
				mota_en = '$mota_en', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai', 
				hinh = '$hinh' 
			WHERE ma = '$ma'";
			}
			else{
				$sql = "UPDATE du_an SET ten = '$ten', 
				ten_en = '$ten_en', 
				ma_khoa = '$ma_khoa', 
				mota = '$mota', 
				mota_en = '$mota_en', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai'
			WHERE ma = '$ma'";
			}
			
			
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM du_an WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function tim_kiem_theo_ten($keyword)
		{
			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);

			$sql = "SELECT * FROM du_an WHERE ten LIKE '%$keyword%' OR mota LIKE '%$keyword%' AND trang_thai = 1";			
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function tim_kiem_theo_ten_en($keyword)
		{
			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);

			$sql = "SELECT * FROM du_an WHERE ten_en LIKE '%$keyword%' OR mota_en LIKE '%$keyword%' AND trang_thai = 1";			
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>