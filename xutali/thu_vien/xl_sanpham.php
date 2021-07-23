<?php
	require_once 'database.php';
	class xl_sanpham extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM sanpham WHERE 1 = 1 ";
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
			$sql = "SELECT * FROM sanpham";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM sanpham";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM sanpham WHERE 1 = 1 ";
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
			
			
			$sql = "select * from sanpham where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten, $ten_en, $ma_loai, $tomtat, $tomtat_en, $chitiet, $chitiet_en, $keyw, $des, $ngay_tao, $trang_thai, $tieu_bieu, $hinh)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$ma_loai = intval($ma_loai);
			$tomtat = stripslashes($tomtat);
			$tomtat = addslashes($tomtat);
			$tomtat_en = stripslashes($tomtat_en);
			$tomtat_en = addslashes($tomtat_en);
			$chitiet = stripslashes($chitiet);
			$chitiet = addslashes($chitiet);
			$chitiet_en = stripslashes($chitiet_en);
			$chitiet_en = addslashes($chitiet_en);
			$keyw = stripslashes($keyw);
			$keyw = addslashes($keyw);
			$des = stripslashes($des);
			$des = addslashes($des);
			$trang_thai = intval($trang_thai);
			$tieu_bieu = intval($tieu_bieu);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into sanpham(ten, ten_en, ma_loai, tomtat, tomtat_en, chitiet, chitiet_en, keyw, des, ngay_tao, trang_thai, tieu_bieu, hinh) values('$ten', '$ten_en', '$ma_loai', '$tomtat', '$tomtat_en', '$chitiet', '$chitiet_en', '$keyw', '$des', '$ngay_tao', '$trang_thai', '$tieu_bieu', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $ten_en, $ma_loai, $tomtat, $tomtat_en, $chitiet, $chitiet_en, $keyw, $des, $ngay_tao, $trang_thai, $tieu_bieu, $hinh)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$ma_loai = intval($ma_loai);
			$tomtat = stripslashes($tomtat);
			$tomtat = addslashes($tomtat);
			$tomtat_en = stripslashes($tomtat_en);
			$tomtat_en = addslashes($tomtat_en);
			$chitiet = stripslashes($chitiet);
			$chitiet = addslashes($chitiet);
			$chitiet_en = stripslashes($chitiet_en);
			$chitiet_en = addslashes($chitiet_en);
			$keyw = stripslashes($keyw);
			$keyw = addslashes($keyw);
			$des = stripslashes($des);
			$des = addslashes($des);
			$trang_thai = intval($trang_thai);
			$tieu_bieu = intval($tieu_bieu);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($hinh == '')
			{
				$sql = "UPDATE sanpham SET ten = '$ten', 
				ten_en = '$ten_en', 
				ma_loai = '$ma_loai', 
				tomtat = '$tomtat', 
				tomtat_en = '$tomtat_en', 
				chitiet = '$chitiet', 
				chitiet_en = '$chitiet_en', 
				keyw = '$keyw', 
				des = '$des', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai',
				tieu_bieu = '$tieu_bieu'
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE sanpham SET ten = '$ten', 
				ten_en = '$ten_en', 
				ma_loai = '$ma_loai', 
				tomtat = '$tomtat', 
				tomtat_en = '$tomtat_en', 
				chitiet = '$chitiet', 
				chitiet_en = '$chitiet_en', 
				keyw = '$keyw', 
				des = '$des', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai',
				tieu_bieu = '$tieu_bieu', 
				hinh = '$hinh' 
				WHERE ma = '$ma'";
			}
			
			
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM sanpham WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE sanpham SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function cap_nhat_tieu_bieu($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE sanpham SET tieu_bieu= 1 - tieu_bieu WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function update_so_lan_xem($ma)
		{
			$ma = intval($ma);
 			$sql = "UPDATE sanpham SET so_lan_xem = so_lan_xem + 1 WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function them_hinh($ma, $hinh)
		{
			$ma = intval($ma);
			$sql = "UPDATE sanpham SET hinh = CONCAT(hinh, '$hinh') WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}
		function xoa_hinh($ma, $hinh)
		{
			$ma = intval($ma);
			$sql = "UPDATE sanpham SET hinh = '$hinh' WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}

		function danh_sach_phan_trang($vitri, $record)
		{
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM sanpham WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_phan_trang()
		{		
			$sql = "SELECT COUNT(*) FROM sanpham WHERE trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function danh_sach_sap_xep_index($loai, $sapxep, $vitri, $record)
		{						
			$vitri = intval($vitri);
			$record = intval($record);

			$sql = "SELECT * FROM sanpham WHERE trang_thai = 1 ORDER BY $loai $sapxep LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_sap_xep_index($loai, $sapxep)
		{			
			
			$sql = "SELECT COUNT(*) FROM sanpham WHERE trang_thai = 1 ORDER BY $loai $sapxep";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function danh_sach_sap_xep($ma, $loai, $sapxep, $vitri, $record)
		{						
			// $loai = stripslashes($loai);
			// $loai = addslashes($loai);
			// $sapxep = stripslashes($sapxep);
			// $sapxep = addslashes($sapxep);
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			$vitri = intval($vitri);
			$record = intval($record);

			$sql = "SELECT * FROM sanpham WHERE ma_loai IN($ma) AND trang_thai = 1 ORDER BY $loai $sapxep LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_sap_xep($ma, $loai, $sapxep)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			
			$sql = "SELECT COUNT(*) FROM sanpham WHERE ma_loai IN($ma) AND trang_thai = 1 ORDER BY $loai $sapxep";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function danh_sach_theo_ma_loai_sp($ma, $vitri, $record)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM sanpham WHERE ma_loai IN($ma) AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_theo_ma_loai_sp($ma)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			
			$sql = "SELECT COUNT(*) FROM sanpham WHERE ma_loai IN($ma) AND trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function danh_sach_sanpham_cung_loai($ma, $ma_loai)
		{
			$ma = intval($ma);
			$ma_loai = intval($ma_loai);
									
			$sql = "SELECT * FROM sanpham WHERE ma_loai = $ma_loai AND ma <> $ma AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_tieu_bieu()
		{
			$sql = "SELECT * FROM sanpham WHERE trang_thai = 1 AND tieu_bieu = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function tim_kiem_theo_ten($keyword)
		{
			
			$sql = "SELECT * FROM sanpham WHERE ten LIKE '%$keyword%' ORDER BY ngay_tao DESC";			
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function tim_kiem_theo_ten_en($keyword)
		{
			
			$sql = "SELECT * FROM sanpham WHERE ten_en LIKE '%$keyword%' ORDER BY ngay_tao DESC";			
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>