<?php
session_start();
session_unset();
session_destroy();
header("Location: ../../pages/index.php");
// header("Location:http://localhost/DiplomKs/pages/index.php");
// header("Location: ../indexL.php");