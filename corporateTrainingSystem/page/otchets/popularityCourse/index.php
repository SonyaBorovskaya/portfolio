<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$server='localhost';
$username='root';
$password='';
$dbname='curser';
$charset='utf8';
$connection=mysqli_connect($server, $username, $password, $dbname);
if($connection->connect_error){
die ("Ошибка соединение".$connection->connect_error);
}
if(!$connection->set_charset($charset)){
echo "Ошибка установки кодировки";
}
?>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="../css/main.css">
   <link rel="stylesheet" type="text/css" href="../css/style.css">
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/css/bootstrap.css">
   <script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Популярность курсов
   </title>
</head>
<body>
   <div class="container">
      <h1>Популярность курсов</h1>
      <div class="returnOtchets">
         <a class="returnOtchetsBtn" href="../index.php">На страницу отчетов</a>
      </div>
      <?php
$query="SELECT c.name AS 'Курс', id_course, COUNT(*) FROM course r INNER JOIN courses c ON c.id = r.id_course GROUP BY id_course"; 

$result = mysqli_query($connection, $query);
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
echo "<table class='rtable'>";
echo "<thead>";
echo  "<tr>
<th>ID</th>
<th>Курс</th>
<th>Встречаемость</td></tr>";
echo "</thead>";
if($result = $connection->query($query)){
foreach($result as $row){
   echo "<tr>";
   echo "<td>" . $row['id_course'] . "</td>";
   echo "<td>" . $row['Курс'] . "</td>";
   echo "<td>" . $row['COUNT(*)'] . "</td>";
   echo "</tr>";
}
echo "</tbody>";
echo "</table>";
}
else{
 echo "Ошибка: " . $connection->error;
}
	// var_dump($data); // здесь будет массив с результатом
   mysqli_free_result($result);
   $connection->close();
  ?>
</body>
</div>
</html>
