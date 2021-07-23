<?php
	require_once 'database.php';
	class xl_danh_gia extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM danh_gia WHERE 1 = 1 ";
			if($type == 'ho_ten')
					{
						$sql .= " and ho_ten like '%$keyword%'";
					}
			if($type == 'dien_thoai')
					{
						$sql .= " and dien_thoai = $keyword ";
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
			$sql = "SELECT * FROM danh_gia";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_full_theo_ma_sp($ma_san_pham)
		{
			$ma_san_pham = intval($ma_san_pham);

			$sql = "SELECT * FROM danh_gia WHERE ma_san_pham = '$ma_san_pham' AND trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM danh_gia";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM danh_gia WHERE 1 = 1 ";
			if($type == 'ho_ten')
					{
						$sql .= " and ho_ten like '%$keyword%'";
					}
			if($type == 'dien_thoai')
					{
						$sql .= " and dien_thoai = $keyword ";
					}
			if($type == 'noi_dung')
					{
						$sql .= " and noi_dung like '%$keyword%'";
					}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from danh_gia where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}

		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);

			$sql ="UPDATE danh_gia SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function insert($ma_san_pham, $ho_ten, $dien_thoai, $noi_dung, $so_sao, $email, $ngay_tao, $trang_thai)
		{
			$ma_san_pham = intval($ma_san_pham);
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$noi_dung = stripslashes($noi_dung);
			$noi_dung = addslashes($noi_dung);
			$so_sao = intval($so_sao);
			$email = stripslashes($email);
			$email = addslashes($email);
			$trang_thai = intval($trang_thai);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into danh_gia(ma_san_pham, ho_ten, dien_thoai, noi_dung, so_sao, email, ngay_tao, trang_thai) values('$ma_san_pham', '$ho_ten', '$dien_thoai', '$noi_dung', '$so_sao', '$email', '$ngay_tao', '$trang_thai')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ma_san_pham, $ho_ten, $dien_thoai, $noi_dung, $so_sao, $email, $ngay_tao, $trang_thai)
		{
			$ma = intval($ma);
			
			$ma_san_pham = intval($ma_san_pham);
			$ho_ten = stripslashes($ho_ten);
			$ho_ten = addslashes($ho_ten);
			$dien_thoai = stripslashes($dien_thoai);
			$dien_thoai = addslashes($dien_thoai);
			$noi_dung = stripslashes($noi_dung);
			$noi_dung = addslashes($noi_dung);
			$so_sao = intval($so_sao);
			$email = stripslashes($email);
			$email = addslashes($email);
			$trang_thai = intval($trang_thai);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "UPDATE danh_gia SET ma_san_pham = '$ma_san_pham', 
				ho_ten = '$ho_ten', 
				dien_thoai = '$dien_thoai', 
				noi_dung = '$noi_dung', 
				so_sao = '$so_sao', 
				email = '$email', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai' 
			WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM danh_gia WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>