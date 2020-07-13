<?php
    //Ternary Operators

    $score = 50;

    // if($score > 40){
    //   echo "high score";
    // } else {
    //   echo "low score";
    // }


    $val = $score > 40 ? "high score" : "low score ;( ";
    echo $val . '<br/>';

    echo $_SERVER['SERVER_NAME'] . '<br/>';   //localhost
    echo $_SERVER['REQUEST_METHOD'] . '<br/>'; //GET.
    echo $_SERVER['SCRIPT_FILENAME'] . '<br/>'; //C:/xampp/htdocs/TernaryOperators/sandbox.php
    echo $_SERVER['PHP_SELF'] . '<br/>'; ///TernaryOperators/sandbox.php
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>php tuts</title>
   </head>
   <body>

   </body>
 </html>
