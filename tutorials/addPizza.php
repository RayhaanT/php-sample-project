<?php
  $email = $title = $ingredients = '';
  $errors = array('email' => '', 'title' => '', 'ingredients' => '');

  //Check if data has been sent. If so process, otherwise send HTML
  if (isset($_POST['submit'])) {

    //htmlspecialchars removes html special characters (E.g. <>) and replaces with strings
    //Stops from XSS attacks as html tags will be rendered to safe strings
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['title']);
    // echo htmlspecialchars($_POST['ingredients']);

    //check email
    if (empty($_POST['email'])) {
      $errors['email'] = "An email is required <br>";
    } else {
      $email = htmlspecialchars($_POST['email']);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email address is invalid <br>';
      }
    }

    //check title
    if (empty($_POST['title'])) {
      $errors['title'] = "A title is required <br>";
    } else {
      $title = $_POST['title'];
      if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        $errors['title'] = 'Title must use only letters and spaces <br>';
      }
    }

    //check ingredients
    if (empty($_POST['ingredients'])) {
      $errors['ingredients'] = "At least one ingredient is required <br>";
    } else {
      $ingredients = $_POST['ingredients'];
      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
        $errors['ingredients'] = 'Ingredients must be a comma-separated list';
      }
    }

    //Check overall validity
    if (!array_filter($errors)) {
      header('Location: index.php');
    }
  }
?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>

<section class="contianer grey-text">
  <h4 class="center">Add a pizza</h4>
  <form action="addPizza.php" class="white" method="POST">
    <label>Your Email:</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
    <div class="red-text"><?php echo $errors['email']; ?></div>

    <label>Pizza Title:</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
    <div class="red-text"><?php echo $errors['title']; ?></div>

    <label>Ingredients (comma separated):</label>
    <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
    <div class="red-text"><?php echo $errors['ingredients']; ?></div>

    <div class="center">
      <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
  </form>
</section>

<?php include('templates/footer.php'); ?>

</html>