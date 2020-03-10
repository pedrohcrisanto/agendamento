<?php
  //envio o charset para evitar problemas com acentos
  header("Content-Type: text/html; charset=UTF-8");

    include '../config/config.php';

  $mysqli = new mysqli(HOST, USER, PASS, DB);
  $data = filter_input(INPUT_GET, 'data');
  $sql = "SELECT * FROM `data_consulta` WHERE `data` = '".$data."'"; //monto a query
  $query = $mysqli->query( $sql ); //executo a query
  if( $query->num_rows > 0 ) {//se retornar algum resultado
    
  } else {
    echo 'Data indisponivel!';
  }
