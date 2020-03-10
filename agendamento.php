<?php
$title = 'Agendamento de consulta';
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
            <h4 class="center">Agendamento de Consulta</h4>
            <div class="row offset4">
			<div class="sucess text_center">
				<h5>Consulta marcada com sucesso!</h5>
			</div>
            <form data-result-class="rd-mailform-validate" data-form-type="contact" method="post" action="" class="rd-mailform esconder">
              <div class="range">
				<div class="col-xs-12 col-sm-4 col-md-4">
				<label>CPF (já cadastrado)</label>				
                  <input type="text" id="icpf" onkeypress="mascara(this,cpf)" maxlength="14" name="cpf_2">
				  <div id="result_cpf2"></div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
				<label>ESCOLHA A DATA</label>				
                  <input type="date" name="data" id="data">
				  <div id="result_data"></div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
				<label>ESCOLHA O HORÁRIO</label>
					<span class="carregando">Aguarde, carregando...</span>
                      <select class="form-control" name="horario" id="horario" data-constraints="@NotEmpty">
						<option value="" selected="selected">-- Escolha a data --</option>
                      </select>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" name="marcar" class="btn btn-primary btn-icon btn-sm btn-icon-left"><span>Marcar</span></button>
              </div>
            </form>
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

<?php

if(isset($_POST['marcar'])){
	
	$cpf	=	$_POST['cpf_2'];
	$horario	=	$_POST['horario'];
	$status		= 'no';
	$data	=	$_POST['data'];
	
	if(!empty($cpf) AND !empty($horario)){
	
		try {
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  
		  $consulta = $conn->query("SELECT * FROM paciente WHERE cpf = '$cpf'");
		  
		  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
				$result = $linha['paciente_id'];
			}
		  if(!empty($result)){
			  $stmt = $conn->prepare('INSERT INTO `marcacao`(`paciente_id`, `horario_consulta_id`) VALUES (:result,:horario)');
			  $sucess = $stmt->execute(array(
				':result' => $result,
				':horario' => $horario
			  ));
			  $stmt = $conn->prepare('UPDATE `horario_consulta` SET status = :status WHERE horario_consulta_id = :horario');
			  $stmt->execute(array(
				':horario'   => $horario,				
				':status'   => $status
			  ));
		  }else{
			echo '<b:if cond=’data:blog.pageType == &quot;item&quot;’> 
			<div id=’subscribe’>
			<SCRIPT language="JavaScript" type="text/javascript">alert("Erro! CPF não cadastrado.")</SCRIPT>
			</div> 
			</b:if>	';
		  }
		if($sucess){
			echo'
			<style>
				.esconder{
					display: none;
				}
				.sucess{
					margin-top: 30px;
					display: block;
				}
			</style>
				';
		}
		} catch(PDOException $e) {
		  echo 'Error: ' . $e->getMessage();
		}
	
	}else{
		echo '<b:if cond=’data:blog.pageType == &quot;item&quot;’> 
		<div id=’subscribe’>
		<SCRIPT language="JavaScript" type="text/javascript">alert("Erro ao marcar a consulta, todos os campos são obrigatórios!")</SCRIPT>
		</div> 
		</b:if>	';
	}
	
}

?>