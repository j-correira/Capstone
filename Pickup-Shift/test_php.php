<?php

include './functions.php';

    if (isPostRequest()) {
        
            $email = filter_input(INPUT_POST, 'email');
            $name = filter_input(INPUT_POST, 'name');
            
            $radio1 = filter_input(INPUT_POST, 'radio1');
            $radio2 = filter_input(INPUT_POST, 'radio2');
            
            echo $name . "<br>" . $email;
            
            if ($radio1 == "1") {
                echo "<br><br>" . "radio 1 checked";
            }
            
            if ($radio2 == "2") {
                echo "<br><br>" . "radio 2 checked";
            }
            
            
            
           
    }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
  <section class="section">
    <div class="container">

        <form action="#" method="post">
            Name: <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br><br>
            Radios:<br>
            number1<input type="radio" name="radio1" value="1"><br>
            number2<input type="radio" name="radio2" value="2"><br>
            
            
            <input type="submit" name="submitted">
        </form>
        
    </div>
  </section>
  </body>
</html>