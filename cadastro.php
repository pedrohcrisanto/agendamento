<?php
$title = 'Cadastro de paciente';
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
        <section class="well7">
          <div class="container">
            <h5>Contatos úteis em caso de dúvidas, reclamações e sugestões.</h5>
            <div class="row offset3">
              <div class="col-xs-12 col-sm-5 col-md-5">
                <h5 class="secondary-color">Endereço:</h5>
                <address>Rodovia BR-230, KM 22, s/n - Água Fria<br/>João Pessoa-PB - CEP: 58053-000</address>
              </div>
              <div class="col-xs-6 col-sm-3 col-md-3">
                <h5 class="secondary-color">Telefone:</h5><a href="callto:x">0800 707-9210<br/></a><!--<a href="callto:x">+1 800 603 6035</a>-->
              </div>
              <div class="col-xs-6 col-sm-4 col-md-4">
                <h5 class="secondary-color">E-mail:</h5><a href="mailto:x">clinica-escola@unipe.br</a>
              </div>
            </div>
          </div>
        </section>
        <section data-url="images/parallax2.jpg" data-mobile="true" data-speed="0.5" class="well8 parallax parallax2">
          <div class="container">
            <h4 class="center">Cadastro de Paciente</h4>
            <div class="row offset4">
			<div class="sucess text_center">
				<h5>Cadastro realizado com sucesso! <br />Agora você já pode realizar seu agendamento online da consulta.</h5>
				<div class="text_center">
					<a href="agendamento.php" class="agend">Realizar agendamento</a>
				</div>
			</div>
              <form method="post" action="" class="esconder mailform">
                <input type="hidden" name="cadastro" value="yes">
                <fieldset>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label>
                      <input type="text" <?php if(isset($_POST['form-type'])){ echo 'value="'.$_POST['name'].'"'; }?> name="name" <?php if(!isset($_POST['form-type'])){ echo 'placeholder="Nome"'; }?> data-constraints="@LettersOnly @NotEmpty">
                    </label>					
                  </div>
				  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label>
                      <input type="text" name="nasc" id="idata" onkeypress="mascara(this,data)" maxlength="10" placeholder="Data Nascimento" data-constraints="@NotEmpty">
                    </label>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label>
					<div id="result_mail"></div>
                      <input type="text" <?php if(isset($_POST['form-type'])){ echo 'value="'.$_POST['email'].'"'; }?> name="email" <?php if(!isset($_POST['form-type'])){ echo 'placeholder="E-mail"'; }?> data-constraints="@Email @NotEmpty">
                    </label>
                  </div>
				  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label>
                      <input type="text" name="tel" id="itelefone" onkeypress="mascara(this,telefone)" maxlength="15" placeholder="Telefone" data-constraints="@NotEmpty">
                    </label>
                  </div>
				  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label>
					<div id="result_cpf"></div>
                      <input type="text" name="cpf_1" id="icpf" onkeypress="mascara(this,cpf)" maxlength="14" placeholder="CPF" data-constraints="@NotEmpty">
                    </label>
                  </div>
				  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label>
					<div id="result_sus"></div>
                      <input type="text" name="sus_1" id="isus" onkeypress="mascara(this,sus)" maxlength="18" placeholder="Cartão SUS">
                    </label>
                  </div>
				  
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <label>
                      <textarea name="message" placeholder="Observação"></textarea>
                    </label>
                    <div class="mfControls center">
                      <button type="submit" class="offset" name="cadastrar">Cadastrar</button>
                    </div>
                  </div>
                </fieldset>
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

date_default_timezone_set('America/Recife');
$data	= date("Y-m-d");
$hora	= date("H:i:s");
	
$nome = $_POST['name'];
$nasc = $_POST['nasc'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$cpf = $_POST['cpf_1'];
$sus = $_POST['sus_1'];
$obs = utf8_decode($_POST['message']);
$date = date("Y-m-d H:i:s");

	if(!empty($nome) AND !empty($nasc) AND !empty($email) AND !empty($tel) AND !empty($cpf)){
		
		try {
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  
		  $stmt = $conn->prepare('INSERT INTO `paciente`(`nome`, `email`, `nascimento`, `data_cadastro`, `cpf`, `sus`, `telefone`, `observacao`) VALUES (:nome,:email,:nasc,:date_added,:cpf,:sus,:tel,:obs)');
		  $sucess = $stmt->execute(array(
			':nome' => $nome,
			':nasc' => $nasc,
			':email' => $email,
			':tel' => $tel,
			':cpf' => $cpf,
			':sus' => $sus,
			':obs' => $obs,
			':date_added' => $date
		  ));
		  
		} catch(PDOException $e) {
		  echo 'Error: ' . $e->getMessage();
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
	}
	
}
?>