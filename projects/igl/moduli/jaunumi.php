<?
if(@$_GET['p4']=='kategorija' && ISSET($_SESSION['admin'])){
echo '<form method="POST" enctype="multipart/form-data" action="?p='.@$_GET['p'].'&p4=kategorija&id=pievienot2">
<div align="center">
<table border="0" style="border-collapse: collapse">
	<tr>
		<td align="right">
		<div align="center">
			<table border="0" style="border-collapse: collapse" width="100%" id="table1" bgcolor="#E8E8E8">
				<tr>
					<td align="right"><b>Virsraksts:</b></td>
					<td><b><input type="text" name="virsraksts" size="13"></b></td>
				</tr>
				<tr>
					<td align="right"><b>Bilde:</b></td>
					<td>
<input size="20" type="file" name="fa_file" style="color: #000000"></td>
				</tr>
				<tr>
					<td align="right" colspan="2">
<input type="submit" value="Pievienot" style="float: left"></td>
				</tr>
			</table>
		</div>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
		</td>
	</tr>
</table>
</div>
</form>';
if(ISSET($_GET['id']) && $_GET['p4']=="kategorija" && $_GET['id']=="pievienot2"){
if($_FILES['fa_file']['tmp_name']){
copy($_FILES['fa_file']['tmp_name'],'BOX/'.$_FILES['fa_file']['name']);
}
$failins=$_FILES['fa_file']['name'];
add_record("DB/kategorijas.php", array($_POST['virsraksts'], $failins), 'record');
redirect("?p=".$_GET['p'].'&p4=kategorija');
}
if(ISSET($_GET['id']) && $_GET['p']=="jaunumi" && $_GET['p4']=="kategorija" && $_GET['id']=="dzest2"){
delete_record("DB/kategorijas.php", $_GET['cipars']);
unlink('BOX/'.$_GET['failins']);
redirect("?p=".$_GET['p'].'&p4=kategorija');
}
echo '<div align="center">
	<table border="0" style="border-collapse: collapse" cellspacing="4" cellpadding="2" bgcolor="#E8E8E8">
		<tr>
			<td bgcolor="#000000"><b><font color="#FFFFFF">Kategorijas nosaukums</font></b></td>
			<td bgcolor="#000000"><b><font color="#FFFFFF">Izmērs</font></b></td>
			<td bgcolor="#000000"><b><font color="#FFFFFF">Iespējas</font></b></td>
		</tr>';
@include 'DB/kategorijas.php';
show_record_b('DB/kategorijas.php', 'visus', 'reversais', '', '<tr>
			<td>
			<p align="left"><font size="2">{1}</font></td>
			<td>
			<p align="center"><font size="2">{izmers} Mb</font></td>
			<td>
			<p align="center">
			<font size="2" color="#FFFFFF"><a href="?p=jaunumi&p4=kategorija&id=dzest2&cipars={cipars}&failins={failins}">
			Dzēst</a></font></td>
		</tr>');
echo '</table>
</div>';
}
else {
$DB='DB/'.@$_GET['p'].'.php';
if($_SESSION['admin']){
if($_GET['p2'] != "edit"){
echo '<form method="POST" action="?p=jaunumi&p2=add">
	<div align="center">
		<table border="0" style="border-collapse: collapse; background-color:#E8E8E8" >
			<tr>
				<td class="mcheader"  align="right" colspan="2">
				<p align="left">Pievieno jaunumus!</td>
			</tr>
			<tr>
				<td align="right"><b>Virsraksts:</b></td>
				<td><input type="text" name="1" size="13"></td>
			</tr>
			<tr>
				<td valign="top" align="right"><b>Kategorija:</b></td>
				<td><select size="1" name="5">
				';
				show_record('DB/kategorijas.php', 'visus', 'parastais', '', '<option value="{2}">{1}</option>');
				echo '
				</select></td>
			</tr>
			<tr>
				<td valign="top" align="right"><b>Teksts:</b></td>
				<td><textarea rows="10" name="2" cols="27"></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Pievienot"></td>
			</tr>
		</table><img src="images/mcb_footer.gif" alt="footer" width="368" height="10" />
	</div>
</form>';
}
switch($_GET['p2']){
case 'add':
$datums=date("d.m.Y");
$autors=$_SESSION['autors'];
add_record($DB, array($_POST['1'], $_POST['2'], $autors, $datums, $_POST['5']), 'record');
redirect('?p='.$_GET['p']);
break;
case 'edit':
include $DB;
$id=$_GET['id']-1;
echo '<form method="POST" action="?p=jaunumi&p2=edit2&id='.$id.'">
	<div align="center">
		<table border="0" style="border-collapse: collapse; background-color:#E8E8E8">
			<tr>
				<td class="mcheader" align="right" colspan="2">
				<p align="left">Rediģē jaunumus!</td>
			</tr>
			<tr>
				<td align="right"><b>Virsraksts:</b></td>
				<td><input type="text" value="'.$record[count($record)-$id-1][0].'" name="1" size="13"></td>
			</tr>
						<tr>
				<td valign="top" align="right"><b>Kategorija:</b></td>
				<td><select size="1" name="5">
				';
				show_record('DB/kategorijas.php', 'visus', 'parastais', '', '<option value="{2}">{1}</option>');
				echo '
				</select></td>
			</tr>
			<tr>
				<td valign="top" align="right"><b>Teksts:</b></td>
				<td><textarea rows="10" name="2" cols="27">'.$record[count($record)-$id-1][1].'</textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Rediģēt"></td>
				</td>
			</tr>
			</table>
			<img src="images/mcb_footer.gif" alt="footer" width="368" height="10" />
	</div>
</form>';
break;
case 'edit2':
  $datums=date("d.m.Y");
  $ko_arr=array($_POST['1'], $_POST['2'], $_SESSION['autors'], $datums.' rediģēts', $_POST['5']);
  include $DB;
  $ierakstins=count($record)-($_GET['id']);
  edit_record($DB, $ierakstins, $ko_arr);
  redirect('?p='.$_GET['p']);
 break;
 case 'delete':
  $kuru=$_GET['id'];
  delete_record($DB, $kuru);
  redirect('?p='.$_GET['p']);
break;
}
}
if($_SESSION['admin']){
$template='<table border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
<td class="mcheader">{1}&nbsp;&nbsp;
<a href="?p='.$_GET['p'].'&p2=delete&id={cipars}" style="text-decoration: none">
Dzēst</a>&nbsp;&nbsp; |&nbsp;&nbsp;
<a href="?p='.$_GET['p'].'&p2=edit&id={cipars}" style="text-decoration: none">
Rediģēt</a></td>
</tr>
<tr>
<td class="maincbbg">
<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
<td>
<p style="margin-top: 5px">
<img border="0" src="BOX/{5}" width="80" height="80" align="left">&nbsp; 
{2}</p>
<p align="right">
{3}&nbsp; -&nbsp; {4}</td>
</tr>
</table></td>
</tr>
<tr>
<td>
<img src="images/mcb_footer.gif" alt="footer" width="368" height="10" /></td>
</tr>
</table>';}
else {
$template='<table border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
<td class="mcheader">{1}</td>
</tr>
<tr>
<td class="maincbbg">
<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
<td>
<p style="margin-top: 5px">
<img border="0" src="BOX/{5}" width="80" height="80" align="left">&nbsp; 
{2}</p>
<p align="right">
{3}&nbsp; -&nbsp; {4}</td>
</tr>
</table></td>
</tr>
<tr>
<td>
<img src="images/mcb_footer.gif" alt="footer" width="368" height="10" /></td>
</tr>
</table>';}
show_record($DB, 'visus', 'reversais', 5, $template);
/*
Šeit arhīva funkcija, kas sasorte pa gadiem menesiem un datumiem...
Un kad uzspiez uz kadu no meneshiem konkretaja gada paradas tiesi tikai tie ieraksti!
*/
}
?>