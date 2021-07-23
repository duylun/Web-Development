<?php
	require_once 'database.php';
	class xl_bang_gia_vat_tu extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM bang_gia_vat_tu WHERE 1 = 1 ";
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}
			if($type == 'noi_dung_tom_tat')
			{
				$sql .= " and noi_dung_tom_tat like '%$keyword%'";
			}
			if($type == 'noi_dung_chi_tiet')
			{
				$sql .= " and noi_dung_chi_tiet like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_dich_vu()
		{
			$sql = "SELECT * FROM bang_gia_vat_tu WHERE ma_loai_bai_viet = 1 ORDER BY tieu_de ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_full()
		{
			$sql = "SELECT * FROM bang_gia_vat_tu";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_ma_loai_bv($ma, $vitri, $record)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			
			$sql = "SELECT * FROM bang_gia_vat_tu WHERE ma_loai_bai_viet IN($ma) AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cung_loai($ma, $ma_loai)
		{
			$ma = intval($ma);
			$ma_loai = intval($ma_loai);
			
			$sql = "SELECT * FROM bang_gia_vat_tu WHERE ma_loai_bai_viet = $ma_loai AND ma <> $ma ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM bang_gia_vat_tu";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE bang_gia_vat_tu SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM bang_gia_vat_tu WHERE 1 = 1 ";
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}
			if($type == 'noi_dung_tom_tat')
			{
				$sql .= " and noi_dung_tom_tat like '%$keyword%'";
			}
			if($type == 'noi_dung_chi_tiet')
			{
				$sql .= " and noi_dung_chi_tiet like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_theo_ma($ma)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			
			$sql = "SELECT COUNT(*) FROM bang_gia_vat_tu WHERE ma_loai_bai_viet IN($ma) AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from bang_gia_vat_tu where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function cau_hoi_moi_nhat()
		{
				
			$sql = "select * from bang_gia_vat_tu where trang_thai = 1 and show_home = 1 limit 0, 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function insert($ma_loai_bai_viet, $tieu_de, $noi_dung_tom_tat, $noi_dung_chi_tiet, $ngay_tao, $trang_thai, $hinh)
		{
			$ma_loai_bai_viet = intval($ma_loai_bai_viet);
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$noi_dung_tom_tat = stripslashes($noi_dung_tom_tat);
			$noi_dung_tom_tat = addslashes($noi_dung_tom_tat);
			$noi_dung_chi_tiet = stripslashes($noi_dung_chi_tiet);
			$noi_dung_chi_tiet = addslashes($noi_dung_chi_tiet);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			$sql = "insert into bang_gia_vat_tu(ma_loai_bai_viet, tieu_de, noi_dung_tom_tat, noi_dung_chi_tiet, ngay_tao, trang_thai, hinh) values('$ma_loai_bai_viet', '$tieu_de', '$noi_dung_tom_tat', '$noi_dung_chi_tiet', '$ngay_tao', '$trang_thai', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ma_loai_bai_viet, $tieu_de, $noi_dung_tom_tat, $noi_dung_chi_tiet, $ngay_tao, $trang_thai, $hinh)
		{
			$ma = intval($ma);
			
			$ma_loai_bai_viet = intval($ma_loai_bai_viet);
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$noi_dung_tom_tat = stripslashes($noi_dung_tom_tat);
			$noi_dung_tom_tat = addslashes($noi_dung_tom_tat);
			$noi_dung_chi_tiet = stripslashes($noi_dung_chi_tiet);
			$noi_dung_chi_tiet = addslashes($noi_dung_chi_tiet);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			
			if($hinh != '')
			{
				$sql = "UPDATE bang_gia_vat_tu SET ma_loai_bai_viet = '$ma_loai_bai_viet', 
					tieu_de = '$tieu_de', 
					noi_dung_tom_tat = '$noi_dung_tom_tat', 
					noi_dung_chi_tiet = '$noi_dung_chi_tiet', 
					ngay_tao = '$ngay_tao', 
					trang_thai = '$trang_thai', 
					hinh = '$hinh' 
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE bang_gia_vat_tu SET ma_loai_bai_viet = '$ma_loai_bai_viet', 
					tieu_de = '$tieu_de', 
					noi_dung_tom_tat = '$noi_dung_tom_tat', 
					noi_dung_chi_tiet = '$noi_dung_chi_tiet', 
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
			
			
			$sql = "DELETE FROM bang_gia_vat_tu WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>