<?php
	require_once 'database.php';
	class xl_loai_video extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM loai_video WHERE 1 = 1 ";
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
			$sql = "SELECT * FROM loai_video";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM loai_video";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM loai_video WHERE 1 = 1 ";
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from loai_video where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten, $ma_loai_cha)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_loai_cha = intval($ma_loai_cha);
			
			
			$sql = "insert into loai_video(ten, ma_loai_cha) values('$ten', '$ma_loai_cha')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $ma_loai_cha)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_loai_cha = intval($ma_loai_cha);
			
			
			$sql = "UPDATE loai_video SET ten = '$ten', 
				ma_loai_cha = '$ma_loai_cha' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM loai_video WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>