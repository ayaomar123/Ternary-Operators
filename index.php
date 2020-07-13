<?php
include('templates/config/db_connect.php');

//write query for all pizzas
$sql = 'SELECT * FROM pizzas ORDER BY created_at';

// make query & get result
$result = mysqli_query($conn, $sql);

//fetch the result row as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connections
mysqli_close($conn);



//print_r($pizzas);
 ?>

<!DOCTYPE html>

<html>

  <?php include('templates/header.php'); ?>
  <h4 class="center grey-text"> Pizzas! </h4>
  <div class="container">
    <div class="row">

      <?php foreach ($pizzas as $pizza){ ?>
        <div class="col s6 md3">
          <div class="center card z-depth-0">
            <img src="img/pizza.svg" alt="pizza img" class="pizza">
            <div class="center card-content center">
              <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
              <div><ul>
                <?php foreach (explode(',', $pizza['ingredients']) as $ing): ?>
                  <li><?php echo htmlspecialchars($ing); ?></li>
                <?php endforeach; ?>
              </ul>
              </div>
            </div>
            <div class="card-action right-align">
              <a class="brand-text" href="details.php?id=<?php echo $pizza['id']?>">more info!</a>
            </div>
          </div>
        </div>
      <?php } ?>



    </div>
  </div>
  <?php if(count($pizzas) >= 2){ ?>
    <p class="center">there are two or more pizzas</p>

  <?php }else { ?>
      <h2 class="center">there are less than two pizzas! </h2>
  <?php  } ?>
  <?php include('templates/footer.php'); ?>

</html>
