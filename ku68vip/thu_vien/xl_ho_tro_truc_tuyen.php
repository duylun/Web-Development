<?php
	require_once 'database.php';
	class xl_ho_tro_truc_tuyen extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM ho_tro_truc_tuyen WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'loai_ho_tro')
			{
				$sql .= " and loai_ho_tro = $keyword ";
			}
			if($type == 'nick_chat')
			{
				$sql .= " and nick_chat like '%$keyword%'";
			}
			if($type == 'trang_thai')
			{
				$sql .= " and trang_thai = $keyword ";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM ho_tro_truc_tuyen";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_full_thu_tu()
		{
			$sql = "SELECT * FROM ho_tro_truc_tuyen WHERE trang_thai = 1 ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_yahoo_thu_tu()
		{
			$sql = "SELECT * FROM ho_tro_truc_tuyen WHERE loai_ho_tro = 0 AND trang_thai = 1 ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_skype_thu_tu()
		{
			$sql = "SELECT * FROM ho_tro_truc_tuyen WHERE loai_ho_tro = 1 AND trang_thai = 1 ORDER BY thu_tu_hien_thi ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM ho_tro_truc_tuyen";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM ho_tro_truc_tuyen WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'loai_ho_tro')
			{
				$sql .= " and loai_ho_tro = $keyword ";
			}
			if($type == 'nick_chat')
			{
				$sql .= " and nick_chat like '%$keyword%'";
			}
			if($type == 'trang_thai')
			{
				$sql .= " and trang_thai = $keyword ";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from ho_tro_truc_tuyen where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE ho_tro_truc_tuyen SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function cap_nhat_loai_ho_tro($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE ho_tro_truc_tuyen SET loai_ho_tro = 1 - loai_ho_tro WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function cap_nhat_gioi_tinh($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE ho_tro_truc_tuyen SET gioi_tinh = 1 - gioi_tinh WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function insert($ho_ten, $gioi_tinh, $loai_ho_tro, $nick_chat, $dien_thoai, $trang_thai, $thu_tu_hien_thi)
		{
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$gioi_tinh = intval($gioi_tinh);
			$loai_ho_tro = intval($loai_ho_tro);
			$nick_chat = stripslashes($nick_chat);
			$nick_chat = addslashes($nick_chat);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$trang_thai = intval($trang_thai);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			
			
			$sql = "insert into ho_tro_truc_tuyen(ho_ten, gioi_tinh, loai_ho_tro, nick_chat, dien_thoai, trang_thai, thu_tu_hien_thi) values('$ho_ten', '$gioi_tinh', '$loai_ho_tro', '$nick_chat', '$dien_thoai', '$trang_thai', '$thu_tu_hien_thi')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ho_ten, $gioi_tinh, $loai_ho_tro, $nick_chat, $dien_thoai, $trang_thai, $thu_tu_hien_thi)
		{
			$ma = intval($ma);
			
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$gioi_tinh = intval($gioi_tinh);
			$loai_ho_tro = intval($loai_ho_tro);
			$nick_chat = stripslashes($nick_chat);
			$nick_chat = addslashes($nick_chat);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$trang_thai = intval($trang_thai);
			$thu_tu_hien_thi = intval($thu_tu_hien_thi);
			
			
			$sql = "UPDATE ho_tro_truc_tuyen SET ho_ten = '$ho_ten',
				gioi_tinh = '$gioi_tinh', 
				loai_ho_tro = '$loai_ho_tro', 
				nick_chat = '$nick_chat',
				dien_thoai = '$dien_thoai', 
				trang_thai = '$trang_thai', 
				thu_tu_hien_thi = '$thu_tu_hien_thi' 
				WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM ho_tro_truc_tuyen WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>