<?php
include('templates/config/db_connect.php');
  $title = $email = $ingredients = '';
  $errors = array('email' => '', 'title'=>'', 'ingredients'=>''  );
  if(isset($_POST['submit'])){
    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['title']);
    // echo htmlspecialchars($_POST['ingredients']);
    //check Email
    if(empty($_POST['email'])){
      $errors['email'] = "An EMAil is required! <br/>";
    }else {
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email must be valid <br/>";
      }
        }
    //check title
    if(empty($_POST['title'])){
      $errors['title'] = "An title is required! <br/>";
    }else {
      //echo htmlspecialchars($_POST['title']); to prevent typing anyHTML tags or links
      $title = $_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
        $errors['title'] =  'Title must be letters';
      }
    }
    //check ingredients
    if(empty($_POST['ingredients'])){
      $errors['ingredients'] = "An ingredients is required! <br/>";
    }else {
      //echo htmlspecialchars($_POST['ingredients']);
      $ingredients = $_POST['ingredients'];
      if(!preg_match('/^([a-zA-Z\s+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
        $errors['ingredients'] = 'ingredients must be Acomma seprated list';
      }
    }

    if(array_filter($errors)){
      //echo 'errors in the form';
    }else {


      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

      //creat sql
      $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title', '$email', '$ingredients' ) ";

      //save to db & check
      if(mysqli_query($conn, $sql)){
         //success
         header('location: index.php');
      }else{
        //errors
        echo 'query error:' . mysql_error($conn);
      }
      //echo 'form is valid';
    }

  } //end of post check

 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

  <?php include('templates/header.php'); ?>
  <section class="container gray-text">
    <h4 class="center">Add A Pizza</h4>
    <form class="white" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <label for="">your Email:</label>
      <input type="text" name="email" >
      <div class="red-text">
        <?php echo $errors['email']; ?>
      </div>
      <label for="">Pizza Title:</label>
      <input type="text" name="title" >
      <div class="red-text">
        <?php echo $errors['title']; ?>
      </div>
      <label for="">Ingredients (comma separated):</label>
      <input type="text" name="ingredients" >
      <div class="red-text">
        <?php echo $errors['ingredients']; ?>
      </div>
      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0 ">
      </div>
    </form>
  </section>

  <?php include('templates/footer.php'); ?>


</html>
