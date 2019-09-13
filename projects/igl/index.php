<?
error_reporting(0);
session_start();
include 'funkcijas.php';
include 'templates/index.php';
utf_8();
ajax('simple');
@include 'DB/memberi.php';
$i=0;
while($i < count($record)){
$cipars=$i+1;
@$ko='<a class="memberi" onmouseover="this.className'."='memberix'".'" onmouseout="this.className='."'memberi'".'" href="?p=memberi&p2='.$record[$i][0].'&i='.$cipars.'">'.$record[$i][0].'</a>';
///////////////////
$pieces = explode("<textarea", $index);
if(ISSET($_SESSION['admin']) && ISSET($pieces[1])){
@$pieces[0]=str_replace($record[$i][0], $ko, $pieces[0]);
@$pieces2=explode('</textarea>', $pieces[1]);
@$pieces2[1]=str_replace($record[$i][0], $ko, $pieces2[1]);
$pieces[1]='<textarea'.$pieces2[0].'</textarea>'.$pieces2[1];
$index=$pieces[0].$pieces[1];
}
else {@$index=str_replace($record[$i][0], $ko, $index);}
@$index=str_replace("<textarea", '<textarea id="elm2"', $index);
$i++;
}
print $index;
session_destroy();
?>