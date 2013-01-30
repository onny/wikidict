<head>
<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.js'></script>
<script type='text/javascript' src='js/base.js'></script>
</head>
Add a <u><a onclick='voclist_add()'>new</a></u> list.
<table id="voclists">
  <thead>
    <tr class='title'>
      <th>Name</th><th width=100px>Entries</th><th width=200px>Options</th>
    </td>
  </thead>
  <tbody>
  <?php
  include('settings.php');
  echo $sessionid;
  $result_voclists = mysql_query("select listid,listname from voclists where sessionid='".$sessionid."'") or die(mysql_error());
  if (mysql_num_rows($result_voclists) > 0) {
    while ($row = mysql_fetch_array($result_voclists)){
      $result_voclist_content = mysql_query("select lang1,ext1,lang2,ext2 from voclists_content where listid='".$row['listid']."'") or die(mysql_error());
      echo "<tr><td>" . $row['listname'] . "</td><td>" . mysql_num_rows($result_voclist_content) . "</td><td><a onclick='voclist_manage(".$row['listid'].")'>Manage</a> - <a onclick='voclist_export(".$row['listid'].")'>Export</a> - <a onclick='voclist_del(" . $row['listid'] . ",$(this))'>Delete</a></td></tr>";
    }
  } else {
    echo "<tr><td colspan=3 class=center>No lists created yet. Create <u><a onclick='voclist_add()'>one</a></u>!</td></tr>";
  }
  ?>
  </tbody>
</table>

<h1>List X selected:</h1>
<textarea width=100%></textarea>
<br>
<button>Save</button>

<?php
//insert into voclists_content values('2', 'issue', 'n', 'problem', 'n');
//select lang1,ext1,lang2,ext2 from voclists_content where sessionid='wikidict_5102dc36b92ca' and listid='2';
// insert into voclists values('', 'wikidict_5101a7d4c653b', 1, 'Französisch');
?>
