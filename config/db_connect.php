<?php

//connect to DB
$conn = mysqli_connect('localhost', 'kasun', 'Kasun1996', 'kassa_pizza');
//check the connection

if (!$conn) {
    echo 'connection error' . mysqli_connect_error();
}

?>