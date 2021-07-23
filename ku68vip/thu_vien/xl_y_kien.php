<?php
	require_once 'database.php';
	class xl_y_kien extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM y_kien WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'cong_ty')
			{
				$sql .= " and cong_ty like '%$keyword%'";
			}
			if($type == 'noi_dung')
			{
				$sql .= " and noi_dung like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM y_kien";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);

			$sql ="UPDATE y_kien SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM y_kien";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM y_kien WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'cong_ty')
			{
				$sql .= " and cong_ty like '%$keyword%'";
			}
			if($type == 'noi_dung')
			{
				$sql .= " and noi_dung like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from y_kien where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten, $cong_ty, $noi_dung, $ngay_tao, $trang_thai, $hinh, $ten_eng, $cong_ty_eng, $noi_dung_eng)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$cong_ty = stripslashes($cong_ty);
			$cong_ty = addslashes($cong_ty);
			$noi_dung = stripslashes($noi_dung);
			$noi_dung = addslashes($noi_dung);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$ten_eng = stripslashes($ten_eng);
			$ten_eng = addslashes($ten_eng);
			$cong_ty_eng = stripslashes($cong_ty_eng);
			$cong_ty_eng = addslashes($cong_ty_eng);
			$noi_dung_eng = stripslashes($noi_dung_eng);
			$noi_dung_eng = addslashes($noi_dung_eng);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into y_kien(ten, cong_ty, noi_dung, ngay_tao, trang_thai, hinh, ten_eng, cong_ty_eng, noi_dung_eng) values('$ten', '$cong_ty', '$noi_dung', '$ngay_tao', '$trang_thai', '$hinh', '$ten_eng', '$cong_ty_eng', '$noi_dung_eng')";
			$this->setQuery($sql);
			return $this->query();
		}

		function update($ma, $ten, $cong_ty, $noi_dung, $ngay_tao, $trang_thai, $hinh, $ten_eng, $cong_ty_eng, $noi_dung_eng)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$cong_ty = stripslashes($cong_ty);
			$cong_ty = addslashes($cong_ty);
			$noi_dung = stripslashes($noi_dung);
			$noi_dung = addslashes($noi_dung);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$ten_eng = stripslashes($ten_eng);
			$ten_eng = addslashes($ten_eng);
			$cong_ty_eng = stripslashes($cong_ty_eng);
			$cong_ty_eng = addslashes($cong_ty_eng);
			$noi_dung_eng = stripslashes($noi_dung_eng);
			$noi_dung_eng = addslashes($noi_dung_eng);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			if($hinh == '')
			{
				$sql = "UPDATE y_kien SET ten = '$ten', 
				cong_ty = '$cong_ty', 
				noi_dung = '$noi_dung', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai', 
				ten_eng = '$ten_eng', 
				cong_ty_eng = '$cong_ty_eng', 
				noi_dung_eng = '$noi_dung_eng' 
				WHERE ma = '$ma'";
			}
			else{
				$sql = "UPDATE y_kien SET ten = '$ten', 
				cong_ty = '$cong_ty', 
				noi_dung = '$noi_dung', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai', 
				hinh = '$hinh', 
				ten_eng = '$ten_eng', 
				cong_ty_eng = '$cong_ty_eng', 
				noi_dung_eng = '$noi_dung_eng' 
			WHERE ma = '$ma'";
			}
			
			
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM y_kien WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function danh_sach_y_kien_home()
		{
			$sql = "SELECT * FROM y_kien WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 6";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>