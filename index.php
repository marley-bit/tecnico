<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9d2621ad5f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cp.css">
    <title>Streamify - Música Online</title>
</head>
<body>
    <div class="container"></div>
    <nav class="sidebar">
        <div class="nav-logo">
         <a href="up_de_add.php"><i class="fa-brands fa-spotify"></i></a>
            <h2>Streamify</h2>
        </div>
        <div class="nav-library">
            <i class="fa-solid fa-book"></i>
            <p>Sua biblioteca +</p>
        </div>
        <div class="nav-playlist">
            <h5>Crie sua Primeira Playlist</h5>
            <p>É facil, vamos te ajudar</p>
            <button>Criar Playlist</button>
        </div>
          <div class="nav-podcast">
            <h5>Que tal Seguir um Podcast</h5>
            <p>Avisaremos voce sobre nossos episodios</p>
            <button>Explore Playlist</button>
          </div>
          <div class="nav-footer">
                <a href="#">Legal</a>
                <a href="#">Centro de Privacidade</a>
                <a href="#">Politica de Privacidade</a>
                <a href="#">Cookies</a>
                <a href="#">Sobre anuncios</a>
                <a href="#">Acessibilidade</a>
          </div>
          <button class="nav-lang-button">
            <i class="fa-solid fa-globe"></i>
            Portugues do Brasil
        </button>
    </nav>

    <main>
        <header class="search-bar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input placeholder="O que voce quer ouvir?">
        </header>
        <section class="content">

            <h2>Artistas Populares</h2>
            <div class="artists-grid"></div>

                <!--Inserir dados com JS-->

            <h2>Albuns Populares</h2>
            <div class="albuns-grid"></div>



        </section>
    </main>
     
</body>
<script src="./jv.js"></script>
</html>
