<?php
	require_once 'database.php';
	class xl_banner_quang_cao extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM banner_quang_cao WHERE 1 = 1 ";
			if($type == 'link')
			{
				$sql .= " and link like '%$keyword%'";
			}
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
			$sql = "SELECT * FROM banner_quang_cao WHERE trang_thai = 1 ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_trai()
		{
			$sql = "SELECT * FROM banner_quang_cao WHERE trang_thai = 1 AND vi_tri = 'left' ORDER BY thu_tu_hien_thi ASC LIMIT 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_phai()
		{
			$sql = "SELECT * FROM banner_quang_cao WHERE trang_thai = 1 AND vi_tri = 'right' ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM banner_quang_cao";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM banner_quang_cao WHERE 1 = 1 ";
			if($type == 'link')
			{
				$sql .= " and link like '%$keyword%'";
			}
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
			
			$sql = "select * from banner_quang_cao where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE banner_quang_cao SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function insert($link, $tieu_de, $loai, $thu_tu_hien_thi, $vi_tri, $hinh, $trang_thai)
		{
			$link = stripslashes($link);
			$link = addslashes($link);
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$loai = stripslashes($loai);
			$loai = addslashes($loai);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			$vi_tri = stripslashes($vi_tri);
			$vi_tri = addslashes($vi_tri);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$trang_thai = intval($trang_thai);
			
			$sql = "insert into banner_quang_cao(link, tieu_de, loai, thu_tu_hien_thi, vi_tri, hinh, trang_thai) values('$link', '$tieu_de', '$loai', '$thu_tu_hien_thi', '$vi_tri', '$hinh', '$trang_thai')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $link, $tieu_de, $loai, $thu_tu_hien_thi, $vi_tri, $hinh, $trang_thai)
		{
			$ma = intval($ma);
			
			$link = stripslashes($link);
			$link = addslashes($link);
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$loai = stripslashes($loai);
			$loai = addslashes($loai);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			$vi_tri = stripslashes($vi_tri);
			$vi_tri = addslashes($vi_tri);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$trang_thai = intval($trang_thai);
			
			if($hinh == '')
			{
				$sql = "UPDATE banner_quang_cao SET link = '$link', 
				tieu_de = '$tieu_de', 
				loai = '$loai', 
				thu_tu_hien_thi = '$thu_tu_hien_thi', 
				vi_tri = '$vi_tri', 
				trang_thai = '$trang_thai' 
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE banner_quang_cao SET link = '$link', 
				tieu_de = '$tieu_de', 
				loai = '$loai', 
				thu_tu_hien_thi = '$thu_tu_hien_thi', 
				vi_tri = '$vi_tri', 
				hinh = '$hinh', 
				trang_thai = '$trang_thai' 
				WHERE ma = '$ma'";
			}
			
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			$sql = "DELETE FROM banner_quang_cao WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>