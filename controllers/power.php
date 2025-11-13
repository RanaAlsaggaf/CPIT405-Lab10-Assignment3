<?php
/* Rana Alsaggaf - 2209314 */
function power_iterative($a,$b){ $r=1; for($i=0;$i<$b;$i++) $r*=$a; return $r; }
function power_recursive($a,$b){
  if($b==0) return 1;
  if($b%2==0){ $h=power_recursive($a,intdiv($b,2)); return $h*$h; }
  return $a*power_recursive($a,$b-1);
}
$a=(int)($_GET['a']??2); $b=(int)($_GET['b']??5);
echo "<pre>Iterative: $a^$b = ".power_iterative($a,$b)."\n";
echo "Recursive: $a^$b = ".power_recursive($a,$b)."</pre>";
