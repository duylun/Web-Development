<?php

	require_once 'database.php';

	class xl_bai_viet extends database

	{

		

		function danh_sach($keyword, $type, $vitri, $record)
		{
			$sql = "SELECT * FROM bai_viet WHERE 1 = 1 ";
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}

			if($type == 'noi_dung_tom_tat')
			{
				$sql .= " and noi_dung_tom_tat like '%$keyword%'";
			}

			if($type == 'noi_dung_chi_tiet')
			{
				$sql .= " and noi_dung_chi_tiet like '%$keyword%'";
			}

			if($type == 'trang_thai')
			{
				$sql .= " and trang_thai = $keyword ";
			}

			$sql .= " ORDER BY ma DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function bai_viet_moi_hon($ma, $ma_loai, $ngay_tao)
		{
			$ma = intval($ma);
			$sql = "SELECT ma, tieu_de FROM bai_viet WHERE ma <> $ma AND ma_loai_bai_viet = $ma_loai AND ngay_tao > '".$ngay_tao."' ORDER BY ngay_tao DESC LIMIT 5";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function bai_viet_cu_hon($ma, $ngay_tao)
		{
			$ma = intval($ma);
			$sql = "SELECT ma, tieu_de FROM bai_viet WHERE ma <> $ma AND ma_loai_bai_viet = $ma_loai AND ngay_tao < '".$ngay_tao."' ORDER BY ngay_tao DESC LIMIT 5";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_full()
		{
			$sql = "SELECT * FROM bai_viet";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_ba_bai_viet()
		{
			$sql = "SELECT * FROM bai_viet WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 0, 3";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_tin_con($vitri, $record)
		{
			$sql = "SELECT ma FROM bai_viet WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 3";
			$this->setQuery($sql);
			$ar = $this->loadAllRow();
			$str = '';
			foreach($ar as $ma)
			{
				$str .= $ma['ma']. ', ';
			}
			$str = trim($str, ', ');			
			$sql2 = "SELECT * FROM bai_viet WHERE trang_thai = 1 AND ma NOT IN($str) ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql2);
			return $this->loadAllRow();
		}

		function danh_sach_bai_viet_moi()
		{
			$sql = "SELECT ma, tieu_de FROM bai_viet ORDER BY ngay_tao DESC LIMIT 1, 4";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_bv_moi_home()
		{
			$sql = "SELECT * FROM bai_viet WHERE trang_thai = 1 AND doc_nhieu = 1 ORDER BY ngay_tao DESC LIMIT 8";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		
		function danh_sach_tin_moi()
		{
			$sql = "SELECT * FROM bai_viet WHERE ma_loai_bai_viet = 3 AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 9";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_tin_doc_nhieu()
		{
			$sql = "SELECT * FROM bai_viet WHERE ma_loai_bai_viet = 3 AND trang_thai = 1 AND doc_nhieu = 1 ORDER BY ngay_tao DESC LIMIT 4";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}			

		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM bai_viet";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_theo_ma_loai($ma, $vitri, $record)
		{
			$ma = intval($ma);

			$sql = "SELECT * FROM bai_viet WHERE ma_loai_bai_viet = $ma LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_cung_loai($ma, $ma_loai)
		{
			$ma = intval($ma);
			$ma_loai = intval($ma_loai);

			$sql = "SELECT * FROM bai_viet WHERE ma_loai_bai_viet = $ma_loai AND ma <> $ma AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 5";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_theo_ma_loai_bv($ma, $vitri, $record)
		{
			$ma = stripslashes($ma);
			$ma = addslashes($ma);

			$sql = "SELECT * FROM bai_viet WHERE ma_loai_bai_viet IN($ma) AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();

		}

		function danh_sach_theo_ma_khoa($ma, $vitri, $record)
		{
			$ma = intval($ma);
			
			$sql = "SELECT * FROM bai_viet WHERE ma_khoa = $ma AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();

		}

		function danh_sach_tin_home_2($ma_loai)
		{
			$ma_loai = stripslashes($ma_loai);
			$ma_loai = addslashes($ma_loai);
			
			$sql = "SELECT * FROM bai_viet WHERE trang_thai = 1 AND doc_nhieu = 1 AND ma_loai_bai_viet IN($ma_loai) ORDER BY ngay_tao DESC LIMIT 8";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function so_luong($keyword, $type)
		{
			$sql = "SELECT COUNT(*) FROM bai_viet WHERE 1 = 1 ";
			if($type == 'tieu_de')
			{
				$sql .= " and tieu_de like '%$keyword%'";
			}

			if($type == 'noi_dung_tom_tat')
			{
				$sql .= " and noi_dung_tom_tat like '%$keyword%'";
			}

			if($type == 'noi_dung_chi_tiet')
			{
				$sql .= " and noi_dung_chi_tiet like '%$keyword%'";
			}

			if($type == 'trang_thai')
			{
				$sql .= " and trang_thai = $keyword ";
			}

			$sql .= " ORDER BY ma DESC";
			$this->setQuery($sql);
			return $this->loadResult();
		}

		function so_luong_theo_ma($ma)
		{

			$ma = stripslashes($ma);
			$ma = addslashes($ma);

			$sql = "SELECT COUNT(*) FROM bai_viet WHERE ma_loai_bai_viet IN($ma) AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		function so_luong_theo_ma_khoa($ma)
		{

			$ma = intval($ma);

			$sql = "SELECT COUNT(*) FROM bai_viet WHERE ma_khoa = $ma AND trang_thai = 1";
			$this->setQuery($sql);
			return $this->loadResult();
		}

		function so_luong_tin_con()
		{
			$sql = "SELECT ma FROM bai_viet WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 3";
			$this->setQuery($sql);
			$ar = $this->loadAllRow();
			$str = '';

			foreach($ar as $ma)
			{
				$str .= $ma['ma']. ', ';
			}
			$str = trim($str, ', ');
			$sql2 = "SELECT COUNT(*) FROM bai_viet WHERE trang_thai = 1 AND ma NOT IN($str) ORDER BY ngay_tao DESC";
			$this->setQuery($sql2);
			return $this->loadResult();
		}

		function chi_tiet($ma)
		{
			$ma = intval($ma);

			$sql = "select * from bai_viet where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}

		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);

			$sql ="UPDATE bai_viet SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function cap_nhat_doc_nhieu($ma)
		{
			$ma = intval($ma);

			$sql ="UPDATE bai_viet SET doc_nhieu= 1 - doc_nhieu WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function insert($ma_loai_bai_viet, $ma_nguoi_dung, $ma_khoa, $tieu_de, $tieu_de_en, $noi_dung_tom_tat, $noi_dung_tom_tat_en, $noi_dung_chi_tiet, $noi_dung_chi_tiet_en, $keyword, $description, $ngay_tao, $so_lan_xem, $trang_thai, $doc_nhieu, $hinh)
		{

			$ma_loai_bai_viet = intval($ma_loai_bai_viet);
			$ma_nguoi_dung = intval($ma_nguoi_dung);
			$ma_khoa = intval($ma_khoa);

			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$tieu_de = htmlspecialchars($tieu_de);

			$tieu_de_en = stripslashes($tieu_de_en);
			$tieu_de_en = addslashes($tieu_de_en);
			$tieu_de_en = htmlspecialchars($tieu_de_en);

			$noi_dung_tom_tat = stripslashes($noi_dung_tom_tat);
			$noi_dung_tom_tat = addslashes($noi_dung_tom_tat);

			$noi_dung_tom_tat_en = stripslashes($noi_dung_tom_tat_en);
			$noi_dung_tom_tat_en = addslashes($noi_dung_tom_tat_en);

			$noi_dung_chi_tiet = stripslashes($noi_dung_chi_tiet);
			$noi_dung_chi_tiet = addslashes($noi_dung_chi_tiet);

			$noi_dung_chi_tiet_en = stripslashes($noi_dung_chi_tiet_en);
			$noi_dung_chi_tiet_en = addslashes($noi_dung_chi_tiet_en);

			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);

			$description = stripslashes($description);
			$description = addslashes($description);

			$so_lan_xem = intval($so_lan_xem);
			$trang_thai = intval($trang_thai);

			$doc_nhieu = intval($doc_nhieu);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			else
				$ngay_tao = $ngay_tao;
			$sql = "insert into bai_viet(ma_loai_bai_viet, ma_nguoi_dung, ma_khoa, tieu_de, tieu_de_en, noi_dung_tom_tat, noi_dung_tom_tat_en, noi_dung_chi_tiet, noi_dung_chi_tiet_en, keyword, description, ngay_tao, so_lan_xem, trang_thai, doc_nhieu, hinh) values('$ma_loai_bai_viet', '$ma_nguoi_dung', '$ma_khoa', '$tieu_de', '$tieu_de_en', '$noi_dung_tom_tat', '$noi_dung_tom_tat_en', '$noi_dung_chi_tiet', '$noi_dung_chi_tiet_en', '$keyword', '$description', '$ngay_tao', '$so_lan_xem', '$trang_thai', '$doc_nhieu', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}

		
		function update($ma, $ma_loai_bai_viet, $ma_nguoi_dung, $ma_khoa, $tieu_de, $tieu_de_en, $noi_dung_tom_tat, $noi_dung_tom_tat_en, $noi_dung_chi_tiet, $noi_dung_chi_tiet_en, $keyword, $description, $ngay_tao, $so_lan_xem, $trang_thai, $doc_nhieu, $hinh)
		{
			$ma = intval($ma);
			$ma_loai_bai_viet = intval($ma_loai_bai_viet);
			$ma_nguoi_dung = intval($ma_nguoi_dung);
			$ma_khoa = intval($ma_khoa);

			$tieu_de = stripslashes($tieu_de);
			$tieu_de = addslashes($tieu_de);
			$tieu_de = htmlspecialchars($tieu_de);

			$tieu_de_en = stripslashes($tieu_de_en);
			$tieu_de_en = addslashes($tieu_de_en);
			$tieu_de_en = htmlspecialchars($tieu_de_en);

			$noi_dung_tom_tat = stripslashes($noi_dung_tom_tat);
			$noi_dung_tom_tat = addslashes($noi_dung_tom_tat);

			$noi_dung_tom_tat_en = stripslashes($noi_dung_tom_tat_en);
			$noi_dung_tom_tat_en = addslashes($noi_dung_tom_tat_en);

			$noi_dung_chi_tiet = stripslashes($noi_dung_chi_tiet);
			$noi_dung_chi_tiet = addslashes($noi_dung_chi_tiet);

			$noi_dung_chi_tiet_en = stripslashes($noi_dung_chi_tiet_en);
			$noi_dung_chi_tiet_en = addslashes($noi_dung_chi_tiet_en);

			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);

			$description = stripslashes($description);
			$description = addslashes($description);

			$so_lan_xem = intval($so_lan_xem);
			$trang_thai = intval($trang_thai);
			$doc_nhieu = intval($doc_nhieu);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');

			if($hinh == '')
			{
				$sql = "UPDATE bai_viet SET ma_loai_bai_viet = '$ma_loai_bai_viet', 

					ma_nguoi_dung = '$ma_nguoi_dung',
					ma_khoa = '$ma_khoa',
					tieu_de = '$tieu_de',
					tieu_de_en = '$tieu_de_en',
					noi_dung_tom_tat = '$noi_dung_tom_tat',
					noi_dung_tom_tat_en = '$noi_dung_tom_tat_en', 
					noi_dung_chi_tiet = '$noi_dung_chi_tiet', 
					noi_dung_chi_tiet_en = '$noi_dung_chi_tiet_en', 
					keyword = '$keyword',
					description = '$description',
					ngay_tao = '$ngay_tao', 
					so_lan_xem = '$so_lan_xem', 
					trang_thai = '$trang_thai',
					doc_nhieu = '$doc_nhieu'
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE bai_viet SET ma_loai_bai_viet = '$ma_loai_bai_viet', 
					ma_nguoi_dung = '$ma_nguoi_dung',
					ma_khoa = '$ma_khoa',
					tieu_de = '$tieu_de',
					tieu_de_en = '$tieu_de_en',
					noi_dung_tom_tat = '$noi_dung_tom_tat',
					noi_dung_tom_tat_en = '$noi_dung_tom_tat_en', 
					noi_dung_chi_tiet = '$noi_dung_chi_tiet', 
					noi_dung_chi_tiet_en = '$noi_dung_chi_tiet_en',
					keyword = '$keyword',
					description = '$description', 
					ngay_tao = '$ngay_tao', 
					so_lan_xem = '$so_lan_xem', 
					trang_thai = '$trang_thai',
					doc_nhieu = '$doc_nhieu', 
					hinh = '$hinh' 
				WHERE ma = '$ma'";
			}
			$this->setQuery($sql);
			return $this->query();
		}


		function delete($ma)
		{
			$ma = intval($ma);

			$sql = "DELETE FROM bai_viet WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function update_so_lan_xem($ma)
		{
			$ma = intval($ma);
			$sql = "UPDATE bai_viet SET so_lan_xem = so_lan_xem + 1 WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		//Hàm này cho file index mục tin tức
		function danh_sach_tin($vitri, $record)
		{
			$vitri = intval($vitri);
			$record = intval($record);

			$sql = "SELECT * FROM bai_viet WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $vitri, $record";

			$this->setQuery($sql);

			return $this->loadAllRow();
		}
		function so_luong_tin()
		{

			$sql = "SELECT COUNT(*) FROM bai_viet WHERE trang_thai = 1 ORDER BY ngay_tao DESC";

			$this->setQuery($sql);

			return $this->loadResult();
		}

		//Hàm này cho widget trang chi tiết
		function danh_sach_tin_moi_widget()
		{

			$sql = "SELECT * FROM bai_viet WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 5";

			$this->setQuery($sql);

			return $this->loadAllRow();
		}

		//widget trang home
		function danh_sach_tin_moi_widget_home()
		{

			$sql = "SELECT * FROM bai_viet WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT 12";

			$this->setQuery($sql);

			return $this->loadAllRow();
		}
		//Hàm này cho widget tin tức
		function danh_sach_tin_quan_tam_widget()
		{

			$sql = "SELECT * FROM bai_viet WHERE trang_thai = 1 ORDER BY so_lan_xem DESC LIMIT 5";

			$this->setQuery($sql);

			return $this->loadAllRow();
		}

		//widget tin khuyến mãi
		function danh_sach_tin_khuyen_mai()
		{
			$sql = "SELECT ma, ma_loai_bai_viet, tieu_de, noi_dung_tom_tat, ngay_tao, hinh, trang_thai, doc_nhieu FROM bai_viet WHERE trang_thai = 1 AND doc_nhieu = 1 AND ma_loai_bai_viet = 3 ORDER BY ngay_tao DESC LIMIT 12";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_tin_thi_truong()
		{
			$sql = "SELECT ma, ma_loai_bai_viet, tieu_de, noi_dung_tom_tat, ngay_tao, hinh, trang_thai, doc_nhieu FROM bai_viet WHERE trang_thai = 1 AND doc_nhieu = 1 AND ma_loai_bai_viet = 2 ORDER BY ngay_tao DESC LIMIT 4";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function danh_sach_tin_cong_ty()
		{
			$sql = "SELECT ma, ma_loai_bai_viet, tieu_de, noi_dung_tom_tat, ngay_tao, hinh, trang_thai, doc_nhieu FROM bai_viet WHERE trang_thai = 1 AND doc_nhieu = 1 AND ma_loai_bai_viet = 1 ORDER BY ngay_tao DESC LIMIT 4";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function tim_kiem_theo_ten($keyword)
		{
			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);

			$sql = "SELECT * FROM bai_viet WHERE tieu_de LIKE '%$keyword%' OR noi_dung_tom_tat LIKE '%$keyword%' OR noi_dung_chi_tiet LIKE '%$keyword%' ORDER BY ngay_tao DESC";			
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		function tim_kiem_theo_ten_en($keyword)
		{
			$keyword = stripslashes($keyword);
			$keyword = addslashes($keyword);
			
			$sql = "SELECT * FROM bai_viet WHERE tieu_de_en LIKE '%$keyword%' OR noi_dung_tom_tat_en LIKE '%$keyword%' OR noi_dung_chi_tiet_en LIKE '%$keyword%' ORDER BY ngay_tao DESC";		
			$this->setQuery($sql);
			return $this->loadAllRow();
		}

		function danh_sach_dich_vu()
		{
			$sql = "SELECT * FROM bai_viet WHERE ma_loai_bai_viet = 1 AND trang_thai = 1 AND doc_nhieu = 1 ORDER BY ngay_tao DESC";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
	}

?>