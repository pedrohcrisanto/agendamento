      <footer>
<?php if(!empty($index)){ ?>
        <section data-url="images/parallax.jpg" data-mobile="true" data-speed="0.5" class="well2 parallax parallax2">
          <div class="container">
            <h4 class="center">Paciente</h4>
            <h5 class="center">Faça seu cadastro e marque sua consulta</h5>
            <div class="row">
              <form method="post" action="cadastro.php" class="mailform">
                <input type="hidden" name="form-type" value="contact">
                <fieldset>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>
                      <input type="text" name="name" placeholder="Nome" data-constraints="@LettersOnly @NotEmpty">
                    </label>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <label>
                      <input type="text" name="email" placeholder="E-mail" data-constraints="@Email @NotEmpty">
                    </label>
                  </div>
                  <div class="mfControls center">
                    <button type="submit">Continuar Cadastro</button>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </section>
<?php } ?>
        <section class="well3 bg-secondary">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-5 col-md-5">
                <address>Rodovia BR-230, KM 22, s/n - Água Fria<br/>João Pessoa-PB - CEP: 58053-000</address>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3"></div>
              <div class="col-xs-12 col-sm-4 col-md-4">
                <ul class="inline-list">
                  <li><a href="#" class="fa-twitter"></a></li>
                  <li><a href="#" class="fa-facebook"></a></li>
				  <?php if (!isset($_SESSION['MM_Username'])) { ?>
                  <li><a href="login.php" class="fa fa-sign-in" title="Entrar"></a></li>
				  <?php }else{ ?>
				  <li><a href="logout.php" class="fa fa-sign-out" title="Sair"></a></li>
				  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </section>
<?php if(!empty($index)){ ?>
        <div class="map">
          <div id="google-map" class="map_model"></div>
          <ul class="map_locations">
            <li data-x="-34.8563402" data-y="-7.1598345">
              <p>Rodovia BR-230, KM 22, s/n - Água Fria<br/>João Pessoa-PB - CEP: 58053-000 <br /><span>Fone: 0800 707 9210</span></p>
            </li>
          </ul>
        </div>
<?php } ?>
      </footer>