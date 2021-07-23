<?php
	require_once 'database.php';
	class xl_lich_kham_ct extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM lich_kham_ct WHERE 1 = 1 ";
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM lich_kham_ct";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_theo_ma_lich_kham($ma)
		{
			$ma = intval($ma);

			$sql = "SELECT * FROM lich_kham_ct WHERE ma_lich_kham = $ma GROUP BY ma_ck";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_ma_lich_kham_ck($ma, $ma_ck)
		{
			$ma = intval($ma);
			$ma_ck = intval($ma_ck);

			$sql = "SELECT * FROM lich_kham_ct WHERE ma_lich_kham = $ma AND ma_ck = $ma_ck ORDER BY bat_dau";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM lich_kham_ct";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM lich_kham_ct WHERE 1 = 1 ";
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from lich_kham_ct where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ma_lich_kham, $ma_bs, $ma_ck, $bat_dau, $ket_thuc)
		{
			$ma_lich_kham = intval($ma_lich_kham);
			$ma_bs = intval($ma_bs);
			$ma_ck = intval($ma_ck);
			$bat_dau = stripslashes($bat_dau);
			$bat_dau = addslashes($bat_dau);
			$ket_thuc = stripslashes($ket_thuc);
			$ket_thuc = addslashes($ket_thuc);
			
			
			$sql = "insert into lich_kham_ct(ma_lich_kham, ma_bs, ma_ck, bat_dau, ket_thuc) values('$ma_lich_kham', '$ma_bs', '$ma_ck', '$bat_dau', '$ket_thuc')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ma_lich_kham, $ma_bs, $ma_ck, $bat_dau, $ket_thuc)
		{
			$ma = intval($ma);
			
			$ma_lich_kham = intval($ma_lich_kham);
			$ma_bs = intval($ma_bs);
			$ma_ck = intval($ma_ck);
			$bat_dau = stripslashes($bat_dau);
			$bat_dau = addslashes($bat_dau);
			$ket_thuc = stripslashes($ket_thuc);
			$ket_thuc = addslashes($ket_thuc);
			
			
			$sql = "UPDATE lich_kham_ct SET ma_lich_kham = '$ma_lich_kham', 
				ma_bs = '$ma_bs', 
				ma_ck = '$ma_ck', 
				bat_dau = '$bat_dau', 
				ket_thuc = '$ket_thuc' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM lich_kham_ct WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function xoa_theo_ma_lich_kham($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM lich_kham_ct WHERE ma_lich_kham = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>