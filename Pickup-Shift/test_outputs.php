<!DOCTYPE html>

<?php include ('functions.php'); ?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testing Outputs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
  <section class="section">
    <div class="container">
        
        
        <div class="columns is-mobile">
            <div class="column is-full">
                <h1 class="title">
                    Hello World
                </h1>


                <?php
                $result = testOutput_workers();
                //var_dump ($result);
                displayTable($result);
                ?>

            </div>
        </div>    

        
    </div>
  </section>
  </body>
</html>

