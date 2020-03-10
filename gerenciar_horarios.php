

<?php
require_once "system/limited_all.php";
$title = 'Horários Cadastrados';
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
            <h4 class="center">Horários Cadastrados</h4>
            <div class="row offset4">
				<div class="col-xs-12 col-sm-12 col-md-12">
				<table style="width: 100%">
<?php
$consulta = $conn->query("SELECT *, `horario_consulta`.`status` AS `hStatus` FROM `horario_consulta` INNER JOIN `data_consulta` WHERE `horario_consulta`.`data_consulta_id` = `data_consulta`.`data_consulta_id` ORDER BY `data_consulta`.`data`, `horario_consulta`.`horario_consulta_id` ASC");
$count = 1;

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	
	$date = new DateTime($linha['data']);	
	$data = $date->format('d/m/Y');
	
	$horario = utf8_encode($linha['horario']);
	$status = $linha['hStatus'];
	
	
	if($status == 'yes'){
		$disponibilidade = 'Disponível';
	}
	if($status == 'no'){
		$disponibilidade = 'Paciente agendado';
	}
	
	echo'

	<tr style="border-bottom: 1px #000 solid;">
		<td style="width: 10%">
		'.$count.'º
		</td>
		<td style="width: 30%">
		'.$data.'
		</td>
		<td style="width: 30%">
		'.$horario.'
		</td>
		<td style="width: 30%">
		'.$disponibilidade.'
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