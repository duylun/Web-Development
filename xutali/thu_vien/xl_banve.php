<?php
	require_once 'database.php';
	class xl_banve extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM banve WHERE 1 = 1 ";
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM banve";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_masp($masp)
		{
			$masp = intval($masp);
			$sql = "SELECT * FROM banve WHERE pid = '$masp' ORDER BY id";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM banve";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM banve WHERE 1 = 1 ";
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($id)
		{
			$id = intval($id);
			
			
			$sql = "select * from banve where id = '$id' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($img, $pid, $date, $iorder, $congsuat, $capcuc, $frame)
		{
			$img = stripslashes($img);
			$img = addslashes($img);
			$pid = intval($pid);
			$date = intval($date);
			$iorder = intval($iorder);
			$congsuat = intval($congsuat);
			$capcuc = intval($capcuc);
			$frame = intval($frame);
			
			
			$sql = "insert into banve(img, pid, date, iorder, congsuat, capcuc, frame) values('$img', '$pid', '$date', '$iorder', '$congsuat', '$capcuc', '$frame')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($id, $img, $pid, $date, $iorder, $congsuat, $capcuc, $frame)
		{
			$id = intval($id);
			
			$img = stripslashes($img);
			$img = addslashes($img);
			$pid = intval($pid);
			$date = intval($date);
			$iorder = intval($iorder);
			$congsuat = intval($congsuat);
			$capcuc = intval($capcuc);
			$frame = intval($frame);
			
			
			$sql = "UPDATE banve SET img = '$img', 
				pid = '$pid', 
				date = '$date', 
				iorder = '$iorder', 
				congsuat = '$congsuat', 
				capcuc = '$capcuc', 
				frame = '$frame' 
			WHERE id = '$id'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($id)
		{
			$id = intval($id);
			
			
			$sql = "DELETE FROM banve WHERE id = '$id'";
			$this->setQuery($sql);
			return $this->query();
		}


		function updateimg($img, $pid)
		{
			
			$img = stripslashes($img);
			$img = addslashes($img);
			$pid = intval($pid);			
			
			
			$sql = "UPDATE banve SET img = '$img' + img
			WHERE pid = '$pid'";
			$this->setQuery($sql);
			return $this->query();
		}

		function kiemtra($masp)
		{
			$masp = intval($masp);
			$sql = "SELECT COUNT(id) FROM banve WHERE pid = '$masp' ORDER BY id";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function cong_suat($ma)
		{									
			
			$ma = intval($ma);			

			$sql = "SELECT * FROM banve WHERE pid = '$ma' GROUP BY congsuat ORDER BY congsuat ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function cap_cuc($ma, $congsuat)
		{									
			
			$ma = intval($ma);
			$congsuat = intval($congsuat);			

			$sql = "SELECT * FROM banve WHERE pid = '$ma' AND congsuat = '$congsuat' GROUP BY capcuc ORDER BY capcuc ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function loadtemp($ma, $congsuat, $capcuc)
		{									
			
			$ma = intval($ma);	
			$congsuat = intval($congsuat);
			$capcuc = intval($capcuc);		

			$sql = "SELECT * FROM banve WHERE pid = '$ma' AND congsuat = '$congsuat' AND capcuc = '$capcuc' ORDER BY capcuc ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>