<?php
session_start();
  include 'dbconfig.php';
?>

<html>
    <head>
        <title>Departmental Store</title>
        <link rel="stylesheet" href="styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
        <script src="script.js"></script>

        
    </head>
    <body>

    <!-----------------------------------NAVBAR----------------------------------------------------------------->
    <div class="topnav" id="myTopnav">
      <a class="active"><h2><b>Everyneed<sub>store</sub></b></h2></a>
      <a href="Register.php">Account</a>
      <a href="">Groceries</a>
      <a href="">Personalise</a>
      <a href="">Beauty</a>
      <a href="">Cart</a>
      

       <!------------------SEARCH----------------------------------------------------------------------------->
       <a><div class="search">
				<form class="search-form">
					<input type="text">
					<input type="submit" value="Search">
				</form>
			</div></a>
    
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
  </div>
    
          <!---------------HEADER------------------------------------------------------------------------------------->
        <div class="container">
            <div class="row">
                <div class="col-5">
                  <h1 class="header">Everyneed Store</h1>
                  <h3><i>Fresh market with smart money</i></h3>
                  <h5><i>New collection arriving daily</i></h5>
                  <p>Think about shopping?<a href="">Come here</a></p>
                 </div>
                 <div class="col-7" id="slideshow">
                        <div>
                            
                            <p><img class="img_header" src="pic2.jpg"><i  class="slogan">“We make your every day, a great day”</i></p>
                        </div>
                </div>
            </div>
        </div>

       

        <!--------------------------CARD------------------------------>
        
        <div class="container">
            <div class="row">

            <?php 
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                }
                else {
               $page =1;
                }

            $num_per_page=12;
            $start_from=($page-1)*12;

            $query="SELECT * FROM dp_store LIMIT $start_from,$num_per_page";
            $query_run=mysqli_query($con,$query);

                if($query_run)
                {
                    foreach($query_run as $row)
                    {
                        $_SESSION['id']=$row['id']; 
            ?>

                <div class="col card-style">
                    <div class="card" style="width: 150px; margin-top:20px;">
                    <img class="card-img-top" src="<?php echo $row['img'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $row['name'] ?></h6>
                        <p class="card-text"><?php echo $row['description'] ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Rs <?php echo $row['price'] ?>/<?php echo $row['quantity'] ?> </li>
                        <li class="list-group-item">Delivered on <?php echo $row['delivered'] ?></li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Buy now</a><br>
                        <a href="#" class="card-link">Add to cart</a>
                    </div>
                    </div>
                </div>
                <?php }} ?>
            </div>

            <div class="center">
            <?php
                $query_paging="SELECT * FROM dp_store";
                $query_paging_run=mysqli_query($con,$query_paging);

                $total_records=mysqli_num_rows($query_paging_run);

                $total_page=ceil($total_records/$num_per_page);

                if($page>1){
                    echo "<a href='Store.php?page=".($page-1)."' class='btn btn_page'>Previous</a>";
                }

                for($c=1; $c<=$total_page; $c++){

                    echo "<a href='Store.php?page=".$c."' class='btn btn_page'>$c</a>";
                }

                if($c>$page){
                    echo "<a href='Store.php?page=".($page+1)."' class='btn btn_page'>Next</a>";
                }

            ?>
            </div>
        </div>

        <!--------------------MEGA MENU FOOTER----------------------------------------------------------------->

        <footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
        <div class="container">
          <div class="row row-30">
            <div class="col-md-4 col-xl-5">
              <div class="pr-xl-4"><img src="pic5.jpg" width="140" height="37">
                <p>Since 1999, originated in 798 South Park Avenue, Dehradun, Today we have 100 stores all around India.
                  We are dedicated to provide customers with hassle free services and deliveries.
                </p>
                <!-- Rights-->
                <p class="rights"><span>©  </span><span class="copyright-year">2021</span><span> </span><span>ThoseCreatives</span><span>. </span><span>All Rights Reserved.</span></p>
              </div>
            </div>
            <div class="col-md-4">
              <h5>Contacts</h5>
              <dl class="contact-list">
                <dt>Address:</dt>
                <dd>798 South Park Avenue, Dehradun</dd>
              </dl>
              <dl class="contact-list">
                <dt>email:</dt>
                <dd><a href="mailto:#">everyneedsbusiness@gmail.com</a></dd>
              </dl>
              <dl class="contact-list">
                <dt>phones:</dt>
                <dd><a href="tel:#">Contacts : 7688014562, 1102-011-555, 1108-323-444</a> <span>or</span> <a href="tel:#">For home delivery : 7688014562, 9796959432</a>
                </dd>
              </dl>
            </div>
            <div class="col-md-4 col-xl-3">
              <h5>Links</h5>
              <ul class="nav-list">
                <li><a href="#">About</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">everyneedsonline.com</a></li>
                
              </ul>
            </div>
          </div>
        </div>
        <div class="row no-gutters social-container">
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
        </div>
      </footer>
      
    </body>
</html>