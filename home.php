<?php
require 'core.inc.php';
if(!(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))){

header("Location: index.php ");
exit();
}


?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
 <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <script src="npm.js"></script>
<style>
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    .row.content {
	height: 450px}
    
	.sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    footer {
    background-color: #555;
    color: white;
    padding: 7px;
	  position:fixed;
	  bottom:0px;
	  margin:0;
	  left:0;
	  right:0;
	  width:100%;
	  text-shadow: 1px 1px 1px black;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
      height: auto;
      padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="http://www.washongo.com/index.php">WASHONGO</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="order.php">Orders</a></li>
        <li><a href="email.php">Email</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
 
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="http://www.washongo.com" target="_blank">HOME PAGE</a></p>
      <p><a href="http://www.washongo.com/orders">ORDER PAGE</a></p>
      <p><a href="http://www.washongo.com/rates">RATE LIST</a></p>
	  <p><a href="http://www.washongo.com/about-us">ABOUT US</a></p>
	  <p><a href="#">RATE LIST</a></p>
	  <p><a href="#">RATE LIST</a></p>
	  <p><a href="#">RATE LIST</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Welcome</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>
      <h3>Test</h3>
      <p>Lorem ipsum...</p>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p><a href="http://www.washongo.com" target="_blank">HOME PAGE</a></p>
      </div>
      <div class="well">
        <p><a href="http://www.washongo.com" target="_blank">HOME PAGE</a></p>
      </div>
	  <div class="well">
        <p><a href="http://www.washongo.com" target="_blank">HOME PAGE</a></p>
      </div>
	  <div class="well">
        <p><a href="http://www.washongo.com" target="_blank">HOME PAGE</a></p>
      </div>
    </div>
  </div>
</div>



<footer class="container-fluid text-center">
  <p>designed and developed by Shashank Chamoli &copy all rights reserved</p>
</footer>

</body>
</html>
