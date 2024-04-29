<?php

$conn=new mysqli("localhost","root","","crud_application");
if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

?>