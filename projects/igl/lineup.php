<?
$DB='DB/memberi.php';
if(ISSET($_SESSION['admin'])){
$adrim=' - <a href="?lineup=dzest&id={cipars}"><font color="#FF0000">Dzēst</font></a>';}
else {$adrim='';}
echo '<table width="93%" border="0" align="center" cellpadding="0" cellspacing="0" >
                      <tr>
                        <td>';
show_record($DB, 'visus', 'parastais', "", '<p style="margin-top: 0; margin-bottom: 0"><b>
						<font size="2"><span lang="en"><font face="Wingdings">
						<font color="#FF0000">²</font> </font></span></font>
<font style="font-size: 10pt">
						{1}'.$adrim.'</font></b></font></b></p>');
						echo '</td>
                      </tr>
                    </table>';
if(@$_GET['lineup']=="dzest"){
@include $DB;
delete_record($DB, count($record)-$_GET['id']+1);
redirect('?');
}
?>