
<?php 
include_once('./DbConnection.php');
$obj=new db();

$conn=$obj->connect();

include_once('./crud.php');

$crud=new Crud();


