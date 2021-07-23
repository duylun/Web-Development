<?php
	require_once 'database.php';
	class xl_san_pham_att extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM san_pham_att WHERE 1 = 1 ";
			if($type == 'ma_sp')
			{
				$sql .= " and ma_sp = $keyword ";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM san_pham_att";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_theo_ma($ma)
		{
			$ma = intval($ma);

			$sql = "SELECT * FROM san_pham_att WHERE ma_sp = $ma ORDER BY ma_size ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function don_gia($ma_sp, $ma_size)
		{
			$ma_sp = intval($ma_sp);
			$ma_size = intval($ma_size);
			
			$sql = "select * from san_pham_att where ma_sp = '$ma_sp' and ma_size = '$ma_size' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM san_pham_att";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM san_pham_att WHERE 1 = 1 ";
			if($type == 'ma_sp')
			{
				$sql .= " and ma_sp = $keyword ";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from san_pham_att where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ma_sp, $ma_size, $gia, $code, $hinh)
		{
			$ma_sp = intval($ma_sp);
			$ma_size = intval($ma_size);
			$gia = intval($gia);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$code = stripslashes($code);
			$code = addslashes($code);
			
			
			$sql = "insert into san_pham_att(ma_sp, ma_size, gia, code, hinh) values('$ma_sp', '$ma_size', '$gia', '$code', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ma_sp, $ma_size, $gia, $code, $hinh)
		{
			$ma = intval($ma);
			
			$ma_sp = intval($ma_sp);
			$ma_size = intval($ma_size);
			$gia = intval($gia);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$code = stripslashes($code);
			$code = addslashes($code);
			
			
			$sql = "UPDATE san_pham_att SET ma_sp = '$ma_sp', 
				ma_size = '$ma_size', 
				gia = '$gia',
				code = '$code', 
				hinh = '$hinh' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM san_pham_att WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function delete_sp($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM san_pham_att WHERE ma_sp = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>