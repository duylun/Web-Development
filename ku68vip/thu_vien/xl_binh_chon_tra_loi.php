<?php
	require_once 'database.php';
	class xl_binh_chon_tra_loi extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM binh_chon_tra_loi WHERE 1 = 1 ";
			if($type == 'tra_loi')
			{
				$sql .= " and tra_loi like '%$keyword%'";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM binh_chon_tra_loi";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_theo_ma($ma)
		{
			$ma = intval($ma);
			$sql = "SELECT * FROM binh_chon_tra_loi WHERE ma_loai_cha = $ma";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM binh_chon_tra_loi";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM binh_chon_tra_loi WHERE 1 = 1 ";
			if($type == 'tra_loi')
			{
				$sql .= " and tra_loi like '%$keyword%'";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function tong_so_danh_gia($ma)
		{
			$ma = intval($ma);
			$sql = "SELECT sum(so_lan) FROM binh_chon_tra_loi WHERE ma_loai_cha = $ma";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from binh_chon_tra_loi where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function chi_tiet_theo_ma_loai_cha($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from binh_chon_tra_loi where ma_loai_cha = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ma_loai_cha, $tra_loi, $so_lan)
		{
			$ma_loai_cha = intval($ma_loai_cha);
			$tra_loi = stripslashes($tra_loi);
			$tra_loi = addslashes($tra_loi);
			$so_lan = intval($so_lan);
			
			
			$sql = "insert into binh_chon_tra_loi(ma_loai_cha, tra_loi, so_lan) values('$ma_loai_cha', '$tra_loi', '$so_lan')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ma_loai_cha, $tra_loi, $so_lan)
		{
			$ma = intval($ma);
			
			$ma_loai_cha = intval($ma_loai_cha);
			$tra_loi = stripslashes($tra_loi);
			$tra_loi = addslashes($tra_loi);
			$so_lan = intval($so_lan);
			
			
			$sql = "UPDATE binh_chon_tra_loi SET ma_loai_cha = '$ma_loai_cha', 
				tra_loi = '$tra_loi', 
				so_lan = '$so_lan' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function update_so_lan($ma, $so_lan)
		{
			$ma = intval($ma);						
			$so_lan = intval($so_lan);
						
			$sql = "UPDATE binh_chon_tra_loi SET so_lan = '$so_lan' WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM binh_chon_tra_loi WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function delete_theo_ma($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM binh_chon_tra_loi WHERE ma_loai_cha = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>