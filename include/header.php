      <header>
        <div id="stuck_container" class="stuck_container">
          <div class="container">
            <div class="brand">
              <a href="./"><h1 class="brand_name">Clínica Escola</h1>
              <div class="brand_img"><img src="images/brand_img.png" alt=""></div></a>
            </div>
			<?php if (!isset($_SESSION['MM_Username'])) { ?>
            <nav class="nav">
              <ul data-type="navbar" class="sf-menu">
                <li><a href="agendamento.php">Agendamento</a>
                </li>
                <li><a href="cadastro.php">Cadastro de Paciente</a>
                </li>
              </ul>
            </nav>
			<?php }else{ ?>
            <nav class="nav">
              <ul data-type="navbar" class="sf-menu">
                <li><a href="gerenciar_horarios.php">Horários Cadastrados</a>
                </li>
                <li><a href="gerenciar.php">Cadastrar Horários</a>
                </li>
				<li><a href="pacientes_agendados.php">Pacientes Agendados</a>
                </li>
				<li><a href="pacientes_cadastrados.php">Pacientes Cadastrados</a>
                </li>
              </ul>
            </nav>
			<?php } ?>
          </div>
        </div>
<?php if(!empty($index)){ ;?>
        <div class="camera_container">
          <div id="camera" class="camera_wrap">
            <div data-src="images/fisioterapia1.jpg">
              <div class="camera_caption fadeIn">
                <h3>Fisioterapia</h3>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><a href="agendamento.php" class="btn">Agende sua consulta</a>
              </div>
            </div>
            <div data-src="images/fisioterapia2.jpg">
              <div class="camera_caption fadeIn">
                <h3>Fisioterapia</h3>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><a href="agendamento.php" class="btn">Agende sua consulta</a>
              </div>
            </div>
            <div data-src="images/fisioterapia3.jpg">
              <div class="camera_caption fadeIn">
                <h3>Fisioterapia</h3>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><a href="agendamento.php" class="btn">Agende sua consulta</a>
              </div>
            </div>
          </div>
        </div>
<?php } ?>
      </header>