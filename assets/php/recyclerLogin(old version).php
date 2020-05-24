<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LiveGreen</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <!-- Bootstrap core CSS -->
  <link href="/Assignment2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!--  Font size CSS-->
  <link rel= "stylesheet" href="assets/css/registerAsLiveGreenUser.css">

  <!-- Custom fonts for this template -->
  <link href="/Assignment2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="/Assignment2/assets/css/clean-blog.min.css" rel="stylesheet">
  <script type="text/javascript">
  function fnSubmit(){
      alert("Enter the view History List Page by Recycler");
  }
  </script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" style="color:black;" >LiveGreen</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:black;" href="viewHistoryR.php" onclick=fnSubmit()>View History <br>Submission</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color:black;" href="/Assignment2/index.html">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <br>
  

  
  <!-- Material design -->
  

    
    <div class="container  shadow p-3 mb-5 bg-white rounded" id="register">
      <h2 class="navbar-brand" style="padding-left:3%;">Welcome, <?php echo $_SESSION['username']; ?>!
          <br>Full Name: <?php echo $_SESSION['fullname']; ?>
          <br>Total points: <?php echo $_SESSION['totalPoints']; ?>
          <br>Eco-level: <?php echo $_SESSION['ecoLevel'];?>
          </h2>
        <form action="/Assignment2/assets/php/userRegister.php" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>

        <div class="card card-outline-secondary">
            <div class="card-header">
                <center><h3 class="mb-0" style="color:#08101af5;">Recycler of LiveGreen</h3></center>
            </div>
          </form>
        </div>
    </div>


<!-- Material design -->
<?php


//connect to database of livegreen

$conn = new mysqli("localhost","root","","livegreen");

if($conn ->connect_error){


  die("Failed to connect to database!". mysqli_connect_error());
}

//use material table

$sql = "select * from material";

$result = $conn ->query($sql);

