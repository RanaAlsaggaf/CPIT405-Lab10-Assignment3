<?php /* Rana Alsaggaf - 2209314 */ ?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
<link rel="stylesheet" href="../css/style1.css">
<title>Upload</title>
</head>
<body>
  <h2>Upload a file</h2>
  <form method="post" enctype="multipart/form-data" action="../controllers/upload.php">
    <input type="file" name="f" required>
    <button>Upload</button>
  </form>
</body>
</html>
