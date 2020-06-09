<?php
  $conn = mysqli_connect('localhost', 'rayhaan', 'Gorilla8252', 'Pizza');
  // $conn evaluates true if connection successful
  if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
  }
?>