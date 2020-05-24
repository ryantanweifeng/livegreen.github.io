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
          <a class="nav-link" href="#"></a>
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
        </h2>
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
              <input  class="form-control mb-4" type="text" id="myInput" onkeyup="searchRecyclerName()" placeholder="Search for Recycler Name..">
              
            </div>
            <script>

              function searchRecyclerName() {
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

            $sql = "SELECT * from submission where materialID";
            $result = $conn->query($sql);

            if($result ->num_rows == 0){

            }else{?>

                <div class="card shadow p-3 mb-5 bg-white rounded">

                <div class="card-body ">
                    <h5 class="card-header p-3 mb-2 bg-secondary text-white">List of Materials</h5>
                    <div class="table-responsive">

                        <table class="table table-hover container-fluid" id="myTable" >
                            <thead>
                                <tr>
                                <th scope="col">Material ID</th>
                                <th scope="col">Recycler Name</th>
                                <th scope="col">Collector Name</th>
                                <th scope="col">status</th>
                                <th scope="col">Weight In KG</th>
                                <th scope="col">Points Per KG</th>
                                <th scope="col">TotalPoint<br>(Point Awarded)</th>
                                </tr>
                            </thead>

                            <?php while($row= $result->fetch_assoc()){ ?>




                            <tbody>
                                    

                                        <tr>
                                            <td><?php echo $row["materialID"];?></td>
                                            <td><?php echo $row["submissionName"];?></td>
                                            <td><?php echo $row["username"];?></td>
                                            <td><?php echo $row["status"];?></td>
                                            <td><?php echo $row["weightInKg"];?></td>
                                            <td><?php echo $row["pointsPerKg"];?></td>
                                            <td><?php echo $row["pointsAwarded"];?></td>
                                        </tr>
                            </tbody>



                                    </div>
                                </div>
                                </div>
                                </div>
                            <?php }?>

                        </table>
                        <a href="adminLogin.php"><button type="button" class="btn  btn-outline-dark" data-toggle="modal">
                            Back
                            </button></a>
                    </div>
                </div>
                </div>

            <?php  } ?>

            <!--End of Bootstrap table -->


               

        </div>
    </div>


<!-- End of Material design -->

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