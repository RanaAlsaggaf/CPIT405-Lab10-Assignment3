<?php
/* Rana Alsaggaf - 2209314 */
require_once __DIR__.'/db.php';
class BookModel {
  public static function all(): array {
    return DB::conn()->query("SELECT * FROM books ORDER BY id DESC")->fetchAll();
  }
  public static function create($title,$author,$year,$status): int {
    $stm=DB::conn()->prepare("INSERT INTO books(title,author,year_published,status) VALUES(?,?,?,?)");
    $stm->execute([$title,$author,$year,$status]);
    return (int)DB::conn()->lastInsertId();
  }
  public static function update($id,$title,$author,$year,$status): bool {
    $stm=DB::conn()->prepare("UPDATE books SET title=?,author=?,year_published=?,status=? WHERE id=?");
    return $stm->execute([$title,$author,$year,$status,$id]);
  }
  public static function delete($id): bool {
    $stm=DB::conn()->prepare("DELETE FROM books WHERE id=?");
    return $stm->execute([$id]);
  }
}
