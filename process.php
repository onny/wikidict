<?php
include('settings.php');

if($_POST['action'] == "voclist_add") {
  if(isset($_POST['name'])){
    if (!mysql_query("insert into voclists values('', '', '".$sessionid."', '".$_POST['name']."')")){
      echo "false";
    } else {
      echo mysql_fetch_array(mysql_query("SELECT LAST_INSERT_ID()"))['LAST_INSERT_ID()'];
    }
  }
}

if($_POST['action'] == "voclist_del") {
  if(isset($_POST['id'])){
    if(!mysql_query("delete from voclists where listid='".$_POST['id']."'")){
      echo "false";
      die(mysql_error());
    } else {
      echo "true";
    }
  }
}

if($_POST['action'] == "voclist_item_add") {
  if(isset($_POST['items']) and isset($_POST['id'])){
    $trans = json_decode($_POST['items']);
    $result_voclists = mysql_query("insert into voclists_content values(".$_POST['id'].", '".$trans[0]."', '".$trans[2]."', '".$trans[1]."', '".$trans[3]."')") or die(mysql_error());
    echo $result_voclists;
  }
}
?>
