<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM USER WHERE idUSER=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $_SESSION['username']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />



<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


<style>

.navbar-default .navbar-nav > li > a {
    color: rgb(177, 169, 169);
}

.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    color: #8aa913;
    background-color: transparent;
}

.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
    width: 100%;
    color: black !important;
    background-color: #8abe40 !important;
    border-color: #7cab3a !important;
}
</style>
</head>
<body >

	<nav class="navbar navbar-default navbar-fixed-top" style="background:#373737;">
      <div class="container">
        <div class="navbar-header">
          <strong class="logo"><a href="home.php" style="max-height: 88px;"><img height="100" width="300" src="http://tagmarshal.com/wp-content/uploads/2012/05/tagmarshal-logo-white.png" alt="Pace of Play Golf Management Software" style="max-height: 88px;height: 51px;width: 165px;padding-top: 2px;"></a></strong>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="home.php">Facility info</a></li>
            <li class="active"><a href="order_details.php">Order Details</a></li>
            <li ><a href="course_info.php">Course info</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $_SESSION['username']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
		
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

	<div id="wrapper">

	<div class="container">
   
    	<div class="page-header">
    	<h1>Tagmarshal On-boarding Questionnaire: <?php echo $_SESSION['course_name']; ?></h1>
    	</div>
        
        <div class="row">
        	<div class="col-lg-12" style="margin-bottom: 40px;">
        	

		<form class="form-horizontal">


<fieldset>

<!-- Sales Representative -->
<legend>Order Details</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="startSystem">Sales Representative</label>  
  <div class="col-md-4">
  <input id="salesRep" name="salesRep" type="text" placeholder="e.g. John Klillmore" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="startSystem">How many tags are required?</label>  
  <div class="col-md-4">
  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="startSystem">Walking</label>  
  <div class="col-md-4">
  
  <input id="walkingTags" name="walkingTags" type="number" placeholder="QTY" class="form-control input-md"><br/>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="startSystem">Marshal</label>  
  <div class="col-md-4">
  
  <input id="marshalTags" name="marshalTags" type="number" placeholder="QTY" class="form-control input-md"><br/>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="startSystem">Cart</label>  
  <div class="col-md-4" style="display: inline-flex;">
  
  <input id="cartQuantity" name="cartQuantity" type="number" placeholder="QTY" class="form-control input-md" >
  <select id="cartMake" name="cartMake" class="form-control" >
      <option value="" selected="true" disabled="true">Make</option>
      <option value="YamahaGas">Yamaha Gas</option>
      <option value="YamahaElectric">Yamaha Electric</option>
      <option value="ClubCorGas">ClubCor Gas</option>
      <option value="ClubCorElec">ClubCor Electric</option>
      <option value="EzgoGas">EZGO Gas</option>
      <option value="EzgoElec">EZGO Electric</option>
    </select>
  <input id="cartYear" name="cartYear" type="year" placeholder="Year" class="form-control input-md" ><br/>
  <input id="cartModel" name="cartModel" type="number" placeholder="Model" class="form-control input-md" ><br/>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-4 control-label" for="initiationDate">Implementation Date</label>  
 <div class="col-md-4">
  <input id="inimplementationDate" name="implementationDate" type="date" placeholder="" class="form-control input-md">
    
  </div>
  
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="contractPeriod">Contract Period</label>
  <div class="col-md-4">
    <select id="contractPeriod" name="contractPeriod" class="form-control">
      <option value="" selected="true" disabled="true">Select Period</option>
      <option value="trial">Trial</option>
      <option value="3year">3 Year</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PricePerMonth">Price per month</label>  
  <div class="col-md-4" style="display: inline-flex;">
  <select id="contractPeriod" name="contractPeriod" class="form-control">
      <option value="" selected="true" disabled="true">Select Currency</option>
      <option value="usd">USD</option>
      <option value="zar">ZAR</option>
  </select>
  <input id="PricePerMonth" name="PricePerMonth" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="activeSeason">Active Season</label>  
  <div class="col-md-4" style="display: -webkit-inline-box;">
  
  <input id="activeSeasonStart" name="activeSeasonStart" type="date" placeholder="" class="form-control input-md" style="width:46%;">&nbsp to &nbsp<input id="activeSeasonEnd" name="activeSeasonEnd" type="date" placeholder="" class="form-control input-md" style="width:46%;">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="closedSeason">Closed Season</label>  
  <div class="col-md-4" style="display: -webkit-inline-box;">
  <input id="closedSeasonStart" name="closedSeasonStart" type="date" placeholder="" class="form-control input-md" style="width:46%;">&nbsp to &nbsp<input id="closedSeasonEnd" name="closedSeasonEnd" type="date" placeholder="" class="form-control input-md" style="width:46%;">
    
  </div>
</div>






</fieldset>





 <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4" style="text-align: center;">
      <button id= "back" type="submit" class="btn btn-default" style="width:40% !important;float:left;">BACK</button><button id="save" type="submit" class="btn btn-default" style="width:40% !important;MARGIN-LEFT: 43PX !important;float:right;">SUBMIT</button>
    </div>
  </div>
</form>
</div>

		
        	</div>
    </div>
    
    </div>
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>