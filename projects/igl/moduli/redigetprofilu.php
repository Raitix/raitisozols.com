<?
if(ISSET($_SESSION['admin'])){
if($_GET['p3']=="paldies"){
echo '<center><font size="4"><b>Darbība veikta veiksmīgi!</b></font></center>';
}
else {
$DB='DB/memberi.php';
include $DB;
echo '<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
  <td class="mcheader"><b>Tavs profils</b></td>
</tr>
<tr>
  <td class="maincbbg">
							<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
  <td>
					<form method="POST" action="?p=redigetprofilu&p2=edit">
	<div align="center">
		<table border="0" style="border-collapse: collapse" id="table1">
			<tr>
				<td align="right">Niks:</td>
				<td>'.$record[$_SESSION['nr']][0].'</td>
			</tr>
			<tr>
				<td align="right">Vārds:</td>
				<td><input  value="'.$record[$_SESSION['nr']][1].'" type="text" name="2" size="13"></td>
			</tr>
			<tr>
				<td align="right">Vecums:</td>
				<td><input  value="'.$record[$_SESSION['nr']][2].'" type="text" name="3" size="13"></td>
			</tr>
			<tr>
				<td align="right">Pilsēta:</td>
				<td><input  value="'.$record[$_SESSION['nr']][3].'" type="text" name="4" size="13"></td>
			</tr>
			<tr>
				<td align="right">Mouse:</td>
				<td><input  value="'.$record[$_SESSION['nr']][4].'" type="text" name="5" size="13"></td>
			</tr>
			<tr>
				<td align="right">Sensitivity:</td>
				<td><input  value="'.$record[$_SESSION['nr']][5].'" type="text" name="6" size="13"></td>
			</tr>
			<tr>
				<td align="right">Pad:</td>
				<td><input  value="'.$record[$_SESSION['nr']][6].'" type="text" name="7" size="13"></td>
			</tr>
			<tr>
				<td align="right">Headset:</td>
				<td><input  value="'.$record[$_SESSION['nr']][7].'" type="text" name="8" size="13"></td>
			</tr>
			<tr>
				<td align="right">Resolution:</td>
				<td><input  value="'.$record[$_SESSION['nr']][8].'" type="text" name="9" size="13"></td>
			</tr>
			<tr>
				<td align="right">Favorite weapons:</td>
				<td><input  value="'.$record[$_SESSION['nr']][9].'" type="text" name="10" size="13"></td>
			</tr>
			<tr>
				<td align="right">Favorite map:</td>
				<td><input  value="'.$record[$_SESSION['nr']][10].'" type="text" name="11" size="13"></td>
			</tr>
			<tr>
				<td align="right">Monitor:</td>
				<td><input  value="'.$record[$_SESSION['nr']][11].'" type="text" name="12" size="13"></td>
			</tr>
			<tr>
				<td align="right">CPU:</td>
				<td><input  value="'.$record[$_SESSION['nr']][12].'" type="text" name="13" size="13"></td>
			</tr>
			<tr>
				<td align="right">Video:</td>
				<td><input  value="'.$record[$_SESSION['nr']][13].'" type="text" name="14" size="13"></td>
			</tr>
			<tr>
				<td align="right">HDD:</td>
				<td><input  value="'.$record[$_SESSION['nr']][14].'" type="text" name="15" size="13"></td>
			</tr>
			<tr>
				<td align="right">RAM:</td>
				<td><input  value="'.$record[$_SESSION['nr']][15].'" type="text" name="16" size="13"></td>
			</tr>
			<tr>
				<td align="right">Vecā parole (atstāj tukšu ja nevēlies mainīt paroli):</td>
				<td><input  type="password" name="17" size="13"></td>
			</tr>
			<tr>
				<td align="right">Jaunā parole (atstāj tukšu ja nevēlies mainīt paroli):</td>
				<td><input type="password" name="18" size="13"></td>
			</tr>
			<tr>
				<td align="right">Vēlreiz jaunā parole (atstāj tukšu ja nevēlies mainīt 
				paroli):</td>
				<td><input type="password" name="19" size="13"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Rediģēt"></td>
			</tr>
		</table>
	</div>
</form></td>
</tr>
  </table></td>
</tr>
<tr>
  <td>
							<p style="margin-top: 0; margin-bottom: 0">
							<img src="images/mcb_footer.gif" alt="footer" width="368" height="10" /></td>
</tr>
  </table>';
if(@$_GET['p2']=="edit"){
if(ISSET($_POST['17']) && $_POST['17'] !=''){
if(md32($_POST['17']) == $record[$_SESSION['nr']][16] && $_POST['18'] == $_POST['19']){
$ierakstamsasmasm=array($record[$_SESSION['nr']][0], $_POST['2'], $_POST['3'], $_POST['4'], $_POST['5'], $_POST['6'], $_POST['7'], $_POST['8'], $_POST['9'], $_POST['10'], $_POST['11'], $_POST['12'], $_POST['13'], $_POST['14'], $_POST['15'], $_POST['16'], md32($_POST['19']));
edit_record($DB, $_SESSION['nr']+1, $ierakstamsasmasm);
redirect('?p='.$_GET['p'].'&p3=paldies');
}
else {echo '<center><font size="4"><b>Parole nepareiza!<br> Vai arī nesakrīt jaunā parole ar pārbaudi.</b></font></center>';}
}
else {
$ierakstamsasmasm=array($record[$_SESSION['nr']][0], $_POST['2'], $_POST['3'], $_POST['4'], $_POST['5'], $_POST['6'], $_POST['7'], $_POST['8'], $_POST['9'], $_POST['10'], $_POST['11'], $_POST['12'], $_POST['13'], $_POST['14'], $_POST['15'], $_POST['16'], $record[$_SESSION['nr']][16]);
edit_record($DB, $_SESSION['nr']+1, $ierakstamsasmasm);
redirect('?p='.$_GET['p'].'&p3=paldies');
}
}
}
}
?>