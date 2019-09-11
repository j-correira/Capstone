

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pickup-Shift || Searching</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@4.0.0/dist/css/bulma-extensions.min.css">

    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <script>
        
    function openTab(evt, tabName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("content-tab");

       for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }

      tablinks = document.getElementsByClassName("tab");
      for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" is-active", "");
      }

      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " is-active";
    }
   
    
</script>
    


    
    
  </head>


  <body>
  <section class="section">
    <div class="container">
    
            <!-- <a href="index.html" class="button is-rounded" style="margin-bottom:20px;"><i class="fas fa-arrow-left"></i> &nbsp;Back</a> -->
             
            <h1 class="title is-2 has-text-centered">Worker Search</h1>
            <p class="subtitle is-5 has-text-centered">Find workers with specific skills and availability</p>
            <hr>

                  <nav class="tabs is-centered is-large is-toggle is-fullwidth">
                        <div class="container">
                            
                            
                            <!-- ============================= -->
                            <!-- ======== begin form ========= -->
                            <!-- ============================= -->
                            <form id="searchWorker" method="get" action="searchResults.php">
                            
                          <ul>
                            <li class="tab is-active" onclick="openTab(event,'Search')"> 
                                <a>
                                <span class="icon is-small"><i class="fas fa-search" aria-hidden="true"></i></span>
                                Search
                                </a>
                            </li>
                            <li class="tab" onclick="openTab(event,'Results')">
                                <a>
                                <span class="icon is-small"><i class="fas fa-list" aria-hidden="true"></i></span>
                                Results
                                </a>
                            </li>
                            <!-- <li class="tab" onclick="openTab(event,'Support')"><a>Support</a></li> -->
                          </ul>
                        </div>
                      </nav>
                  </div>
                </section>
                
                <div class="container section has-text-centered" style="padding-top:0px;">
                    <div id="Search" class="content-tab" >
                            <h1 class="title is-3 has-text-centered">I'm looking for...</h1>
                            <div class="columns is-mobile">

                                    <div class="column is-half">
    
                                            
                            <div class="field">
                                <input class="is-checkradio is-medium" id="server_CB" type="checkbox" name="server_CB">
                                <label for="server_CB">Server</label>
                            </div>
                        </div>
                        
                        <div class="column is-half">
                            <div class="field">
                                <input class="is-checkradio is-medium" id="bartender_CB" type="checkbox" name="bartender_CB">
                                <label for="bartender_CB">Bartender</label>
                              </div>      
                        </div>
                      </div>


                      <div class="columns is-mobile">
                          <div class="column is-half">
                              <div class="field">
                                  <input class="is-checkradio is-medium" id="chef_CB" type="checkbox" name="chef_CB">
                                  <label for="chef_CB">Chef</label>
                                </div>
                          </div>
        
                      <div class="column is-half">         
                              <div class="field">
                                  <input class="is-checkradio is-medium" id="prepCook_CB" type="checkbox" name="prepCook_CB">
                                  <label for="prepCook_CB">Prep Cook</label>
                                </div>
                          </div>
                      </div>
          


                        <div class="columns is-mobile">
                            <div class="column is-half">
                                <div class="field">
                                    <input class="is-checkradio is-medium" id="expo_CB" type="checkbox" name="expo_CB">
                                    <label for="expo_CB">Expo</label>
                                  </div>
                            </div>
          
                        <div class="column is-half">         
                                <div class="field">
                                    <input class="is-checkradio is-medium" id="barback_CB" type="checkbox" name="barback_CB">
                                    <label for="barback_CB">Barback</label>
                                  </div>
                            </div>
                        </div>


                        <div class="columns is-mobile">
                            <div class="column is-half">         
                                <div class="field">
                                    <input class="is-checkradio is-medium" id="dishwasher_CB" type="checkbox" name="dishwasher_CB">
                                    <label for="dishwasher_CB">Dishwasher</label>
                                  </div>
                            </div>

                            <div class="column is-half">        
                                <div class="field">
                                    <input class="is-checkradio is-medium" id="busser_CB" type="checkbox" name="busser_CB">
                                    <label for="busser_CB">Busser</label>
                                  </div>
                            </div>
                            
                        </div>

  
           

                                    <hr>

                                    <div class="step-content has-text-centered">
                                        <h1 class="title is-3 has-text-centered">That is available...</h1>

                                            <!-- monday -->
            <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;"><u>Monday</u></h1>
            <div class="columns is-mobile">
             
                <div class="column is-one-third marginBottom30">
                    <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                    <div class="column is-mobile field">              
                      <input id="M_Breakfast" type="checkbox" name="M_Breakfast" class="switch is-medium is-success">
                      <label for="M_Breakfast"></label>
                    </div>
                </div>

                <div class="column is-one-third marginBottom30">
                    <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                    <div class="column is-mobile field">              
                      <input id="M_Lunch" type="checkbox" name="M_Lunch" class="switch is-medium is-success">
                      <label for="M_Lunch"></label>
                    </div>
                </div>

                <div class="column is-one-third marginBottom30">
                    <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                    <div class="column is-mobile field">              
                      <input id="M_Dinner" type="checkbox" name="M_Dinner" class="switch is-medium is-success">
                      <label for="M_Dinner"></label>
                    </div>
                </div>
              </div>
              <!-- /monday -->
        
              <!-- tuesday -->
              <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;"><u>Tuesday</u></h1>
              <div class="columns is-mobile">
               
                  <div class="column is-one-third marginBottom30">
                      <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                      <div class="column is-mobile field">              
                        <input id="T_Breakfast" type="checkbox" name="T_Breakfast" class="switch is-medium is-success">
                        <label for="T_Breakfast"></label>
                      </div>
                  </div>

                  <div class="column is-one-third marginBottom30">
                      <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                      <div class="column is-mobile field">              
                        <input id="T_Lunch" type="checkbox" name="T_Lunch" class="switch is-medium is-success">
                        <label for="T_Lunch"></label>
                      </div>
                  </div>

                  <div class="column is-one-third marginBottom30">
                      <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                      <div class="column is-mobile field">              
                        <input id="T_Dinner" type="checkbox" name="T_Dinner" class="switch is-medium is-success">
                        <label for="T_Dinner"></label>
                      </div>
                  </div>
                </div>
                <!-- /tuesday -->

                <!-- wednesday -->
                <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;"><u>Wednesday</u></h1>
                  <div class="columns is-mobile">
                   
                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                          <div class="column is-mobile field">              
                            <input id="W_Breakfast" type="checkbox" name="W_Breakfast" class="switch is-medium is-success">
                            <label for="W_Breakfast"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                          <div class="column is-mobile field">              
                            <input id="W_Lunch" type="checkbox" name="W_Lunch" class="switch is-medium is-success">
                            <label for="W_Lunch"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                          <div class="column is-mobile field">              
                            <input id="W_Dinner" type="checkbox" name="W_Dinner" class="switch is-medium is-success">
                            <label for="W_Dinner"></label>
                          </div>
                      </div>
                    </div>
                    <!-- /wednesday -->

                <!-- thursday -->
                <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;"><u>Thursday</u></h1>
                  <div class="columns is-mobile">
                   
                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                          <div class="column is-mobile field">              
                            <input id="TH_Breakfast" type="checkbox" name="TH_Breakfast" class="switch is-medium is-success">
                            <label for="TH_Breakfast"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                          <div class="column is-mobile field">              
                            <input id="TH_Lunch" type="checkbox" name="TH_Lunch" class="switch is-medium is-success">
                            <label for="TH_Lunch"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                          <div class="column is-mobile field">              
                            <input id="TH_Dinner" type="checkbox" name="TH_Dinner" class="switch is-medium is-success">
                            <label for="TH_Dinner"></label>
                          </div>
                      </div>
                    </div>
                    <!-- /thursday -->


                <!-- friday -->
                <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;"><u>Friday</u></h1>
                  <div class="columns is-mobile">
                   
                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                          <div class="column is-mobile field">              
                            <input id="F_Breakfast" type="checkbox" name="F_Breakfast" class="switch is-medium is-success">
                            <label for="F_Breakfast"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                          <div class="column is-mobile field">              
                            <input id="F_Lunch" type="checkbox" name="F_Lunch" class="switch is-medium is-success">
                            <label for="F_Lunch"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                          <div class="column is-mobile field">              
                            <input id="F_Dinner" type="checkbox" name="F_Dinner" class="switch is-medium is-success">
                            <label for="F_Dinner"></label>
                          </div>
                      </div>
                    </div>
                    <!-- /friday -->
        
                    <!-- saturday -->
                    <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;"><u>Saturday</u></h1>
                    <div class="columns is-mobile">
                     
                        <div class="column is-one-third marginBottom30">
                            <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                            <div class="column is-mobile field">              
                              <input id="SA_Breakfast" type="checkbox" name="SA_Breakfast" class="switch is-medium is-success">
                              <label for="SA_Breakfast"></label>
                            </div>
                        </div>
  
                        <div class="column is-one-third marginBottom30">
                            <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                            <div class="column is-mobile field">              
                              <input id="SA_Lunch" type="checkbox" name="SA_Lunch" class="switch is-medium is-success">
                              <label for="SA_Lunch"></label>
                            </div>
                        </div>
  
                        <div class="column is-one-third marginBottom30">
                            <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                            <div class="column is-mobile field">              
                              <input id="SA_Dinner" type="checkbox" name="SA_Dinner" class="switch is-medium is-success">
                              <label for="SA_Dinner"></label>
                            </div>
                        </div>
                      </div>
                      <!-- /saturday -->
        
                      <!-- sunday -->
                      <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;"><u>Sunday</u></h1>
                      <div class="columns is-mobile">
                       
                          <div class="column is-one-third marginBottom30">
                              <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                              <div class="column is-mobile field">              
                                <input id="SU_Breakfast" type="checkbox" name="SU_Breakfast" class="switch is-medium is-success">
                                <label for="SU_Breakfast"></label>
                              </div>
                          </div>
    
                          <div class="column is-one-third marginBottom30">
                              <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                              <div class="column is-mobile field">              
                                <input id="SU_Lunch" type="checkbox" name="SU_Lunch" class="switch is-medium is-success">
                                <label for="SU_Lunch"></label>
                              </div>
                          </div>
    
                          <div class="column is-one-third marginBottom30">
                              <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                              <div class="column is-mobile field">              
                                <input id="SU_Dinner" type="checkbox" name="SU_Dinner" class="switch is-medium is-success">
                                <label for="SU_Dinner"></label>
                              </div>
                          </div>
                        </div>
                        <!-- /sunday -->

                        

                        <hr>

                        <div class="field">
                            <input name="searchValueWorkers" type="search" placeholder="Worker Skill" class="form-control" style="width:145px; display: inline;" />
                            
                            <input type="submit" class="button is-success is-large is-fullwidth" name="submit" value="Search Workers">

                        </div>

                        
                        </div><!-- /steps-content -->
                                    
                                    
                    </div>
                                    
                        <!-- ============================= -->
                        <!-- ========  end form  ========= -->
                        <!-- ============================= -->
                        </form>

                    <div id="Results" class="content-tab" style="display:none">
                            <h1 class="title is-4 has-text-centered"><u>Search results will go here!</u></h1>
                    </div>
                </div>
     
      
    </div>
  </section>
  </body>
</html>

