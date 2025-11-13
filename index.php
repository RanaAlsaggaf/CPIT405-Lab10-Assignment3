<?php
/* Rana Alsaggaf - 2209314 */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lab 10: PHP & MariaDB (Library)</title>
  <link rel="stylesheet" href="css/style1.css">
</head>
<body>
  <h1>Lab 10 : PHP & MariaDB</h1>
  <div class="card">
  <div class="tiles">
    <a class="tile" href="controllers/power.php?a=2&b=10">
      <h3>Assessment 1</h3>
      <p>Power function (iterative & recursive)</p>
    </a>

    <a class="tile" href="controllers/demo_diagram.php">
      <h3>Assessment 2</h3>
      <p>Translate diagram → PHP demo</p>
    </a>

    <a class="tile" href="controllers/db_show.php">
      <h3>Assessment 3</h3>
      <p>SHOW DATABASES</p>
    </a>

    <a class="tile" href="views/books_list.php">
      <h3>Books</h3>
      <p>Create, update, delete, list</p>
    </a>

    <a class="tile" href="views/upload_form.php">
      <h3>File Upload</h3>
      <p>Server-side handler with /uploads</p>
    </a>

    <a class="tile" href="views/login.php">
      <h3>Login</h3>
      <p>Cookie + session demo</p>
    </a>
  </div>
</div>

  <script src="js/script1.js"></script>
</body>
</html>

