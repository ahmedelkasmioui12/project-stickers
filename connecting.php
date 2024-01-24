<?php  

$dsn="mysql:host=localhost;dbname=login";
$user="root";
$password="ahmed1231";

try {
$projet= new PDO ($dsn,$user,$password);
echo "OK";
}
catch(PDOException $e){


echo "ERRORE  ".$e->getMessage();


}










































?>