<?php
	require_once 'database.php';
	class xl_catalogue extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM catalogue WHERE 1 = 1 ";
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM catalogue";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_masp($masp)
		{
			$masp = intval($masp);
			$sql = "SELECT * FROM catalogue WHERE pid = '$masp' ORDER BY id";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM catalogue";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM catalogue WHERE 1 = 1 ";
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($id)
		{
			$id = intval($id);
			
			
			$sql = "select * from catalogue where id = '$id' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($img, $pid, $iorder, $date)
		{
			$img = stripslashes($img);
			$img = addslashes($img);
			$pid = intval($pid);
			$iorder = intval($iorder);
			$date = intval($date);
			
			
			$sql = "insert into catalogue(img, pid, iorder, date) values('$img', '$pid', '$iorder', '$date')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($id, $img, $pid, $iorder, $date)
		{
			$id = intval($id);
			
			$img = stripslashes($img);
			$img = addslashes($img);
			$pid = intval($pid);
			$iorder = intval($iorder);
			$date = intval($date);
			
			
			$sql = "UPDATE catalogue SET img = '$img', 
				pid = '$pid', 
				iorder = '$iorder', 
				date = '$date' 
			WHERE id = '$id'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($id)
		{
			$id = intval($id);
			
			
			$sql = "DELETE FROM catalogue WHERE id = '$id'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>