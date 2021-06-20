<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root@123');
   define('DB_DATABASE', 'php_assignment');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
   }
?>