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
  $res=mysql_query("SELECT course_name  FROM USER WHERE idUSER=".$_POST['idUSER'] );
  //$userRow=mysql_fetch_array($res);
  $row = mysql_fetch_array($res);

$resCourses=mysql_query("SELECT * FROM Courses WHERE idUSER=".$_POST['idUSER']);



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
<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


<style>

#back{
  width:25% !important;
}
#save{
  width:25% !important;
  MARGIN-LEFT: 43PX !important;
  MARGIN-RIGHT: 43PX !important;
}
#proceed{
  width:25% !important;
}

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

legend{
  color: white;
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
     <strong class="logo"><a href="admin_home.php" class="navbar-brand" style="max-height: 88px;"><img height="100" width="300" src="http://tagmarshal.com/wp-content/uploads/2012/05/tagmarshal-logo-white.png" alt="Pace of Play Golf Management Software" style="max-height: 88px;height: 51px;width: 165px;padding-top: 2px;margin-top: -15px;;"></a></strong>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
            
            <li ><a href="admin_home.php"  class="inactiveLink">Home</a></li>
            
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
	<div id="wrapper" style="color: white; background: dimgrey;">

	<div class="container">
   
    	<div class="page-header">
    	<h1 class="bib"><?php echo $row['course_name'] ;?></h1>
    	</div>
        
        <div class="row">
        	<div class="col-lg-12" style="margin-bottom: 40px;">

              <legend>Facility Information <form method="post" action="admin_Edit_FacilityInfo.php"><input type="hidden" id="userID" value="<?php echo $_POST['idUSER'];?>" name="editFacilityInfoIdUSER" /><input id="edit" type="submit" class="btn btn-default" value="Edit" name="edit" style="width: 109px;margin-top: -16px; float: right;"></form></legend>

              <?php
              $resFacility=mysql_query("SELECT * FROM FacilityInfo where idUSER=".$_POST['idUSER']);
              $rowFacility = mysql_fetch_array($resFacility);
              ?>

              <label>Multi-Course Facility: </label> <?php if($rowFacility['multiCourse'] == "1")
                                                            {
                                                                  echo "Yes";
                                                              }
                                                              else
                                                              {  echo "No" ;}?><br>
              <label>Course group name: </label> <?php echo $rowFacility['courseGroupName'] ;?><br>
              <label>Address line 1: </label><?php echo $rowFacility['addressLine1'] ;?><br>
              <label>Address line 2: </label><?php echo $rowFacility['addressLine1'] ;?><br>
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


              <legend>Order Details <form method="post" action="admin_Edit_OrderDetails.php"><input type="hidden" id="userID" value="<?php echo $_POST['idUSER'];?>" name="editOrderDetailsIdUSER" /><input id="view" type="submit" class="btn btn-default" value="Edit" name="view" style="width: 109px;margin-top: -16px; float: right;"></form></legend>
              <?php
              $resOrderDetails=mysql_query("SELECT * FROM OrderDetails where idUSER=".$_POST['idUSER']);
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
              <label>Closed season end: </label><?php echo $rowOrderDetails['closedSeasonStart'] ;?><br><br><br>

              <legend>Course Information <form method="post" action="admin_Edit_CourseInfo.php"><input type="hidden" id="userID" value="<?php echo $_POST['idUSER'];?>" name="editCourseInfoIdUSER" /><input id="edit" type="submit" class="btn btn-default" value="Edit" name="edit" style="width: 109px;margin-top: -16px; float: right;"></form></legend>
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
              $resProfile=mysql_query("SELECT * FROM Profiles where idUSER=".$_POST['idUSER']);
              $rowProfile = mysql_fetch_array($resProfile);

              $resDBFile=mysql_query("SELECT * FROM DatabaseFiles where idUSER=".$_POST['idUSER']);
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

		
        	</div>
    </div>
    
    </div>
   
       
   <script>     
   function backToList()
        {
          location.href = "admin_home.php";
        }
</script>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>