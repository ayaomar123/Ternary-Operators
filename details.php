<?php
include('templates/config/db_connect.php');

if(isset($_POST['delete'])){

  $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
  $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

  if(mysqli_query($conn, $sql)){
    //success
    header('location: index.php');
  }else {
    // fail code...
    echo "query error" . mysql_error($conn);
  }
}



//check get request id parameter
if(isset($_GET['id'])){

  $id = mysqli_real_escape_string($conn, $_GET['id']);

  //make sql
  $sql = "SELECT * FROM pizzas WHERE id=$id";

  //gets query results
  $result = mysqli_query($conn, $sql);

  //fetch results in array.
  $pizza = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
  mysqli_close($conn);

  print_r($pizza);

}
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">

 <?php include('templates/header.php'); ?>
 <h2>Details</h2>
 <div class="center container grey-text">
   <?php if($pizza):?>
     <h4><?php echo htmlspecialchars($pizza['title']);  ?></h4>
     <p>created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
     <p><?php echo date($pizza['created_at']); ?></p>
     <h5>Ingredients:</h5>
     <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

     <!-- DELETE FORM -->
     <form class="" action="details.php" method="POST">
       <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
       <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
     </form>

   <?php else: ?>
     <h5>No Such pizza exists!</h5>
   <?php endif; ?>
 </div>
 <?php include('templates/footer.php'); ?>

 </html>
