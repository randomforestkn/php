<?php

session_start();
require('connect.php');




function executeQuery($sql, $data) {   // to $data einai oi conditions
  global $conn;
  $stmt = $conn->prepare($sql);
  $values = array_values($data);
  $types = str_repeat('s', count($values));
  $stmt->bind_param($types, ...$values);
  if ($stmt->execute()) {
     return $stmt;
  }

}

function selectAll($table, $conditions = []){   //  empty array initial value gia na ginei optional h parametros  $conditions
  global $conn;
  $sql = "SELECT * FROM $table";
  if (empty($conditions)) {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records =  $stmt->get_result()->fetch_all(MYSQLI_ASSOC);  // By using the MYSQLI_ASSOC constant this function will behave identically to the mysqli_fetch_assoc()
    return $records;
  } else {
    // epistrefei egrafes pou tairiazoun me tis conditions
    //$sql = "SELECT * FROM $table WHERE username='Tony' AND admin=1";

    $i = 0;
    foreach ($conditions as $key => $value) {
      if ($i === 0) {
        $sql = $sql . " WHERE $key=?";  // to ? gia prostasia apo sql injection
      } else {
        $sql = $sql . " AND $key=?";
      }
      $i++;
    }

    $stmt = executeQuery($sql, $conditions);
    $records =  $stmt->get_result()->fetch_all(MYSQLI_ASSOC);  // By using the MYSQLI_ASSOC constant this function will behave identically to the mysqli_fetch_assoc()
    return $records;
  }

}

function selectOne($table, $conditions){   // den vazw empty array initial value gia na ginei required  h parametros  $conditions
  global $conn;
  $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {
      if ($i === 0) {
        $sql = $sql . " WHERE $key=?";  // to ? gia prostasia apo sql injection
      } else {
        $sql = $sql . " AND $key=?";
      }
      $i++;
    }

    $sql = $sql . " LIMIT 1";  // gia na epistrepsei th proti egrafi pou 8a vrei
    $stmt = executeQuery($sql, $conditions);
    $records =  $stmt->get_result()->fetch_assoc();
    return $records;


}


function create($table, $data){
  global $conn;


  $sql = "INSERT INTO $table SET ";

  $i = 0;
  foreach ($data as $key => $value) {
    if ($i === 0) {
      $sql = $sql . "  $key=?";
    } else {
      $sql = $sql . ",  $key=?";
    }
    $i++;
  }

  $stmt = executeQuery($sql, $data);
  $id = $stmt->insert_id;
  return $id;


}

function update($table, $id, $data){
  global $conn;


  $sql = "UPDATE $table SET ";

  $i = 0;
  foreach ($data as $key => $value) {
    if ($i === 0) {
      $sql = $sql . "  $key=?";
    } else {
      $sql = $sql . ",  $key=?";
    }
    $i++;
  }

  $sql = $sql . " WHERE id=?";
  $data['id'] = $id;
  $stmt = executeQuery($sql, $data);
  return $stmt->affected_rows;


}

function delete($table, $id){
  global $conn;


  $sql = "DELETE FROM $table WHERE id=?";


  $stmt = executeQuery($sql, ['id' => $id]);
  return $stmt->affected_rows;
}

function getPublishedPosts(){
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? ORDER BY p.created_at DESC";  // join tous pinakes users kai posts to order by gia f8inousa seira

  $stmt = executeQuery($sql, ['published' => 1]);
  $records =  $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

function get_posts_with_username(){
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id ORDER BY p.created_at DESC";  // join tous pinakes users kai posts to order by gia f8inousa seira

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records =  $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

function getPostsByTopicId($topic_id){
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=? ORDER BY p.created_at DESC";
  $stmt = executeQuery($sql, ['published' => 1, 'topic_id' => $topic_id]);
  $records =  $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

function searchPosts($term){
  $match = '%' . $term . '%';
  global $conn;
  $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND p.title LIKE ? OR p.body LIKE ? ORDER BY p.created_at DESC"; //search query ta ? gia asfaleia apo sql injection
  $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
  $records =  $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}




 ?>