if($result ->num_rows == 0){

  die("More items to recycle are coming soon.");

}else{?>


    

    <div class="container">
      <div class="row d-flex justify-content-center">
          <h2>
            Material items
          </h2>
      </div>
      <div class="row py-3">
      
          <?php while($row= $result->fetch_assoc()){?>

              <div class="col-lg-4 col-md-6 mb-4">
                <!--Card-->
                <div class="card border-0 shadow">
                <!--Card image -->
                <div class="view ">
                          <img class="card-img-top rounded-top" src="https://images.unsplash.com/photo-1549758895-6eab7830c05d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Card image cap">
                          <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                          </a>
                </div>
                  <!-- Card content -->
                  <div class="card-body border rounded-bottom">
                          <a  class="card-text small mb-1 d-block"><span class="font-weight-bold">Material ID :&nbsp </span><?php echo $row["materialID"];?></a>
                          
                          
                          <!-- Title --><p class="card-text small mb-1 "><a class="font-weight-bold">Material Name :  </a><?php echo $row["materialName"];?></p>
                          <!-- Description -->
                          <p class="h6 card-title font-weight-bold">Description :</p>
                          <a  class="card-text small mb-2 d-block"><?php echo $row["description"] ;?></a>
                          
                          <hr>
                          <ul class="list-unstyled  justify-content-between mb-3 text-center small">
                            <li class="funded">
                                <p class="mb-1 font-weight-bold text-dark"></p>
                                <span class="amount"></span> 
                            </li>
                            <li class="funded">
                                <p class="mb-1 font-weight-bold text-dark">Points/kg</p>
                                <span class="amount"><?php echo $row["pointsPerKg"];?></span> 
                            </li>
                            <li class="days">
                                <p class="mb-1 font-weight-bold text-dark"></p>
                                <span class="amount"></span> 
                            </li>
                          </ul>
                          
                          
                          <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModal2<?php echo $row['materialID'];?>">
                              Recycle
                              <!--<i class="lnr lnr-chevron-right pl-2"></i>-->
                          </button>
                      </div>
                </div>
                    <!-- Card -->
              </div>

          
          <div class="modal fade " id="exampleModal2<?php echo $row['materialID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          
         <!-- class="modal-dialog modal-xl" -->
          <div class="modal-dialog modal-xl" role="document" >
          <div class="modal-content">
          <div class="form-row">
              <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>-->
              <div class="col-lg-1 col-md-2 mb-4"></div>

              <div class=" col-lg-10 col-md-8 mb-4 card border-0 shadow"  >
              <!--<div class="modal-content" >-->
              <div class="form-row">
              
              <!-- Material design -->
              <div class="col-lg-1 col-md-6 mb-4"></div>
              <div class="col-lg-5 col-md-6 mb-4">
      
                
                    
                    <div class="card card-outline-secondary" >
                        

                        <!--seach bar for searching material name-->
                        <div  style="width:80%; margin-left:auto; margin-right:auto;">
                          <br>
                          <input  class="form-control mb-4" type="text" id="myInput" onkeyup="searchSchedule()" placeholder="Search for schedule..">
                          
                        </div>
                        <script>

                          function searchSchedule() {
                            // Declare variables
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");

                            // Loop through all table rows, and hide those who don't match the search query
                            for (i = 0; i < tr.length; i++) {
                              td = tr[i].getElementsByTagName("td")[1];
                              if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                  tr[i].style.display = "";
                                } else {
                                  tr[i].style.display = "none";
                                }
                              }
                            }
                          }


                        </script>
                        <!--Bootstrap table -->

                        <?php
                        
                        //connect to server
                        $conn = new mysqli("localhost", "root","","livegreen");

                        if($conn ->connect_error){

                            die("Connection error!");
                        }


                        $sql3 = "select * from users where usertype='Collector'";
                        $result3 = $conn->query($sql3);

                        if($result3 ->num_rows == 0){

                        }else{?>
                               

                            <div class="card shadow p-3 mb-5 bg-white rounded" style=" background-repeat: no-repeat; background-position: center;background-size: cover; background-image: url('/Assignment2/assets/img/paper-clip.jpg'); ">

                            <div class="card-body " style="background-color:rgba(255, 255, 255, 0.88); ">
                                <h5 class="card-header p-3 mb-2 bg-secondary text-white">List of Collectors </h5>
                                <div class="table-responsive">

                                    <table class="table table-hover container-fluid" id="myTable">
                                        <thead>
                                            <tr>

                                            <th scope="col">Collector's username</th>
                                            <th scope="col">Schedule</th>
                                            
                                            
                                            
                                            </tr>
                                        </thead>
                                        

                                        <?php 
                                        
                                        
                                          
                                              while($row3= $result3->fetch_assoc()){ 
                                              $materialID = $row["materialID"];
                                              $sql5 = "select * from materialc where materialID='$materialID'";
                                              $result5 = $conn->query($sql5);
                                              $row5= $result5->fetch_assoc();
                                              

                                              if($row5["username"]== $row3["username"] && $row5["materialID"]== $materialID){

                                            ?>
                                            <tbody>
                                                    <tr>

                                                        
                                                            <td><?php echo $row3["username"];?></td>
                                                            <td><?php echo $row3["schedule"];?></td>
                                                            
                                                            
                                                            

                                                        </tr>
                                            </tbody>

                                            <?php}?>


                                              
                                                
                                            <?php }?>
                                        


                                    </table>
                                </div>
                            </div>
                            </div>


                            

                        <?php  } ?>





                        <!--End of Bootstrap table -->


                                 

                    </div>
                
            </div>

