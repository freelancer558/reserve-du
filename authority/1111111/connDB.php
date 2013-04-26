<?php
                $host = "127.0.0.1";
                $user ="root";
                $password = "1234";
                $database = "project";
                $link = mysql_connect($host,$user,$password) or die(mysql_error());
                mysql_select_db($database) or die(mysql_error());
mysql_query("SET CHARACTER SET tis620");
//mysql_query("set character set utf8");
?>
