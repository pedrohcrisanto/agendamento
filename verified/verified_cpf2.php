<?php
  //envio o charset para evitar problemas com acentos
  header("Content-Type: text/html; charset=UTF-8");

  include '../config/config.php';

  $mysqli = new mysqli(HOST, USER, PASS, DB);
  $cpf = filter_input(INPUT_GET, 'cpf_2');
  $sql = "SELECT * FROM `paciente` WHERE `cpf` = '".$cpf."'"; //monto a query
  $query = $mysqli->query( $sql ); //executo a query
  if( $query->num_rows > 0 ) {//se retornar algum resultado
    
  } else {
    echo '<a href="cadastro.php">Cadastrar CPF!</a>';
  }
