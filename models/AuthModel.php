<?php
/* Rana Alsaggaf - 2209314 */
class AuthModel {
  public static function check($u,$p): bool { return $u==='student' && $p==='1234'; }
}
