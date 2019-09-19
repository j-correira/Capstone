<?php
session_start();

include './functions.php';
?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pickup-Shift || Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@4.0.0/dist/css/bulma-extensions.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    </head>

    <body>


        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container">

                    <h3 class="title is-3 has-text-centered is-marginless" style="padding:15px 0px 12px 0px">Successfully logged in!</h3>
                    <br>

                    <a href="restaurantEdit.php" class="button is-large is-fullwidth is-link">Edit Profile</a>

                    <a style="margin-top:10px;" href="search.php" class="button is-large is-fullwidth is-link">Search Workers</a>


                </div>
            </div>
        </section>

    </body>
</html>