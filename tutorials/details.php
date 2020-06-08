<?php
  include('config/dbConnect.php');

  // Check for deletion
  if(isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    // Construct
    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";
    // Query
    if(mysqli_query($conn, $sql)) {
      header('Location: index.php');
    } else {
      echo 'query error: ' . mysqli_error($conn);
    }
  }

  // Check id parameter from GET request
  if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // Construct
    $sql = "SELECT * FROM pizzas WHERE id = $id";
    // Query
    $result = mysqli_query($conn, $sql);
    // Fetch
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
  }
?>

<!DOCTYPE html>
<html>
<?php require('templates/header.php');?>

  <div class="container center">
    <?php if($pizza): ?>

      <h4><?php echo htmlspecialchars($pizza['title']);?></h4>
      <p>Created by: <?php htmlspecialchars($pizza['email']);?></p>
      <p><?php echo date($pizza['created_at']); ?></p>
      <h5>Ingredients:</h5>
      <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

      <!-- Delete form -->
      <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
        <input type="submit" name="delete" value="Delete"class = "btn brand z-depth-0">
      </form>

    <?php else: ?>

      <h5>This pizza does not exist.</h5>

    <?php endif; ?>
  </div>

<?php require('templates/footer.php');?>
</html>