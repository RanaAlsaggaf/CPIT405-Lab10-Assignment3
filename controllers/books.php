<?php
/* Rana Alsaggaf - 2209314 */
require_once __DIR__.'/../models/BookModel.php';
header('Content-Type: application/json; charset=utf-8');
$method=$_SERVER['REQUEST_METHOD'];
$action=$_GET['action']??'';

try{
  if($method==='GET' && $action==='list'){ echo json_encode(BookModel::all()); exit; }
  if($method==='POST' && $action==='create'){
    $title=trim($_POST['title']??''); $author=trim($_POST['author']??'');
    $year=(int)($_POST['year']??0); $status=$_POST['status']??'Available';
    if($title===''||$author==='') throw new Exception('Title and author required');
    $id=BookModel::create($title,$author,$year,$status);
    echo json_encode(['ok'=>true,'id'=>$id]); exit;
  }
  if($method==='POST' && $action==='update'){
    $id=(int)($_POST['id']??0); $title=trim($_POST['title']??''); $author=trim($_POST['author']??'');
    $year=(int)($_POST['year']??0); $status=$_POST['status']??'Available';
    if($id<=0||$title===''||$author==='') throw new Exception('Invalid data');
    BookModel::update($id,$title,$author,$year,$status);
    echo json_encode(['ok'=>true]); exit;
  }
  if($method==='POST' && $action==='delete'){
    $id=(int)($_POST['id']??0); if($id<=0) throw new Exception('Invalid id');
    BookModel::delete($id); echo json_encode(['ok'=>true]); exit;
  }
  http_response_code(400); echo json_encode(['ok'=>false,'error'=>'Unsupported']);
}catch(Throwable $e){
  http_response_code(500); echo json_encode(['ok'=>false,'error'=>$e->getMessage()]);
}
