<?php
/* Student: 2209314 - Rana Alsaggaf */
class AuthModel {
  public static function check($u,$p): bool { return $u==='student' && $p==='1234'; }
}
