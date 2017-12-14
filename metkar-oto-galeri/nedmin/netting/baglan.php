<?php 
try
{
	$db=new PDO("mysql:host=localhost;dbname=orhanmet_metin;charset=utf8",'orhanmet_orhanmetin','samsun55');
} 
catch (Exception $e)
{
	echo $e->getMessage();
}
?>