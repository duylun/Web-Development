<?php

	require_once 'database.php';

	class xl_banner_slider extends database

	{

		

		function danh_sach($keyword, $type, $vitri, $record)

		{	

			$sql = "SELECT * FROM banner_slider WHERE 1 = 1 ";

			if($type == 'tieu_de')

			{

				$sql .= " and tieu_de like '%$keyword%'";

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

			$sql = "SELECT * FROM banner_slider WHERE trang_thai = 1 ORDER BY RAND()";

			$this->setQuery($sql);

			return $this->loadAllRow();

		}

		function danh_sach_full_adm()

		{

			$sql = "SELECT * FROM banner_slider";

			$this->setQuery($sql);

			return $this->loadAllRow();

		}

		

		function danh_sach_cot()

		{

			$sql = "SHOW COLUMNS FROM banner_slider";

			$this->setQuery($sql);

			return $this->loadAllRow();

		}

		function cap_nhat_trang_thai($ma)

		{

			$ma = intval($ma);

			$sql = "UPDATE banner_slider SET trang_thai = 1 - trang_thai WHERE ma = $ma";

			$this->setQuery($sql);

			return $this->query();			

		}

		function so_luong($keyword, $type)

		{	

			$sql = "SELECT COUNT(*) FROM banner_slider WHERE 1 = 1 ";

			if($type == 'tieu_de')

			{

				$sql .= " and tieu_de like '%$keyword%'";

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

			

			

			$sql = "select * from banner_slider where ma = '$ma' limit 0, 1";

			$this->setQuery($sql);

			return $this->loadRow();

		}

		

		function insert($link, $tieu_de, $hinh, $trang_thai)

		{

			$link = stripslashes($link);

			$link = addslashes($link);

			$tieu_de = stripslashes($tieu_de);

			$tieu_de = addslashes($tieu_de);

			$hinh = stripslashes($hinh);

			$hinh = addslashes($hinh);

			$trang_thai = intval($trang_thai);

			

			

			$sql = "insert into banner_slider(link, tieu_de, hinh, trang_thai) values('$link', '$tieu_de', '$hinh', '$trang_thai')";

			$this->setQuery($sql);

			return $this->query();

		}

		

		function update($ma, $link, $tieu_de, $hinh, $trang_thai)

		{

			$ma = intval($ma);

			

			$link = stripslashes($link);

			$link = addslashes($link);

			$tieu_de = stripslashes($tieu_de);

			$tieu_de = addslashes($tieu_de);

			$hinh = stripslashes($hinh);

			$hinh = addslashes($hinh);

			$trang_thai = intval($trang_thai);

			

			if($hinh == ''){

				$sql = "UPDATE banner_slider SET link = '$link', 

					tieu_de = '$tieu_de',					

					trang_thai = '$trang_thai' 

				WHERE ma = '$ma'";

			}

			else{

				$sql = "UPDATE banner_slider SET link = '$link', 

					tieu_de = '$tieu_de', 

					hinh = '$hinh', 

					trang_thai = '$trang_thai' 

				WHERE ma = '$ma'";

			}

			$this->setQuery($sql);

			return $this->query();

		}

		

		function delete($ma)

		{

			$ma = intval($ma);

			

			

			$sql = "DELETE FROM banner_slider WHERE ma = '$ma'";

			$this->setQuery($sql);

			return $this->query();

		}

	}

?>