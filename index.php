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
  <div class="row align-start content posts">
  </div>
  <?php include('components/footer.php') ?>
  </body>
  <script>
    const $ = el => document.querySelector(el)

    const postsContainer = $('.posts')

    const getPosts = async () => {
      const response = await fetch('functions.php')
      const posts = await response.json()
      posts.forEach(post => {
        postsContainer.insertAdjacentHTML(
          'beforeend',
          `
            <div class="post">
              <div class="row align-start justify-between">
                <p class="post__title">${post.title}</p>
                <div class="row post__actions">
                  <i class="fas fa-edit" onclick="editPost(${post.id})"></i>
                  <i class="fas fa-trash onclick="deletePost(${post.id})"></i>
                </div>
              </div>
              <img class="post__image" src=${post.image} />
              <p>${post.description}</p>
            </div>
          `
        )
      })
    }

    const editPost = id => {
      window.location.href = '/post.php?id=' + id
    }

    const deletePost = id => {
      console.log(id)
    }

    getPosts()
  </script>
</html>
