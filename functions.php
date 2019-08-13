<?php

  include_once("config.php");

  switch ($_REQUEST['action']) {
    case 'createPost':
      createPost($pdo);
      break;
    case 'editPost':
      editPost($pdo);
      break;
    case 'getPosts':
      getPosts($pdo);
      break;
    case 'getPostById':
      getPostById($pdo);
      break;
    case 'deletePost':
      deletePost($pdo);
    default:
      break;
  }

  function createPost ($pdo) {
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

  function editPost ($pdo) {
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
  }

  function getPosts ($pdo) {
    try {
      $getPosts = $pdo->prepare('SELECT * FROM posts');
      $getPosts->execute();
      echo json_encode($getPosts->fetchAll());
    } catch (PDOException $e) {
      http_response_code(500);
    }
  }

  function getPostById ($pdo) {
    $id = $_POST['id'];

    try {
      $getPostById = $pdo->prepare('SELECT * FROM posts WHERE id=?');
      $getPostById->execute(array($id));
      echo json_encode($getPostById->fetchAll());
    } catch (PDOException $e) {
      http_response_code(500);
    }
  }

  function deletePost ($pdo) {
    $id = $_POST['id'];

    try {
      $deletePost = $pdo->prepare('delete from posts WHERE id=?');
      $deletePost->execute(array($id));
    } catch (PDOException $e) {
      http_response_code(500);
    }
  }

?>