<?php
	require_once 'database.php';
	class xl_cau_hinh extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM cau_hinh WHERE 1 = 1 ";
			if($type == 'tu_khoa')
			{
				$sql .= " and tu_khoa like '%$keyword%'";
			}
			if($type == 'noi_dung')
			{
				$sql .= " and noi_dung like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM cau_hinh ORDER BY tu_khoa";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM cau_hinh";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM cau_hinh WHERE 1 = 1 ";
			if($type == 'tu_khoa')
			{
				$sql .= " and tu_khoa like '%$keyword%'";
			}
			if($type == 'noi_dung')
			{
				$sql .= " and noi_dung like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($tu_khoa)
		{
			$tu_khoa = stripslashes($tu_khoa);
			$tu_khoa = addslashes($tu_khoa);
			
			$sql = "select * from cau_hinh where tu_khoa = '$tu_khoa' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($tu_khoa, $noi_dung)
		{
			$tu_khoa = stripslashes($tu_khoa);
			$tu_khoa = addslashes($tu_khoa);
			$noi_dung = stripslashes($noi_dung);
			$noi_dung = addslashes($noi_dung);
			
			$sql = "insert into cau_hinh(tu_khoa, noi_dung) values('$tu_khoa', '$noi_dung')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($tu_khoa,  $noi_dung)
		{
			$tu_khoa = stripslashes($tu_khoa);
			$tu_khoa = addslashes($tu_khoa);
			$noi_dung = stripslashes($noi_dung);
			$noi_dung = addslashes($noi_dung);
			
			$sql = "UPDATE cau_hinh SET noi_dung = '$noi_dung'
			WHERE tu_khoa = '$tu_khoa'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($tu_khoa)
		{
			$tu_khoa = stripslashes($tu_khoa);
			$tu_khoa = addslashes($tu_khoa);
			
			$sql = "DELETE FROM cau_hinh WHERE tu_khoa = '$tu_khoa'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>