<?php

  $username = 'root';
  $password = '12345678';

  try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=lpw_blog', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      echo $e->getMessage();
  }

?>