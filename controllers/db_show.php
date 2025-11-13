<?php
/* Student: 2209314 - Rana Alsaggaf */
try {
  $host = '127.0.0.1';
  $port = 8889;              
  $user = 'root';
  $pass = 'root';            

  $dsn  = "mysql:host=$host;port=$port;charset=utf8mb4";
  $pdo  = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);

  $rows = $pdo->query("SHOW DATABASES;")->fetchAll();
  echo "<h2>Databases</h2><ul>";
  foreach ($rows as $r) echo "<li>".htmlspecialchars($r['Database'])."</li>";
  echo "</ul>";
} catch (Throwable $e) {
  http_response_code(500);
  echo "Connection failed: " . htmlspecialchars($e->getMessage());
}
