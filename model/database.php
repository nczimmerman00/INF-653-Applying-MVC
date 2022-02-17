<?php 
//$dsn = 'mysql:host=localhost;dbname=todolist';
//$username = 'mgs_user';
//$password = 'pa55word';
$dsn = "mysql:host=localhost; port=3307; dbname=todolist";
$username = 'root';

try{
    $db = new PDO($dsn, $username);
    //$db = new PDO($dsn, $username, $password);
}catch (PDOException $e){
    $error_message = 'Database Error';
    $error_message .= $e->getMessage();
    //echo $error_message;
    include('../error.php');
exit();
}

?>