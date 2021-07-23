<?php
	require_once 'database.php';
	class xl_lien_he extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM lien_he WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'email')
			{
				$sql .= " and email like '%$keyword%'";
			}
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}
			
			$sql .= " ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM lien_he";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM lien_he";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM lien_he WHERE 1 = 1 ";
			if($type == 'ho_ten')
			{
				$sql .= " and ho_ten like '%$keyword%'";
			}
			if($type == 'email')
			{
				$sql .= " and email like '%$keyword%'";
			}
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}
			$sql .= 'ORDER BY ngay_tao DESC';
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
			
			$sql = "UPDATE lien_he SET trang_thai = 1 - trang_thai WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			$sql = "select * from lien_he where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ho_ten, $email, $tieu_de, $gui_den, $noi_dung, $ngay_tao, $trang_thai)
		{
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$email = stripslashes($email);
			$email = addslashes($email);
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$gui_den = stripslashes($gui_den);
			$gui_den = addslashes($gui_den);
			$noi_dung = stripslashes($noi_dung);
			$noi_dung = addslashes($noi_dung);
			$trang_thai = intval($trang_thai);
			
			$sql = "insert into lien_he(ho_ten, email, tieu_de, gui_den, noi_dung, ngay_tao, trang_thai) values('$ho_ten', '$email', '$tieu_de', '$gui_den', '$noi_dung', '$ngay_tao', '$trang_thai')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ho_ten, $email, $tieu_de, $gui_den, $noi_dung, $ngay_tao, $trang_thai)
		{
			$ma = intval($ma);
			
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$email = stripslashes($email);
			$email = addslashes($email);
			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$gui_den = stripslashes($gui_den);
			$gui_den = addslashes($gui_den);
			$noi_dung = stripslashes($noi_dung);
			$noi_dung = addslashes($noi_dung);
			$trang_thai = intval($trang_thai);
			
			$sql = "UPDATE lien_he SET ho_ten = '$ho_ten', 
				email = '$email', 
				tieu_de = '$tieu_de', 
				gui_den = '$gui_den', 
				noi_dung = '$noi_dung', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			$sql = "DELETE FROM lien_he WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function ds_contact()
		{
			$sql = "SELECT * FROM tinnhanbaogia";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>