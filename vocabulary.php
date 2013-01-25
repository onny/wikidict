<table>
  <thead>
    <tr class='title'>
      <th>Name</th><th>Entries</th><th>Options</th>
    </td>
  </thead>
  <tbody>
  <?php
  include('settings.php');
  $result_voclists = mysql_query("select listid,listname from voclists where sessionid='".$sessionid."'") or die(mysql_error());
  if (mysql_num_rows($result_voclists) > 0) {
    while ($row = mysql_fetch_array($result_voclists)){
      $result_voclist_content = mysql_query("select lang1,ext1,lang2,ext2 from voclists_content where sessionid='".$sessionid."' and listid='".$row['listid']."'") or die(mysql_error());
      echo "<tr><td>" . $row['listname'] . "</td><td>" . mysql_num_rows($result_voclist_content) . "</td><td>Manage - Export - Delete</td></tr>";
    }
  } else {
    echo "<tr><td colspan=3 class=center>No lists created yet. Create <a href=#>one</a>!</td></tr>";
  }
  ?>
  </tbody>
</table>

<?php
//insert into voclists_content values('', 'wikidict_5102dc36b92ca', '2', 'issue', 'n', 'problem', 'n');
//select lang1,ext1,lang2,ext2 from voclists_content where sessionid='wikidict_5102dc36b92ca' and listid='2';
// insert into voclists values('', 'wikidict_5101a7d4c653b', 1, 'Französisch');
?>
