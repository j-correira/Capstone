

  <?php

  include 'functions.php';
  
  $id = filter_input(INPUT_GET, 'id');
        
        $stmt = $db->prepare("SELECT * FROM workers where id = :id");
        
        $binds = array(
             ":id" => $id
         );
        
         $result = array();
         
         
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $fName = $result['fName'];
            $lName = $result['lName'];
            $email = $result['email'];
            $zipcode = $result['zipcode'];
            $phone = $result['phone'];
            $bio = $result['bio'];
            $workingSince = $result['workingSince'];
         } else {
             header('Location: update.php');
             die('ID not found');            
         }
        
         
         //get id from url
        //$id = $_GET['id']
        ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pickup-Shift || View Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
  <section class="hero is-fullheight" style="margin-top: 25px;">
      
    <div class="container">
        <h1 class="title is-2 has-text-centered"><u><?php echo $fName ?> <?php echo $lName ?></u></h1>
        

        <br>      
        <h1 class="title is-5 is-marginless" style="display:inline" >Email: </h1><p class="subtitle is-5" style="display:inline" name="email"><a href="mailto:<?php echo $email ?>?Subject=Hello, are you available to work?" target="_top"><?php echo $email ?></a></p>
        
        <br>      
        <h1 class="title is-5 is-marginless" style="display:inline" >Phone: </h1><p class="subtitle is-5" style="display:inline" name="phone"><a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a></p>

        <br>      
        <h1 class="title is-5 is-marginless" style="display:inline" >Zipcode: </h1><p class="subtitle is-5" style="display:inline" name="zipcode"><?php echo $zipcode ?></p>
        
        <br>
        <h1 class="title is-5 is-marginless" style="display:inline" >Bio: </h1><p class="subtitle is-5" style="display:inline" name="bio"><?php echo $bio ?></p>
        
        <br>
        <h1 class="title is-5 is-marginless" style="display:inline" >Working Since: </h1><p class="subtitle is-5" style="display:inline" name="workingSince"><?php echo $workingSince ?></p>

        <br>
        <br>
        <br>
    <a href="tel:<?php echo $phone ?>" class="button is-large is-fullwidth is-success">Call <?php echo $fName ?></a>
    <br>

    <a href="mailto:<?php echo $email ?>?Subject=Hello, are you available to work?" target="_top" class="button is-large is-fullwidth is-success">Email <?php echo $fName ?></a>
        
    </div>
  </section>
  </body>
</html>