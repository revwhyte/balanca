<?php
  require_once('../models/Database.php');
  require_once('../models/Pesagem.php');
  require_once('../models/Utils.php');

  session_start();

  $dados = array();
  //tratar data ¬¬
  $dados['ps_data'] = Utils::formataData($_POST['ps_data']);
  $dados['ps_peso'] = $_POST['ps_peso'];

  $conn = Database::openConn();
  $pesagem = new Pesagem($dados);
  $pesagem->criarPesagem($conn);
  $conn = Database::closeConn();

  $_SESSION['criado'] = true;

  header('Location: ../views/nova.php');
  die();
?>
