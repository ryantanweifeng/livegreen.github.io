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
      alert("Enter the view History List Page by Admin");
  }
  </script>

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
            <a class="nav-link" style="color:black;" href="viewHistoryA.php" onclick=fnSubmit()>View History <br>Submission</a>
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
        <h2 class="navbar-brand" style="padding-left:3%;">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <div class="card card-outline-secondary" >
            <img src="/Assignment2/assets/img/leaf_deco.jpg" style="height:500px; background-size:cover;">

        
      


  <!-- Material design -->
  

      
    <div class="container  shadow p-3 mb-5 bg-white rounded" id="register" >
        
        <div class="card card-outline-secondary" >
            <div class="card-header">
                <center><h3 class="mb-0" style="color:#08101af5;">Admin of LiveGreen</h3></center>
            </div>

            <!--seach bar for searching material name-->
            <div  style="width:80%; margin-left:auto; margin-right:auto;">
              <br>
              <input  class="form-control mb-4" type="text" id="myInput" onkeyup="searchMaterial()" placeholder="Search for material names..">
              
            </div>
            <script>

              function searchMaterial() {
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


            $sql = "select * from material";
            $result = $conn->query($sql);

            if($result ->num_rows == 0){

            }else{?>

                <div class="card shadow p-3 mb-5 bg-white rounded" style=" background-repeat: no-repeat; background-position: center;background-size: cover; background-image: url('/Assignment2/assets/img/paper-clip.jpg'); ">

                <div class="card-body " style="background-color:rgba(255, 255, 255, 0.88); ">
                    <h5 class="card-header p-3 mb-2 bg-secondary text-white">List of Materials</h5>
                    <div class="table-responsive">

                        <table class="table table-hover container-fluid" id="myTable">
                            <thead>
                                <tr>

                                <th scope="col">Material ID</th>
                                <th scope="col">Material Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Points per KG</th>
                                <th colspan="2">Action</th>
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
                                                UPDATE

                                            </button>
                                            </td>

                                        </tr>
                            </tbody>





                                <!-- Update status of application form -->
                                <div class="modal fade" id="exampleModal<?php echo $row['materialID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Material info</h5>
                                    </div>


                                    <div class= "modal-body">
                                        <form class="needs-validation" method="POST" action="/Assignment2/assets/php/updateMaterialInfo.php" >

                                                <div class="input-group mb-3">
                                                <label>Material ID: &nbsp </label>
                                                <input id="application_id" name="materialID" value= "<?php echo $row['materialID'];?>" type="number" class="form-control" placeholder="Material ID" aria-label="id" aria-describedby="basic-addon1" required>
                                                <div class="invalid-feedback">
                                                    You must enter material id.
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <label>Material Name: &nbsp </label>
                                                <input id="residence_id" name="materialName" value= "<?php echo $row['materialName']; ?>" type="text" class="form-control" pattern="[A-Z a-z]+" title="Only letters [A-Z a-z] are allowed! " placeholder="Material Name" aria-label="id" aria-describedby="basic-addon1" required>
                                                
                                            </div>



                                            <div class="input-group mb-3">
                                                <label>Description: &nbsp </label>
                                                <input id="description" name="description" type="text" class="form-control"  value="<?php echo $row['description'];?>" placeholder="Description" required>
                                            
                                            </div>

                                            <div class="input-group mb-3">
                                                <label>Points Per Kg: &nbsp </label>
                                                <input id= "date-from" type="number" name="pointsPerKg" value="<?php echo $row['pointsPerKg'];?>" class="form-control"  placeholder="Points per Kg" required>
                                            

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


        <!-- Button trigger modal(add row with details) -->
        <button type="button" class="btn  btn-outline-dark" data-toggle="modal" data-target="#addMaterial">
                Add new material
        </button>              

        </div>
    </div>


<!-- End of Material design -->

    
        <!-- Add new material -->
        <div class="modal fade"  id="addMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new material</h5>
            </div>


            <div class= "modal-body">
                <form class="needs-validation" method="POST" action="/Assignment2/assets/php/addNewMaterial.php" >

                

                    <div class="input-group mb-3">
                        <label>Material Name: &nbsp </label>
                        <input id="residence_id" name="materialName" type="text" pattern="[A-Z a-z]+" title="Only letters [A-Z a-z] are allowed! " class="form-control" placeholder="Material Name" aria-label="id" aria-describedby="basic-addon1" required>
                        
                    </div>



                    <div class="input-group mb-3">
                        <label>Description: &nbsp </label>
                        <input id="description" name="description" type="text" class="form-control"  placeholder="Description" required>
                        
                    </div>

                    <div class="input-group mb-3">
                        <label>Points Per Kg: &nbsp </label>
                        <input id= "date-from" type="number" name="pointsPerKg" class="form-control"  placeholder="Points per Kg" required>
                        

                    </div>
                    


                    


                    <div class="modal-footer">
                        <input  type="submit" class="btn btn-primary" value="Add" name="add">

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