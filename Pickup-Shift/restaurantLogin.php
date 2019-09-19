<?php
session_start();

include './functions.php';

$email = "";
$password = "";
?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pickup-Shift || Restaurant Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@4.0.0/dist/css/bulma-extensions.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    </head>

    <body>


        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container">

                    <h1 class="title is-2 has-text-centered">Restaurant Login</h1>

                    <form method="GET" action="" class="box">
                        <div class="field">
                            <label for="" class="label">Email</label>
                            <div class="control has-icons-left">
                                <input type="email" name="email" placeholder="e.g. bobsmith@gmail.com" class="input is-medium" required>
                                <span class="icon is-small is-left">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label for="" class="label">Password</label>
                            <div class="control has-icons-left">
                                <input type="password" name="password" placeholder="*******" class="input is-medium" required>
                                <span class="icon is-small is-left">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <input class="is-checkradio is-medium" id="exampleCheckboxLarge2" type="checkbox"
                                   name="exampleCheckboxLarge2">
                            <label for="exampleCheckboxLarge2">Remember Me</label>
                        </div>
                        <br>
                        <div>
                            <input type="submit" class="button is-large is-fullwidth is-success" value="Login" name="but_submit" id="but_submit" />

                        </div>
                    </form>
                </div>
            </div>
        </section>







        <?php
        
                              
                            $email = $_GET['email'];
                            $password = $_GET['password'];
                            
        
//db connection
        $db = db_Connect();
//SQL statement
        $stmt = $db->prepare("SELECT * FROM restaurants WHERE email = :username AND passw = :password");

        $binds = array(
            ":username" => $email,
            ":password" => SHA1($password)
        );


//echo "status of (login): ";
//var_dump($_SESSION);
//execute SQL
        $results = array();


        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo "<h1 style='color:green'>logged in</h1>";

            $_SESSION["login"] = "set";

            //var_dump($_SESSION);
            header("location:restaurantHome.php");
            
            die();
        } else {
            echo "<h1 style='color:red'>Failed to login...</h1>";
            //$_SESSION["login"] = "no";
        }
        ?>





    </body>
</html>