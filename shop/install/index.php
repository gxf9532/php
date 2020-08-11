<?php 
include './install.class.php';

$install = new install();

$a = isset($_GET['a'])?$_GET['a']:'index';

$install->$a();