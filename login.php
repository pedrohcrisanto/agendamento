<?php require_once('config/painel_config.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php

if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario']) || isset($_POST['password'])) {
  $loginUsername=$_POST['usuario'];
  $password= md5($_POST['password']);
  $MM_fldUserAuthorization = "level";
  $MM_redirectLoginSuccess = "gerenciar_horarios.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_painel_config, $painel_config);
  	
  $LoginRS__query=sprintf("SELECT usuario, password, level FROM user WHERE usuario=%s AND password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $painel_config) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'level');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	
    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}

?>

<?php
$title = 'Login';
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
            <form data-result-class="rd-mailform-validate" data-form-type="contact" method="post" action="" class="rd-mailform esconder">
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