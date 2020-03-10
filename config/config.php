<?php
define('HOST','localhost');
define('DB','luciano');
define('USER','root');
define('PASS','');

try {
    $conn = new PDO('mysql:host='.HOST.';dbname='.DB.'', USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>