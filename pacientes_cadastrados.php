
<?php
require_once "system/limited_all.php";
$title = 'Pacientes Cadastrados';
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
            <h4 class="center">Pacientes Cadastrados</h4>
            <div class="row offset4">
				<div class="col-xs-12 col-sm-12 col-md-12">
				<table style="width: 100%">
<?php
$consulta = $conn->query("SELECT * FROM `paciente` ORDER BY `nome` ASC");
$count = 1;

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

	$nome = utf8_encode($linha['nome']);
	$nasc = utf8_encode($linha['nascimento']);
	$telefone = utf8_encode($linha['telefone']);
	$email = utf8_encode($linha['email']);
	$cpf = utf8_encode($linha['cpf']);
	$sus = utf8_encode($linha['sus']);
	$observacao = utf8_encode($linha['observacao']);
	$count = 1;
	
	echo'

	<tr>
		<td style="width: 30%">
		'.$nome.'
		</td>
		<td style="width: 20%">
		'.$nasc.'
		</td>
		<td style="width: 20%">
		'.$telefone.'
		</td>
		<td style="width: 30%">
		'.$email.'
		</td>
	</tr>
	<tr style="border-bottom: 1px #000 solid;">
		<td>
		'.$cpf.'
		</td>
		<td>
		'.$sus.'
		</td>
		<td>
		'.$observacao.'
		</td>
		<td>
		
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