<?php
require_once 'coeur/init.php';

$user = new User();
$user->deco();

header ('Location: indexnew.php');
?>