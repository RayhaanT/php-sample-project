<?php
  // MySQLi (improved) - more procedural, used here
  // PDO - PHP data objects

  include('config/dbConnect.php');

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
      <!-- Alternate control flow syntax -->
      <?php foreach($pizzas as $pizza): ?>

        <div class="col s6 md3">
          <div class="card z-depth-0">

            <div class="card-content center">
              <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
              <ul>
                <!-- Regular php control flow syntax -->
                <?php foreach(explode(',', $pizza['ingredients']) as $i) { ?>
                  <li><?php echo htmlspecialchars($i); ?></li>
                <?php } ?>
              </ul>
            </div>

            <div class="card-action right-align">
              <a href="details.php?id=<?php echo $pizza['id']; ?>" class="brand-text">More info</a>
            </div>
                        
          </div>
        </div>

      <?php endforeach; ?>
    </div>
  </div>

  <?php require('templates/footer.php');?>
</html>