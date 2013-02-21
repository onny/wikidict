<?php
$user="wikidict";
$password="88HW5pjGu4n8vcw2C7F0";
$host="mysql.pi";
$database="wikidict";

if (isset($_COOKIE["sessionid"])) {
      $sessionid = $_COOKIE["sessionid"];
} else {
      $sessionid=uniqid('wikidict_');
      setcookie("sessionid",$sessionid,time() + (20 * 365 * 24 * 60 * 60));
}

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
		listid INT NOT NULL AUTO_INCREMENT,
		PRIMARY KEY (listid),
		userid varchar(30),
		sessionid varchar(30),
		listname varchar(30) NOT NULL)"; 
	$sql2 = "
	  CREATE TABLE voclists_content (
		listid int NOT NULL,
		lang1 varchar(15),
		ext1 varchar(15),
		lang2 varchar(15),
		ext2 varchar(15))";
	$sql3 = "
	  CREATE TABLE users (
		  userid varchar(30),
		  sessionid varchar(30),
		  pwd varchar(15),
		  createdate varchar(15))";
	mysql_query($sql,$link);
	mysql_query($sql2,$link);
	mysql_query($sql3,$link);
	echo mysql_error();
    }
  }
}else{
  echo "Unable to connect to database! ".mysql_error()."<br>";
}

?>
