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
        <input id='id' type='hidden' />
        <div class="column form__field-wrapper">
          <label>Título</label>
          <input id='title' class="form__input" />
        </div>
        <div class="column form__field-wrapper">
          <label>Descrição</label>
          <input id='description' class="form__input" />
        </div>
        <div class="column form__field-wrapper">
          <label>Imagem</label>
          <input id='image' class="form__input" />
        </div>
        <div class="row justify-end align-center form__buttons">
          <button class="btn btn--secondary">Cancelar</button>
          <button class="btn btn--primary">Salvar</button>
        </div>
      </form>
    </div>
  <?php include('components/footer.php') ?>
  </body>
  <script>
    const $ = el => document.querySelector(el)

    const form = $('.form')

    const submit = async e => {
      e.preventDefault()

      const body = new FormData()

      body.append('id', $('#id').value)
      body.append('title', $('#title').value)
      body.append('description', $('#description').value)
      body.append('image', $('#image').value)

      const response = await fetch('functions.php', {method: 'POST', body})

      if (response.status === 200) {
        alert('Post criado com sucesso!')
        window.location.href = '/'
      } else {
        alert('Ops! Alguma coisa deu errado.')
      }
    }

    form.addEventListener('submit', submit)

  </script>
</html>
