<?php
	require_once 'database.php';
	class xl_products extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM products WHERE 1 = 1 ";
			if($type == 'title')
			{
				$sql .= " and title like '%$keyword%'";
			}
			if($type == 'serial')
			{
				$sql .= " and serial like '%$keyword%'";
			}
			
			$sql .= " ORDER BY id DESC LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM products";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM products";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM products WHERE 1 = 1 ";
			if($type == 'title')
			{
				$sql .= " and title like '%$keyword%'";
			}
			if($type == 'serial')
			{
				$sql .= " and serial like '%$keyword%'";
			}
			$sql .= " ORDER BY id DESC";
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($id)
		{
			$id = intval($id);
			
			
			$sql = "select * from products where id = '$id' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($title, $serial, $content, $titleen, $contenten)
		{
			$title = stripslashes($title);
			$title = addslashes($title);
			$serial = stripslashes($serial);
			$serial = addslashes($serial);
			$content = stripslashes($content);
			$content = addslashes($content);
			$titleen = stripslashes($titleen);
			$titleen = addslashes($titleen);
			$contenten = stripslashes($contenten);
			$contenten = addslashes($contenten);
			
			
			$sql = "insert into products(title, serial, content, titleen, contenten) values('$title', '$serial', '$content', '$titleen', '$contenten')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($id, $title, $serial, $content, $titleen, $contenten)
		{
			$id = intval($id);
			
			$title = stripslashes($title);
			$title = addslashes($title);
			$serial = stripslashes($serial);
			$serial = addslashes($serial);
			$content = stripslashes($content);
			$content = addslashes($content);
			$titleen = stripslashes($titleen);
			$titleen = addslashes($titleen);
			$contenten = stripslashes($contenten);
			$contenten = addslashes($contenten);
			
			
			$sql = "UPDATE products SET title = '$title', 
				serial = '$serial', 
				content = '$content', 
				titleen = '$titleen', 
				contenten = '$contenten' 
			WHERE id = '$id'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($id)
		{
			$id = intval($id);
			
			
			$sql = "DELETE FROM products WHERE id = '$id'";
			$this->setQuery($sql);
			return $this->query();
		}
		function checkpd($serial)
		{
			$serial = stripslashes($serial);
			$serial = addslashes($serial);
			
			$sql = "select * from products where serial = '$serial' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
	}
?>