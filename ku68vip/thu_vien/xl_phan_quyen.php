<?php
	require_once 'database.php';
	class xl_phan_quyen extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM phan_quyen WHERE 1 = 1 ";
			if($type == 'ten_bang')
				{
					$sql .= " and ten_bang like '%$keyword%'";
				}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM phan_quyen";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_userid($userid)
		{
			$userid = intval($userid);

			$sql = "SELECT * FROM phan_quyen WHERE userid = '$userid'";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM phan_quyen";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM phan_quyen WHERE 1 = 1 ";
			if($type == 'ten_bang')
				{
					$sql .= " and ten_bang like '%$keyword%'";
				}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from phan_quyen where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($userid, $ten_bang, $ma_role)
		{
			$userid = intval($userid);
			$ten_bang = stripslashes($ten_bang);
			$ten_bang = addslashes($ten_bang);
			$ma_role = intval($ma_role);
			
			
			$sql = "insert into phan_quyen(userid, ten_bang, ma_role) values('$userid', '$ten_bang', '$ma_role')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $userid, $ten_bang, $ma_role)
		{
			$ma = intval($ma);
			
			$userid = intval($userid);
			$ten_bang = stripslashes($ten_bang);
			$ten_bang = addslashes($ten_bang);
			$ma_role = intval($ma_role);
			
			
			$sql = "UPDATE phan_quyen SET userid = '$userid', 
				ten_bang = '$ten_bang', 
				ma_role = '$ma_role' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM phan_quyen WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function delete_theo_userid($ma)
		{
			$ma = intval($ma);
			
			$sql = "DELETE FROM phan_quyen WHERE userid = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>