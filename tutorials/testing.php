<?php 

  $filename = 'dummytext.txt';

  $handle = fopen($filename, 'r');
  // echo fread($handle, filesize($filename));

  // echo fgets($handle);
  // echo fgets($handle);

  echo fgetc($handle);
  echo fgetc($handle);

  fclose($handle);

?>

<!DOCTYPE html>
<html>
<head>
  <title>messing around</title>
</head>
<body>
  


</body>
</html>