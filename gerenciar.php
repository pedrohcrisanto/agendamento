

<?php
require_once "system/limited_all.php";
$title = 'Cadastro de Horários';
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
            <h4 class="center">Cadastro de Horários</h4>
            <div class="row offset4">
				<div class="col-xs-12 col-sm-12 col-md-12">                
					<div class="sucess text_center">
						<h5>Horário cadastrado com sucesso!</h5>
					</div>
				</div>
            <form data-result-class="rd-mailform-validate" data-form-type="contact" method="post" action="" class="rd-mailform esconder">
                <div class="col-xs-12 col-sm-6 col-md-6">
				<label>ESCOLHA A DATA</label>				
                  <input type="date" name="data">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
				<label>ESCOLHA O HORÁRIO</label>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<label>MANHÃ</label>
						<input type="checkbox" name="horario[]" value="8h às 9h">8h às 9h
						<input type="checkbox" name="horario[]" value="9h às 10h">9h às 10h
						<input type="checkbox" name="horario[]" value="10h às 11h">10h às 11h
						<input type="checkbox" name="horario[]" value="11h às 12h">11h às 12h
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<label>TARDE</label>
						<input type="checkbox" name="horario[]" value="13h às 14h">13h às 14h
						<input type="checkbox" name="horario[]" value="14h às 15h">14h às 15h
						<input type="checkbox" name="horario[]" value="15h às 16h">15h às 16h
						<input type="checkbox" name="horario[]" value="16h às 17h">16h às 17h
					</div>
                </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" name="cadastrar" class="btn btn-primary btn-icon btn-sm btn-icon-left"><span>Cadastrar</span></button>
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
	
if(isset($_POST['cadastrar'])){
	
	$data	=	$_POST['data'];
	$status	=	'yes';
	
	if(!empty($data) AND !empty($_POST["horario"])){
	
		try {
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			  $stmt = $conn->prepare('INSERT INTO `data_consulta`(`data`, `status`) VALUES (:data,:status)');
			  $sucess = $stmt->execute(array(
				':data' => $data,
				':status' => $status
			  ));
			  
			  $data_consulta_id = $conn->lastInsertId();
			  
			  foreach ($_POST["horario"] as $horario) {
				  $stmt = $conn->prepare('INSERT INTO `horario_consulta`(`horario`, `status`, `data_consulta_id`) VALUES (:horario,:status,:data_consulta_id)');
				  $sucess = $stmt->execute(array(
					':horario' => utf8_decode($horario),
					':status' => $status,
					':data_consulta_id' => $data_consulta_id
				  ));
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
		<SCRIPT language="JavaScript" type="text/javascript">alert("Erro ao cadastrar, todos os campos são obrigatórios!")</SCRIPT>
		</div> 
		</b:if>	';
	}
	
}

?>