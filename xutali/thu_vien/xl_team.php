<?php
	require_once 'database.php';
	class xl_team extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM team WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'chuc_vu')
			{
				$sql .= " and chuc_vu like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM team";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM team";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM team WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'chuc_vu')
			{
				$sql .= " and chuc_vu like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from team where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten, $chuc_vu, $ngay_tao, $hinh)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$chuc_vu = stripslashes($chuc_vu);
			$chuc_vu = addslashes($chuc_vu);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into team(ten, chuc_vu, ngay_tao, hinh) values('$ten', '$chuc_vu', '$ngay_tao', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $chuc_vu, $ngay_tao, $hinh)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$chuc_vu = stripslashes($chuc_vu);
			$chuc_vu = addslashes($chuc_vu);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			if($hinh == '')
			{
				$sql = "UPDATE team SET ten = '$ten', 
				chuc_vu = '$chuc_vu', 
				ngay_tao = '$ngay_tao'
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE team SET ten = '$ten', 
				chuc_vu = '$chuc_vu', 
				ngay_tao = '$ngay_tao', 
				hinh = '$hinh' 
				WHERE ma = '$ma'";
			}
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM team WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function danh_sach_team_home()
		{
			$sql = "SELECT * FROM team ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>