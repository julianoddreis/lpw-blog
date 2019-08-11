<?php
    // include "functions.php"
?>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="styles.css" rel="stylesheet"></link>
    <script src="https://kit.fontawesome.com/b05cf6c607.js"></script>
    <title>LPW - Blog</title>
  </head>
  <body>
  <?php include('components/header.php') ?>
    <div class="content row align-start justify-center">
      <form class="form column">
        <div class="column form__field-wrapper">
          <label>Título</label>
          <input name='title' class="form__input" />
        </div>
        <div class="column form__field-wrapper">
          <label>Descrição</label>
          <input name='description' class="form__input" />
        </div>
        <div class="column form__field-wrapper">
          <label>Imagem</label>
          <input name='image' class="form__input" />
        </div>
        <div class="row justify-end align-center form__buttons">
          <button class="btn btn--secondary">Cancelar</button>
          <button class="btn btn--primary">Salvar</button>
        </div>
      </form>
    </div>
  <?php include('components/footer.php') ?>
  </body>
</html>
