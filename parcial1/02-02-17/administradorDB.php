<?php
include_once('config.php');

class administradorDB{
  public function executeQuery($sql){
    $conecta = mysql_connect(config::obtieneServidorBD(), config::obtieneUsuarioDB(), config::obtienePasswordDB());
    if (!$conecta){
      die('No puedo conectarme: ' . mysql_error());
    }

    mysql_select_db(config::obtieneNombreDB(), $conecta);
    $result = mysql_query($sql);

    mysql_close($conecta);
    return $result;
  }
} 
?>
