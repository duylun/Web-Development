<?php
	require_once 'database.php';
	class xl_thong_bao extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM thong_bao WHERE 1 = 1 ";
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM thong_bao";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM thong_bao";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM thong_bao WHERE 1 = 1 ";
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from thong_bao where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($tieu_de, $mo_ta_tom_tat, $mo_ta_chi_tiet, $ngay_tao, $nguoi_dang, $trang_thai, $hinh)
		{
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$mo_ta_tom_tat = stripslashes($mo_ta_tom_tat);
			$mo_ta_tom_tat = addslashes($mo_ta_tom_tat);
			$mo_ta_chi_tiet = stripslashes($mo_ta_chi_tiet);
			$mo_ta_chi_tiet = addslashes($mo_ta_chi_tiet);
			$nguoi_dang = stripslashes($nguoi_dang);
			$nguoi_dang = addslashes($nguoi_dang);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into thong_bao(tieu_de, mo_ta_tom_tat, mo_ta_chi_tiet, ngay_tao, nguoi_dang, trang_thai, hinh) values('$tieu_de', '$mo_ta_tom_tat', '$mo_ta_chi_tiet', '$ngay_tao', '$nguoi_dang', '$trang_thai', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $tieu_de, $mo_ta_tom_tat, $mo_ta_chi_tiet, $ngay_tao, $nguoi_dang, $trang_thai, $hinh)
		{
			$ma = intval($ma);
			
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$mo_ta_tom_tat = stripslashes($mo_ta_tom_tat);
			$mo_ta_tom_tat = addslashes($mo_ta_tom_tat);
			$mo_ta_chi_tiet = stripslashes($mo_ta_chi_tiet);
			$mo_ta_chi_tiet = addslashes($mo_ta_chi_tiet);
			$nguoi_dang = stripslashes($nguoi_dang);
			$nguoi_dang = addslashes($nguoi_dang);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			if($hinh == '')
			{
				$sql = "UPDATE thong_bao SET tieu_de = '$tieu_de', 
				mo_ta_tom_tat = '$mo_ta_tom_tat', 
				mo_ta_chi_tiet = '$mo_ta_chi_tiet', 
				ngay_tao = '$ngay_tao', 
				nguoi_dang = '$nguoi_dang', 
				trang_thai = '$trang_thai' 
				WHERE ma = '$ma'";
			}
			else{
				$sql = "UPDATE thong_bao SET tieu_de = '$tieu_de', 
				mo_ta_tom_tat = '$mo_ta_tom_tat', 
				mo_ta_chi_tiet = '$mo_ta_chi_tiet', 
				ngay_tao = '$ngay_tao', 
				nguoi_dang = '$nguoi_dang', 
				trang_thai = '$trang_thai', 
				hinh = '$hinh' 
				WHERE ma = '$ma'";
			}
			
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM thong_bao WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function danh_sach_tin($vitri, $record)
		{
			$vitri = intval($vitri);
			$record = intval($record);

			$sql = "SELECT ma, tieu_de, mo_ta_tom_tat, ngay_tao, nguoi_dang, hinh, trang_thai FROM thong_bao WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_tin()
		{

			$sql = "SELECT COUNT(*) FROM thong_bao WHERE trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function danh_sach_cung_loai($ma)
		{
			$ma = intval($ma);
			$sql = "SELECT ma, tieu_de, ngay_tao, trang_thai FROM thong_bao WHERE trang_thai = 1 AND ma <> '$ma' ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE thong_bao SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>