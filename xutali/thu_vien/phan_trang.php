<?php
	class phan_trang
	{
		//TÌM TRANG HIỆN TẠI
		function tim_trang_hien_tai()
		{
			if(!empty($_GET['page']))
				$page = $_GET['page'];
			else
				$page = 1;
			return $page;
		}

		//TÌM VỊ TRÍ ĐỂ QUERY
		function tim_vi_tri($page, $record)
		{
			$vitri = ($page - 1) * $record;
			return $vitri;
		}
		
		//TÌM TỔNG SỐ TRANG
		function tong_so_trang($tong_so_record, $record)
		{
			$tong_so_trang = ceil($tong_so_record / $record);
			return $tong_so_trang;
		}

		//IN BỘ NÚT
		function in_bo_nut($page, $tong_so_trang)
		{
			//DÙNG THAM SỐ THAY CHO {$_GET['ma_hang']}						
			$tham_so = $_SERVER['QUERY_STRING'];
			$tham_so = str_replace("&page=$page", '', $tham_so);
			$tham_so = str_replace("page=$page", '', $tham_so);
		
			/*echo '<pre>';
			print_r($_SERVER);
			echo '<pre>';*/
			
			$path = $_SERVER['REQUEST_URI'];			
			if(preg_match("/\/page-[0-9]/i", $path))
			{				
				$path = preg_replace("/\/page-[0-9]+/i", '/', $path);
				//echo $path.'<br>';
			}

			if(preg_match("/bai_viet\/list.php/i", $_SERVER['PHP_SELF']))
			{												
				if(preg_match("/[0-9]$/i", $path))
				{										
					$path .= '/';
				}
				
			}
			if(preg_match("/chuyen_khoa\/news.php/i", $_SERVER['PHP_SELF']))
			{												
				if(preg_match("/[0-9]$/i", $path))
				{										
					$path .= '/';
				}
				
			}

			//echo $path.'<br>';//exit;

			if($tham_so != '')
				$tham_so.= '&';

			if($page > 1)
			{
				//In nút First
				echo "<li><a class='number' href='{$path}page-1'>&lt;&lt; </a></li>";
				//In nút Back
				$back = $page - 1;
				echo "<li><a class='number' href='{$path}page-$back'>&lt; </a></li>";
			}
			else
			{
				/*//In nút First
				echo "<a class='number an'>&lt;&lt; </a>";
				//In nút Back
				echo "<a class='number an'>&lt; </a>";*/
			}

			//IN RA CÁC TRANG GẦN KỀ CÁCH NHAU 3 TRANG
			$vitri_dau = max($page - 3, 1);
			$vitri_sau = min($page + 3, $tong_so_trang);

			//LUÔN HIỂN THỊ 7 TRANG
			if($vitri_sau - $vitri_dau < 6)
			{

				//NẾU Ở CẬN TRÁI => VỊ TRÍ ĐẦU = 1, XỬ LÝ BÊN CẬN PHẢI
				if($vitri_dau == 1)
					$vitri_sau = min($vitri_dau + 6, $tong_so_trang);
				else
					$vitri_dau = max($vitri_sau - 6, 1);
			}

			//HIỂN THỊ DẤU '...' NẾU VỊ TRÍ ĐẦU CHƯA PHẢI 1
			if($vitri_dau != 1)
				echo '<li>...</li>';

			//IN TRANG
			for($i = $vitri_dau; $i <= $vitri_sau; $i++)
			//In ra tất cả các trang
			//for($i = 1; $i <= $tong_so_trang; $i++)
			{
				if($i == $page)
				{
					//echo "<a class='number current-pt'><strong>$i</strong></a>";
					echo "<li class='active'><span><strong>$i</strong></span></li>";
				}
				else
				{
					echo "<li><a href='{$path}page-$i'>$i</a></li>";
					//echo "<a class='number' href='{$path}page-$i'>$i</a>";
				}
			}

			//HIỂN THỊ DẤU '...' NẾU VỊ TRÍ SAU CHƯA PHẢI TỔNG SỐ TRANG
			if($vitri_sau != $tong_so_trang)
				echo '<li>...</li>';

			if($page < $tong_so_trang)
			{
				//In nút Next
				$next = $page + 1;
				//echo "<a class='number' href='{$path}page-$next'>&gt; </a>";
				echo "<li><a href='{$path}page-$next'>&gt;</a></li>";				
				//In nút Last
				//echo "<a class='number' href='{$path}page-$tong_so_trang'>&gt;&gt; </a>";
				echo "<li><a href='{$path}page-$tong_so_trang'>&gt;&gt; </a></li>";
			}
			else
			{
				/*//In nút Next
				echo "<a class='number an'>&gt; </a>";
				//In nút Last
				echo "<a class='number an'>&gt;&gt; </a>";*/
			}

		}

	}

?>