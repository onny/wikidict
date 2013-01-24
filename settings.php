<?php

$user="wikidict";
$password="88HW5pjGu4n8vcw2C7F0";
$host="mysql.pi";
$database="wikidict";

//if (isset($_COOKIE["userid"])) {
      //$userid = $_COOKIE["userid"];
//} else {
      //$userid=uniqid('wikidict_');
      //setcookie("userid",$userid,time() + (20 * 365 * 24 * 60 * 60));
//}
echo "<font color=grey>";
$link = mysql_connect($host, $user, $password);
if ($link) {
  $db_selected = mysql_select_db($database, $link);
  if (!$db_selected) {
    die ('Cannot use ' . $database . ' : ' . mysql_error());
    if (mysql_query("CREATE DATABASE ".$database,$link)) {
      echo "Database created, please reload site!<br>";
    } else {
      echo "Error creating database: " . mysql_error() . "<br>";
    }
  } else {
    if(mysql_num_rows(mysql_query("SHOW TABLES LIKE 'voclists'"))!=1 or mysql_num_rows(mysql_query("SHOW TABLES LIKE 'voclists_content'"))!=1 or mysql_num_rows(mysql_query("SHOW TABLES LIKE 'users'"))!=1){ 
	echo "Tables do not exist, creating ...<br>";
	$sql = "
	  CREATE TABLE voclists (
		  userid varchar(15),
		  listid int,
		  listname varchar(15))"; 
	$sql2 = "
	  CREATE TABLE voclists_content (
		  userid varchar(15),
		  sessionid varchar(15),
		  lang1 varchar(15),
		  ext1 varchar(15),
		  lang2 varchar(15),
		  ext2 varchar(15))";
	$sql3 = "
	  CREATE TABLE users (
		  userid varchar(15),
		  sessionid varchar(15),
		  pwd varchar(15),
		  createdate varchar(15))";
	mysql_query($sql,$link);
	mysql_query($sql2,$link);
	mysql_query($sql3,$link);
	echo mysql_error();
    }
  }
  mysql_close($link);
}else{
  echo "Unable to connect to database! ".mysql_error()."<br>";
}
echo "</font>";
?>
