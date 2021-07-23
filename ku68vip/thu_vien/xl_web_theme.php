<?php
	require_once 'database.php';
	class xl_web_theme extends database
	{
		function infinitescroll()
		{
			require_once 'xl_web_type.php';
			$dt_xl_web_type = new xl_web_type;

			// pagination
	        $iPage = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	        $iPerPage = (isset($_GET['per_page'])) ? (int)$_GET['per_page'] : 10;
	        $iPage = ($iPage < 1) ? 1 : $iPage;
	        $iFrom = ($iPage - 1) * $iPerPage;
	        $iFrom = ($iFrom < 1) ? 0 : $iFrom;
	        $sLimit = "LIMIT {$iFrom}, {$iPerPage}";

	        $base_url = base_url;        

	        $sql = "SELECT * FROM web_theme WHERE trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $iFrom, $iPerPage";			
			$this->setQuery($sql);
			$san_pham = $this->loadAllRow();
			$image = '';
			foreach ($san_pham as $sp) {
				$ten_loai = $dt_xl_web_type->chi_tiet($sp['ma_loai']);
				if($sp['hinh'] != '')
				{
					$hinh = explode(', ', $sp['hinh']);
					if(!is_file(ROOT_PATH.'/upload/hinh_web_theme/'.$hinh[0]))
						$hinh[0] = 'noimage.jpg';
				}
				//alias
                $alias = $this->convert_vi_to_en($sp['ten']);
                $alias_ten_loai = $this->convert_vi_to_en($ten_loai['ten']);

				$image .= <<<EOF
				<!-- pin element {$sp['ma']} -->
<div class="pin" pin_id="{$sp['ma']}">
    <div class="holder">
        <a class="image" href="{$base_url}/demo/{$alias}-{$sp['ma']}.html" title="{$sp['ten']}">
            <img alt="{$sp['ten']}" src="{$base_url}/upload/hinh_web_theme/{$hinh[0]}">
        </a>
    </div>
    <p class="desc"><a class="pdname" href="{$base_url}/demo/{$alias}-{$sp['ma']}.html" title=""><i class="fa fa-ticket"></i>{$sp['ten']}</a></p>
    <p class="type"><a class="ptype" href="{$base_url}/web-template/{$alias_ten_loai}-{$ten_loai['ma']}" title=""><i class="fa fa-tags"></i>{$ten_loai['ten']}</a></p>
</div>
EOF;
			}
			return $image;
		}

		function infinitescroll_theo_ma($ma_loai)
		{
			$ma_loai = intval($ma_loai);

			require_once 'xl_web_type.php';
			$dt_xl_web_type = new xl_web_type;

			// pagination
	        $iPage = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	        $iPerPage = (isset($_GET['per_page'])) ? (int)$_GET['per_page'] : 10;
	        $iPage = ($iPage < 1) ? 1 : $iPage;
	        $iFrom = ($iPage - 1) * $iPerPage;
	        $iFrom = ($iFrom < 1) ? 0 : $iFrom;
	        $sLimit = "LIMIT {$iFrom}, {$iPerPage}";

	        $base_url = base_url;        

	        $sql = "SELECT * FROM web_theme WHERE ma_loai = $ma_loai AND trang_thai = 1 ORDER BY ngay_tao DESC LIMIT $iFrom, $iPerPage";			
			$this->setQuery($sql);
			$san_pham = $this->loadAllRow();
			$image = '';
			foreach ($san_pham as $sp) {
				$ten_loai = $dt_xl_web_type->chi_tiet($sp['ma_loai']);
				if($sp['hinh'] != '')
				{
					$hinh = explode(', ', $sp['hinh']);
					if(!is_file(ROOT_PATH.'/upload/hinh_web_theme/'.$hinh[0]))
						$hinh[0] = 'noimage.jpg';
				}
				//alias
                $alias = $this->convert_vi_to_en($sp['ten']);
                $alias_ten_loai = $this->convert_vi_to_en($ten_loai['ten']);

				$image .= <<<EOF
				<!-- pin element {$sp['ma']} -->
<div class="pin" pin_id="{$sp['ma']}">
    <div class="holder">
        <a class="image" href="{$base_url}/demo/{$alias}-{$sp['ma']}.html" title="{$sp['ten']}">
            <img alt="{$sp['ten']}" src="{$base_url}/upload/hinh_web_theme/{$hinh[0]}">
        </a>
    </div>
    <p class="desc"><a class="pdname" href="{$base_url}/demo/{$alias}-{$sp['ma']}.html" title=""><i class="fa fa-ticket"></i>{$sp['ten']}</a></p>
    <p class="type"><a class="ptype" href="{$base_url}/web-template/{$alias_ten_loai}-{$ten_loai['ma']}" title=""><i class="fa fa-tags"></i>{$ten_loai['ten']}</a></p>
</div>
EOF;
			}
			return $image;
		}

		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM web_theme WHERE 1 = 1 ";
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
			$sql = "SELECT * FROM web_theme";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM web_theme";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM web_theme WHERE 1 = 1 ";
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
			
			
			$sql = "select * from web_theme where ma = '$ma' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($ten, $ma_loai, $ngay_tao, $link, $trang_thai, $hinh)
		{
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_loai = intval($ma_loai);
			$link = stripslashes($link);
			$link = addslashes($link);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			
			$sql = "insert into web_theme(ten, ma_loai, ngay_tao, link, trang_thai, hinh) values('$ten', '$ma_loai', '$ngay_tao', '$link', '$trang_thai', '$hinh')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($ma, $ten, $ma_loai, $ngay_tao, $link, $trang_thai, $hinh)
		{
			$ma = intval($ma);
			
			$ten = stripslashes($ten);
			$ten = addslashes($ten);
			$ma_loai = intval($ma_loai);
			$link = stripslashes($link);
			$link = addslashes($link);
			$trang_thai = intval($trang_thai);
			$hinh = stripslashes($hinh);
			$hinh = addslashes($hinh);
			if($ngay_tao == '')
				$ngay_tao = date('Y-m-d H:i:s');
			if($hinh == '')
			{
				$sql = "UPDATE web_theme SET ten = '$ten', 
				ma_loai = '$ma_loai', 
				ngay_tao = '$ngay_tao', 
				link = '$link', 
				trang_thai = '$trang_thai'
				WHERE ma = '$ma'";
			}
			else
			{
				$sql = "UPDATE web_theme SET ten = '$ten', 
				ma_loai = '$ma_loai', 
				ngay_tao = '$ngay_tao', 
				link = '$link', 
				trang_thai = '$trang_thai', 
				hinh = '$hinh' 
				WHERE ma = '$ma'";
			}
			
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($ma)
		{
			$ma = intval($ma);
			
			
			$sql = "DELETE FROM web_theme WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}

		function cap_nhat_trang_thai($ma)
		{
			$ma = intval($ma);

			$sql ="UPDATE web_theme SET trang_thai= 1 - trang_thai WHERE ma = '$ma'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>