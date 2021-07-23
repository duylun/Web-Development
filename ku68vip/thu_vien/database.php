<?php
error_reporting(1);
class database {
	var $_sql = '';
	var $_connection = '';
	var $_cursor = null;
	
	function __construct() 
	{		
		$this->_connection = @mysqli_connect( DB_HOST, DB_USER, DB_PASS);
		if (!$this->_connection ) 
		{
			header('Location: https://google.com');
			exit();
		}
		$db=DB_NAME;
		if ($db != '' && !mysqli_select_db($this->_connection, $db )) 
		{
			die('Error!');
			exit();
		}				
	}

	function get_error() 
	{
		return mysqli_error($this->_connection);
	}

	function setQuery( $sql) 
	{
		$this->_sql = $sql;
	}

	function query() 
	{	
		mysqli_query($this->_connection, 'SET NAMES UTF8');
		$this->_cursor = mysqli_query($this->_connection , $this->_sql );
		return $this->_cursor;
	}

	/* This method loads the first row returned by the query.*/
	function loadRow() {
		if (!($cur = $this->query())) {
			return null;
		}
		$ret = null;
		if ($row = mysqli_fetch_assoc( $cur )) {
			$ret = $row;
		}
		mysqli_free_result( $cur );
		return $ret;
	}
	
	/**
	* This method loads the first field of the first row returned by the query.
	*
	* @return The value returned in the query or null if the query failed.
	*/
	function loadResult() {
		if (!($cur = $this->query())) {
			return null;
		}
		$ret = null;
		if ($row = mysqli_fetch_row( $cur )) {
			$ret = $row[0];
		}
		mysqli_free_result( $cur );
		return $ret;
	}
	/**
	* Load a  list of database rows
	*/
	function loadAllRow() {
		if (!($cur = $this->query())) {
			return null;
		}
		$array = array();
		while ($row = mysqli_fetch_assoc( $cur )) 
		{
			// ketqua = mang ket qua
			$array[] = $row;
		}
		mysqli_free_result( $cur );
		return $array;
	}
	
	function disconnect() 
	{
		mysqli_close( $this->_connection );
	}
	
	function getInsert_id() {
		return mysqli_insert_id($this->_connection);
	}
	function convert_vi_to_en($str) {	
		$str = str_replace("\\", "", $str);
		$str = str_replace('&quot;', "", $str);
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);	
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/[`~!@#$%^&*({)}_=+“”|';:?.>,<\"[\]\t\/]/", '', $str);		
		$str = str_replace(' ', '-', $str);
		$str = strtolower(preg_replace("/-+/", "-", $str));
		//$str = preg_replace("/(gif|png|jpg)/i", '', $str);
		return trim($str);
	}
}
?>