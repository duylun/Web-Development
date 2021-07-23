<?php
	require_once 'database.php';
	class xl_cuoc_phi_van_chuyen extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM cuoc_phi_van_chuyen WHERE 1 = 1 ";
			if($type == 'noi_den')
			{
				$sql .= " and noi_den like '%$keyword%'";
			}
			if($type == 'cuoc_phi')
			{
				$sql .= " and cuoc_phi = $keyword ";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM cuoc_phi_van_chuyen";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM cuoc_phi_van_chuyen";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM cuoc_phi_van_chuyen WHERE 1 = 1 ";
			if($type == 'noi_den')
			{
				$sql .= " and noi_den like '%$keyword%'";
			}
			if($type == 'cuoc_phi')
			{
				$sql .= " and cuoc_phi = $keyword ";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from cuoc_phi_van_chuyen where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($noi_den, $cuoc_phi)
		{
			$noi_den = stripslashes($noi_den);
			$noi_den = addslashes($noi_den);
			$cuoc_phi = intval($cuoc_phi);
			
			
			$sql = "insert into cuoc_phi_van_chuyen(noi_den, cuoc_phi) values('$noi_den', '$cuoc_phi')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $noi_den, $cuoc_phi)
		{
			$ma = intval($ma);
			
			$noi_den = stripslashes($noi_den);
			$noi_den = addslashes($noi_den);
			$cuoc_phi = intval($cuoc_phi);
			
			
			$sql = "UPDATE cuoc_phi_van_chuyen SET noi_den = '$noi_den', 
				cuoc_phi = '$cuoc_phi' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM cuoc_phi_van_chuyen WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>