<!-- End of Material design -->
         <!--Submit form-->                                 
         <div class="col-lg-5 col-md-6 mb-4">
                <form method="POST" action="/Assignment2/assets/php/collectorSubmission.php" style="float:right">
                      
                    <div class="form-row">
                          <div class="col-md-2 mb-3"></div>
                            <div class="col-md-8 mb-3">
                                
                                <input type="text" name="submissionName" value= "<?php echo $_SESSION["username"];?>" id="disabledTextInput" class="form-control" 
                                style="display:none;" placeholder="Material ID" readonly>
                              
                            </div>

                            <div class="col-md-2 mb-3"></div>


                      </div>
                      
                      <div class="form-row">
                          <div class="col-md-2 mb-3"></div>
                            <div class="col-md-8 mb-3">
                                <label for="disabledTextInput">Material ID: </label>
                                <input type="text" name="materialID" value= "<?php echo $row["materialID"]?>"id="disabledTextInput" class="form-control"
                                  placeholder="Material ID" readonly>
                              
                            </div>

                            <div class="col-md-2 mb-3"></div>


                      </div>

                      

                      <div class="form-row">

                            <div class="col-md-2 mb-3"></div>
                            <div class="col-md-8 mb-3">
                                <label for="disabledTextInput">Material Name: </label>
                                <input type="text" name="materialName" value= "<?php echo $row["materialName"]?>" id="disabledTextInput" class="form-control" placeholder="Material Name" readonly>
                              
                            </div>

                            <div class="col-md-2 mb-3"></div>
                        
                      </div>

                      <div class="form-row">

                        <div class="col-md-2 mb-3"></div>
                        <div class="col-md-8 mb-3">
                            <label for="disabledTextInput">Description: </label>
                            <input type="text" name="description" value= "<?php echo $row["description"]?>" id="disabledTextInput" class="form-control" placeholder="Description" readonly>
                          
                        </div>

                        <div class="col-md-2 mb-3"></div>

                      </div>

                      <div class="form-row">

                        <div class="col-md-2 mb-3"></div>
                        <div class="col-md-8 mb-3">
                            <label for="disabledTextInput">Points per Kg: </label>
                            <input type="number" name="pointsPerKg" value= "<?php echo $row["pointsPerKg"];?>" id="disabledTextInput" class="form-control" placeholder="PointsPerKg" readonly>
                          
                        </div>

                        <div class="col-md-2 mb-3"></div>

                      </div>

                      <div class="form-row">
                        <?php

                          //connect to database of livegreen

                            $conn = new mysqli("localhost","root","","livegreen");

                            if($conn ->connect_error ){


                              die("Failed to connect to database!". mysqli_connect_error());
                            }
                          
                          //use material table

                          $sql2 = "select * from users where usertype= 'Collector'";

                          $result2 = $conn ->query($sql2);

                          if($result2 ->num_rows == 0){

                            die("More items to recycle are coming soon.");
                          
                          }else{?>
                                  <!--table-->
                                    
                        

                                            <div class="col-md-2 mb-3"></div>
                                            <div class="col-md-8 mb-3">
                                                <label for="disabledTextInput">Collector: </label>
                                                <select class="form-control" name="collector" id="collector"  required>
                                                <script>
                                                    var collector = document.getElementById("collector");
                                                    collector.oninvalid = function(event) {
                                                        event.target.setCustomValidity('Please choose a collector.');
                                                    }

                                                </script>
                                                  <option value="">Choose a collector...</option>
                                                   <?php while($row2= $result2->fetch_assoc()){?> 
                                                    
                                                    <option value="<?php  echo $row2["username"];?>"><?php  echo $row2["username"];?></option>
                                                    
                                                    <?php }?>
                                                </select>
                                                
                                            
                                              
                                            </div>

                                            <div class="col-md-2 mb-3"></div>

                            <?php }?>
                      </div>
                      <div class="form-row">

                        <div class="col-md-2 mb-3"></div>
                        <div class="col-md-8 mb-3">
                            <label for="disabledTextInput">Proposed date: </label>
                            <input type="date" name="date"id="date" class="form-control" placeholder="Proposed date..."  required>
                            <script>
                                var proposedDate = document.getElementById("date");
                                proposedDate.oninvalid = function(event) {
                                    event.target.setCustomValidity('Please select a proposed date.');
                                }

                            </script>
                          
                        </div>

                        <div class="col-md-2 mb-3"></div>

                      </div>
                      
                      <button class="btn btn-primary" type="submit">Submit</button>
                      <button type="button" class="btn btn-secondary " name="cancel" data-dismiss="modal">Cancel</button>
                </form>
              
       </div> 

       <div class="col-lg-1 col-md-6 mb-4"></div>
       <!--End of submit form-->       
              <!--</div>-->
             </div> 
            
            </div>
            <div class="col-lg-1 col-md-2 mb-4"></div>
            </div>
            </div>
          </div>
          </div>
          

              
          <?php }?>  
       </div>
     </div>     



  <?php }?>








<!-- End of product card-->


  
        
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; LiveGreen 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/Assignment2/vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/Assignment2/assets/js/clean-blog.min.js"></script>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>


</html>