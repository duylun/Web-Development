<?php
	require_once 'database.php';
	class xl_tool extends database
	{
		function sql_query($sql)
		{
			$this->setQuery($sql);
			return $this->query();
		}
		
	}
?>