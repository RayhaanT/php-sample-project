<?php
  // MySQLi (improved) - more procedural, used here
  // PDO - PHP data objects

  $conn = mysqli_connect('localhost', 'rayhaan', 'Gorilla8252', 'Pizza');
  // $conn evaluates true if connection successful
  if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
  }

  // Construct query for all pizzas
  // SELECT = get, * = all columns
  $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

  // Make the query and get result
  $result = mysqli_query($conn, $sql);

  // Fetch rows as an array
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
  // Free result from memory and close connection
  mysqli_free_result($result);
  mysqli_close($conn);

  //print_r($pizzas);
?>
<!DOCTYPE html>
<html>
  <?php require('templates/header.php');?>

  <h4 class="center grey-text">Pizzas</h4>
  <div class="container">
    <div class="row">
      <?php foreach($pizzas as $pizza) { ?>

        <div class="col s6 md3">
          <div class="card z-depth-0">

            <div class="card-content center">
              <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
              <div><?php echo htmlspecialchars($pizza['ingredients']); ?></div>
            </div>

            <div class="card-action right-align">
              <a href="#" class="brand-text">More info</a>
            </div>
                        
          </div>
        </div>

      <?php } ?>
    </div>
  </div>

  <?php require('templates/footer.php');?>
</html>