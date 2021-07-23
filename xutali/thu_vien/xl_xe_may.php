<?php
	require_once 'database.php';
	class xl_xe_may extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM xe_may WHERE 1 = 1 ";
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
			$sql = "SELECT * FROM xe_may";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_show_home()
		{
			$sql = "SELECT ma, ten, hinh, trang_thai, ngay_tao FROM xe_may WHERE trang_thai = 1 ORDER BY ngay_tao desc";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_xe_moi()
		{
			$sql = "SELECT ma, ten, hinh, trang_thai, ngay_tao FROM xe_may WHERE trang_thai = 1 ORDER BY ngay_tao desc LIMIT 6";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_xe_cung_hang($ma_loai)
		{
			//$ma_loai = intval($ma_loai);
			$sql = "SELECT ma, ten, ma_loai, hinh, trang_thai, ngay_tao FROM xe_may WHERE trang_thai = 1 AND ma_loai IN($ma_loai) ORDER BY ngay_tao desc";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM xe_may";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_phan_trang($vitri, $record)
		{
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM xe_may WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_sap_xep($ma, $loai, $sapxep, $vitri, $record)
		{						
			// $loai = stripslashes($loai);
			// $loai = addslashes($loai);
			// $sapxep = stripslashes($sapxep);
			// $sapxep = addslashes($sapxep);
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			$vitri = intval($vitri);
			$record = intval($record);

			$sql = "SELECT * FROM xe_may WHERE ma_loai IN($ma) AND trang_thai = 1 ORDER BY $loai $sapxep LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_sap_xep($ma, $loai, $sapxep)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			
			$sql = "SELECT COUNT(*) FROM xe_may WHERE ma_loai IN($ma) AND trang_thai = 1 ORDER BY $loai $sapxep";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function danh_sach_sap_xep_index($loai, $sapxep, $vitri, $record)
		{						
			$vitri = intval($vitri);
			$record = intval($record);

			$sql = "SELECT * FROM xe_may WHERE trang_thai = 1 ORDER BY $loai $sapxep LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_sap_xep_index($loai, $sapxep)
		{			
			
			$sql = "SELECT COUNT(*) FROM xe_may WHERE trang_thai = 1 ORDER BY $loai $sapxep";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function danh_sach_theo_ma_loai_sp($ma, $vitri, $record)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM xe_may WHERE ma_loai IN($ma) AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_theo_ma_loai_sp($ma)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			
			$sql = "SELECT COUNT(*) FROM xe_may WHERE ma_loai IN($ma) AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM xe_may WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_phan_trang()
		{		
			$sql = "SELECT COUNT(*) FROM xe_may WHERE trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from xe_may where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
			$sql ="UPDATE xe_may SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function insert($ten, $ma_loai, $mo_ta, $dac_tinh, $thong_so, $thu_vien_anh, $ngay_tao, $trang_thai, $hinh, $metakeyword, $metades)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_loai = intval($ma_loai);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			$dac_tinh = stripslashes($dac_tinh);
			$dac_tinh = addslashes($dac_tinh);
			$thong_so = stripslashes($thong_so);
			$thong_so = addslashes($thong_so);
			$thu_vien_anh = stripslashes($thu_vien_anh);
			$thu_vien_anh = addslashes($thu_vien_anh);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$metakeyword = stripslashes($metakeyword);
			$metakeyword = addslashes($metakeyword);
			$metades = stripslashes($metades);
			$metades = addslashes($metades);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into xe_may(ten, ma_loai, mo_ta, dac_tinh, thong_so, thu_vien_anh, ngay_tao, trang_thai, hinh, metakeyword, metades) values('$ten', '$ma_loai', '$mo_ta', '$dac_tinh', '$thong_so', '$thu_vien_anh', '$ngay_tao', '$trang_thai', '$hinh', '$metakeyword', '$metades')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $ma_loai, $mo_ta, $dac_tinh, $thong_so, $thu_vien_anh, $ngay_tao, $trang_thai, $hinh, $metakeyword, $metades)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_loai = intval($ma_loai);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			$dac_tinh = stripslashes($dac_tinh);
			$dac_tinh = addslashes($dac_tinh);
			$thong_so = stripslashes($thong_so);
			$thong_so = addslashes($thong_so);
			$thu_vien_anh = stripslashes($thu_vien_anh);
			$thu_vien_anh = addslashes($thu_vien_anh);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$metakeyword = stripslashes($metakeyword);
			$metakeyword = addslashes($metakeyword);
			$metades = stripslashes($metades);
			$metades = addslashes($metades);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			if($hinh == '')
			{
				$sql = "UPDATE xe_may SET ten = '$ten', 
				ma_loai = '$ma_loai',
				mo_ta = '$mo_ta', 
				dac_tinh = '$dac_tinh', 
				thong_so = '$thong_so', 
				thu_vien_anh = '$thu_vien_anh', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai', 				
				metakeyword = '$metakeyword', 
				metades = '$metades' 
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE xe_may SET ten = '$ten', 
				ma_loai = '$ma_loai',
				mo_ta = '$mo_ta', 
				dac_tinh = '$dac_tinh', 
				thong_so = '$thong_so', 
				thu_vien_anh = '$thu_vien_anh', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai', 
				hinh = '$hinh', 
				metakeyword = '$metakeyword', 
				metades = '$metades' 
				WHERE ma = '$ma'";
			}
			
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM xe_may WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function tim_kiem_theo_ten($keyword)
		{
			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);

			$sql = "SELECT * FROM xe_may WHERE ten LIKE '%$keyword%' ORDER BY ten ASC";			
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>