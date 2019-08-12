<?php

  include_once("config.php");

  if ($_POST['id']) {

    // $id = $_POST['id'];
    // $title = $_POST['title'];
    // $description = $_POST['description'];
    // $image = $_POST['image'];

    // $createPost = $pdo->prepare('INSERT INTO posts(title, description, image) VALUES(?, ?, ?)');
    // $createPost->execute(array($title, $description, $image));

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

?>