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
	$res=mysql_query("SELECT * FROM USER WHERE username=Phuluso");
	$userRow=mysql_fetch_array($res);

	$count = mysql_num_rows($res);


  $resCourses=mysql_query("SELECT * FROM Courses WHERE idUSER=".$_SESSION['user']);

  $holes  = trim($_POST['holes']);

  $parhole1 = "";
  $parhole2 = "";
  $parhole3 = "";
  $parhole4 = "";
  $parhole5 = "";
  $parhole6 = "";
  $parhole7 = "";
  $parhole8 = "";
  $parhole9 = "";
  $parhole10 = "";
  $parhole11 = "";
  $parhole12 = "";
  $parhole13 = "";
  $parhole14 = "";
  $parhole15 = "";
  $parhole16 = "";
  $parhole17 = "";
  $parhole18 = "";
  $parhole19 = "";
  $parhole20 = "";
  $parhole21 = "";
  $parhole22 = "";
  $parhole23 = "";
  $parhole24 = "";
  $parhole25 = "";
  $parhole26 = "";
  $parhole27 = "";

  $minutesHole1 = "";
  $minutesHole2 = "";
  $minutesHole3 = "";
  $minutesHole4 = "";
  $minutesHole5 = "";
  $minutesHole6 = "";
  $minutesHole7 = "";
  $minutesHole8 = "";
  $minutesHole9 = "";
  $minutesHole10 = "";
  $minutesHole11 = "";
  $minutesHole12 = "";
  $minutesHole13 = "";
  $minutesHole14 = "";
  $minutesHole15 = "";
  $minutesHole16 = "";
  $minutesHole17 = "";
  $minutesHole18 = "";
  $minutesHole19 = "";
  $minutesHole20 = "";
  $minutesHole21 = "";
  $minutesHole22 = "";
  $minutesHole23 = "";
  $minutesHole24 = "";
  $minutesHole25 = "";
  $minutesHole26 = "";
  $minutesHole27 = "";




  if($holes == 9){
        for($i=1; $i <= 9; $i++) {
        ${'parhole' . $i} = trim($_POST['parhole'. $i]);
        ${'minutesHole' . $i} = trim($_POST['minutesHole'. $i]);
        }

        
  }


  if($holes == 18){
        for($i=1; $i <= 18; $i++) {
        ${'parhole' . $i} = trim($_POST['parhole'. $i]);
        ${'minutesHole'. $i} = trim($_POST['minutesHole'. $i]);
        }

  }

  if($holes == 27){
        for($i=1; $i <= 27; $i++) {
        ${'parhole' . $i} = trim($_POST['parhole'. $i]);
        ${'minutesHole' . $i} = trim($_POST['minutesHole'. $i]);
        }

  }


  $teeTimesWinter = trim($_POST['teeTimesWinter']);
  $teeTimesSummer = trim($_POST['teeTimesSummer']);
  $nineholeRoundsPolar = trim($_POST['nineholeRoundsPolar']);
  $halfwayHousePolar = trim($_POST['halfwayHousePolar']);
  $halfWayHouseTime = trim($_POST['halfWayHouseTime']);
  $tenthTeePolar = trim($_POST['tenthTeePolar']);


  $idUser = $_SESSION['user'];
  
 //$query = "INSERT INTO GoalTimes (idUSER, numHoles, hole1Par, hole2Par,hole3Par,hole4Par,hole5Par,hole6Par,hole7Par,hole8Par,hole9Par,hole10Par,hole11Par,hole12Par,hole13Par,hole14Par,hole15Par,hole16Par,hole17Par,hole18Par,hole19Par,hole20Par,hole21Par,hole22Par,hole23Par,hole24Par,hole25Par,hole26Par,hole27Par, hole1min, hole2min,hole3min,hole4min,hole5min,hole6min,hole7min,hole8min,hole9min,hole10min,hole11min,hole12min,hole13min,hole14min,hole15min,hole16min,hole17min,hole18min,hole19min,hole20min,hole21min,hole22min,hole23min,hole24min,hole25min,hole26min,hole27min, defaultTeeTimesWinter,defaultTeeTimesSummer, track9Hole, halfWayHouse, halfWayHouseTime, tenthTeeStart) VALUES ('$idUser', '$holes', '$parhole1', '$parhole2', '$parhole3', '$parhole4', '$parhole5', '$parhole6', '$parhole7', '$parhole8', '$parhole9', '$parhole10', '$parhole11', '$parhole12', '$parhole13', '$parhole14', '$parhole15', '$parhole16', '$parhole17', '$parhole18', '$parhole19', '$parhole20', '$parhole21', '$parhole22', '$parhole23', '$parhole24','$parhole25','$parhole26','$parhole27', '$minutesHole1', '$minutesHole2', '$minutesHole3', '$minutesHole4', '$minutesHole5', '$minutesHole6', '$minutesHole7', '$minutesHole8', '$minutesHole9', '$minutesHole10', '$minutesHole11', '$minutesHole12', '$minutesHole13', '$minutesHole14', '$minutesHole15', '$minutesHole16', '$minutesHole17', '$minutesHole18', '$minutesHole19', '$minutesHole20', '$minutesHole21', '$minutesHole22', '$minutesHole23', '$minutesHole24','$minutesHole25','$minutesHole26','$minutesHole27','$teeTimesWinter','$teeTimesSummer','$nineholeRoundsPolar','$halfwayHousePolar','$halfWayHouseTime','$tenthTeePolar')";

  $res = mysql_query($query);


