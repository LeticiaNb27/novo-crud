<?php
    if(!isset($_SESSION)){
      session_start();
    }

    include("conexao.php");

    if (isset($_POST['cadastra'])) {
      $nome = $_POST['nome'];
      $user = $_POST['user'];
      $senha = $_POST['senha'];

      mysqli_query($conexao, "INSERT INTO usuario(nome, emaill, senha) VALUES ('$nome', '$user', '$senha')");
    }

    if(@$_GET['sair'] == 'saiu'){
      session_destroy();
      header("Location: index.php");
    }

     if(isset($_POST['entrar'])){
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

        if(!empty($usuario) || !empty($senha)){
          $query = mysqli_query($conexao, "SELECT * FROM usuario where emaill = '$usuario' AND senha = '$senha'");
          
          /*VERICAR SE OS DADOS ESTA CERTO*/
          if(mysqli_num_rows($query)){
              echo "<script>alert('seja bem vindo!');location.href='index.php';</script>";
              $_SESSION['logado'] = true;

              
          }
          /*CASO OS DADOS NÃO ESTIVER CERTO*/
          else{
            echo  "<script>alert('usuario ou senha incorreto');location.href='index.php';</script>";
            }

        }else{
          echo"<script>alert('prencha todos os campos...');location.href='index.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>L & O Filmes & Series</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<style type="text/css">

  <?php 
    if(@$_GET['tela'] && !isset($_SESSION['logado'])){ ?>
      #shell{
      -webkit-filter: blur(15px);
      -moz-filter: blur(15px);
      -o-filter: blur(15px);
      -ms-filter: blur(15px);
      filter: blur(15px);
      }

     #my-account{
        display: block;
      }

        <?php } if(@$_GET['tela'] == 'cadastro') {?>

        .cadastro{
          display: block;
        }

        <?php } else if(@$_GET['tela'] == 'login'){?>

        #my-account .login{display: block;}
<?php } ?>
</style>


<link rel="shortcut icon" href="css/images/favicon.ico" />
</head>
<body>
  <div id="my-account">
    <a class="close" href="index.php"><b>X</b></a>
    <div class="login">
        <form id="form-login" method="post">
          <input id="LoginOrRegister" type="text" name="usuario" placeholder="Digite seu email"><br><br>
          <input id="LoginOrRegister" type="password" name="senha" placeholder="Digite sua senha"><br><br>
          <button id="button-form" type="submit" name="entrar">entrar</button>
        </form>
    </div>

    <div class="cadastro">
      <form id="form-cadastro" method="post">
        <input type="text" id="LoginOrRegister" name="nome" placeholder="digite seu nome"><br><br>
        <input id="LoginOrRegister" type="text" name="user" placeholder="Digite seu email"><br><br>
        <input id="LoginOrRegister" type="password" name="senha" placeholder="Digite sua senha"><br><br>
        <button id="button-form" type="submit" name="cadastra">CADASTRAR</button>
      </form>
    </div>
  </div>




