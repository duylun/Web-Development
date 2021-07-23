<?php
	require_once 'database.php';
	class xl_bang_bao_gia extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM bang_bao_gia WHERE 1 = 1 ";
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}
			if($type == 'ten_file')
			{
				$sql .= " and ten_file like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM bang_bao_gia";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_bang_bao_gia()
		{
			$sql = "SELECT * FROM bang_bao_gia WHERE trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_phan_trang($vitri, $record)
		{
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM bang_bao_gia WHERE trang_thai = 1 ORDER BY ma DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_phan_trang()
		{		
			$sql = "SELECT COUNT(*) FROM bang_bao_gia WHERE trang_thai = 1 ORDER BY ma DESC";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM bang_bao_gia";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM bang_bao_gia WHERE 1 = 1 ";
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}
			if($type == 'ten_file')
			{
				$sql .= " and ten_file like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			$sql = "select * from bang_bao_gia where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE bang_bao_gia SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function insert($tieu_de, $mo_ta, $ten_file, $trang_thai, $link)
		{
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			$ten_file = stripslashes($ten_file);
			$ten_file = addslashes($ten_file);
			$trang_thai = intval($trang_thai);
			$link = stripslashes($link);
			$link = addslashes($link);
			
			$sql = "insert into bang_bao_gia(tieu_de, mo_ta, ten_file, trang_thai, link) values('$tieu_de', '$mo_ta', '$ten_file', '$trang_thai', '$link')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $tieu_de, $mo_ta, $ten_file, $trang_thai, $link)
		{
			$ma = intval($ma);
			
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$mo_ta = stripslashes($mo_ta);
			$mo_ta = addslashes($mo_ta);
			$ten_file = stripslashes($ten_file);
			$ten_file = addslashes($ten_file);
			$trang_thai = intval($trang_thai);
			$link = stripslashes($link);
			$link = addslashes($link);
			
			if($ten_file == '')
			{
				$sql = "UPDATE bang_bao_gia SET tieu_de = '$tieu_de', mo_ta = '$mo_ta',  
				trang_thai = '$trang_thai', link = '$link' 
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE bang_bao_gia SET tieu_de = '$tieu_de', mo_ta = '$mo_ta', 
				ten_file = '$ten_file', 
				trang_thai = '$trang_thai', link = '$link' 
				WHERE ma = '$ma'";
			}
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			$sql = "DELETE FROM bang_bao_gia WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>