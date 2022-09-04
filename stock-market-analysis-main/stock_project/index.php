<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        #ques{
            min-height: 433px;
        }
        .carousel-inner {
            width: 70%;
            height: 50%;
            margin-left: 16%;
            

        }
    </style>
    <title>Welcome to Stock analysis</title>
</head>

<body>
    <?php include 'stock/_dbconnect.php';?>
    <?php include 'stock/header.php';?>

    <!-- Slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" >
                <img src="image/slider-4.jpg" class="d-block w-100" width=30%  alt="...">
            </div>
            <div class="carousel-item">
                <img src="image/slider-2.jpg" class="d-block w-100" width="30%" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image/slider-3.jpg" class="d-block w-100" width="30%" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Category container starts here -->
    <div class="container my-4" id="ques">
        <h2 class="text-center my-4">iBulls - Browse Company Names</h2><br>
        <div class="row my-4">
            <br>
          <!-- Fetch all the categories and use a loop to iterate through categories -->
         <?php 
         $sql = "SELECT * FROM `stock_id`"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
          // echo $row['category_id'];
          // echo $row['category_name'];
          $id = $row['script_id'];
          $cat = $row['company_name'];
          $sec = $row['sector'];
          $desc = $row['description'];
          $img = $row['img'];
            


                echo '<div class="col-md-4 my-2">
                <div class="card" style="width: 16rem ">
                    <img src="img/'.$img.'" class="card-img-top" alt="image for this category">
                    <div class="card-body">
                        <h5 class="card-title">' . $cat . '</a></h5>
                        <h6 class="card-subtitle">' . $sec . '</a></h6>
                        <p class="card-text">' . substr($desc, 0, 90). '... </p>
                        <a href="https://www.nseindia.com" class="btn btn-primary row-md-4 my-2">Learn More(NSE)</a><br>
                        <a href="https://www.bseindia.com" class="btn btn-primary row-md-4 my-2">Learn More(BSE)</a><br>
                    </div>
                </div>
              </div>';
              }
         ?>
            
 
        </div>
    </div>

    <?php include 'stock/footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>