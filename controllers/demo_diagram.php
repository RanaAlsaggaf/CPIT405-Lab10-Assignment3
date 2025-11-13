<?php
/* Student: 2209314 - Rana Alsaggaf */
$first="Library"; $last="System"; $title=$first." ".$last;
$a=7; $b=3; $sum=$a+$b; $mul=$a*$b; $status=$sum>9?"big":"small";
$d=date('N'); $day=$d==5?"Friday":($d==6?"Saturday":"Weekday");
$nums=[1,2,3,4]; function avg($arr){ return count($arr)?array_sum($arr)/count($arr):0; }
class Util{ public static function square($n){return $n*$n;} }

echo "<h2>Diagram Demo</h2><ul>";
echo "<li>Title: $title</li>";
echo "<li>$a + $b = $sum, $a * $b = $mul</li>";
echo "<li>Status: $status</li>";
echo "<li>Today: $day</li>";
echo "<li>Avg of [1,2,3,4]: ".avg($nums)."</li>";
echo "<li>Square(5): ".Util::square(5)."</li></ul>";
