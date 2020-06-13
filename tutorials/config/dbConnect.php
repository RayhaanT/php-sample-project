<?php
  // RAW MYSQL
  // $conn = mysqli_connect('localhost', 'rayhaan', 'Gorilla8252', 'Pizza');
  // // $conn evaluates true if connection successful
  // if (!$conn) {
  //   echo 'Connection error: ' . mysqli_connect_error();
  // }

  // PDO
  $host = 'localhost';
  $db = 'Pizza';
  $user = 'rayhaan';
  $pass = 'Gorilla8252';
  $charset = 'utf8mb4';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  try {
    $pdo = new PDO($dsn, $user, $pass);
  } catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }
?>