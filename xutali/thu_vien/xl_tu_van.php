<?php
	require_once 'database.php';
	class xl_tu_van extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM tu_van WHERE 1 = 1 ";
			if($type == 'cau_hoi')
			{
				$sql .= " and cau_hoi like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM tu_van";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM tu_van";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM tu_van WHERE 1 = 1 ";
			if($type == 'cau_hoi')
			{
				$sql .= " and cau_hoi like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from tu_van where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($cau_hoi, $tra_loi, $ngay_tao, $show_home, $trang_thai, $cau_hoi_eng, $tra_loi_eng, $cau_hoi_cn, $tra_loi_cn)
		{
			$cau_hoi = stripslashes($cau_hoi);
			$cau_hoi = addslashes($cau_hoi);
			$tra_loi = stripslashes($tra_loi);
			$tra_loi = addslashes($tra_loi);
			$show_home = intval($show_home);
			$trang_thai = intval($trang_thai);
			$cau_hoi_eng = stripslashes($cau_hoi_eng);
			$cau_hoi_eng = addslashes($cau_hoi_eng);
			$tra_loi_eng = stripslashes($tra_loi_eng);
			$tra_loi_eng = addslashes($tra_loi_eng);
			$cau_hoi_cn = stripslashes($cau_hoi_cn);
			$cau_hoi_cn = addslashes($cau_hoi_cn);
			$tra_loi_cn = stripslashes($tra_loi_cn);
			$tra_loi_cn = addslashes($tra_loi_cn);
			$ngay_tao = stripslashes($ngay_tao);
			$ngay_tao = addslashes($ngay_tao);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into tu_van(cau_hoi, tra_loi, ngay_tao, show_home, trang_thai, cau_hoi_eng, tra_loi_eng, cau_hoi_cn, tra_loi_cn) values('$cau_hoi', '$tra_loi', '$ngay_tao', '$show_home', '$trang_thai', '$cau_hoi_eng', '$tra_loi_eng', '$cau_hoi_cn', '$tra_loi_cn')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $cau_hoi, $tra_loi, $ngay_tao, $show_home, $trang_thai, $cau_hoi_eng, $tra_loi_eng, $cau_hoi_cn, $tra_loi_cn)
		{
			$ma = intval($ma);
			
			$cau_hoi = stripslashes($cau_hoi);
			$cau_hoi = addslashes($cau_hoi);
			$tra_loi = stripslashes($tra_loi);
			$tra_loi = addslashes($tra_loi);
			$show_home = intval($show_home);
			$trang_thai = intval($trang_thai);
			$cau_hoi_eng = stripslashes($cau_hoi_eng);
			$cau_hoi_eng = addslashes($cau_hoi_eng);
			$tra_loi_eng = stripslashes($tra_loi_eng);
			$tra_loi_eng = addslashes($tra_loi_eng);
			$cau_hoi_cn = stripslashes($cau_hoi_cn);
			$cau_hoi_cn = addslashes($cau_hoi_cn);
			$tra_loi_cn = stripslashes($tra_loi_cn);
			$tra_loi_cn = addslashes($tra_loi_cn);
			$ngay_tao = stripslashes($ngay_tao);
			$ngay_tao = addslashes($ngay_tao);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "UPDATE tu_van SET cau_hoi = '$cau_hoi', 
				tra_loi = '$tra_loi', 
				ngay_tao = '$ngay_tao', 
				show_home = '$show_home', 
				trang_thai = '$trang_thai', 
				cau_hoi_eng = '$cau_hoi_eng', 
				tra_loi_eng = '$tra_loi_eng',
				cau_hoi_cn = '$cau_hoi_cn', 
				tra_loi_cn = '$tra_loi_cn'  
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM tu_van WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE tu_van SET trang_thai = 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function danh_sach_tu_van()
		{
			$sql = "SELECT * FROM tu_van WHERE trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>