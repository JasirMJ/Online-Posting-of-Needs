<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_need = "localhost";
$database_need = "need";
$username_need = "root";
$password_need = "";
$need = mysql_pconnect($hostname_need, $username_need, $password_need) or trigger_error(mysql_error(),E_USER_ERROR); 
?>