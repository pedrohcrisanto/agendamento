<?php
  //envio o charset para evitar problemas com acentos
  header("Content-Type: text/html; charset=UTF-8");

    include '../config/config.php';

  $mysqli = new mysqli(HOST, USER, PASS, DB);
  $email = filter_input(INPUT_GET, 'email');
  $sql = "SELECT * FROM `paciente` WHERE `email` = '".$email."'"; //monto a query
  $query = $mysqli->query( $sql ); //executo a query
  if( $query->num_rows > 0 ) {//se retornar algum resultado
    echo '<span class="mfValidation error">E-mail já cadastrado!</span>';
  } else {
    
  }
