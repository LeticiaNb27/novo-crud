    <div id="navigation">
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="sobre.php">SOBRE</a></li>
        <li><a href="midias.php">TRAILERS</a></li>
        <li><a href="noticias.php">NOTICIAS</a></li>
        <li><a href="suporte.php">SUPORTE(FILMES)</a></li>
        <li><a href="?sair=1">SAIR</a>
      </ul>
    </div>

    <?PHP 

    if(@$_GET['sair'] == 1){
      session_destroy();
      header("Location: index.php");
    }

    ?>
