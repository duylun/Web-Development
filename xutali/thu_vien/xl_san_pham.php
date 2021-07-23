<?php
	require_once 'database.php';
	class xl_san_pham extends database
	{	
		

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

			$sql = "SELECT * FROM san_pham WHERE ma_loai_san_pham IN($ma) AND trang_thai = 1 ORDER BY $loai $sapxep LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_sap_xep($ma, $loai, $sapxep)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			
			$sql = "SELECT COUNT(*) FROM san_pham WHERE ma_loai_san_pham IN($ma) AND trang_thai = 1 ORDER BY $loai $sapxep";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function danh_sach_sap_xep_index($loai, $sapxep, $vitri, $record)
		{						
			$vitri = intval($vitri);
			$record = intval($record);

			$sql = "SELECT * FROM san_pham WHERE trang_thai = 1 ORDER BY $loai $sapxep LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_sap_xep_index($loai, $sapxep)
		{			
			
			$sql = "SELECT COUNT(*) FROM san_pham WHERE trang_thai = 1 ORDER BY $loai $sapxep";
			$this->setQuery($sql);
			return $this->loadResult();
		}


		function dem_tim_kiem($keyword){
			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);
			$sql = "SELECT COUNT(*) FROM san_pham WHERE ten LIKE '%$keyword%' OR code LIKE '%$keyword%' ORDER BY don_gia ASC";			
			$this->setQuery($sql);
			return $this->loadResult();
		}

		function tim_kiem_theo_ten($keyword)
		{
			
			$sql = "SELECT * FROM san_pham WHERE ten LIKE '%$keyword%' OR code LIKE '%$keyword%' ORDER BY don_gia ASC";			
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function tim_kiem_theo_gia($keyword, $gia_tu, $gia_den)
		{
			$gia_tu = intval($gia_tu);
			$gia_den = intval($gia_den);
			
			$sql = "SELECT * FROM san_pham WHERE ten LIKE '%$keyword%' AND don_gia BETWEEN $gia_tu AND $gia_den ORDER BY don_gia ASC";			
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function tim_kiem_theo_gia_va_loai($keyword, $ma_loai, $gia_tu, $gia_den)
		{
			$ma_loai = intval($ma_loai);
			$gia_tu = intval($gia_tu);
			$gia_den = intval($gia_den);
			
			$sql = "SELECT * FROM san_pham WHERE ten LIKE '%$keyword%' AND ma_loai_san_pham = $ma_loai AND don_gia BETWEEN $gia_tu AND $gia_den ORDER BY don_gia ASC";			
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function tim_kiem_theo_loai($keyword, $ma)
		{
			$ma = intval($ma);
			
			$sql = "SELECT * FROM san_pham WHERE ten LIKE '%$keyword%' AND ma_loai_san_pham = $ma ORDER BY don_gia ASC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function don_gia_max()
		{
			$sql = "select don_gia from san_pham where don_gia = (select max(don_gia) from san_pham)";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		function danh_sach_ban_chay()
		{						
			$sql = "SELECT * FROM san_pham WHERE ban_chay = 1 AND trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_tieu_bieu()
		{						
			$sql = "SELECT * FROM san_pham WHERE tieu_bieu = 1 AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 12";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM san_pham WHERE 1 = 1 ";
			if($type == 'code')
			{
				$sql .= " and code like '%$keyword%'";
			}
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'don_gia')
			{
				$sql .= " and don_gia = $keyword ";
			}
			if($type == 'khuyen_mai')
			{
				$sql .= " and khuyen_mai = $keyword ";
			}
			if($type == 'san_pham_moi')
			{
				$sql .= " and san_pham_moi = $keyword ";
			}
			
			$sql .= " ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_theo_ma_loai($ma_loai_san_pham, $vitri, $record)
		{
			$ma_loai_san_pham = intval($ma_loai_san_pham);
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM san_pham WHERE ma_loai_san_pham = $ma_loai_san_pham AND trang_thai = 1 LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_ma_loai_ko_phan_trang($ma_loai_san_pham)
		{
			$ma_loai_san_pham = intval($ma_loai_san_pham);			
			
			$sql = "SELECT * FROM san_pham WHERE ma_loai_san_pham = $ma_loai_san_pham AND trang_thai = 1 ";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_loai($ma_loai_san_pham)
		{
			$ma_loai_san_pham = intval($ma_loai_san_pham);			
			
			$sql = "SELECT * FROM san_pham WHERE ma_loai_san_pham = $ma_loai_san_pham AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 20";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_ma_hang($ma, $vitri, $record)
		{
			$ma = intval($ma);
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM san_pham WHERE ma_hang = $ma AND trang_thai = 1 ORDER BY ten LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_ma_loai_sp($ma, $vitri, $record)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM san_pham WHERE ma_loai_san_pham IN($ma) AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_full()
		{
			$sql = "SELECT * FROM san_pham WHERE trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cua_thang_1_sp()
		{
			$sql = "SELECT * FROM san_pham WHERE san_pham_moi = 1 AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 1";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cua_thang()
		{
			$sql = "SELECT * FROM san_pham WHERE san_pham_moi = 1 AND trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_phan_trang($vitri, $record)
		{
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM san_pham WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_khuyen_mai_phan_trang($vitri, $record)
		{
			$vitri = intval($vitri);
			$record = intval($record);
			
			$sql = "SELECT * FROM san_pham WHERE khuyen_mai > 0 AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_khuyen_mai_phan_trang()
		{		
			$sql = "SELECT COUNT(*) FROM san_pham WHERE trang_thai = 1 AND khuyen_mai > 0 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function danh_sach_san_pham_moi()
		{
			//$sql = "SELECT * FROM san_pham WHERE san_pham_moi = 1 and trang_thai = 1 AND ma > (SELECT FLOOR(MAX(ma) * RAND()) FROM san_pham) ORDER BY ma LIMIT 12";
			//$sql = "SELECT * FROM san_pham WHERE RAND()<(SELECT ((1/COUNT(*))*10) FROM san_pham) ORDER BY ma LIMIT 12";
			//$sql = " SELECT FLOOR(RAND() * COUNT(*)) FROM san_pham ";
			//$this->setQuery($sql);
			//$vitri = $this->loadResult();			
			//$sql2 = " SELECT * FROM san_pham WHERE san_pham_moi = 1 AND trang_thai = 1 LIMIT $vitri, 12";
			//$this->setQuery($sql2);
			//$this->setQuery($sql);
			$sql = "SELECT * FROM san_pham WHERE san_pham_moi = 1 AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 20";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_san_pham_moi_phan_trang($vitri, $record)
		{			
			$vitri = intval($vitri);
			$record = intval($record);
			$sql = "SELECT * FROM san_pham WHERE san_pham_moi = 1 and trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_san_pham_cung_loai($ma, $ma_loai)
		{
			$ma = intval($ma);
			$ma_loai = intval($ma_loai);
									
			$sql = "SELECT * FROM san_pham WHERE ma_loai_san_pham = $ma_loai AND ma <> $ma";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_san_pham_cung_loai_phan_trang($ma, $ma_loai)
		{
			$ma = intval($ma);
			$ma_loai = intval($ma_loai);			
									
			$sql = "SELECT * FROM san_pham WHERE ma_loai_san_pham = $ma_loai AND ma <> $ma AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 40";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_theo_loai_IN($ma_loai_san_pham)
		{
			//$ma_loai_san_pham = intval($ma_loai_san_pham);			
			
			$sql = "SELECT * FROM san_pham WHERE ma_loai_san_pham IN($ma_loai_san_pham) AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 12";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM san_pham";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong_phan_trang()
		{		
			$sql = "SELECT COUNT(*) FROM san_pham WHERE trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_sp_moi_phan_trang()
		{		
			$sql = "SELECT COUNT(*) FROM san_pham WHERE trang_thai = 1 AND san_pham_moi = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_san_pham_cung_loai_phan_trang($ma, $ma_loai)
		{
			$ma = intval($ma);
			$ma_loai = intval($ma_loai);			
									
			$sql = "SELECT COUNT(*) FROM san_pham WHERE ma_loai_san_pham = $ma_loai AND ma <> $ma AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_theo_ma_loai_sp($ma)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);
			
			$sql = "SELECT COUNT(*) FROM san_pham WHERE ma_loai_san_pham IN($ma) AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_san_pham_moi()
		{
			$sql = "SELECT COUNT(*) FROM san_pham WHERE san_pham_moi = 1 AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function so_luong_theo_ma($ma_loai_san_pham)
		{
			$ma_loai_san_pham = intval($ma_loai_san_pham);
			
			$sql = "SELECT COUNT(*) FROM san_pham WHERE ma_loai_san_pham = $ma_loai_san_pham ";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_theo_ma_hang($ma)
		{
			$ma = intval($ma);
			$sql = "SELECT COUNT(*) FROM san_pham WHERE ma_hang = $ma ";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM san_pham WHERE 1 = 1 ";
			if($type == 'code')
			{
				$sql .= " and code like '%$keyword%'";
			}
			if($type == 'ten')
			{
				$sql .= " and ten like '%$keyword%'";
			}
			if($type == 'don_gia')
			{
				$sql .= " and don_gia = $keyword ";
			}
			if($type == 'khuyen_mai')
			{
				$sql .= " and khuyen_mai = $keyword ";
			}
			if($type == 'san_pham_moi')
			{
				$sql .= " and san_pham_moi = $keyword ";
			}						
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($ma)
		{
			$ma = intval($ma);
			
			$sql = "select * from san_pham where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE san_pham SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function cap_nhat_san_pham($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE san_pham SET san_pham_moi = 1 - san_pham_moi WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function cap_nhat_ban_chay($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE san_pham SET ban_chay = 1 - ban_chay WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function cap_nhat_tieu_bieu($ma)
		{
			$ma = intval($ma);
	
			$sql ="UPDATE san_pham SET tieu_bieu = 1 - tieu_bieu WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function insert($code, $ten, $ten_en, $ten_cn, $ma_loai_san_pham, $ma_hang, $kich_thuoc, $mo_ta_tom_tat, $mo_ta_chi_tiet, $mo_ta_chi_tiet_en, $mo_ta_chi_tiet_cn, $don_gia, $khuyen_mai, $ban_chay, $hinh, $san_pham_moi, $so_lan_xem, $ngay_tao, $trang_thai, $ma_mau, $keyword, $description, $chat_lieu, $tieu_bieu, $kho, $gia_default)
		{
			$code = stripslashes($code);
			$code = addslashes($code);
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$ten_cn = stripslashes($ten_cn);
			$ten_cn = addslashes($ten_cn);
			$ma_loai_san_pham = intval($ma_loai_san_pham);
			$ma_hang = intval($ma_hang);
			$kich_thuoc = stripslashes($kich_thuoc);
			$kich_thuoc = addslashes($kich_thuoc);
			$mo_ta_tom_tat = stripslashes($mo_ta_tom_tat);
			$mo_ta_tom_tat = addslashes($mo_ta_tom_tat);
			$mo_ta_chi_tiet = stripslashes($mo_ta_chi_tiet);
			$mo_ta_chi_tiet = addslashes($mo_ta_chi_tiet);
			$mo_ta_chi_tiet_en = stripslashes($mo_ta_chi_tiet_en);
			$mo_ta_chi_tiet_en = addslashes($mo_ta_chi_tiet_en);
			$mo_ta_chi_tiet_cn = stripslashes($mo_ta_chi_tiet_cn);
			$mo_ta_chi_tiet_cn = addslashes($mo_ta_chi_tiet_cn);
			$don_gia = intval($don_gia);
			$khuyen_mai = intval($khuyen_mai);
			$ban_chay = intval($ban_chay);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$san_pham_moi = intval($san_pham_moi);
			$so_lan_xem = intval($so_lan_xem);
			$trang_thai = intval($trang_thai);
			$ma_mau = stripslashes($ma_mau);
			$ma_mau = addslashes($ma_mau);
			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);
			$description = stripslashes($description);
			$description = addslashes($description);
			$chat_lieu = stripslashes($chat_lieu);
			$chat_lieu = addslashes($chat_lieu);
			$tieu_bieu = intval($tieu_bieu);
			$kho = intval($kho);
			$gia_default = intval($gia_default);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into san_pham(code, ten, ten_en, ten_cn, ma_loai_san_pham, ma_hang, kich_thuoc, mo_ta_tom_tat, mo_ta_chi_tiet, mo_ta_chi_tiet_en, mo_ta_chi_tiet_cn, don_gia, khuyen_mai, ban_chay, hinh, san_pham_moi, so_lan_xem, ngay_tao, trang_thai, ma_mau, keyword, description, chat_lieu, tieu_bieu, kho, gia_default) values('$code', '$ten', '$ten_en', '$ten_cn', '$ma_loai_san_pham', '$ma_hang', '$kich_thuoc', '$mo_ta_tom_tat', '$mo_ta_chi_tiet', '$mo_ta_chi_tiet_en', '$mo_ta_chi_tiet_cn', '$don_gia', '$khuyen_mai', '$ban_chay', '$hinh', '$san_pham_moi', '$so_lan_xem', '$ngay_tao', '$trang_thai', '$ma_mau', '$keyword', '$description', '$chat_lieu', '$tieu_bieu', '$kho', '$gia_default')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $code, $ten, $ten_en, $ten_cn, $ma_loai_san_pham, $ma_hang, $kich_thuoc, $mo_ta_tom_tat, $mo_ta_chi_tiet, $mo_ta_chi_tiet_en, $mo_ta_chi_tiet_cn, $don_gia, $khuyen_mai, $ban_chay, $hinh, $san_pham_moi, $so_lan_xem, $ngay_tao, $trang_thai, $ma_mau, $keyword, $description, $chat_lieu, $tieu_bieu, $kho, $gia_default)
		{
			$ma = intval($ma);
			$code = stripslashes($code);
			$code = addslashes($code);
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ten_en = stripslashes($ten_en);
			$ten_en = addslashes($ten_en);
			$ten_cn = stripslashes($ten_cn);
			$ten_cn = addslashes($ten_cn);
			$ma_loai_san_pham = intval($ma_loai_san_pham);
			$ma_hang = intval($ma_hang);
			$kich_thuoc = stripslashes($kich_thuoc);
			$kich_thuoc = addslashes($kich_thuoc);
			$mo_ta_tom_tat = stripslashes($mo_ta_tom_tat);
			$mo_ta_tom_tat = addslashes($mo_ta_tom_tat);
			$mo_ta_chi_tiet = stripslashes($mo_ta_chi_tiet);
			$mo_ta_chi_tiet = addslashes($mo_ta_chi_tiet);
			$mo_ta_chi_tiet_en = stripslashes($mo_ta_chi_tiet_en);
			$mo_ta_chi_tiet_en = addslashes($mo_ta_chi_tiet_en);
			$mo_ta_chi_tiet_cn = stripslashes($mo_ta_chi_tiet_cn);
			$mo_ta_chi_tiet_cn = addslashes($mo_ta_chi_tiet_cn);
			$don_gia = intval($don_gia);
			$khuyen_mai = intval($khuyen_mai);
			$ban_chay = intval($ban_chay);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			$san_pham_moi = intval($san_pham_moi);
			$so_lan_xem = intval($so_lan_xem);
			$trang_thai = intval($trang_thai);
			$ma_mau = stripslashes($ma_mau);
			$ma_mau = addslashes($ma_mau);
			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);
			$description = stripslashes($description);
			$description = addslashes($description);
			$chat_lieu = stripslashes($chat_lieu);
			$chat_lieu = addslashes($chat_lieu);
			$tieu_bieu = intval($tieu_bieu);
			$kho = intval($kho);
			$gia_default = intval($gia_default);
			if($hinh == '')
			{
				$sql = "UPDATE san_pham SET code = '$code',
				ten = '$ten',
				ten_en = '$ten_en',
				ten_cn = '$ten_cn', 
				ma_loai_san_pham = '$ma_loai_san_pham',
				ma_hang = '$ma_hang',
				kich_thuoc = '$kich_thuoc',
				mo_ta_tom_tat = '$mo_ta_tom_tat', 
				mo_ta_chi_tiet = '$mo_ta_chi_tiet',
				mo_ta_chi_tiet_en = '$mo_ta_chi_tiet_en',
				mo_ta_chi_tiet_cn = '$mo_ta_chi_tiet_cn', 
				don_gia = '$don_gia',
				khuyen_mai = '$khuyen_mai',
				ban_chay = '$ban_chay',
				san_pham_moi = '$san_pham_moi', 
				so_lan_xem = '$so_lan_xem', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai',
				ma_mau = '$ma_mau',
				keyword = '$keyword',
				description = '$description', 
				chat_lieu = '$chat_lieu',
				tieu_bieu = '$tieu_bieu',
				kho = '$kho',
				gia_default = '$gia_default'     
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE san_pham SET code = '$code',
				ten = '$ten', 
				ten_en = '$ten_en',
				ten_cn = '$ten_cn',
				ma_loai_san_pham = '$ma_loai_san_pham',
				ma_hang = '$ma_hang',
				kich_thuoc = '$kich_thuoc',
				mo_ta_tom_tat = '$mo_ta_tom_tat', 
				mo_ta_chi_tiet = '$mo_ta_chi_tiet', 
				mo_ta_chi_tiet_en = '$mo_ta_chi_tiet_en',
				mo_ta_chi_tiet_cn = '$mo_ta_chi_tiet_cn',
				don_gia = '$don_gia',
				khuyen_mai = '$khuyen_mai',
				ban_chay = '$ban_chay',
				hinh = '$hinh', 
				san_pham_moi = '$san_pham_moi', 
				so_lan_xem = '$so_lan_xem', 
				ngay_tao = '$ngay_tao', 
				trang_thai = '$trang_thai',
				ma_mau = '$ma_mau',
				keyword = '$keyword',
				description = '$description',
				chat_lieu = '$chat_lieu',
				tieu_bieu = '$tieu_bieu',
				kho = '$kho',
				gia_default = '$gia_default'      
				WHERE ma = '$ma'";
			}
			
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			$sql = "DELETE FROM san_pham WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
		function update_so_lan_xem($ma)
		{
			$ma = intval($ma);
 			$sql = "UPDATE san_pham SET so_lan_xem = so_lan_xem + 1 WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function them_hinh($ma, $hinh)
		{
			$ma = intval($ma);
			$sql = "UPDATE san_pham SET hinh = CONCAT(hinh, '$hinh') WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}
		function xoa_hinh($ma, $hinh)
		{
			$ma = intval($ma);
			$sql = "UPDATE san_pham SET hinh = '$hinh' WHERE ma = $ma";
			$this->setQuery($sql);
			return $this->query();
		}
		function danh_sach_san_pham_moi_home()
		{						
			$sql = "SELECT * FROM san_pham WHERE san_pham_moi = 1 AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 8";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function maxprice()
		{
			$sql = "select max(don_gia), trang_thai from san_pham where trang_thai = 1 limit 0, 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function danh_sach_filter($minprc, $maxprc)
		{
			$minprc = intval($minprc);
			$maxprc = intval($maxprc);
			
			$sql = "SELECT * FROM san_pham WHERE don_gia BETWEEN $minprc AND $maxprc AND trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_san_pham()
		{
			
			$sql = "SELECT * FROM san_pham WHERE trang_thai = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_full_theo_ten()
		{
			$sql = "SELECT ma, ten FROM san_pham WHERE trang_thai = 1 ORDER BY ten";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}
?>