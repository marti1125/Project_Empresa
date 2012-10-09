<?php
error_reporting(E_ALL ^ E_NOTICE);

session_start(); // Start Session
header('Cache-control: private'); // IE 6 FIX

// always modified 
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); 
// HTTP/1.1 
header('Cache-Control: no-store, no-cache, must-revalidate'); 
header('Cache-Control: post-check=0, pre-check=0', false); 
// HTTP/1.0 
header('Pragma: no-cache');

// ---------- LOGIN INFO ---------- //

$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mysql"; // Mysql password
$db_name="db_empresa"; // Database name
$tbl_name="tb_usuarios"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");

mysql_select_db("$db_name")or die("cannot select DB");

$sql="select usuario, clave from tb_usuarios";

$data=mysql_query($sql);

$usuario;
$clave;

while($friend=mysql_fetch_array($data))
{
	$usuario = $friend[0];
	$clave = $friend[1];
}

// username and password sent from form
$config_username = $usuario;
$config_password = $clave;

$cookie_name = 'siteAuth';

$cookie_time = (3600 * 24 * 30); // 30 days

if(!$_SESSION['username'])
{
include_once 'autologin.php';
}
?>