<div id="shell">
  <div id="header">
    <h1 id="logo"><a href="#">LOGO</a></h1>

    <?php if(!isset($_SESSION['logado'])) {?>
      <a class="social" href="?tela=cadastro">REGISTRAR</a>
      <a class="social" href="?tela=login">MINHA CONTA</a>
    <?php }?>



  <?php include("menu.php"); ?>
    <div id="sub-navigation">
      <div id="search">
        <form action="#" method="get" accept-charset="utf-8">
          <input type="text" name="Digite o nome do game" placeholder="Pesquisar" id="search-field" class="blink search-field"/>
          <input type="submit" value="GO!" class="search-button"/>
        </form>
      </div>
    </div>
  </div>



  <div id="main">
    <div id="content">
      <div class="box">
        <div class="head">
          <h2>LANÇAMENTOS</h2>
          <p class="text-right"><a href="#">Mostrar Todos</a></p>
        </div>


        <div class="movie">
          <div class="movie-image">
	        <a href="#cee" class="ss"><span class="play">
	           <span class="name">ASSASSIN's CREED REVELATIONS</span>
	        </span></a>

            <span class="links"> 
            	<a href="#"><img src="css/images/game1.png" alt=""/></a> 
            </span> 
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in" style="width: 4%;"> </div>
            </div>
            <span class="comments">12</span>
          </div>
        </div>
     

        <div class="movie">
          <div class="movie-image">
          	<a href="#filme2">
	            <span class="play">
	              <span class="name">FARCRY3</span>
	            </span>
        	</a>

            <span class="links"> 
            	<a href="#"><img src="css/images/game2.png" alt="" /></a>
        	</span>
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in" style="width: 1%;"> </div>
            </div>
            <span class="comments">12</span>
          </div>
        </div>


        <div class="movie">
          <div class="movie-image"> 
          	<a href="#filme3">
	            <span class="play">
	              <span class="name">CRYSIS</span>
	            </span> 
        	</a>

            <span class="links"> 
            	<a href="#"><img src="css/images/game3.png" alt="" /></a>
            </span>
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in" style="width: 6%;"> </div>
            </div>
              <span class="comments">12</span>
          </div>
        </div>


        <div class="movie">
          <div class="movie-image">
          	<a href="#filme4"> 
	            <span class="play">
	              <span class="name">INFERNAL</span>
	            </span>
        	</a>
        	<span class="links"> 
              <a href="#"><img src="css/images/game4.png" alt="" /></a>
          	</span>
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in" style="width: 4%;"> </div>
            </div>
            <span class="comments">12</span> 
          </div>
        </div>


        <div class="movie">
          <div class="movie-image">
          	<a href="#filme5">
	            <span class="play">
	              <span class="name">BLADES</span>
	            </span>
            </a>
            <span class="links">  
           		<a href="#"><img src="css/images/game5.png" alt="" /></a>
           	</span>
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in" style="width: 2%;"> </div>
            </div>
            <span class="comments">12</span> 
          </div>
        </div>


        <div class="movie last">
          <div class="movie-image">
          	<a href="#filme6"> 
	            <span class="play">
	              <span class="name">SNIPER<br>GHOST WARRIOR</span>
	            </span>
        	</a>
        	<span class="links"> 
            	<a href="#"><img src="css/images/game6.png" alt="" /></a>
        	</span>
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> 
          </div>
        </div>
        <div class="cl">&nbsp;</div>
      </div>


      <div class="box">
        <div class="head">
          <h2>MAIS ASSISTIDOS</h2>
          <p class="text-right"><a href="#">Mostrar Todos</a></p>
        </div>


        <div class="movie">
          <div class="movie-image">
          	<a href="#filme8">
	          	<span class="play">
	          		<span class="name">TIMESHIFT</span>
	        	</span> 
	        </a>

	        <span class="links"> 
            	<a href="#"><img src="css/images/game7.png" alt="" /></a>
            </span> 
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in" style="width: 5%;"> </div>
            </div>
            <span class="comments">12</span> 
          </div>
        </div>


        <div class="movie">
          <div class="movie-image">
          	<a href="#filme9">
	            <span class="play">
	              <span class="name">KING KONG<br>THE OFFICIAL GAME OF THE MOTIVE</span>
	            </span>
        	</a>

        	<span class="links"> 
            	<a href="#"><img src="css/images/game8.png" alt="" /></a>
            </span>
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in" style="width: 3%;"> </div>
            </div>
            <span class="comments">12</span> 
          </div>
        </div>


        <div class="movie">
          <div class="movie-image">
          	<a href="#filme10">
	            <span class="play">
	              <span class="name">PRINCE OF PERSIA</span>
	            </span>
       		 </a>
       		<span class="links"> 
            	<a href="#"><img src="css/images/game9.png" alt="" /></a> 
           	</span>
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in" style="width: 6%;"> </div>
            </div>
            <span class="comments">12</span>
          </div>
        </div>


        <div class="movie">
          <div class="movie-image">
          	<a href="#filme11"> 
	            <span class="play">
	              <span class="name">SNIPER<br>GHOT WARRIOR</span>
	            </span>
        	</a>
        	<span class="links"> 
            	<a href="#"><img src="css/images/game10.png" alt="" /></a>
            </span> 
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in" style="width: 1%;"> </div>
            </div>
            <span class="comments">12</span> 
          </div>
        </div>


        <div class="movie">
          <div class="movie-image">
          	<a href="#filme12"> 
	            <span class="play">
	              <span class="name">TIMESHIFT</span>
	            </span>
        	</a>
        	<span class="links"> 
            	<a href="#"><img src="css/images/game11.png" alt="" /></a>
            </span> 
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in" style="width: 5%;"> </div>
            </div>
            <span class="comments">12</span> 
          </div>
        </div>


        <div class="movie last">
          <div class="movie-image">
          	<a href="#filme13"> 
	            <span class="play">
	              <span class="name">SPLINTER CELL<br>CONVICTION</span>
	            </span>
        	</a>
        	<span class="links"> 
            	<a href="#"><img src="css/images/game12.png" alt="" /></a>
        	</span>
          </div>

          <div class="rating">
            <p>Votos</p>
            <div class="stars">
              <div class="stars-in" style="width: 2%;"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="cl">&nbsp;</div>
      </div>
    </div>

  </div>
  <div id="footer">
    <p class="lf">Copyright &copy; 2018 <a href="#">L & O Games</a> - Todos os Direitos Reservados</p>
    <p class="rf">Design by <a href="#">Leticia NB</a></p>
    <div style="clear:both;"></div>
  </div>
</div>
  <script type="text/javascript">
      function fechar(){
        document.getElementById("my-account").style.display = "none";

      }
   </script>

</body>
</html>
