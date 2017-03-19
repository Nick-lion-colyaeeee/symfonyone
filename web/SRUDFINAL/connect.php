<?php
$db_server = 'localhost';
$db_username = 'root1234';
$db_password = 'root1234';
$db_name = 'php_1_02_mydb';
//$db_server = 'localhost';
//$db_username = 'root';
//$db_password = '';
//$db_name = 'companiestwo';
$db = new DBClass('mysql:dbname='.$db_name.';host='.$db_server.';charset=UTF8', $db_username, $db_password);