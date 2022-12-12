<?php
  $host_name = 'db5011161190.hosting-data.io';
  $database = 'dbs9426814';
  $user_name = 'dbu5421153';
  $password = 'endstore1';

  $link = new mysqli($host_name, $user_name, $password, $database);

  if ($link->connect_error) {
    die('<p>Error al conectar con servidor MySQL: '. $link->connect_error .'</p>');
  }
?>