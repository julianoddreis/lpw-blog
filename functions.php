<?php

  include_once("config.php");

  if ($_POST) {
    if ($_POST['id']) {
  
      $id = $_POST['id'];
      $title = $_POST['title'];
      $description = $_POST['description'];
      $image = $_POST['image'];
  
      try {
        $updatePost = $pdo->prepare('UPDATE posts SET title=?, description=?, image=? WHERE id=?');
        $updatePost->execute(array($title, $description, $image, $id));
      } catch (PDOException $e) {
        http_response_code(500);
        echo $e;
      }
  
    } else {

      $title = $_POST['title'];
      $description = $_POST['description'];
      $image = $_POST['image'];

      try {
        $createPost = $pdo->prepare('INSERT INTO posts(title, description, image) VALUES(?, ?, ?)');
        $createPost->execute(array($title, $description, $image));
      } catch (PDOException $e) {
        http_response_code(500);
      }

    }
  }


  if (isset($_GET)) {
    if ($_GET['id']) {
      try {
        $getPostById = $pdo->prepare('SELECT * FROM posts WHERE id=?');
        $getPostById->execute(array($_GET['id']));
        echo json_encode($getPostById->fetchAll());
      } catch (PDOException $e) {
        http_response_code(500);
      }
    } else {
      try {
        $getPosts = $pdo->prepare('SELECT * FROM posts');
        $getPosts->execute();
        echo json_encode($getPosts->fetchAll());
      } catch (PDOException $e) {
        http_response_code(500);
      }
    }
  }

?>