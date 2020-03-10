<?php
// *** Logout the current user.
$logoutGoTo = "";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>
<?php
$title = 'Sair';
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
            <h4 class="center">Acessar Gerenciador</h4>
            <div class="row offset4">
            <form data-result-class="rd-mailform-validate" data-form-type="contact" method="post" action="login.php" class="rd-mailform esconder">
                <div class="col-xs-12 col-sm-6 col-md-6">
					<label>Usuário</label>				
						<input type="text" name="usuario">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
					<label>Senha</label>
						<input type="password" name="password">
                </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" name="entrar" class="btn btn-primary btn-icon btn-sm btn-icon-left"><span>Entrar</span></button>
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