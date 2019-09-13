<?
// Ielikt pareizu valodu enkodingu... UTF-8
function utf_8(){
header("Content-type: text/html; charset=UTF-8");
}

// Sākuma lapa
function begin($a){
if(!ISSET($_GET['p'])){
$_GET['p']=$a;
}
}

// Kodejums
function md32($a){
$b=md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5(md5($a
)))))))))))))))))))))))))))))))));
return $b;
}

// Aizsardzība loginam
function security($admin){
if(ISSET($_GET['admin']) && $_GET['admin']==$admin){$_SESSION['admin']=$_GET['admin']; redirect('?p='.$_GET['p']);}
if(ISSET($_SESSION['admin']) && $_SESSION['admin']==$admin){echo '<a href="?p=logout&a='.$_GET['p'].'">Izlogoties</a>';}
if($_GET['p']=="logout"){session_unset(); redirect('?p='.$_GET['a']);}}

// AJAX ielicējs
function ajax($kirdik){
echo '
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><script src="AJAX/prototype.js" type="text/javascript"></script>
  <script src="AJAX/scriptaculous.js" type="text/javascript"></script>
  <script src="AJAX/unittest.js" type="text/javascript"></script>
</head>
<script language="javascript" type="text/javascript" src="scripts/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	// Notice: The simple theme does not use all options some of them are limited to the advanced theme
	tinyMCE.init({
		mode : "textareas",
		theme : "'.$kirdik.'"
	});
</script>
';
}

// Redirekts, kas pielāgojas browserim...
function redirect($u, $b){
if(ISSET($b)){
echo '<script>
window.open("'.$u.'")
</script>';
}
else {
if (!headers_sent()) {
header('Location: '.$u);
echo '<script>
  window.location.href="'.$u.'";
  </script>';
 exit;
}else{
 echo '<script>
window.location.href="'.$u.'";
</script>';
}
}
}

// Uzlabotais str_replace... ar linku pievienošanu
function str_replace2_link($template, $link_color, $aizvietojamie_arr, $dati_arr){
$link_sakums='<a style="font-color: '.$link_color.';" href="?p=';
$link_vidus='">';
$link_beigas='</a>';
$i=0;
while ($i <= count($aizvietojamie_arr)-1):
$ieliekam=$link_sakums.$aizvietojamie_arr[$i].$link_vidus.$dati_arr[$i].$link_beigas;
$template=str_replace('{'.$aizvietojamie_arr[$i].'}', $ieliekam, $template);
    $i++;
endwhile;
return $template;
}

// Uzlabotais str_replace... bez linku pievienošanu
function str_replace2($template, $aizvietojamie_arr, $dati_arr){
$i=0;
while ($i <= count($aizvietojamie_arr)-1):
$template=str_replace('{'.$aizvietojamie_arr[$i].'}', $dati_arr[$i], $template);
    $i++;
endwhile;
return $template;
}

// Izveidot datu bāzi
# Pārsvarā gan tikai vajadzīga un tiek izmantota funkcijā add_record, bet var lietot arī atsevišķi...
function create_DB($nosaukums, $chmod){
$a=fopen($nosaukums, "w");
fclose($a);
chmod($nosaukums, $chmod);
}

// Ierakstīt ierakstu drošā veidā neturot faila access uz 646, bet to tikai īslaicīgi iedarbinot...
function add_record($DB, $ieraksts_arr, $kategorija){
if(!file_exists($DB)){create_DB($DB, 0646);}
chmod($DB, 0646);
@include($DB);
${"$kategorija"}[]=$ieraksts_arr;
$f=fopen($DB,"w");
fwrite($f,'<? $'.$kategorija.'='.var_export($$kategorija,true).'; ?>');
fclose($f);
chmod($DB, 0644);
}

// Ierakstu parādītājs
#Saliksim visu šablonā ar šo funkciju
function show($template, $paradit, $cipars){
$i=0;
while ($i <= count($paradit)-1):
$i2=$i+1;
$template=str_replace('{'.$i2.'}', $paradit[$i], $template);
$template=str_replace('#"', '#'.$cipars.'"', $template);
$template=str_replace('{cipars}', $cipars, $template);
    $i++;
endwhile;
print $template;
}
// Banneriem
function show_b($template, $paradit, $cipars){
$i=0;
while ($i <= count($paradit)-1):
$i2=$i+1;
$template=str_replace('{'.$i2.'}', $paradit[$i], $template);
$kru=explode('/', $paradit[0]);
$kru2=$kru[1];
$template=str_replace('{nosaukums}', $paradit[0], $template);
$template=str_replace('{failins}', $paradit[1], $template);
$template=str_replace('#"', '#'.$cipars.'"', $template);
$template=str_replace('{cipars}', $cipars, $template);
$izmer=filesize('BOX/'.$paradit[1]);
$izmera=$izmer/1024;
$izmers=round($izmera ,2);
$template=str_replace('{izmers}', $izmers, $template);
    $i++;
endwhile;
print $template;
}
#Pati funkcija
function show_record($DB, $kuru_ierakstu, $virziens, $cik_ierakstus, $template){
@include($DB);
if($kuru_ierakstu=="pedejo"){
$kuru=count($record)-1;
}
if(is_numeric($kuru_ierakstu)){
$kuru=$kuru_ierakstu-1;
}
if($kuru_ierakstu=="visus"){
$i=0;
if($virziens=="reversais"){$record=array_reverse($record);}
if($cik_ierakstus !=""){
while ($i <= $cik_ierakstus-1): 
$kuru=$i;
$paradit=$record[$kuru];
$cipars=$kuru+1;
show($template, $paradit, $cipars);
    $i++;
endwhile;
}
else {
while ($i <= count($record)-1): 
$kuru=$i;
$paradit=$record[$kuru];
$cipars=$kuru+1;
show($template, $paradit, $cipars);
    $i++;
endwhile;
}
}
else {
$paradit=$record[$kuru];
show($template, $paradit, $cipars);
}
}

