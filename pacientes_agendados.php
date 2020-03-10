
<?php
require_once "system/limited_all.php";
$title = 'Pacientes Agendados';
?>

<?php include 'include/head.php' ;?>
  <body>
    <div class="page">
      <!--
      ========================================================
                              HEADER
      ========================================================
      
      
      -->
<?php include 'include/header.php' ;?>
      <!--
      ========================================================
                               CONTENT
      ========================================================
      -->
      <main>
        <section class="well8 parallax parallax2">
          <div class="container">
            <h4 class="center">Pacientes Agendados</h4>
            <div class="row offset4">
				<div class="col-xs-12 col-sm-12 col-md-12">
				<table style="width: 100%">
<?php
$consulta = $conn->query("SELECT * FROM `marcacao` INNER JOIN `data_consulta` INNER JOIN `horario_consulta` INNER JOIN `paciente` WHERE `marcacao`.`paciente_id` = `paciente`.`paciente_id` AND `marcacao`.`horario_consulta_id` = `horario_consulta`.`horario_consulta_id` AND `horario_consulta`.`data_consulta_id`=`data_consulta`.`data_consulta_id` ORDER BY `data_consulta`.`data`, `horario_consulta`.`horario_consulta_id` ASC");
$count = 1;

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	
	$date = new DateTime($linha['data']);	
	$data = $date->format('d/m/Y');
	
	$horario = utf8_encode($linha['horario']);
	$nome = utf8_encode($linha['nome']);
	$telefone = utf8_encode($linha['telefone']);
	
	echo'

	<tr style="border-bottom: 1px #000 solid;">
		<td style="width: 10%">
		'.$count.'º
		</td>
		<td style="width: 20%">
		'.$data.'
		</td>
		<td style="width: 30%">
		'.$nome.'
		</td>
		<td style="width: 20%">
		'.$telefone.'
		</td>
		<td style="width: 20%">
		'.$horario.'
		</td>
	</tr>

	';
	
	$count++;
}
?>
				</table>
				</div>
            </div>
          </div>
        </section>
      </main>
      <!--
      ========================================================
                                  FOOTER
      ========================================================
      -->
<?php include 'include/footer.php' ;?>
    </div>
    <script src="js/script.js"></script>
  </body>
</html>