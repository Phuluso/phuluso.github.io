<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';
  
  // if session is not set this will redirect to login page
  if( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
  }

  if( isset($_POST['deleteAll']) ) {
  $res1=mysql_query("TRUNCATE TABLE Users;");
  $row1 = mysql_fetch_array($res1);

  $res2=mysql_query("TRUNCATE TABLE Courses;");
  $row2 = mysql_fetch_array($res2);

  $res3=mysql_query("TRUNCATE TABLE FacilityInfo;");
  $row3 = mysql_fetch_array($res3);

  $res4=mysql_query("TRUNCATE TABLE GoalTimes;");
  $row4 = mysql_fetch_array($res4);

  $res5=mysql_query("TRUNCATE TABLE OrderDetails;");
  $row5 = mysql_fetch_array($res5);

  $res6=mysql_query("TRUNCATE TABLE Profiles;");
  $row6 = mysql_fetch_array($res6);

  $res7=mysql_query("TRUNCATE TABLE USER;");
  $row7 = mysql_fetch_array($res7);

  $res8=mysql_query("TRUNCATE TABLE GoalTimes;");
  $row8 = mysql_fetch_array($res8);
}


 if( isset($_POST['delete']) ) {
  $res1=mysql_query("DELETE FROM Users WHERE idUSER=".$_POST['deleteUser'].";");
  $row1 = mysql_fetch_array($res1);

  $res2=mysql_query("DELETE FROM Courses WHERE idUSER=".$_POST['deleteUser'].";");
  $row2 = mysql_fetch_array($res2);

  $res3=mysql_query("DELETE FROM FacilityInfo WHERE idUSER=".$_POST['deleteUser'].";");
  $row3 = mysql_fetch_array($res3);

  $res4=mysql_query("DELETE FROM GoalTimes WHERE idUSER=".$_POST['deleteUser'].";");
  $row4 = mysql_fetch_array($res4);

  $res5=mysql_query("DELETE FROM OrderDetails WHERE idUSER=".$_POST['deleteUser'].";");
  $row5 = mysql_fetch_array($res5);

  $res6=mysql_query("DELETE FROM Profiles WHERE idUSER=".$_POST['deleteUser'].";");
  $row6 = mysql_fetch_array($res6);

  $res7=mysql_query("DELETE FROM USER WHERE idUSER=".$_POST['deleteUser'].";");
  $row7 = mysql_fetch_array($res7);

  $res8=mysql_query("DELETE FROM GoalTimes WHERE idUSER=".$_POST['deleteUser'].";");
  $row8 = mysql_fetch_array($res8);
}
 

?>

<!DOCTYPE html>
<html style="background: dimgrey;">
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


<style

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
    	<h1 class="bib">Registered Courses</h1>
    	</div>
       
        <div class="row">
        	<div class="col-lg-12" style="margin-bottom: 40px;">
        	
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
  $res=mysql_query("SELECT course_name, idUSER FROM USER");
  //$userRow=mysql_fetch_array($res);
  $count = mysql_num_rows($res) -1;
 
  //if( $count > 0) {
echo '<label>'.$count. ' Results showing</label>';
echo '<table class="table table-bordered table-inverse" >';
    echo '<thead>';
    echo '<tr>';
        echo '<td ><label class="control-label" for="course_name">Course Name</label></td>';
        echo '<td ><label class="control-label" for="command">View course</label></td>';
		echo '<td ><label class="control-label" for="command">Remove course</label></td>';
      echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while($row = mysql_fetch_array($res) ) {
    
      if($row['course_name'] == "TMAdmin0000")
      {
        continue;
      }
      else{echo '<tr>';
        echo '<td>' . $row['course_name'] . '</td>';
        echo '<td><form method="post" action="admin_view.php" );"><input type="hidden" id="userID" value="'.$row['idUSER'].'" name="idUSER" /><input id="view" type="submit" class="btn btn-default" value="View" name="view"></form></td>';
	echo '<td><form method="post" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'"  ><input type="hidden" id="userID" value="'.$row['idUSER'].'" name="deleteUser" />
    <input id="delete" type="submit" class="btn btn-default" value="Delete" name="delete" style="background-color:#a94242 !important;width: 40%;float:right;">
</form></td>';
      echo '</tr>';
      }

  }
  echo '</tbody>';
    echo '</table>';


?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" style="display: none;"><input type="hidden" id="userID" value="deleteAll" name="idUSER" />
    <input id="deleteAll" type="submit" class="btn btn-default" value="Delete All" name="deleteAll" style="background-color:#a94242 !important;width: 7%;height:79px;border-radius:43px"/>
</form>
		
          </div>

		
        	</div>
    </div>
    
    </div>
    <script>
var countBox =2;
var boxName = 0;

var streetcountBox =3;
var streetboxName = 0;
function addCourse()
{
     var boxName="Course Name "+countBox;

document.getElementById('responce').innerHTML+='<br/><input type="text" id="course_name'+countBox+'" placeholder="'+boxName+'" " class="form-control input-md" /><br/>';
     countBox += 1;
}
function addComment()
{
  $('#commentsBox').show(); 
}
function addStreetLine()
{
     var streetboxName="Street Line "+streetcountBox; 
     $('#streetLineNew').show(); 
document.getElementById('streetresponce').innerHTML+='<br/><input type="text" id="streetLineNew'+streetcountBox+'" placeholder="'+streetboxName+'" " class="form-control input-md" /><br/>';
     streetcountBox += 1;
}
 function homeSave()
        {
          location.href = "order_details.php";
        }
		
		var el = document.getElementById('myCoolForm');

el.addEventListener('submit', function(){
    return confirm('Are you sure you want to submit this form?');
});
</script>


       
        
  
<script type="text/javascript">
  $(document).ready(function() {
   $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'course_multi-0') {
            $('#show-me').show();  
            $('#show-me1').show();          
       }

       else {
            $('#show-me').hide();
            $('#show-me1').hide();   
       }
   });
});
</script>
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>