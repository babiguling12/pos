<?php 
include "include/database.php";
$password = password_hash("admin", PASSWORD_DEFAULT);

mysqli_query($conn, "INSERT INTO pengguna VALUES (NULL, 'admin', '$password', 'Admin', 'admin', '08admin')");