<?php
/* Student: 2209314 - Rana Alsaggaf */
class DB {
  private static ?PDO $pdo = null;

  public static function conn(): PDO {
    if (!self::$pdo) {
      $host = '127.0.0.1';
      $port = 8889;                      
      $db   = 'cpit405_lab10';
      $user = 'root';
      $pass = 'root';                     

      $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
      self::$pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]);
    }
    return self::$pdo;
  }
}
