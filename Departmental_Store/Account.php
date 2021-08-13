<?php 
session_start();
?>
<html>
<head>
    <title>Your Account</title>
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
      <a href="Store.php">Home</a>
      <a href="">Groceries</a>
      <a href="">Personalise</a>
      <a href="">Beauty</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
  </div>

<!---------------------------------CART----------------------------------------------------------------------->
<div class="container">
    <div class="row">
        <div class="col">
            <?php include 'dbconfig.php'?>
            <img class="image_account" src="https://images.unsplash.com/photo-1464863979621-258859e62245?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTl8fGdpcmx8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60">
            <div class="card" style="width: 20rem; margin-top:20px;">
                    <div class="card-header">
                      Rashi Joshi
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">rashijoshi1999913@gmail.com</li>
                        <li class="list-group-item">Password</li>
                        <li class="list-group-item"><button class="btn btn-danger">Edit Details</button>
                        <button class="btn btn-danger" style="margin-left:30%;">Log Out</button></li>
                        
                        
                    </ul>
            </div>
            
        </div>
        <div class="col">
            <h2 style="margin-top:20px;">Your Orders</h2>
            <div class="card" style="width: 20rem; margin-top:20px;">
                        <div class="card-header">
                          Onions
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">Delivered on 13/08/2021</li>
                        <li class="list-group-item">Ordered on 12/08/2021</li>
                        <li class="list-group-item">Quantity 5kg</li>
                        <li class="list-group-item">Price Rs 400</li>
                    </ul>
                        
            </div>   

            <div class="card" style="width: 20rem; margin-top:20px; margin-bottom:20px;">
                        <div class="card-header">
                          Tomatoes
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">Delivered on 13/08/2021</li>
                        <li class="list-group-item">Ordered on 12/08/2021</li>
                        <li class="list-group-item">Quantity 5kg</li>
                        <li class="list-group-item">Price Rs 400</li>
                    </ul>
                        
            </div>   
        </div>

        <div class="col">
            <h2 style="margin-top:20px;">Cart</h2>
            <div class="card" style="width: 20rem; margin-top:20px;">
                        <div class="card-header">
                          Onions 
                          <a href="" style="font-size:12px; margin-left:15px;">Buy now</a>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">Quantity 5kg</li>
                        <li class="list-group-item">Price Rs 400</li>
                    
                    </ul>
                        
            </div>   

            <div class="card" style="width: 20rem; margin-top:20px; margin-bottom:20px;">
                        <div class="card-header">
                          Tomatoes
                          <a href="" style="font-size:12px; margin-left:15px;">Buy now</a>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">Quantity 5kg</li>
                        <li class="list-group-item">Price Rs 400</li>
                    </ul>
                        
            </div>   
        </div>
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