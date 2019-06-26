<?php 
  include("conexao.php");
  if(isset($_POST['salvar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $lancamento = $_POST['lancamento'];
    $descricao = $_POST['descricao'];

    $data = date("Y-m-d", strtotime($lancamento));
    $query = mysqli_query($conexao, "UPDATE filmes SET nome = '$nome', lancamento = '$lancamento', descricao = '$descricao' WHERE id = $id");
    
    if($query){
      echo "<script>alert('O filme foi alterado com sucesso');location.href='suporte.php';</script>";
    }else{
      echo "<script>alert('Erro ao alterar o filme');</script>";
    }
  }

  if(@$_GET['tela'] == 'excluir' && isset($_GET['id']) && $id = $_GET['id']){
    $query = mysqli_query($conexao, "DELETE FROM filmes WHERE id = $id");

    if($query){
      echo "<script>alert('O FILME foi excluido com sucesso');location.href='suporte.php';</script>";
    }
  }
?>


<!DOCTYPE html>
<html>
<head>
<title>L & O Filmes & Series - Suporte</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="shortcut icon" href="css/images/favicon.ico" />
</head>
<body>

<div id="shell">
  <div id="header">
    <h1 id="logo"><a href="#">LOGO</a></h1>
    <?php include("menu.php"); ?>
        <div id="sub-navigation"></div>
  </div>



<?php if(isset($_GET['tela']) && $_GET['tela'] == 'alterar'){?>
  <div id="alterarFilme">
    <form method="POST">
      <input type="text" name="nome" value=<?php echo $_GET['nome'] ?>>
      <input type="date" name="lancamento" value=<?php echo date("d-m-Y", $_GET['lancamento']) ?>>
      <textarea name="descricao">
        <?php echo $_GET['descricao'] ?>
      </textarea>
      <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
      <input type="submit" name="salvar" value="Salvar"/>
    </form>
  </div>

<?php }?>

  <div id="main">
    <div id="content">

      <h1>Lista de FILMES</h1>
      <table border='3px' cellspacing="0">
          <tr>
            <td width="200px">Nome</td>
            <td width="100px">Data de Lançamento</td>
            <td width="200px">Descrição</td>
            <td width="100px"></td>
          </tr>

          <?php 
            $query = mysqli_query($conexao, "SELECT * FROM FILMES");

            if($r = mysqli_fetch_array($query)){
          ?>
            <tr>
              <td><?php echo $r['nome'] ?></td>
              <td><?php echo date("d-m-Y", strtotime($r['lancamento'])); ?></td>
              <td><?php echo $r['descricao'] ?></td>
              <td>
                <a href="<?php echo '?tela=alterar&id='.$r['id'].'&nome='.$r['nome'].'&lancamento='.$r['lancamento'].'&descricao='.$r['descricao'] ?> ">Editar</a>
                <a href="?tela=excluir&id=<?php echo $r['id'] ?>" onclick="return confirm('Você realmente deseja excluir o filme: <?php echo $r['nome']; ?>')">Excluir</a>
              </td>
            </tr>

          <?php }?>
      </table>
    </div>

  </div>
  <div id="footer">
    <p class="lf">Copyright &copy; 2018 <a href="#">L & O Games</a> - Todos os Direitos Reservados</p>
    <p class="rf">Design by <a href="#">Leticia NB</a></p>
    <div style="clear:both;"></div>
  </div>
</div>

</body>
</html>