<?php
include '../admin/widgets/js_css.php';
$conn = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('laptopshop');
$sql = "show columns from bai_viet";
$result = mysql_query($sql);
while($bv = mysql_fetch_assoc($result))
{
	echo "<p>
			<label>{$bv['Field']}</label>";
	if($bv['Type'] == 'int(11)')
	{
		
		echo '<input class="text-input small-input" type="text" id="small-input" name="small-input" />';
	}
	if($bv['Type'] == 'varchar(200)' && $bv['Field'] != 'hinh')
	{
		echo '<input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" />';
	}
	if($bv['Type'] == 'text')
	{
		echo '<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>';
	}
	if($bv['Type'] == 'tinyint(1)')
	{
		echo '<input type="radio" name="radio1" />Hiển thị<br />';
		echo '<input type="radio" name="radio1" />Không hiển thị<br />';
	}
	echo '</p>';
}

?>