if ($res) {
        $errTyp = "success";
        $errMSG = "Goal Times details saved successfully!";
      
      } else {
        $errTyp = "danger";
        $errMSG = "Something went wrong, try again later..."; 
      } 
  


if( $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}


$query1 = "INSERT INTO DatabaseFiles (name, size, type, content )
VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

$res1 = mysql_query($query1) ;
if ($res1) {
        $errTyp1 = "success";
        $errMSG1 = "File: saved successfully!";
      
      } else {
        $errTyp1 = "danger";
        $errMSG1 = "File:Something went wrong, try again later..."; 
      } 


echo "<br>File $fileName uploaded<br>";
} 
  

  
 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title>Welcome - <?php echo $_SESSION['username']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
<link rel="shortcut icon" href="assets/img/favicon.png">


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
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <strong class="logo"><a href="home.php" class="navbar-brand" style="max-height: 88px;"><img height="100" width="300" src="http://tagmarshal.com/wp-content/uploads/2012/05/tagmarshal-logo-white.png" alt="Pace of Play Golf Management Software" style="max-height: 88px;height: 51px;width: 165px;padding-top: 2px;margin-top: -15px;;"></a></strong>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
            <li ><a href="home.php" id="navText" class="inactiveLink">Facility info</a></li>
            <li ><a href="order_details.php"  class="inactiveLink">OrderDetails</a></li>
            <li><a href="course_info.php"  class="inactiveLink">Course info</a></li>
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
    </div>
  </div>
