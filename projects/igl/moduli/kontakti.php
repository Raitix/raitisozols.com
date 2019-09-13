<?
if(ISSET($_SESSION['admin'])){
$kirdik_DB='DB/'.$_GET['p'].'.php';
$ko=file_get_contents($kirdik_DB);
echo '<form method="POST" action="?p='.$_GET['p'].'&p2=edit">
	<div align="center">
		<table border="0" style="border-collapse: collapse" width="100%" bgcolor="#E8E8E8">
			<tr>
				<td>
				<p align="left"><center><textarea rows="11" name="kontakti" cols="42">'.$ko.'</textarea></center><br>
				<input type="submit" value="Rediģēt"></td>
			</tr>
		</table>
	</div>
</form>';
if(@$_GET['p2']=='edit'){
  chmod('DB/'.$_GET['p'].'.php', 0777);
  $f=fopen($kirdik_DB,"w");
  fwrite($f, $_POST['kontakti']);
  fclose($f);
  chmod('DB/'.$_GET['p'].'.php', 0644);
  redirect('?p='.$_GET['p']);
}
}
else {
echo '
<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td class="mcheader"><b>Kontakti</b></td>
</tr>
<tr>
<td class="maincbbg">
<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
  <td>
<p align="left" style="margin-top: 0; margin-bottom: 0">'; include 'DB/kontakti.php'; echo '</p>
</td>
</tr>
</table></td>
</tr>
<tr>
<td>
<img src="images/mcb_footer.gif" alt="footer" width="368" height="10" /></td>
</tr>
</table>';
}
?>