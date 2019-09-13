<?
$DB='DB/'.$_GET['p'].'.php';
if(@$_SESSION['admin']){
echo '<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
  <td class="mcheader"><b>CW ievade</b></td>
</tr>
<tr>
  <td class="maincbbg">
							<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
  <td>
					<form method="POST" action="?p=cw&p2=add">
						<p align="left" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">Datums (piem. 31.12.2007): <input type="text" name="datums" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
	<p align="left" style="margin-top: 0; margin-bottom: 0">Pretinieku tags: <input type="text" name="pret_tags" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						igL sastāvs (ja mazāk kā 5 tad atstāt tukšu):</p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						1.spēlētājs: 
						<input type="text" name="igl_speletajs_01" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						2.spēlētājs: 
						<input type="text" name="igl_speletajs_02" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						3.spēlētājs: 
						<input type="text" name="igl_speletajs_03" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						4.spēlētājs: 
						<input type="text" name="igl_speletajs_04" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						5.spēlētājs: 
						<input type="text" name="igl_speletajs_05" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						Pretinieku sastāvs:</p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						1.spēlētājs: 
						<input type="text" name="pret_speletajs_01" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						2.spēlētājs: 
						<input type="text" name="pret_speletajs_02" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						3.spēlētājs: 
						<input type="text" name="pret_speletajs_03" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						4.spēlētājs: 
						<input type="text" name="pret_speletajs_04" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						5.spēlētājs: 
						<input type="text" name="pret_speletajs_05" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						Karte: <input type="text" name="karte" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						Spēles tips (piem. 4x4): 
						<input type="text" name="tips" size="13"></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">
						Punkti: igL 
						<input type="text" name="igl_punkti" size="5"> : 
						<input type="text" name="pret_punkti" size="5"> Pretinieki</p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
	<p align="center" style="margin-top: 0; margin-bottom: 0"><input type="submit" value="Viss ok!" name="B1"></p>
</form>
								</td>
</tr>
  </table></td>
</tr>
<tr>
  <td>
							<p style="margin-top: 0; margin-bottom: 0">
							<img src="images/mcb_footer.gif" alt="footer" width="368" height="10" /></td>
</tr>
  </table>
';
switch($_GET['p2']){
case 'add':
$datums=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["datums"]);
$pret_tags=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["pret_tags"]);
$igl_speletajs_01=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["igl_speletajs_01"]);
$igl_speletajs_02=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["igl_speletajs_02"]);
$igl_speletajs_03=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["igl_speletajs_03"]);
$igl_speletajs_04=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["igl_speletajs_04"]);
$igl_speletajs_05=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["igl_speletajs_05"]);
$pret_speletajs_01=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["pret_speletajs_01"]);
$pret_speletajs_02=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["pret_speletajs_02"]);
$pret_speletajs_03=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["pret_speletajs_03"]);
$pret_speletajs_04=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["pret_speletajs_04"]);
$pret_speletajs_05=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["pret_speletajs_05"]);
$karte=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["karte"]);
$tips=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["tips"]);
$igl_punkti=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["igl_punkti"]);
$pret_punkti=str_replace(array("\r\n", "\r", "\n"), "<br />", $_POST["pret_punkti"]);
add_record($DB, array($datums, $pret_tags, $igl_speletajs_01, $igl_speletajs_02, $igl_speletajs_03, $igl_speletajs_04, $igl_speletajs_05, $pret_speletajs_01, $pret_speletajs_02, $pret_speletajs_03, $pret_speletajs_04, $pret_speletajs_05, $karte, $tips, $igl_punkti, $pret_punkti), 'record');
break;
}
}
if(@$_GET['p6']!='sikak'){
@include $DB;
$skaitit1=0;
$skaitit2=0;
$skaitit3=0;
$j2=count($record)-1;
while($j2>=0){
if($record[$j2][14]>$record[$j2][15]){
$skaitit1++;
}
elseif($record[$j2][14]==$record[$j2][15]){
$skaitit2++;
}
else {
$skaitit3++;
}
	$j2--;
}
if($_GET['p2']=="dzest2"){
@include $DB;
$abc=1;
while($abc<=count($record)){
delete_record($DB, $abc);
$abc++;
}
if(count($record)!=0){redirect('?p='.$_GET['p'].'&p2=dzest2');}
else{
redirect('?p='.$_GET['p']);}
}
if(ISSET($_SESSION['admin'])){$kikucis=' - <a href="?p=cw&p2=dzest2"><font color="#FF0000">Dzēst visus datus!</font></a>';}
echo '
<table border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td class="mcheader"><b>CW rezultāti'.$kikucis.'</b></td>
</tr>
<tr>
<td class="maincbbg">
							<p align="center">
							<b><font color="#00e000">
		<span style="font-size: 10pt">Uzvaras:</span></font><span style="font-size: 10pt"><font color="#f5f5f5">
		</font>'.$skaitit1.'<font color="#f5f5f5">,
		</font><font color="#000099">Neizšķirti</font><font color="#800000">:</font><font color="#f5f5f5">
		</font>'.$skaitit2.'<font color="#f5f5f5">,
		</font><font color="#800000">Zaudes: </font>
				'.$skaitit3.'</span></b></td>
</tr>
<tr>
<td class="maincbbg">
							<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" >
	<tr bgcolor="#45454a">
		<td align="center" height="16" nowrap="nowrap" bgcolor="#5C5C5C">
		<font style="font-family: Arial; font-size: 13px; color: rgb(245, 245, 245); text-decoration: none; font-weight: bold">
		Datum</font><font style="font-family: Arial; font-size: 13px; font-weight: bold" color="#f5f5f5">s</font></td>
		<td align="center" height="16" bgcolor="#5C5C5C">
		<font color="#F5F5F5">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px">
		Uzvarētājs</span></font></td>
		<td align="center" height="16" bgcolor="#5C5C5C">
		<font color="#F5F5F5">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px">
		Rezultāts</span></font></td>
		<td align="center" height="16" bgcolor="#5C5C5C">
		<font color="#F5F5F5">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px">
		Zaudētājs</span></font></td>
		<td align="center" height="16" bgcolor="#5C5C5C">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: rgb(0, 224, 0)">
		U</span><b><font style="font-family: Arial; font-size: 13px; color: rgb(245, 245, 245); text-decoration: none; font-weight: bold">/</font><font style="font-family: Arial; font-size: 13px; text-decoration: none; font-weight: bold" color="#ff0000">Z</font><font style="font-family: Arial; font-size: 13px; color: rgb(245, 245, 245); text-decoration: none; font-weight: bold">/</font><font style="font-family: Arial; font-size: 13px; text-decoration: none; font-weight: bold" color="#000099">N</font></b></td>
	</tr>
';
if(!ISSET($_GET['gads']) or !ISSET($_GET['menesis']) or !ISSET($_GET['datums'])){
$j=count($record)-1;
while($j>=0){
if($record[$j][14]>$record[$j][15]){
$uzvar='igL';
$uzvar_pt='15';
$zaude_pt='16';
$zaudetajs='{2}';
$rezult='<font color="#00E000"><b>Uzvara</b></font>';
}
elseif($record[$j][14]==$record[$j][15]){
$uzvar='igL';
$uzvar_pt='15';
$zaude_pt='16';
$zaudetajs='{2}';
$rezult='<font color="#000099"><b>Neizšķirts</b></font>';
}
else {$uzvar='{2}';
$uzvar_pt='16';
$zaude_pt='15';
$zaudetajs='igL';
$rezult='<font color="#FF0000"><b>Zaude</b></font>';
}
$href='<a class="cwrezultati" onmouseover="this.className'."='cwrezultatix'".'" onmouseout="this.className='."'cwrezultati'".'" href="?p=cw&p6=sikak&id='.($j+1).'">';
$href2='</a>';
$k='<tr class="cwrezultati2" onmouseover="this.className'."='cwrezultati2x'".'" onmouseout="this.className='."'cwrezultati2'".'" bgcolor="#72727a">
		<td nowrap="nowrap" width="5%" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<p align="center">
		<span style="font-family: Arial; font-size: 13px; color: #F5F5F5">
		'.$href.'{1}'.$href2.'</span></td>
		<td nowrap="nowrap" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<p align="center">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		'.$href.$uzvar.$href2.'</span></td>
		<td style="padding: 0pt; border-left-width:1px; border-right-width:1px; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" align="center">
		<p style="margin-top: 0pt; margin-bottom: 0pt" align="center">
		<font color="#F5F5F5">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px">'.$href.'{'.$uzvar_pt.'} : 
		{'.$zaude_pt.'}'.$href2.'</span></font></td>
		<td style="padding: 0pt; border-left-width:1px; border-right-width:1px; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" align="left" nowrap="nowrap">
		<p style="margin-top: 0pt; margin-bottom: 0pt" align="center">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		'.$href.$zaudetajs.$href2.'</span></td>
		<td align="center" nowrap="nowrap" style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<span style="font-family: Arial; font-size: 13px">
		'.$rezult.'</span></td>
	</tr>';
show_record($DB, $j+1, 'parastais', '', $k);
	$j--;
}}
else {
include $DB;
$a=array();
$ik67s9=0;
while($i<count($record)){
$krik=explode('.', $record[$ik67s9][0]);
if($krik[2]==$_GET['gads'])
if($krik[1]==$_GET['menesis'])
if($krik[0]==$_GET['datums'])
array_push($a, $ik67s9);
$ik67s9++;}
$i2=0;
while($i2<count($a)){
show($k, $record[$a[$i2]], $a[$i2]);
$i2++;}}
echo '
	</table>

</div>
</td>
</tr>
</table>
<img src="images/mcb_footer.gif" alt="footer" width="368" height="10">
';
}
else {
@include $DB;
if($record[$_GET['id']-1][14]>$record[$_GET['id']-1][15]){$iznakums='<font color="#00E000"><b>Uzvara</b></font>';}
elseif($record[$_GET['id']-1][14]<$record[$_GET['id']-1][15]){$iznakums='<font color="#FF0000"><b>Zaude</b></font>';}
else {$iznakums='<font color="#000099"><b>Neizšķirts</b></font>';}
if(ISSET($_SESSION['admin'])){$adminiem='<td><font size="2" color="#FFFFFF"><a href="?p='.$_GET['p'].'&p2=dzest&p6=sikak&id='.$_GET['id'].'">
			Dzēst</a></font></td>';}
if($_GET['p2']=='dzest'){
@include $DB;
delete_record($DB, count($record)-$_GET['id']+1);
redirect('?p='.$_GET['p']);
}
if($_GET['p2']=='rediget'){
echo 'redigesanas forma nu ja ievajadzesies loti loti...';
}
show_record($DB, $_GET['id'], 'parastais', '', '<div align="center">

<table border="0" cellpadding="3" cellspacing="1">
	<tr bgcolor="#45454a">
		<td align="center" height="16">
		<font style="font-family: Arial; font-size: 13px; color: rgb(245, 245, 245); text-decoration: none; font-weight: bold">
		Datum</font><font style="font-family: Arial; font-size: 13px; font-weight: bold" color="#f5f5f5">s</font></td>
		<td align="center" height="16" nowrap="nowrap">
		<font style="font-family: Arial; font-size: 13px; font-weight: bold" color="#f5f5f5">
		Spēles tips</font></td>
		<td align="center" height="16" nowrap="nowrap">
		<font color="#F5F5F5">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px">
		Karte</span></font></td>
	</tr>
	<tr bgcolor="#72727a">
		<td nowrap="nowrap" valign="top">
		<p align="center">
		<span style="font-family: Arial; font-size: 13px; color: #F5F5F5">
		{1}</span></td>
		<td nowrap="nowrap" valign="top">
		<p align="center">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		{14}</span></td>
		<td nowrap="nowrap" align="center" valign="top">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		{13}</span></td>'.$adminiem.'
	</tr>
	<tr bgcolor="#72727a">
		<td valign="top" align="center" bgcolor="#45454A">
		<font color="#F5F5F5">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px">igL 
		team</span></font></td>
		<td valign="top" align="center" bgcolor="#45454A">
		<font color="#F5F5F5">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px">
		Rezultāts</span></font></td>
		<td align="center" valign="top" bgcolor="#45454A">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		{2} team</span></td>
		<td align="center" bgcolor="#45454A">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: rgb(0, 224, 0)">
		U</span><b><font style="font-family: Arial; font-size: 13px; color: rgb(245, 245, 245); text-decoration: none; font-weight: bold">/</font><font style="font-family: Arial; font-size: 13px; text-decoration: none; font-weight: bold" color="#ff0000">Z</font><font style="font-family: Arial; font-size: 13px; color: rgb(245, 245, 245); text-decoration: none; font-weight: bold">/</font><font style="font-family: Arial; font-size: 13px; text-decoration: none; font-weight: bold" color="#000099">N</font></b></td>
	</tr>
	<tr bgcolor="#72727a">
		<td nowrap="nowrap" valign="top">
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		{3}</span></p>
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		{4}</span></p>
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		{5}<br>
		{6}<br>
		{7}</span></td>
		<td nowrap="nowrap" valign="top">
		<p style="margin-top: 0pt; margin-bottom: 0pt" align="center">
		<font color="#F5F5F5">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px">
		{15} : {16}</span></font><p>&nbsp;</td>
		<td nowrap="nowrap" align="center" valign="top">
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		{8}</span></p>
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		{9}</span></p>
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		{10}</span></p>
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		{11}</span></p>
		<p align="center" style="margin-top: 0; margin-bottom: 0">
		<span style="font-family: Arial; font-weight: 700; font-size: 13px; color: #F5F5F5">
		{12}</span></td>
		<td nowrap="nowrap">
		<font color="#FFFFFF">'.$iznakums.'</font></td>
	</tr>
	</table>
</div>');
}
?>