</nav>

	<div id="wrapper">

	<div class="container">
   
    	<div class="page-header">
    	<h1>Submission Successful!!!</h1>
    	</div>
      
      <div style="">

        <legend>Facility Information</legend>

              <?php
              $resFacility=mysql_query("SELECT * FROM FacilityInfo where idUSER=".$_SESSION['user']);
              $rowFacility = mysql_fetch_array($resFacility);
              ?>

              <label>Multi-Course Facility: </label> <?php echo $rowFacility['multiCourse'] ;?><br>
              <label>Course group name: </label> <?php echo $rowFacility['courseGroupName'] ;?><br>
              <label>Address line 1: </label><?php echo $rowFacility['addressLine1'] ;?><br>
              <label>Address line 2: </label><?php echo $rowFacility['addressLine2'] ;?><br>
              <label>City: </label><?php echo $rowFacility['city'] ;?><br>
              <label>State: </label><?php echo $rowFacility['state'] ;?><br>
              <label>Postal code: </label><?php echo $rowFacility['postalCode'] ;?><br>
              <label>Country: </label><?php echo $rowFacility['country'] ;?><br>
              <label>Comment: </label><?php echo $rowFacility['comment'] ;?><br>
              <label>Contact person name: </label><?php echo $rowFacility['contactPerson'] ;?><br>
              <label>Contact person position held: </label><?php echo $rowFacility['positionHeld'] ;?><br>
              <label>Contact person number: </label><?php echo $rowFacility['contactNum'] ;?><br>
              <label>Contact person email: </label><?php echo $rowFacility['emailAddress'] ;?><br><br><br>
              



              <legend>Billing Information</legend>

              <label>Contact person name, billing: </label><?php echo $rowFacility['contactPersonBilling'] ;?><br>
              <label>Contact person number, billing: </label><?php echo $rowFacility['contactNumBilling'] ;?><br>
              <label>Contact person email, billing: </label><?php echo $rowFacility['emailAddressBilling'] ;?><br>

              <label>Payment method: </label><?php echo $rowFacility['paymentMethod'] ;?><br><br><br>


              <legend>Order Details</legend>
              <?php
              $resOrderDetails=mysql_query("SELECT * FROM OrderDetails where idUSER=".$_SESSION['user']);
              $rowOrderDetails = mysql_fetch_array($resOrderDetails);
              ?>
              <label>Sales Representative: </label> <?php echo $rowOrderDetails['salesRep'] ;?><br>
              <label>Walking tags: </label> <?php echo $rowOrderDetails['walkingTagsQTY'] ;?><br>
              <label>Marshal tags: </label><?php echo $rowOrderDetails['marshalTagsQTY'] ;?><br>
              <label>Cart QTY: </label><?php echo $rowOrderDetails['cartQTY'] ;?><br>
              <label>Cart make: </label><?php echo $rowOrderDetails['cartMake'] ;?><br>
              <label>Cart year: </label><?php echo $rowOrderDetails['cartYear'] ;?><br>
              <label>Cart model: </label><?php echo $rowOrderDetails['cartModel'] ;?><br>
              <label>Player cart upgrade: </label><?php echo $rowOrderDetails['playerCartUpgrade'] ;?><br>
              <label>Superintendent QTY: </label><?php echo $rowOrderDetails['supQTY'] ;?><br>
              <label>Superintendent make: </label><?php echo $rowOrderDetails['supMake'] ;?><br>
              <label>Superintendent year: </label><?php echo $rowOrderDetails['supYear'] ;?><br>
              <label>Superintendent model: </label><?php echo $rowOrderDetails['supModel'] ;?><br>
              <label>Superintendent upgrade: </label><?php echo $rowOrderDetails['supCartUpgrade'] ;?><br>
              <label>Beverage cart QTY: </label> <?php echo $rowOrderDetails['bevQTY'] ;?><br>
              <label>Beverage cart make: </label> <?php echo $rowOrderDetails['bevMake'] ;?><br>
              <label>Beverage cart year: </label><?php echo $rowOrderDetails['bevYear'] ;?><br>
              <label>Beverage cart model: </label><?php echo $rowOrderDetails['bevModel'] ;?><br>
              <label>Beverage cart upgrade: </label><?php echo $rowOrderDetails['bevCartUpgrade'] ;?><br>
              <label>Implementation date: </label><?php echo $rowOrderDetails['ImplDate'] ;?><br>
              <label>Contract Period: </label><?php echo $rowOrderDetails['contractPeriod'] ;?><br>
              <label>Currency: </label><?php echo $rowOrderDetails['currency'] ;?><br>
              <label>Price per month: </label><?php echo $rowOrderDetails['pricePerMonth'] ;?><br>
              <label>Active season start: </label><?php echo $rowOrderDetails['activeSeasonStart'] ;?><br>
              <label>Active season end: </label><?php echo $rowOrderDetails['activeSeasonEnd'] ;?><br>
              <label>Closed season start: </label><?php echo $rowOrderDetails['closedSeasonStart'] ;?><br>
              <label>Closed season end: </label><?php echo $rowOrderDetails['closedSeasonEnd'] ;?><br><br><br>

              <legend>Course Information</legend>
               <?php 
  while($rowCourses = mysql_fetch_assoc($resCourses)) { 
      $resGoalTimes=mysql_query("SELECT * FROM GoalTimes where idCourses=".$rowCourses["idCourses"]);
              $rowGoalTimes = mysql_fetch_array($resGoalTimes);
    ?>
        <legend style="font-size: 16px; font-weight: bold;"><?php echo $rowCourses["courseName"]; ?> </legend> 
        <label>Number of holes: </label><?php echo $rowGoalTimes['numHoles'] ;?><br>
        <label>Default tee time Winter: </label><?php echo $rowGoalTimes['defaultTeeTimesWinter'] ;?><br>
        <label>Default tee time Summer: </label><?php echo $rowGoalTimes['defaultTeeTimesSummer'] ;?><br>
        <label>Track 9 hole rounds: </label><?php echo $rowGoalTimes['track9Hole'] ;?><br>
        <label>Half way house: </label><?php echo $rowGoalTimes['halfWayHouse'] ;?><br>
        <label>Half way house time: </label><?php echo $rowGoalTimes['halfWayHouseTime'] ;?><br>
        <label>10th tee start: </label><?php echo $rowGoalTimes['tenthTeeStart'] ;?><br>

         <table  id="holeTable"    class="table table-bordered table-inverse" > 
        <thead class="table-head">
        <tr>
            <td style="width:30%;"><label class="control-label" for="holes" >Hole Details</label></td>
            <td style="width:30%;"><label class="control-label" for="holes" >Par</label></td>
            <td style="width:30%;"><label class="control-label" for="holes" >Minutes Assigned</label></td>
         </tr> 
        </thead>

        <tbody>

        <?php 
      if($rowGoalTimes['numHoles'] == 9) {
          for($i = 1; $i <= 9; $i++){ 
              $parHead = "hole".$i."Par";
              $minHead = "hole".$i."min";
            ?>
                
            <tr><td>Hole-<?php echo $i;?></td><td><?php echo $rowGoalTimes[$parHead]; ?></td><td><?php echo $rowGoalTimes[$minHead]; ?></td></tr>
        <?php
        }
    }
       else if($rowGoalTimes['numHoles'] == 18)
       {
         for($i = 1; $i <= 18; $i++){
               $parHead = "hole".$i."Par";
               $minHead = "hole".$i."min";
               ?>
            <tr><td>Hole-<?php echo $i;?></td><td><?php echo $rowGoalTimes[$parHead]; ?></td><td><?php echo $rowGoalTimes[$minHead]; ?></td></tr>

       <?php
        }
     }
      
       else if($rowGoalTimes['numHoles'] == 27)
       {
         for($i = 1; $i <= 27; $i++){
               $parHead = "hole".$i."Par";
               $minHead = "hole".$i."min";
               ?>
            <tr><td>Hole-<?php echo $i;?></td><td><?php echo $rowGoalTimes[$parHead]; ?></td><td><?php echo $rowGoalTimes[$minHead]; ?></td></tr>

       <?php
        }
     }
      ?>


        </tbody>
        </table>
        <br><br><br>

              <?php }; ?>

              <legend>Profiles</legend>
              <?php
              $resProfile=mysql_query("SELECT * FROM Profiles where idUSER=".$_SESSION['user']);
              $rowProfile = mysql_fetch_array($resProfile);

              $resDBFile=mysql_query("SELECT * FROM DatabaseFiles where idUSER=".$_SESSION['user']);
              $rowDBFile = mysql_fetch_array($resDBFile);
              ?>

              <label>Profile assigned to Caddies: </label><?php if($rowProfile['caddies'] =="1"){echo "Yes";} else{echo "No";}?><br>
              <label>Profile assigned to Leagues: </label><?php if($rowProfile['leagues'] =="1"){echo "Yes";} else{echo "No";}?><br>
              <label>Profile assigned to Players: </label><?php if($rowProfile['players'] =="1"){echo "Yes";} else{echo "No";}?><br>
              
              <br>
              
              <label>Caddies Database filename: </label><?php echo $rowDBFile['name2'] ;?><br>
              <label>Leagues Database filename: </label><?php echo $rowDBFile['name1'] ;?><br>
              <label>Players Database filename: </label><?php echo $rowDBFile['name'] ;?><br><br>
              <label>Booking system provider: </label><?php echo $rowProfile['bookingSysProvider'] ;?><br>
              <label>Other BSP contact person: </label><?php echo $rowProfile['otherContactPerson'] ;?><br>
              <label>Other BSP contact number: </label><?php echo $rowProfile['otherContactNum'] ;?><br>
              <label>Other BSP email address: </label><?php echo $rowProfile['otherEmailAddress'] ;?><br><br><br>



      </div>
        
        <div class="row">
        	
<?php foreach($res as $r): ?>
   <div class = "jumbotron">
     number=<?php echo $count = mysql_num_rows($res); ?>
   </div>
<?php endforeach; ?>

	</div>

		
    </div>
  
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function myFunction() {
      var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        }     
        else {
                   x.className = "topnav";
                }
          }
        
</script>
    </script>>
</body>
</html>
<?php ob_end_flush(); ?>