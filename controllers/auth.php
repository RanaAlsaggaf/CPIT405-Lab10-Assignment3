<?php
/* Student: 2209314 - Rana Alsaggaf */
session_start();
require_once __DIR__.'/../models/AuthModel.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $u=$_POST['username']??''; $p=$_POST['password']??'';
  if(AuthModel::check($u,$p)){
    $_SESSION['user']=$u;
    setcookie('last_login_user',$u,time()+60*60*24*30,'/');
    header('Location: ../views/books_list.php'); exit;
  }
  header('Location: ../views/login.php?error=1'); exit;
}
