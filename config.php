<?php

$db_name = 'projeto';
$db_host = 'localhost:3306';
$db_user = 'root';
$db_password = 'senac123';

$pdo = new  PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_password);