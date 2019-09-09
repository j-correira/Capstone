<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pickup-Shift || Worker Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@4.0.0/dist/css/bulma-extensions.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-steps@2.2.1/dist/css/bulma-steps.min.css">
    <script> bulmaSteps.attach(); </script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <script>
      import 'bulma-extensions/bulma-steps/dist/css/bulma-steps.min.css';
      bulmaSteps.attach();
    </script>

    <script>
      function toggleClass() {
          var element = document.getElementsByClassName("availability");
          element.classList.toggle("is-success");
      }
    </script>
    
    
    
    
    
    <?php
       
        include './functions.php';
    
        $results = '';
        if (isPostRequest()) {
            $db = db_Connect();
            
            //haven't added logo yet
            $stmt = $db->prepare("INSERT INTO restaurants SET email = :rest_email, passw = :rest_pass2, restaurant_name = :rest_name, website = :rest_site, phone = :rest_phone, zipcode = :rest_zip, bio = :rest_bio");
            
            
            
            //set textbox value to variable
            $restEmail = filter_input(INPUT_POST, 'rest_email');
            $restPass = filter_input(INPUT_POST, 'rest_pass');
            $restPass2 = filter_input(INPUT_POST, 'rest_pass2');            
            $restName = filter_input(INPUT_POST, 'rest_name');
            $restSite = filter_input(INPUT_POST, 'rest_site');
            $restPhone = filter_input(INPUT_POST, 'rest_phone');
            $restZip = filter_input(INPUT_POST, 'rest_zip');
            $restBio = filter_input(INPUT_POST, 'rest_bio');
            
            $binds = array(
                ":rest_email" => $restEmail,
                ":rest_pass2" => $restPass,
                ":rest_name" => $restName,
                ":rest_site" => $restSite,
                ":rest_phone" => $restPhone,
                ":rest_zip" => $restZip,
                ":rest_bio" => $restBio               
            );
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Restaurant Added!';
            }
        }        
    ?>
    
    
    
    
    
    

  </head>



<body>
<section class="section">
        <div class="container">

          <!-- start form -->
          <form method="post" action="#">


            <!-- <a href="index.html" class="button is-rounded is-medium" style="margin-bottom:20px;"><i class="fas fa-arrow-left"></i> &nbsp;Back</a> -->
            
            <h1 class="title is-2 has-text-centered">Restaurant Sign Up</h1>
            <p class="subtitle is-5 has-text-centered">Create your restaurants profile</p>
            <hr>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-steps@2.2.1/dist/css/bulma-steps.min.css">
            
            <div class="steps is-small" id="stepsDemo">
              <div class="step-item is-active">
                <div class="step-marker">1</div>
                <div class="step-details">
                  <p class="step-title">Account</p>
                </div>
              </div>
              <div class="step-item">
                <div class="step-marker">2</div>
                <div class="step-details">
                  <p class="step-title">Bio</p>
                </div>
              </div>
              <div class="step-item">
                <div class="step-marker">3</div>
                <div class="step-details">
                  <p class="step-title">Login Info</p>
                </div>
              </div>
              <div class="step-item">
                <div class="step-marker">4</div>
                <div class="step-details">
                  <p class="step-title">Submit</p>
                </div>
              </div>
              
<!-- step #1 -->
        <div class="steps-content">
          <hr style="margin-top:0px;">
            <div class="step-content has-text-centered is-active">
              <a href="#"><h1 class="title has-text-centered has-text-grey-light is-marginless"><i class="fas fa-user-circle fa-3x"></i></h1>
              <p class="has-text-centered">Upload Profile Pic</p></a>
              <br>
            
              <input class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Restaurant Name" name="rest_name">
              <input class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Restaurant Website" name="rest_site">
              <input pattern="\d*" class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Phone" name="rest_phone">
              <input pattern="\d*" class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Zip Code"  name="rest_zip">
            </div>
        <!-- /step #1 -->

        <!-- step #2-->
        <div class="step-content has-text-centered">     
            <input class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Restaurant Bio" name="rest_bio">
        </div>   
        
            <!--    bio input via text area (creates undefined variable)
                  <div class="field">
                    <div class="control">
                      <textarea class="textarea is-medium" placeholder="Restaurant Bio"  name="rest_bio"></textarea>
                    </div>               
                  </div>
                </div>
            -->
            
        <!-- /step #2 -->

        <!-- step #3-->
                <div class="step-content has-text-centered">             
                  <input type="email" class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Email"  name="rest_email">
                  <input type="password" class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Password" name="rest_pass">
                  <input type="password" class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Confirm Password"  name="rest_pass2">
                </div>
        <!-- /step #3 -->

        <!-- step #4 -->
                <div class="step-content has-text-centered">
                    
                    <h1><?php echo $results; ?></h1>
                    
                    <input type="submit" class="button is-success is-large is-fullwidth" value="Create Account W/ PHP">
                    <br>
                    <br>
                    <br>
                  <a href="success.html" class="button is-success is-large is-fullwidth">Create Account</a>
                </div>
        <!-- /step #4 -->


      <!-- ===== end form ===== -->  
      </form>


        </div><!-- /steps content -->

              <div class="steps-actions">
                <div class="steps-action">
                  <a href="#" data-nav="previous" class="button is-light is-large">Previous</a>
                </div>

                <div class="steps-action">
                  <a href="#" data-nav="next" class="button is-light is-large">Next</a>
                </div>
              </div>
            </div>

            <script type="text/javascript" src="https://wikiki.github.io/node_modules/bulma-extensions/bulma-steps/dist/js/bulma-steps.min.js"></script>
            <script>bulmaSteps.attach();</script>

        </div><!-- /container -->
    </section>


  </body>
</html>