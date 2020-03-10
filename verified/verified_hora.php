<?php
	header( 'Content-type: application/xml; charset="utf-8"', true );
	
    include '../config/config.php';

  $mysqli = new mysqli(HOST, USER, PASS, DB);

@mysql_connect(HOST, USER, PASS);

// Seleciona banco de dados
mysql_select_db(DB);
ini_set("display_errors", 0);

$con = mysql_connect(HOST, USER, PASS) or die("Não foi possível conectar-se com o banco de dados!");

	$cod_estados = mysql_real_escape_string( $_REQUEST['data'] );

	$cidades = array();

	$sql = "SELECT * FROM `data_consulta` WHERE `data` = '$cod_estados'";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$id_data = $row['data_consulta_id'];
	}
	
	$sql2 = "SELECT * FROM `horario_consulta` WHERE `data_consulta_id` = $id_data AND `status` = 'yes'";
	$res2 = mysql_query( $sql2 );
	while ( $row2 = mysql_fetch_assoc( $res2 ) ) {
		$cidades[] = array(
			'horario_consulta_id'	=> $row2['horario_consulta_id'],
			'horario'			=> utf8_encode($row2['horario'])
		);
	}

	echo( json_encode( $cidades ) );