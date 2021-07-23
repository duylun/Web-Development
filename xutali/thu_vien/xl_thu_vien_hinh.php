<?php
	require_once 'database.php';
	class xl_thu_vien_hinh extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM thu_vien_hinh WHERE 1 = 1 ";
			if($type == 'ma_album')
			{
				$sql .= " and ma_album = $keyword ";
			}
			if($type == 'hinh')
			{
				$sql .= " and hinh like '%$keyword%'";
			}
			if($type == 'trang_thai')
			{
				$sql .= " and trang_thai = $keyword ";
			}
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM thu_vien_hinh WHERE trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_full_adm()
		{
			$sql = "SELECT * FROM thu_vien_hinh";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_moi()
		{
			$sql = "SELECT * FROM thu_vien_hinh WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 12";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_khach_hang()
		{
			$sql = "SELECT * FROM thu_vien_hinh WHERE ma_album = 2 AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 12";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cong_trinh()
		{
			$sql = "SELECT * FROM thu_vien_hinh WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 20";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_phan_trang($vitri, $record)
		{
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM thu_vien_hinh WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_phan_trang()
		{		
			$sql = "SELECT COUNT(*) FROM thu_vien_hinh WHERE trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function danh_sach_hinh()
		{
			$sql = "SELECT * FROM thu_vien_hinh WHERE ma_album = 1 AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 12";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_ma_album($ma)
		{
			$ma = intval($ma);
			
			$sql = "SELECT * FROM thu_vien_hinh WHERE trang_thai = 1 AND ma_album = $ma ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM thu_vien_hinh";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM thu_vien_hinh WHERE 1 = 1 ";
			if($type == 'ma_album')
			{
				$sql .= " and ma_album = $keyword ";
			}
			if($type == 'hinh')
			{
				$sql .= " and hinh like '%$keyword%'";
			}
			if($type == 'trang_thai')
			{
				$sql .= " and trang_thai = $keyword ";
			}
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "select * from thu_vien_hinh where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE thu_vien_hinh SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function insert($ten, $ma_album, $ngay_tao, $hinh, $trang_thai, $noi_dung)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_album = intval($ma_album);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$trang_thai = intval($trang_thai);
			$noi_dung = stripslashes($noi_dung);
			$noi_dung = addslashes($noi_dung);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into thu_vien_hinh(ten, ma_album, ngay_tao, hinh, trang_thai, noi_dung) values('$ten', '$ma_album', '$ngay_tao', '$hinh', '$trang_thai', '$noi_dung')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $ma_album, $ngay_tao, $hinh, $trang_thai, $noi_dung)
		{
			$ma = intval($ma);
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_album = intval($ma_album);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$trang_thai = intval($trang_thai);
			$noi_dung = stripslashes($noi_dung);
			$noi_dung = addslashes($noi_dung);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			if($hinh != '')
			{
				$sql = "UPDATE thu_vien_hinh SET ten = '$ten', 
				ma_album = '$ma_album', 
					ngay_tao = '$ngay_tao', 
					hinh = '$hinh', 
					trang_thai = '$trang_thai',
					noi_dung = '$noi_dung'
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE thu_vien_hinh SET ten = '$ten',
				ma_album = '$ma_album', 
					ngay_tao = '$ngay_tao',					 
					trang_thai = '$trang_thai',
					noi_dung = '$noi_dung' 
				WHERE ma = '$ma'";
			}
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM thu_vien_hinh WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function danh_sach_du_an()
		{
			$sql = "SELECT * FROM thu_vien_hinh WHERE trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_du_an_home()
		{
			$sql = "SELECT * FROM thu_vien_hinh WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 8";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>