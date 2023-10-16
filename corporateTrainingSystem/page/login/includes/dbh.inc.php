<?php 
//обработчик базы данных
$driver='mysql';
$servername="localhost";
$dBUsername="root";
$dBPassword="";
$dBName="curser";
$charset='utf8';
// $options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
// try{
//    $pdo=new PDO(
//       "$driver:host=$servername;dbname=$dBName;charset=$charset",$dBUsername,$dBPassword,$options
//    );
// }
// catch(PDOException $i){
//    die("Ошибка подключения к базе данных");
// }
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
if(!$conn){
   die("Connection to DB failed: ".mysqli_connect_error());
}