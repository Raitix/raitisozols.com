<?
$template='                  <table border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td class="mcheader"><b>Memberi</b></td>
                        </tr>
                        <tr>
                          <td class="maincbbg">
							<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td>
<p align="left" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p align="left" style="margin-top: 0; margin-bottom: 0">Niks : <b>{1}</b><br>
<br>
Vārds: {2}<br>
Vecums : {3}<br>
Pilsēta: {4}<br>
<br>
Mouse: {5}<br>
Sensivity: {6}<br>
Pad: {7}<br>
Headset: {8}<br>
Resolution: {9}<br>
<br>
Favorite Weapons: {10}<br>
Favorite map: {11}<br>
<br>
PC Config.<br>
Monitor: {12}<br>
CPU: {13}<br>
Video: {14}<br>
HDD: {15}<br>
RAM: {16}</p></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td>
							<img src="images/mcb_footer.gif" alt="footer" width="368" height="10" /></td>
                        </tr>
                          </table>
						 ';
$DB='DB/'.$_GET['p'].'.php';
if(ISSET($_GET['i'])){
show_record($DB, $_GET['i'], 'parastais', '', $template);}
else {redirect('?');}
?>