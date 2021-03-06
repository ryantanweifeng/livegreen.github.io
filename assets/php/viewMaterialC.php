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

</head>

<body >

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" >
    <div class="container">
      <a class="navbar-brand" style="color:black;"  >LiveGreen</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" style="color:black;" href="AddedMaterialCollector.php">Added Material<br>Collector</a>
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
  


  

  <div class="container  shadow p-3 mb-5 bg-white rounded" id="register"  >
        <h2 class="navbar-brand" style="padding-left:3%;">Welcome, <?php echo $_SESSION['username']; ?>!
        <br>Full Name: <?php echo $_SESSION['fullname']; ?>
        <br>Total points: <?php echo $_SESSION['totalPoints']; ?>
        </h2>
        <div class="card card-outline-secondary" >
            <img src="/Assignment2/assets/img/leaf_deco.jpg" style="height:500px; background-size:cover;">

    

   <!-- Button trigger modal(add row with details) -->
   <button type="button" class="btn  btn-outline-dark" data-toggle="modal" data-target="#exampleModal2<?php echo $_SESSION['username'];?>">
                            Change the Personnel information
                            </button></a>   
  <!-- Material design -->
  

    
    <div class="container  shadow p-3 mb-5 bg-white rounded" id="register" >
        
        <div class="card card-outline-secondary" >
            <div class="card-header">
                <center><h3 class="mb-0" style="color:#08101af5;">Collector of LiveGreen</h3></center>
            </div>

            <!--Bootstrap table -->

            <?php
            
            //connect to server
            $conn = new mysqli("localhost", "root","","livegreen");

            if($conn ->connect_error){

                die("Connection error!");
            }


            $sql = "select * from material";
            $result = $conn->query($sql);

            if($result ->num_rows == 0){

            }else{?>

                <div class="card shadow p-3 mb-5 bg-white rounded">

                <div class="card-body ">
                    <h5 class="card-header p-3 mb-2 bg-secondary text-white">List of Materials</h5>
                    <div class="table-responsive">

                        <table class="table table-hover container-fluid" >
                            <thead>
                                <tr>

                                <th scope="col">Material ID</th>
                                <th scope="col">Material Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Points per KG</th>
                                <th colspan="2">Collect</th>
                                </tr>
                            </thead>

                            <?php while($row= $result->fetch_assoc()){ ?>




                            <tbody>
                                    

                                        <tr>

                                            <td><?php echo $row["materialID"];?></td>
                                            <td><?php echo $row["materialName"];?></td>
                                            <td><?php echo $row["description"];?></td>
                                            <td><?php echo $row["pointsPerKg"];?></td>
                                            <td>
                                            <button type="button" class="btn  btn-outline-dark" data-toggle="modal" data-target="#exampleModal<?php echo $row['materialID'];?>" >
                                                SELECT

                                            </button>
                                            </td>

                                        </tr>
                            </tbody>

                            
                                <!-- Update status of application form -->
                                <div class="modal fade" id="exampleModal<?php echo $row['materialID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add this material for collector</h5>
                                    </div>


                                    <div class= "modal-body">
                                        <form class="needs-validation" method="POST" action="/Assignment2/assets/php/addNewMaterialC.php" novalidate>

                                        <div class="input-group mb-3">
                                                <input id="username" name="username" style="display:none;" value= "<?php echo $_SESSION["username"];?>" type="text" class="form-control" placeholder="username" aria-label="id" aria-describedby="basic-addon1" required>
                                            </div>

                                                <div class="input-group mb-3">
                                                <label>Material ID: &nbsp </label>
                                                <input id="material_id" name="materialID" value= "<?php echo $row['materialID'];?>" type="number" class="form-control" placeholder="Material ID" aria-label="id" aria-describedby="basic-addon1" required>
                                                <div class="invalid-feedback">
                                                    You must enter material id.
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <label>Material Name: &nbsp </label>
                                                <input id="material_id" name="materialName" value= "<?php echo $row['materialName']; ?>"type="text" class="form-control" placeholder="Material Name" aria-label="id" aria-describedby="basic-addon1" required>
                                                <div class="invalid-feedback">
                                                    You must enter material name.
                                                    </div>
                                                </div>



                                            <div class="input-group mb-3">
                                                <label>Description: &nbsp </label>
                                            <input id="description" name="description" type="text" class="form-control"  value="<?php echo $row['description'];?>" placeholder="Description" required>
                                            <div class="invalid-feedback">
                                                Description is required.
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <label>Points Per Kg: &nbsp </label>
                                            <input id= "points-per-kg" type="number" name="pointsPerKg" value="<?php echo $row['pointsPerKg'];?>" class="form-control"  placeholder="Points per Kg" required>
                                            <div class="invalid-feedback">
                                                Points per Kg is required.
                                                </div>

                                            </div>
                                            


                                            


                                            <div class="modal-footer">
                                                <input  type="submit" class="btn btn-primary" value="Save" name="save">

                                                <button type="button" class="btn btn-secondary " name="submit" data-dismiss="modal">Cancel</button>

                                            </div>
                                        </form>




                                    </div>
                                </div>
                                </div>
                                </div>
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

    
        <!-- Add new material -->
        <div class="modal fade"  id="exampleModal2<?php echo $_SESSION['username'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change the Personnel Information</h5>
            </div>


            <div class= "modal-body">
                <form class="needs-validation" method="POST" action="/Assignment2/assets/php/updatePersonalInfo.php" >

                <div class="input-group mb-3">
             
                        <input id="username" name="username" type="hidden" value="<?php echo $_SESSION['username'];?>"class="form-control" placeholder="username" required>
                        <div class="invalid-feedback">
                            
                            </div>
                        </div>

                    <div class="input-group mb-3">
                        <label>Password: &nbsp </label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                        <div class="invalid-feedback">
                            You must enter password.
                            </div>
                        </div>



                    <div class="input-group mb-3">
                        <label>Full Name: &nbsp </label>
                    <input id="fullname" name="fullname" type="text" class="form-control"  placeholder="Fullname" required>
                    <div class="invalid-feedback">
                        Fullname is required.
                        </div>
                    </div>
                    


                    <div class="modal-footer">
                        <input  type="submit" class="btn btn-primary" value="Confirm" name="confirm">

                        <button type="button" class="btn btn-secondary " name="submit" data-dismiss="modal">Cancel</button>

                    </div>
                </form>




            </div>
        </div>
        </div>
        </div>
        <!--End of add new material-->
    </div>
</div>

        
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