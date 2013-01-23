<?php
$user="test";
$password="test";
$database="mysql.pi";

if (isset($_COOKIE["userid"])) {
      $userid = $_COOKIE["userid"];
} else {
      $userid=uniqid('wikidict_');
      setcookie("userid",$userid,time() + (20 * 365 * 24 * 60 * 60));
}
?>
