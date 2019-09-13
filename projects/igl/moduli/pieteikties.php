<?
$DB='DB/'.$_GET['p'].'.php';
if(ISSET($_SESSION['admin'])){
@include $DB;
if(count($record)==0){echo '
<div align="center">
	<table border="0" style="border-collapse: collapse">
		<tr>
			<td class="mcheader">! Informācija</td>
		</tr>
		<tr>
			<td bgcolor="#E8E8E8">
			<p align="center"><b><font size="4">Pašreiz pieteikumu nav!</font></b></td>
		</tr>
		</table></div>
';}
show_record($DB, 'visus', 'parastais', '', '<div align="center">
	<table border="1" style="border-collapse: collapse">
		<tr>
			<td align="center" bgcolor="#305D28"><font color="#FFFFFF"><b>Niks</b></font></td>
			<td align="center" bgcolor="#305D28"><font color="#FFFFFF"><b>Vecums</b></font></td>
			<td align="center" bgcolor="#305D28"><font color="#FFFFFF"><b>Pilsēta</b></font></td>
			<td align="center" colspan="2" bgcolor="#305D28">
			<font color="#FFFFFF"><b>Bijušie klani</b></font></td>
			<td align="center" bgcolor="#305D28"><font color="#FFFFFF"><b>Mikrofons</b></font></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#E8E8E8">{1}</td>
			<td align="center" bgcolor="#E8E8E8">{2}</td>
			<td align="center" bgcolor="#E8E8E8">{3}</td>
			<td align="center" colspan="2" bgcolor="#E8E8E8">{4}</td>
			<td align="center" bgcolor="#E8E8E8">{5}</td>
		</tr>
		<tr>
			<td align="center" bgcolor="#305D28"><font color="#FFFFFF"><b>On-line time</b></font></td>
			<td align="center" bgcolor="#305D28"><font color="#FFFFFF"><b>Skype nick</b></font></td>
			<td align="center" bgcolor="#305D28"><font color="#FFFFFF"><b>mIRC nick</b></font></td>
			<td align="center" colspan="3" bgcolor="#305D28">
			<font color="#FFFFFF"><b>Iespējas</b></font></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#E8E8E8">{6}</td>
			<td align="center" bgcolor="#E8E8E8">{7}</td>
			<td align="center" bgcolor="#E8E8E8">{8}</td>
			<td align="center" bgcolor="#E8E8E8"><font color="#008000"><b>'.
			//'<a href="?p='.$_GET['p'].'&p2=add&id={cipars}" style="text-decoration: none; color: #008000">Apstiprināt</b></a>'.
			'</font></td>
			<td align="center" bgcolor="#E8E8E8" colspan="2"><font color="#FF0000"><b>
			'.
			//'<a href="?p='.$_GET['p'].'&p2=delete&id={cipars}" style="text-decoration: none; color: #FF0000">Noraidīt</a>'.
			'</b></font></td>
		</tr>
	</table>
</div><hr>');
switch($_GET['p2']){
case 'add':
include 'DB/pieteikties.php';
add_record('DB/memberi.php', array($record[$_GET['id']-1][0], 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', 'Ievadi informāciju!', md32('12345')), 'record');
  $kuru=$_GET['id'];
  delete_record('DB/pieteikties.php', $kuru);
redirect('?p='.$_GET['p']);
break;
 case 'delete':
  $kuru=$_GET['id'];
  delete_record($DB, $kuru);
  redirect('?p='.$_GET['p']);
break;
}
}
else {
if($_GET['p3']=="paldies"){
echo '<center><font size="4"><b>Pieteikums veiksmīgi nosūtīts administrācijai!</b></font></center>';
}
else {
echo '<form method="POST" action="?p='.$_GET['p'].'&p2=add"><div align="center">
	<table border="0" style="border-collapse: collapse" width="98%">
		<tr class="mcheader"><td>Pieteikties tīmā</td></tr><tr>
			<td bgcolor="#E8E8E8">
	<div align="center">
		<table border="0" style="border-collapse: collapse" bgcolor="#E8E8E8">
			<tr>
				<td align="left"><b>Niks:</b></td>
				<td><input type="text" name="niks" size="13"></td>
			</tr>
			<tr>
				<td align="left"><b>Vecums:</b></td>
				<td><input type="text" name="vecums" size="13"></td>
			</tr>
			<tr>
				<td align="left"><b>Pilsēta:</b></td>
				<td><input type="text" name="pilseta" size="13"></td>
			</tr>
			<tr>
				<td align="left"><b>Bijušie klani:</b></td>
				<td><input type="text" name="klani" size="13"></td>
			</tr>
			<tr>
				<td align="left"><b>Mikrofons : [ir / nav]</b></td>
				<td><b>Ir</b><input type="radio" value="ir" checked name="mikrofons"><b> 
				Nav</b><input type="radio" name="mikrofons" value="nav"></td>
			</tr>
			<tr>
				<td align="left"><b>On-line time (no cikiem lidz cikiem):</b></td>
				<td><input type="text" name="online" size="13"></td>
			</tr>
			<tr>
				<td align="left"><b>Skype niks:</b></td>
				<td><input type="text" name="skype" size="13"></td>
			</tr>
			<tr>
				<td align="left"><b>mIRC niks:</b></td>
				<td><input type="text" name="mirc" size="13"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Pieteikties"></td>
			</tr>
		</table>
	</div>
			</td>
		</tr>
	</table>
</div></form>';
if($_GET['p2']=="add"){
$ieraksts_arr=array($_POST['niks'], $_POST['vecums'], $_POST['pilseta'], $_POST['klani'], $_POST['mikrofons'], $_POST['online'], $_POST['skype'], $_POST['mirc'], 'pending');
add_record($DB, $ieraksts_arr, 'record');
redirect('?p='.$_GET['p'].'&p3=paldies');
}
}
}
?>