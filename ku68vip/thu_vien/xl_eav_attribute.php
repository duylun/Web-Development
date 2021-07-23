<?php
	require_once 'database.php';
	class xl_eav_attribute extends database
	{
		
		function danh_sach($keyword, $type, $vitri, $record)
		{	
			$sql = "SELECT * FROM eav_attribute WHERE 1 = 1 ";
			
			$sql .= " LIMIT $vitri, $record";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_full()
		{
			$sql = "SELECT * FROM eav_attribute";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function danh_sach_cot()
		{
			$sql = "SHOW COLUMNS FROM eav_attribute";
			$this->setQuery($sql);
			return $this->loadAllRow();
		}
		
		function so_luong($keyword, $type)
		{	
			$sql = "SELECT COUNT(*) FROM eav_attribute WHERE 1 = 1 ";
			
			$this->setQuery($sql);
			return $this->loadResult();
		}
		
		function chi_tiet($id)
		{
			$id = intval($id);
			
			
			$sql = "select * from eav_attribute where id = '$id' limit 0, 1";
			$this->setQuery($sql);
			return $this->loadRow();
		}
		
		function insert($code, $label, $type, $is_required, $is_unique, $note)
		{
			$code = stripslashes($code);
			$code = addslashes($code);
			$label = stripslashes($label);
			$label = addslashes($label);
			$type = stripslashes($type);
			$type = addslashes($type);
			$is_required = intval($is_required);
			$is_unique = intval($is_unique);
			$note = stripslashes($note);
			$note = addslashes($note);
			
			
			$sql = "insert into eav_attribute(code, label, type, is_required, is_unique, note) values('$code', '$label', '$type', '$is_required', '$is_unique', '$note')";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function update($id, $code, $label, $type, $is_required, $is_unique, $note)
		{
			$id = intval($id);
			
			$code = stripslashes($code);
			$code = addslashes($code);
			$label = stripslashes($label);
			$label = addslashes($label);
			$type = stripslashes($type);
			$type = addslashes($type);
			$is_required = intval($is_required);
			$is_unique = intval($is_unique);
			$note = stripslashes($note);
			$note = addslashes($note);
			
			
			$sql = "UPDATE eav_attribute SET code = '$code', 
				label = '$label', 
				type = '$type', 
				is_required = '$is_required', 
				is_unique = '$is_unique', 
				note = '$note' 
			WHERE id = '$id'";
			$this->setQuery($sql);
			return $this->query();
		}
		
		function delete($id)
		{
			$id = intval($id);
			
			
			$sql = "DELETE FROM eav_attribute WHERE id = '$id'";
			$this->setQuery($sql);
			return $this->query();
		}
	}
?>