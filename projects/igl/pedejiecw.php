<?
@include 'DB/cw.php';
$kkf=0;
while($kkf<5){
if($kkf>=count($record)){break;}
$N=count($record)-$kkf-1;
@print '<a class="pedejiecw" onmouseover="this.className'."='pedejiecwx'".'" onmouseout="this.className='."'pedejiecw'".'" href="?p=cw&p6=sikak&id='.($N+1).'"><center><b>igL </b>'.$record[$N][14].'<b> : </b>'.$record[$N][15].'<b> '.$record[$N][1].'</b></center></a><hr>';
$kkf++;
}
?>