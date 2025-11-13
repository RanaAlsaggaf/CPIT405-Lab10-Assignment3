<?php
/* Student: 2209314 - Rana Alsaggaf */
session_start();
if(isset($_SESSION['user'])){ header('Location: books_list.php'); exit; }
$hint=$_COOKIE['last_login_user']??'';
$err=isset($_GET['error']);
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="../css/style1.css">
</head>
<body>
  <h2>Login</h2>
  <?php if($err): ?><p style="color:red">Invalid credentials</p><?php endif; ?>
  <form method="post" action="../controllers/auth.php">
    <input name="username" placeholder="username" value="<?=htmlspecialchars($hint)?>">
    <input name="password" type="password" placeholder="password">
    <button>Login</button>
  </form>
</body>
</html>
