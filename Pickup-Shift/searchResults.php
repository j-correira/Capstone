<?php
    //only include selects, because selects includes dbconnect
    include 'functions.php'; 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pickup Shift || Search Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
  <section class="section">
    <div class="container">
        


      <?php 
        if ($_REQUEST['submit'] == "Search Workers") {
          
           
            
          $searchSkill = $_GET["skill_CB"];
          echo "<h3>Skill being searched for: <u><h3 style='color:green'>$searchSkill</h3></u></h3><br>";
          //print "search for customers";
          $result = workerSearch($searchSkill);
          //var_dump ($result);
          displayTable($result);
           
      }
      ?>    
        
        
    </div>
  </section>
  </body>
</html>