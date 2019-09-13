<?
// Our log file;
$counter = "stats.php";

// Date logging;
$today = getdate();
$month = $today['month'];
$mday = $today['mday'];
$year = $today['year'];
$current_date = $mday . $month . $year;


// Log visit;
$fp = fopen($counter, "a");
$line = $_SERVER['REMOTE_ADDR'] . "|" . $mday . $month . $year . "\n";
$size = strlen($line);
fputs($fp, $line, $size);
fclose($fp);

// Read log file into array;
$contents = file($counter);

// Total hits;
$total_hits = sizeof($contents);

// Total hosts;
$total_hosts = array();
for ($i=0;$i<sizeof($contents);$i++) {
 $entry = explode("|", $contents[$i]);
 array_push($total_hosts, $entry[0]);
}
$total_hosts_size = sizeof(array_unique($total_hosts));

// Daily hits;
$daily_hits = array();
for ($i=0;$i<sizeof($contents);$i++) {
 $entry = explode("|", $contents[$i]);
 if ($current_date == chop($entry[1])) {
  array_push($daily_hits, $entry[0]);
 }
}
$daily_hits_size = sizeof($daily_hits);

// Daily hosts;
$daily_hosts = array();
for ($i=0;$i<sizeof($contents);$i++) {
 $entry = explode("|", $contents[$i]);
 if ($current_date == chop($entry[1])) {
  array_push($daily_hosts, $entry[0]);
 }
}
$daily_hosts_size = sizeof(array_unique($daily_hosts));
echo '
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><font face="Verdana">Šodien hiti: </font><b> ' . $daily_hits_size . '</b><br><br>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><font face="Verdana">Šodien dažādi IP: </font><b>' . $daily_hosts_size . '</b><br><br>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><font face="Verdana">Kopā hiti: </font><b>' . $total_hits . '</b><br><br>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><font face="Verdana">Kopā dažādi IP: </font><b> ' . $total_hosts_size;

?>