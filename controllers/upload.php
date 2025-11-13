<?php
/* Rana Alsaggaf - 2209314 */
$dir=__DIR__.'/../uploads';
if(!is_dir($dir)) mkdir($dir,0777,true);
if(!isset($_FILES['f'])) die('No file');
if($_FILES['f']['error']!==UPLOAD_ERR_OK) die('Upload error');
$dest=$dir.'/'.basename($_FILES['f']['name']);
if(!move_uploaded_file($_FILES['f']['tmp_name'],$dest)) die('Failed to move file');
echo "Uploaded to: ".htmlspecialchars($dest);
