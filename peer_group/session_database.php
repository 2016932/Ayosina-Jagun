<?php
session_start();
  session_regenerate_id();
  require_once('session_block.php');
  require_once('connection.php');
  ob_start();
  ?>