// Banneru show
function show_record_b($DB, $kuru_ierakstu, $virziens, $cik_ierakstus, $template){
@include($DB);
if($kuru_ierakstu=="pedejo"){
$kuru=count($record)-1;
}
if(is_numeric($kuru_ierakstu)){
$kuru=$kuru_ierakstu-1;
}
if($kuru_ierakstu=="visus"){
$i=0;
if($virziens=="reversais"){$record=array_reverse($record);}
if($cik_ierakstus !=""){
while ($i <= $cik_ierakstus-1): 
$kuru=$i;
$paradit=$record[$kuru];
$cipars=$kuru+1;
show_b($template, $paradit, $cipars);
    $i++;
endwhile;
}
else {
while ($i <= count($record)-1): 
$kuru=$i;
$paradit=$record[$kuru];
$cipars=$kuru+1;
show_b($template, $paradit, $cipars);
    $i++;
endwhile;
}
}
else {
$paradit=$record[$kuru];
show_b($template, $paradit, $cipars);
}
}

// Ierakstu dzēsējs
function delete_record($DB, $kuru){
@include $DB;
$record=array_reverse($record);
array_splice($record, $kuru-1, 1);
$record=array_reverse($record);
chmod($DB, 0646);
$fh = fopen($DB, 'w+');
fwrite($fh, '<? $record='.var_export($record,true).'; ?>');
fclose($fh);
chmod($DB, 0644);
}

// Ierakstu rediģētājs
# Funkcijas veicējs - izmainam vienu mainīgo
function edit($DB, $kuru, $kuru2, $ko_arr){
@include $DB;
$record[$kuru-1][$kuru2-1]=$ko_arr;
chmod($DB, 0646);
$fh = fopen($DB, 'w+');
fwrite($fh, '<? $record='.var_export($record,true).'; ?>');
fclose($fh);
chmod($DB, 0644);
}
# Pati funkcija
function edit_record($DB, $kuru, $ko_arr){
@include $DB;
$a=0;
while($a <= count($ko_arr)-1):
edit($DB, $kuru, $a+1, $ko_arr[$a]);
$a++;
endwhile;
}

// Smaidu tulks
function smaidu_tulks($a){
$a = str_replace('<img src="', "", $a);
$a = str_replace('">', "", $a);
$a = str_replace('smaidini/', "", $a);
$a = str_replace('1.gif', ":)", $a);
$a = str_replace('2.gif', ":(", $a);
$a = str_replace('3.gif', ";)", $a);
$a = str_replace('4.gif', ";(", $a);
$a = str_replace('5.gif', ";o", $a);
$a = str_replace('6.gif', ":@", $a);
$a = str_replace('7.gif', ":P", $a);
$a = str_replace('8.gif', ":D", $a);
$a = str_replace('9.gif', "{time}", $a);
$a = str_replace('10.gif', "{labais}", $a);
$a = str_replace('11.gif', "{gaviles}", $a);
$a = str_replace('12.gif', "{skatos}", $a);
$a = str_replace('13.gif', "{devil}", $a);
$a = str_replace('14.gif', "{ban}", $a);
$a = str_replace('15.gif', "{matrix}", $a);
$a = str_replace('16.gif', "{killaruna}", $a);
$a = str_replace('17.gif', "{foto}", $a);
$a = str_replace('18.gif', "{sister}", $a);
$a = str_replace('19.gif', "{engelis}", $a);
$a = str_replace('20.gif', "{austinas}", $a);
$a = str_replace('21.gif', "{zirneklis}", $a);
$a = str_replace('22.gif', "{trenins}", $a);
$a = str_replace('23.gif', "{dzertins}", $a);
return $a;
}

// Datums
function datums($a, $b, $c, $d, $e, $f, $g, $h){
// Diena
$diena = date ("l");
if($diena == "Monday") {$diena = "Pirmdiena";}
elseif($diena == "Tuesday") {$diena = "Otrdiena";}
elseif($diena == "Wednesday") {$diena = "Trešdiena";}
elseif($diena == "Thursday") {$diena = "Ceturtdiena";}
elseif($diena == "Fryday") {$diena = "Piektdiena";}
elseif($diena == "Saturday") {$diena = "Sestdiena";}
elseif($diena == "Sunday") {$diena = "Svētdiena";}

// Datums
$datums = date ("j");

//Mēnesis
$menesis = date ("F");
if($menesis=="January"){$menesis= "janvāris";}
elseif($menesis=="February"){$menesis= "februāris";}
elseif($menesis=="March"){$menesis= "marts";}
elseif($menesis=="April"){$menesis= "aprīlis";}
elseif($menesis=="May"){$menesis= "maijs";}
elseif($menesis=="June"){$menesis= "jūnijs";}
elseif($menesis=="July"){$menesis= "jūlijs";}
elseif($menesis=="August"){$menesis= "augusts";}
elseif($menesis=="September"){$menesis= "septembris";}
elseif($menesis=="October"){$menesis= "oktobris";}
elseif($menesis=="November"){$menesis= "novembris";}
elseif($menesis=="December"){$menesis= "decembris";}

// Gads
$gads = date ("Y");

// Kopā izvadam
print $$a.$b.$$c.$d.$$e.$f.$$g.$h;
}
?>