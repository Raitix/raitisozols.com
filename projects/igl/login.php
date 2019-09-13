<?
$a1='<div align="center">
	<table border="0" style="border-collapse: collapse" width="100%" id="table1">
		<tr>
			<td width="24" valign="top"><b><font size="2"><span lang="en">
			<font face="Wingdings">
						<font color="#FF0000">²</font> </font></span></font>
</td>
			<td valign="top"><b>';
$a2='</b></td>
		</tr>
	</table>
</div>';
echo '<table width="93%" border="0" align="center" cellpadding="0" cellspacing="0" >
                      <tr>
                        <td>';
if(ISSET($_SESSION['admin'])){echo $a1;}
security('Valdis');
if(ISSET($_SESSION['admin'])){echo $a2;}
@include 'DB/memberi.php';
if(@$_GET['p']=='login'){
$i2=0;
while($i2 < count($record)){
if(@$_POST['niks']==@$record[$i2][0] && md32(@$_POST['parole'])==@$record[$i2][16]){
$_SESSION['autors']=$record[$i2][0];
$_SESSION['nr']=$i2;
redirect('?p='.$_GET['asd'].'&admin=Valdis');
}
$i2++;
}
}
if(@$_SESSION['admin']!='Valdis'){
echo '<form method="POST" action="?p=login&asd='.@$_GET['p'].'">
									<p>Niks:&nbsp;&nbsp;&nbsp;<input type="text" name="niks" size="14"></p>
									<p>Parole:<input type="password" name="parole" size="14"></p>
									<p align="center"><input type="submit" name="Ielogoties" value="Ieiet!" /></p>
								</form>';}
else {
echo $a1.'<a href="?p=redigetprofilu">Rediģēt profilu</a>'.$a2;
echo $a1.'<a href="?p=cw">Pievienot cw</a>'.$a2;
echo $a1.'<a href="?p=jaunumi&p4=kategorija">Rediģēt jaunumu kategorijas</a>'.$a2;
echo $a1.'<a href="?p=pieteikties">Apskatīt pieteikumus</a>'.$a2;
}
echo '</td>
                      </tr>
                    </table>';
?>