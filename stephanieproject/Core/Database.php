<?php

try {

    $db = new PDO('mysql:host=localhost;charset=utf8mb4;dbname=stephanie',"root",'1234');
}catch (PDOExeption $e){
    echo " Failed " .$e->getMessage();
}  