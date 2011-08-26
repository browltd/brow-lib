<?


// $ts is a postgres(timestamp - timestamp) result. something like: 
// timetostr('102 days 12:04:51.572473');

function timetostr($ts) {
  if (preg_match("#days?#",$ts)) {
    list ($d,$ts) = preg_split("/days?/",$ts);
  }
  list($time,$ms) = explode(".",$ts,2);
  list($h,$m,$s) = explode(":",$time,3);
  if ($d > 0) {
    $rv[] = intval($d)." days";
  }
  if ($h > 0) {
    $rv[] = intval($h)." hours";
  }
  if ($m > 0 && !$d) { // if we have days, a few minutes do not matter
    $rv[] = intval($m)." minutes";
  }
  if ($s > 0 && !$h && !$d) { // if we have days or hours, a few secs....
    $rv[] = intval($s)." seconds";
  }
  if (empty($rv)) {
    return "";
  }
  return implode($rv,", ");
}


?>
