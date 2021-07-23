<?php
	require_once 'database.php';
	class xl_bo_dem extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM bo_dem WHERE 1 = 1 ";
			if($type == 'dia_chi_ip')
			{
				$sql .= " and dia_chi_ip like '%$keyword%'";
			}
			if($type == 'trinh_duyet')
			{
				$sql .= " and trinh_duyet like '%$keyword%'";
			}
			if($type == 'thoi_gian')
			{
				$sql .= " and thoi_gian = $keyword ";
			}
			if($type == 'url')
			{
				$sql .= " and url like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM bo_dem";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM bo_dem";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_hom_nay()
		{
			$from = date('Y-m-d 0:0:0');
			$to = date('Y-m-d 23:59:59');
			
			$sql = "select count(*) from bo_dem where thoi_gian between '$from' and '$to'";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_hom_qua()
		{
			$from = date('Y-m-d 0:0:0', strtotime('-1 days'));
			$to = date('Y-m-d 23:59:59', strtotime('-1 days'));
			
			$sql = "select count(*) from bo_dem where thoi_gian between '$from' and '$to'";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_tuan_nay()
		{
			$x = date('w');				
			$from = date('Y-m-d 0:0:0', strtotime("-$x days"));
			$to = date('Y-m-d 23:59:59');
			
			$sql = "select count(*) from bo_dem where thoi_gian between '$from' and '$to'";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_thang_nay()
		{
			$from = date('Y-m-1 0:0:0');
			$to = date('Y-m-d 23:59:59');
			
			$sql = "select count(*) from bo_dem where thoi_gian between '$from' and '$to'";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_theo_ngay($ngay)
		{
			$from = date("$ngay 0:0:0");
			$to = date("$ngay 23:59:59");
			
			$sql = "select count(*) from bo_dem where thoi_gian between '$from' and '$to'";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_full()
		{			
			
			$sql = "select count(*) from bo_dem";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM bo_dem WHERE 1 = 1 ";
			if($type == 'dia_chi_ip')
			{
				$sql .= " and dia_chi_ip like '%$keyword%'";
			}
			if($type == 'trinh_duyet')
			{
				$sql .= " and trinh_duyet like '%$keyword%'";
			}
			if($type == 'thoi_gian')
			{
				$sql .= " and thoi_gian = $keyword ";
			}
			if($type == 'url')
			{
				$sql .= " and url like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from bo_dem where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function danh_sach_truy_cap($ip)
		{
			$ip = stripslashes($ip);
			$ip = addslashes($ip);
			
			$sql = "SELECT * FROM bo_dem WHERE dia_chi_ip = '$ip' AND date(thoi_gian) = date(curdate())";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function insert($dia_chi_ip, $trinh_duyet, $thoi_gian, $url)
		{
			$dia_chi_ip = stripslashes($dia_chi_ip);
			$dia_chi_ip = addslashes($dia_chi_ip);
			$trinh_duyet = stripslashes($trinh_duyet);
			$trinh_duyet = addslashes($trinh_duyet);
			$url = stripslashes($url);
			$url = addslashes($url);
			
			
			$sql = "insert into bo_dem(dia_chi_ip, trinh_duyet, thoi_gian, url) values('$dia_chi_ip', '$trinh_duyet', '$thoi_gian', '$url')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $dia_chi_ip, $trinh_duyet, $thoi_gian, $url)
		{
			$ma = intval($ma);
			
			$dia_chi_ip = stripslashes($dia_chi_ip);
			$dia_chi_ip = addslashes($dia_chi_ip);
			$trinh_duyet = stripslashes($trinh_duyet);
			$trinh_duyet = addslashes($trinh_duyet);
			$url = stripslashes($url);
			$url = addslashes($url);
			
			
			$sql = "UPDATE bo_dem SET dia_chi_ip = '$dia_chi_ip', 
				trinh_duyet = '$trinh_duyet', 
				thoi_gian = '$thoi_gian', 
				url = '$url' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM bo_dem WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		//ajax dataTable
		function totalRecords()
		{	
			$sql = "SELECT COUNT(*) FROM bo_dem WHERE 1 = 1 ";
			$this->setQuery($sql);
			return $this->loadResult();
		}

		function totalRecordwithFilter($str)
		{	

			$sql = "SELECT COUNT(*) FROM bo_dem  WHERE 1 = 1 $str";
			$this->setQuery($sql);
			return $this->loadResult();
		}

		function empRecords($searchQuery, $columnName, $columnSortOrder, $row, $rowperpage)
		{	
			$sql = "select * from bo_dem WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>