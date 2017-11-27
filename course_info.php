<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


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




// Check if image file is a actual image or fake image


  
  $resCourses=mysql_query("SELECT * FROM Courses WHERE idUSER=".$_SESSION['user']);


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
  $idUSER = $_SESSION['user'];

  $count = mysql_num_rows($resCourses);
  $error = false;

  $holesErr = "";

 

  if( isset($_POST['save-courseInfo']) ) {
       
       error_reporting(E_ALL);
ini_set("display_errors", 1);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$basename = basename($_FILES["fileToUpload"]["name"])."";

$target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$basename1 = basename($_FILES["fileToUpload1"]["name"])."";

$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$basename2 = basename($_FILES["fileToUpload2"]["name"])."";
$uploadOk = 1;



// Check if file already exists
/*if (file_exists($target_file)) {
    $uploadErrors = $uploadErrors. "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadErrors = $uploadErrors. "Sorry, your file is too large.";
    $uploadOk = 0;
}*/


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $uploadErrors = $uploadErrors. "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $uploadErrors = $uploadErrors . "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

         $queryFileUpload = "SELECT * FROM DatabaseFiles WHERE idUSER=".$idUSER;
      $resFileUpload = mysql_query($queryFileUpload);
      $countFileUpload = mysql_num_rows($resFileUpload);

      if($countFileUpload == 0){

        $queryFileUpload = "INSERT INTO DatabaseFiles (idUSER, name) VALUES ('$idUSER', '$basename')";
        mysql_query($queryFileUpload);
        //header("Location: courses.php");
      }
      else{

          $query = "UPDATE DatabaseFiles SET idUSER='$idUSER', name='$basename' WHERE idUSER='$idUSER'";
  
              mysql_query($query);
              //header("Location: courses.php");

        }
    } else {
        $uploadErrors = $uploadErrors. "Sorry, there was an error uploading your file.";
    }




    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1)) {
        $uploadErrors = $uploadErrors . "The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.";

         $queryFileUpload1 = "SELECT * FROM DatabaseFiles WHERE idUSER=".$idUSER;
      $resFileUpload1 = mysql_query($queryFileUpload1);
      $countFileUpload1 = mysql_num_rows($resFileUpload1);

      if($countFileUpload1 == 0){

        $queryFileUpload1 = "INSERT INTO DatabaseFiles (idUSER, name) VALUES ('$idUSER', '$basename1')";
        mysql_query($queryFileUpload1);
        //header("Location: courses.php");
      }
      else{

          $query1 = "UPDATE DatabaseFiles SET idUSER='$idUSER', name='$basename1' WHERE idUSER='$idUSER'";
  
              mysql_query($query1);
              //header("Location: courses.php");

        }
    } else {
        $uploadErrors = $uploadErrors. "Sorry, there was an error uploading your file.";
    }




    if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
        $uploadErrors = $uploadErrors . "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";

         $queryFileUpload2 = "SELECT * FROM DatabaseFiles WHERE idUSER=".$idUSER;
      $resFileUpload2 = mysql_query($queryFileUpload2);
      $countFileUpload2 = mysql_num_rows($resFileUpload2);

      if($countFileUpload2 == 0){

        $queryFileUpload2 = "INSERT INTO DatabaseFiles (idUSER, name) VALUES ('$idUSER', '$basename2')";
        mysql_query($queryFileUpload2);
        //header("Location: courses.php");
      }
      else{

          $query2 = "UPDATE DatabaseFiles SET idUSER='$idUSER', name='$basename2' WHERE idUSER='$idUSER'";
  
              mysql_query($query2);
              //header("Location: courses.php");

        }
    } else {
        $uploadErrors = $uploadErrors. "Sorry, there was an error uploading your file.";
    }
}



      while($rowCourses = mysql_fetch_assoc($resCourses)) {

         $holesID = "holes". $rowCourses['idCourses'];
         $holes  = trim($_POST[$holesID]);

         

         $teeTimesWinterID = "teeTimesWinter" . $rowCourses['idCourses'];
         $teeTimesWinter = trim($_POST[$teeTimesWinterID]);

         $teeTimesSummerID = "teeTimesSummer" . $rowCourses['idCourses'];
         $teeTimesSummer = trim($_POST[$teeTimesSummerID]);


         //

         $parhole1ID = "parhole1_" . ($rowCourses['idCourses']);
         $parhole1 = trim($_POST[$parhole1ID]);

         $parhole2ID = "parhole2_" . ($rowCourses['idCourses']);
         $parhole2 = trim($_POST[$parhole2ID]);

         $parhole3ID = "parhole3_" . ($rowCourses['idCourses']);
         $parhole3 = trim($_POST[$parhole3ID]);

         $parhole4ID = "parhole4_" . ($rowCourses['idCourses']);
         $parhole4 = trim($_POST[$parhole4ID]);

         $parhole5ID = "parhole5_" . ($rowCourses['idCourses']);
         $parhole5 = trim($_POST[$parhole5ID]);

         $parhole6ID = "parhole6_" . ($rowCourses['idCourses']);
         $parhole6 = trim($_POST[$parhole6ID]);

         $parhole7ID = "parhole7_" . ($rowCourses['idCourses']);
         $parhole7 = trim($_POST[$parhole7ID]);

         $parhole8ID = "parhole8_" . ($rowCourses['idCourses']);
         $parhole8 = trim($_POST[$parhole8ID]);

         $parhole9ID = "parhole9_" . ($rowCourses['idCourses']);
         $parhole9 = trim($_POST[$parhole9ID]);

         $parhole10ID = "parhole10_" . ($rowCourses['idCourses']);
         $parhole10 = trim($_POST[$parhole10ID]);

         $parhole11ID = "parhole11_" . ($rowCourses['idCourses']);
         $parhole11 = trim($_POST[$parhole11ID]);

         $parhole12ID = "parhole12_" . ($rowCourses['idCourses']);
         $parhole12 = trim($_POST[$parhole12ID]);

         $parhole13ID = "parhole13_" . ($rowCourses['idCourses']);
         $parhole13 = trim($_POST[$parhole13ID]);

         $parhole14ID = "parhole14_" . ($rowCourses['idCourses']);
         $parhole14 = trim($_POST[$parhole14ID]);

         $parhole15ID = "parhole15_" . ($rowCourses['idCourses']);
         $parhole15 = trim($_POST[$parhole15ID]);

         $parhole16ID = "parhole16_" . ($rowCourses['idCourses']);
         $parhole16 = trim($_POST[$parhole16ID]);

         $parhole17ID = "parhole17_" . ($rowCourses['idCourses']);
         $parhole17 = trim($_POST[$parhole17ID]);

         $parhole18ID = "parhole18_" . ($rowCourses['idCourses']);
         $parhole18 = trim($_POST[$parhole18ID]);

         $parhole19ID = "parhole19_" . ($rowCourses['idCourses']);
         $parhole19 = trim($_POST[$parhole19ID]);

         $parhole20ID = "parhole20_" . ($rowCourses['idCourses']);
         $parhole20 = trim($_POST[$parhole20ID]);

         $parhole21ID = "parhole21_" . ($rowCourses['idCourses']);
         $parhole21 = trim($_POST[$parhole21ID]);

          $parhole22ID = "parhole22_" . ($rowCourses['idCourses']);
         $parhole22 = trim($_POST[$parhole22ID]);

         $parhole23ID = "parhole23_" . ($rowCourses['idCourses']);
         $parhole23 = trim($_POST[$parhole23ID]);

         $parhole24ID = "parhole24_" . ($rowCourses['idCourses']);
         $parhole24 = trim($_POST[$parhole24ID]);

         $parhole25ID = "parhole25_" . ($rowCourses['idCourses']);
         $parhole25 = trim($_POST[$parhole25ID]);

         $parhole26ID = "parhole26_" . ($rowCourses['idCourses']);
         $parhole26 = trim($_POST[$parhole26ID]);

         $parhole27ID = "parhole27_" . ($rowCourses['idCourses']);
         $parhole27 = trim($_POST[$parhole27ID]);


          //minutes hole post
         $minutesHole1ID = "minutesHole1_" . ($rowCourses['idCourses']);
         $minutesHole1 = trim($_POST[$minutesHole1ID]);

         $minutesHole2ID = "minutesHole2_" . ($rowCourses['idCourses']);
         $minutesHole2 = trim($_POST[$minutesHole2ID]);

         $minutesHole3ID = "minutesHole3_" . ($rowCourses['idCourses']);
         $minutesHole3 = trim($_POST[$minutesHole3ID]);

         $minutesHole4ID = "minutesHole4_" . ($rowCourses['idCourses']);
         $minutesHole4 = trim($_POST[$minutesHole4ID]);

         $minutesHole5ID = "minutesHole5_" . ($rowCourses['idCourses']);
         $minutesHole5 = trim($_POST[$minutesHole5ID]);

         $minutesHole6ID = "minutesHole6_" . ($rowCourses['idCourses']);
         $minutesHole6 = trim($_POST[$minutesHole6ID]);

         $minutesHole7ID = "minutesHole7_" . ($rowCourses['idCourses']);
         $minutesHole7 = trim($_POST[$minutesHole7ID]);

         $minutesHole8ID = "minutesHole8_" . ($rowCourses['idCourses']);
         $minutesHole8 = trim($_POST[$minutesHole8ID]);

         $minutesHole9ID = "minutesHole9_" . ($rowCourses['idCourses']);
         $minutesHole9 = trim($_POST[$minutesHole9ID]);

         $minutesHole10ID = "minutesHole10_" . ($rowCourses['idCourses']);
         $minutesHole10 = trim($_POST[$minutesHole10ID]);

         $minutesHole11ID = "minutesHole11_" . ($rowCourses['idCourses']);
         $minutesHole11 = trim($_POST[$minutesHole11ID]);

         $minutesHole12ID = "minutesHole12_" . ($rowCourses['idCourses']);
         $minutesHole12 = trim($_POST[$minutesHole12ID]);

         $minutesHole13ID = "minutesHole13_" . ($rowCourses['idCourses']);
         $minutesHole13 = trim($_POST[$minutesHole13ID]);

         $minutesHole14ID = "minutesHole14_" . ($rowCourses['idCourses']);
         $minutesHole14 = trim($_POST[$minutesHole14ID]);

         $minutesHole15ID = "minutesHole15_" . ($rowCourses['idCourses']);
         $minutesHole15 = trim($_POST[$minutesHole15ID]);

         $minutesHole16ID = "minutesHole16_" . ($rowCourses['idCourses']);
         $minutesHole16 = trim($_POST[$minutesHole16ID]);

         $minutesHole17ID = "minutesHole17_" . ($rowCourses['idCourses']);
         $minutesHole17 = trim($_POST[$minutesHole17ID]);

         $minutesHole18ID = "minutesHole18_" . ($rowCourses['idCourses']);
         $minutesHole18 = trim($_POST[$minutesHole18ID]);

         $minutesHole19ID = "minutesHole19_" . ($rowCourses['idCourses']);
         $minutesHole19 = trim($_POST[$minutesHole19ID]);

         $minutesHole20ID = "minutesHole20_" . ($rowCourses['idCourses']);
         $minutesHole20 = trim($_POST[$minutesHole20ID]);

         $minutesHole21ID = "minutesHole21_" . ($rowCourses['idCourses']);
         $minutesHole21 = trim($_POST[$minutesHole21ID]);

          $minutesHole22ID = "minutesHole22_" . ($rowCourses['idCourses']);
         $minutesHole22 = trim($_POST[$minutesHole22ID]);

         $minutesHole23ID = "minutesHole23_" . ($rowCourses['idCourses']);
         $minutesHole23 = trim($_POST[$minutesHole23ID]);

         $minutesHole24ID = "minutesHole24_" . ($rowCourses['idCourses']);
         $minutesHole24 = trim($_POST[$minutesHole24ID]);

         $minutesHole25ID = "minutesHole25_" . ($rowCourses['idCourses']);
         $minutesHole25 = trim($_POST[$minutesHole25ID]);

         $minutesHole26ID = "minutesHole26_" . ($rowCourses['idCourses']);
         $minutesHole26 = trim($_POST[$minutesHole26ID]);

         $minutesHole27ID = "minutesHole27_" . ($rowCourses['idCourses']);
         $minutesHole27 = trim($_POST[$minutesHole27ID]);

         $nineholeRoundsPolarID = "nineholeRoundsPolar" . $rowCourses['idCourses'];
         $nineholeRoundsPolar = trim($_POST[$nineholeRoundsPolarID]);
         if($nineholeRoundsPolar == "1")
          {$nineholeRoundsPolar = "Yes";}
         else if($nineholeRoundsPolar == "0")
          {$nineholeRoundsPolar = "No";}

         $halfwayHousePolarID = "halfwayHousePolar" . $rowCourses['idCourses'];
         $halfwayHousePolar = trim($_POST[$halfwayHousePolarID]);
         if($halfwayHousePolar == "1")
          {$halfwayHousePolar = "Yes";}
         else if($halfwayHousePolar == "0")
          {$halfwayHousePolar = "No";}


         $halfWayHouseTimeID = "halfWayHouseTime" . $rowCourses['idCourses'];
         $halfWayHouseTime = (trim($_POST[$halfWayHouseTimeID]));
         if($halfWayHouseTime == "")
          {$halfWayHouseTime = "-";}


         $tenthTeePolarID = "tenthTeePolar" . $rowCourses['idCourses'];
         $tenthTeePolar = trim($_POST[$tenthTeePolarID]);
         if($tenthTeePolar == "1")
          {$tenthTeePolar = "Yes";}
         else if($tenthTeePolar == "0")
          {$tenthTeePolar = "No";}


         $caddies = "";
         $leagues = "";
         $players = "";
         
        if(isset($_POST['caddies']))
        {$caddies = trim($_POST['caddies']);}

        if(isset($_POST['leagues']))
        {$leagues = trim($_POST['leagues']);}

        if(isset($_POST['players']))
        {$players = trim($_POST['players']);}


         $idCourse = $rowCourses['idCourses'];


          $course_name = $rowCourses['courseName'];


         $queryTest = "SELECT * FROM GoalTimes WHERE idCourses=".$idCourse;
          $resTest = mysql_query($queryTest);
          $count = mysql_num_rows($resTest);

      if(!$error){
        if($count == 0){

         if($idCourse != "0"){

          $queryHoles = "INSERT INTO GoalTimes (idCourses, idUSER, courseName, numHoles, hole1Par, hole2Par,hole3Par,hole4Par,hole5Par,hole6Par,hole7Par,hole8Par,hole9Par,hole10Par,hole11Par,hole12Par,hole13Par,hole14Par,hole15Par,hole16Par,hole17Par,hole18Par,hole19Par,hole20Par,hole21Par,hole22Par,hole23Par,hole24Par,hole25Par,hole26Par,hole27Par,hole1min, hole2min,hole3min,hole4min,hole5min,hole6min,hole7min,hole8min,hole9min,hole10min,hole11min,hole12min,hole13min,hole14min,hole15min,hole16min,hole17min,hole18min,hole19min,hole20min,hole21min,hole22min,hole23min,hole24min,hole25min,hole26min,hole27min,defaultTeeTimesWinter, defaultTeeTimesSummer, track9Hole, halfWayHouse, halfWayHouseTime, tenthTeeStart, caddies, leagues, players) VALUES ('$idCourse' ,'$idUSER', '$course_name','$holes','$parhole1','$parhole2','$parhole3','$parhole4','$parhole5','$parhole6','$parhole7','$parhole8','$parhole9','$parhole10','$parhole11','$parhole12','$parhole13','$parhole14','$parhole15','$parhole16','$parhole17','$parhole18','$parhole19','$parhole20','$parhole21','$parhole22','$parhole23','$parhole24','$parhole25','$parhole26','$parhole27', '$minutesHole1','$minutesHole2','$minutesHole3','$minutesHole4','$minutesHole5','$minutesHole6','$minutesHole7','$minutesHole8','$minutesHole9','$minutesHole10','$minutesHole11','$minutesHole12','$minutesHole13','$minutesHole14','$minutesHole15','$minutesHole16','$minutesHole17','$minutesHole18','$minutesHole19','$minutesHole20','$minutesHole21','$minutesHole22','$minutesHole23','$minutesHole24','$minutesHole25','$minutesHole26','$minutesHole27','$teeTimesWinter', '$teeTimesSummer', '$nineholeRoundsPolar', '$halfwayHousePolar', '$halfWayHouseTime', '$tenthTeePolar')";
          mysql_query($queryHoles);
          }
        }
        else {
         
            $queryHoles = "UPDATE GoalTimes SET idCourses='$idCourse', idUSER='$idUSER', courseName='$course_name', numHoles='$holes', hole1Par='$parhole1',hole2Par='$parhole2',hole3Par='$parhole3',hole4Par='$parhole4',hole5Par='$parhole5',hole6Par='$parhole6',hole7Par='$parhole7',hole8Par='$parhole8',hole9Par='$parhole9',hole10Par='$parhole10',hole11Par='$parhole11',hole12Par='$parhole12',hole13Par='$parhole13',hole14Par='$parhole14',hole15Par='$parhole15',hole16Par='$parhole16',hole17Par='$parhole17',hole18Par='$parhole18',hole19Par='$parhole19',hole20Par='$parhole20',hole21Par='$parhole21',hole22Par='$parhole22',hole23Par='$parhole23',hole24Par='$parhole24',hole25Par='$parhole25',hole26Par='$parhole26',hole27Par='$parhole27',hole1min='$minutesHole1',hole2min='$minutesHole2',hole3min='$minutesHole3',hole4min='$minutesHole4',hole5min='$minutesHole5',hole6min='$minutesHole6',hole7min='$minutesHole7',hole8min='$minutesHole8',hole9min='$minutesHole9',hole10min='$minutesHole10',hole11min='$minutesHole11',hole12min='$minutesHole12',hole13min='$minutesHole13',hole14min='$minutesHole14',hole15min='$minutesHole15',hole16min='$minutesHole16',hole17min='$minutesHole17',hole18min='$minutesHole18',hole19min='$minutesHole19',hole20min='$minutesHole20',hole21min='$minutesHole21',hole22min='$minutesHole22',hole23min='$minutesHole23',hole24min='$minutesHole24',hole25min='$minutesHole25',hole26min='$minutesHole26',hole27min='$minutesHole27',defaultTeeTimesWinter='$teeTimesWinter', defaultTeeTimesSummer='$teeTimesSummer', track9Hole='$nineholeRoundsPolar' , halfWayHouse='$halfwayHousePolar' , halfWayHouseTime='$halfWayHouseTime' , tenthTeeStart='$tenthTeePolar' WHERE idCourses='$idCourse'";
  
              mysql_query($queryHoles);
            }
        



      }




      $profilesAssign = test_input($_POST['profilesAssign']);
      $bookingSystemProvider = test_input($_POST['bookingSystemProvider']);
$contactPersonOther = "";
      $contactNumberOther = "";

      $emailOther = "";
      
      if($bookingSystemProvider != "other"){
        
        $contactPersonOther = "";
      $contactNumberOther = "";

      $emailOther = "";
      }
      else{
          $contactPersonOther = test_input($_POST['contactPersonOther']);
      $contactNumberOther = test_input($_POST['contactNumberOther']);

      $emailOther = test_input($_POST['emailOther']);
      }
      

      

      $queryTest = "SELECT * FROM Profiles WHERE idUSER=".$idUSER;
      $resTest = mysql_query($queryTest);
      $count = mysql_num_rows($resTest);

      if($count == 0){

        $queryProfile = "INSERT INTO Profiles (idUSER, profileAssign, bookingSysProvider, otherContactPerson, otherContactNum, otherEmailAddress, caddies, leagues, players) VALUES ('$idUSER', '$profilesAssign', '$bookingSystemProvider', '$contactPersonOther', '$contactNumberOther', '$emailOther', '$caddies', '$leagues', '$players')";
        mysql_query($queryProfile);
        header("Location: courses.php");
      }
      else{

          $query = "UPDATE Profiles SET idUSER='$idUSER', profileAssign='$profilesAssign', bookingSysProvider='$bookingSystemProvider', otherContactPerson='$contactPersonOther', otherContactNum='$contactNumberOther', otherEmailAddress='$emailOther', caddies='$caddies', leagues='$leagues', players='$players' WHERE idUSER='$idUSER'";
  
              mysql_query($query);
              header("Location: courses.php");

        }


  }
}


  function test_input($data){
      $data = trim($data);
      $data = strip_tags($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    return $data;
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
<style type="text/css">
  .btn-primary{
      float:right !important;
      margin-top: 12px;}
  
#navText{color: #8ABE40 !important;}
</style>
<style type="text/css">
  [class^="icon-flag-"], [class*=" icon-flag-"] {
display: inline-block !important;
}
  #panel{
 
    background:white;
    border:2px solid black;
}
.course_delete{
   
         width: 44px;
    border-radius: 32px;
    line-height: 44px;
    background-color: #8cbb2b;
    box-shadow: 5px 2px 5px grey;
    color: red;
    margin-right: -19px;
  cursor: pointer;
}
.checkboxFour {
    width: 27px;
    height: 27px;
    background: #fff;
    padding: 0;
    margin-bottom: 6px;
    border-radius: 50%;
    position: relative;
    -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
    -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
    box-shadow: 0 1px 3px rgba(0,0,0,0.5);
}

.txt:hover {
    text-decoration: underline;
}

.showflag {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 1px solid #f3f3f3;
    color: #f3f3f3;
    display: inline-block;
    background: #8ABE40;
    margin: 0;
    padding: 0;
}

input[type=radio], input[type=checkbox] {
    margin: 4px 7px 0 0;
    line-height: normal;
    font-size: 21px;
    /* display: inherit; */
    /* float: left; */
    text-align: center;
    /* display: none; */
}
.checkboxFour input[type=radio]:checked + label {
    background: #8ABE40;
}

.checkboxFour input[type=checkbox]:checked + label {
    background: #8ABE40;
}

input[type="checkbox"], input[type="radio"] {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
}

.showflag {
    margin-bottom: 12px;
    padding-left: 32px;
    position: relative;
    -webkit-transition: color .25s linear;
    transition: color .25s linear;
    font-size: 14px;
    line-height: 1.5;
    width: 30%;
}
.checkboxFour label {
    display: block;
    width: 23px;
    height: 23px;
    border-radius: 100px;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    -o-transition: all .5s ease;
    -ms-transition: all .5s ease;
    transition: all .5s ease;
    cursor: pointer;
    position: absolute;
    top: 2px;
    left: 2px;
    z-index: 1;
    /* background: #8ABE40; */
    background: #aaa;
    -webkit-box-shadow: inset 0 1px 3px rgba(0,0,0,0.5);
    -moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.5);
    box-shadow: inset 0 1px 3px rgba(0,0,0,0.5);
}

.error{color: #FF0000;}

#navText{color: #8ABE40 !important;}
</style>

</head>
<body onload="restoreValues()">

	<nav class="navbar navbar-default navbar-fixed-top"  style="background:#373737;">
      <div class="container-fluid">
    
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
    
   <div class="collapse navbar-collapse"> 
        
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="home.php" id="navText" class="inactiveLink">Facility info</a></li>
            <li ><a href="order_details.php" id="navText" class="inactiveLink">OrderDetails</a></li>
            <li class="active"><a href="course_info.php"  class="inactiveLink">Course info</a></li>
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
    </div>
    </nav> 

	<div id="wrapper">

	<div class="container">
   
    	<div class="page-header">
      

      
    	<h1>Tagmarshal On-boarding: <?php echo $_SESSION['course_name']; ?></h1>
    	</div>

     
        <span class="error" style="color:red;"><?php echo $holesErr ;?></span>
        <div class="row">
        	<div class="col-lg-12" style="margin-bottom: 40px;">
        	

		<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post" enctype="multipart/form-data">

<fieldset>

<!-- Course Information -->
<legend>Course information</legend>
 

<?php  
 
    
      
  while($rowCourses = mysql_fetch_assoc($resCourses)) { ?>
        <legend>Goal Times: <?php echo $rowCourses["courseName"]; ?>  <?php echo '<button class="btn btn-primary"  type="button" data-toggle="collapse" data-target="#section'.$rowCourses['idCourses'].'" aria-expanded="true" aria-controls="section'.$rowCourses['idCourses'].'" > Show/Hide </button>' ;?>
    </legend>
        <!-- Select Basic -->

 <?php echo '<div id="section'.$rowCourses['idCourses'].'"   name= "section'.$rowCourses['idCourses'].'"  class="collapse" >' ?>
 <div class="form-group">
  <label class="col-md-4 control-label" for="holes">Number of Holes</label>
  <div class="col-md-4">
    <?php echo '<select id="'.$rowCourses['idCourses'].'"   name= "holes'.$rowCourses['idCourses'].'" class="form-control" onchange="holesSelectCheck(this,this.id)">' ?>
      <option  value="" selected="true" disabled="true" >Select holes</option>
      <option id="holeOption1" value="9"  >9</option>
      <option id="holeOption2" value="18" >18</option>
      <option id="holeOption3" value="27">27</option>
     
    </select>
  </div>
</div>
 <?php echo '<table  id="holeTable'.$rowCourses['idCourses'].'"    class="table table-bordered table-inverse" >' ?>

<thead class="table-head">
  <tr>
      <td style="width:30%;"><label class="control-label" for="holes" >Hole Details</label></td>
      <td style="width:30%;"><label class="control-label" for="holes" >Par</label></td>
      <td style="width:30%;"><label class="control-label" for="holes" >Minutes Assigned</label></td>
  </tr> 
</thead>

<tbody>


</tbody>
</table>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="teeTimesWinter">Default Tee Times Winter</label>  
  <div class="col-md-4">

  <?php echo '<input id="teeTimesWinter'.$rowCourses['idCourses'].'" name= "teeTimesWinter'.$rowCourses['idCourses'].'" type="text" placeholder="e.g. start @ 10:00 with 10 minute intervals until 13:00" class="form-control input-md">' ?>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="teeTimesSummer">Default Tee Times Summer</label>  
  <div class="col-md-4">
  
    <?php echo '<input id="teeTimesSummer'.$rowCourses['idCourses'].'" name="teeTimesSummer'.$rowCourses['idCourses'].'" type="text" placeholder="e.g. start @ 10:00 with 10 minute intervals until 13:00" class="form-control input-md">' ?>  
  </div>
</div>



<!-- multi-course facility? -->
<div class="form-group">
  <label class="col-md-4 control-label" for="nineholeRoundsPolar">Do you track 9 hole rounds?</label>
  <div class="col-md-4">
  <div class="checkboxFour">
      <?php echo '<input type="radio" name="nineholeRoundsPolar'.$rowCourses['idCourses'].'" class="showflag" id="'.$rowCourses['idCourses'].'_9holeRoundsPolar-0" value="1" checked="checked" style="margin-left: 6px;">' ?>
      
      <label for="<?php echo $rowCourses['idCourses'];?>_9holeRoundsPolar-0"></label>
     <h5 style="margin-top: -20px; margin-left: 35px;">Yes</h5>
   
  </div>


  <div class="checkboxFour">
      <?php echo '<input type="radio" name="nineholeRoundsPolar'.$rowCourses['idCourses'].'" class="showflag" id="'.$rowCourses['idCourses'].'_9holeRoundsPolar-1" value="0" style="margin-left: 6px;">' ?>
   
      <label for="<?php echo $rowCourses['idCourses'];?>_9holeRoundsPolar-1"> </label>
      <h5 style="margin-top: -20px; margin-left: 35px;">No</h5>
     
  </div>
  </div>
</div>
<!-- multi-course facility? -->

<div class="form-group">
  <label class="col-md-4 control-label" for="halfwayHousePolar">Do you have a half way house?</label>
  <div class="col-md-4">
  <div class="checkboxFour">
      <?php echo '<input type="radio" name="halfwayHousePolar'.$rowCourses['idCourses'].'" class="showflag" id="'.$rowCourses['idCourses'].'_y" value="1"  onclick="yesHalfWayHouseCheck(this.id);" style="margin-left: 6px;">' ?>
      
      <label for="<?php echo $rowCourses['idCourses']; ?>_y"></label>
     <h5 style="margin-top: -20px; margin-left: 35px;">Yes</h5>
   
  </div>


  <div class="checkboxFour">
      <?php echo '<input type="radio" name="halfwayHousePolar'.$rowCourses['idCourses'].'" class="showflag" id="'.$rowCourses['idCourses'].'_n" value="0" checked="checked" onclick="javascript:noHalfWayHouseCheck(this.id);" style="margin-left: 6px;">' ?>
   
      <label for="<?php echo $rowCourses['idCourses']; ?>_n"> </label>
      <h5 style="margin-top: -20px; margin-left: 35px;">No</h5>
     
  </div>
  </div>
</div>






<!-- Text input-->
<?php echo '<div class="form-group" id="'.$rowCourses['idCourses'].'_time" style="display:none;" >' ?>

  <label class="col-md-4 control-label" for="cartYear">How much time do you allow?</label>  
  <div class="col-md-4" style="display: inline-flex;">
  
    <?php echo '<input id="halfWayHouseTime'.$rowCourses['idCourses'].'" type="number" step="1" class="form-control input-md" name="halfWayHouseTime'.$rowCourses['idCourses'].'"  >' ?> <label style="font-weight: bold;">minutes</label>
  </div>
</div>


<!-- multi-course facility? -->
<div class="form-group">
  <label class="col-md-4 control-label" for="halfwayHousePolar">Do you have a 10th Tee start?</label>
  <div class="col-md-4">
  <div class="checkboxFour">
      <?php echo '<input type="radio" name="tenthTeePolar'.$rowCourses['idCourses'].'" class="showflag" id="'.$rowCourses['idCourses'].'_10thTeePolar-0" value="1" checked="checked" style="margin-left: 6px;">' ?>
      
      <label for="<?php echo $rowCourses['idCourses']; ?>_10thTeePolar-0"></label>
     <h5 style="margin-top: -20px; margin-left: 35px;">Yes</h5>
   
  </div>


  <div class="checkboxFour">
      <?php echo '<input type="radio" name="tenthTeePolar'.$rowCourses['idCourses'].'" class="showflag" id="'.$rowCourses['idCourses'].'_10thTeePolar-1" value="0" style="margin-left: 6px;">' ?>
   
      <label for="<?php echo $rowCourses['idCourses']; ?>_10thTeePolar-1"> </label>
      <h5 style="margin-top: -20px; margin-left: 35px;">No</h5>
     
  </div>
  </div>
</div>







</div>
 <?php } ?>






<legend>Profiles</legend>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="profiles">Who will you be creating profiles for?</label>
  <div class="col-md-4">
    <div class="checkboxFour">
      <?php echo '<input type="checkbox" name="caddies" class="showflag" id="caddiesCheckBox" value="1"  style="margin-left: 6px;" onclick="caddiesChecked()">' ?>
      
      <label for="caddiesCheckBox"></label>
     <h5 style="margin-top: -20px; margin-left: 35px;">Caddies</h5>
   
  </div>


  <div class="checkboxFour">
      <?php echo '<input type="checkbox" name="leagues" class="showflag" id="leaguesCheckBox" value="1" style="margin-left: 6px;" onclick="leaguesChecked()">' ?>
   
      <label for="leaguesCheckBox"> </label>
      <h5 style="margin-top: -20px; margin-left: 35px;">Leagues</h5>
     
  </div>
    
 <div class="checkboxFour">
      <?php echo '<input type="checkbox" name="players" class="showflag" id="playersCheckBox" value="1" style="margin-left: 6px;" onclick="playersChecked()">' ?>
   
      <label for="playersCheckBox"> </label>
      <h5 style="margin-top: -20px; margin-left: 35px;">Players</h5>
     
  </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group" id="fileToUpload" style="display: none;">
  <label class="col-md-4 control-label" for="playerDb">Please attach Caddie database</label>  
  <div class="col-md-4">
  <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
 
  <input name="fileToUpload2" type="file"  class="form-control input-md" >
  <span id="dbFile2"></span>
  </div>
</div>


<div class="form-group" id="fileToUpload1" style="display: none;">
  <label class="col-md-4 control-label" for="playerDb">Please attach League database</label>  
  <div class="col-md-4">
  <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
  
  <input name="fileToUpload1" type="file"  class="form-control input-md" >
  <span id="dbFile1"></span>
  
  </div>
</div>

<div class="form-group" id="fileToUpload2" style="display: none;">
  <label class="col-md-4 control-label" for="playerDb">Please attach Player database</label>  
  <div class="col-md-4">
  <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
  <input name="fileToUpload" type="file"  class="form-control input-md" >
    <span id="dbFile"></span>
  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group" id="bsProvider" style="display:none">
  <label class="col-md-4 control-label" for="bookingSystemProvider">Who is your Booking Systems Provider</label>
  <div class="col-md-4">
    <select id="bookingSystemProvider" name="bookingSystemProvider" class="form-control" onchange="providerSelectCheck(this)">
      <option value="" selected="selected" disabled="disabled">Please select BSP</option>
      <option value="GN Reservation">GN Reservation</option>
      <option value="Chelsea">Chelsea</option>
      <option value="ClubMaster">Club Master</option>
      <option value="ClubEssential">Club Essential</option>
      <option value="FourTees">Four Tees</option>
      <option value="EasyLinks">Easy Links</option>
        <option value="Jonas">Jonas</option>
      <option id="otherProvider" value="other">Other</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group" id="otherProviderLabel" style="display: none;">
  <label class="col-md-4 control-label" >Other,</label>  
  <div class="col-md-4">
  
  </div>
</div>
<!-- Text input-->
<div class="form-group" id="otherProviderPerson" style="display: none;">
  <label class="col-md-4 control-label" for="contactPersonOther" ">Contact Person</label>  
  <div class="col-md-4">
  <input id="contactPersonOther" name="contactPersonOther" type="text" placeholder="e.g. Leticia Fisher" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group" id="otherProviderNumber" style="display: none;">
  <label class="col-md-4 control-label" for="contactNumber" >Contact Number</label>  
  <div class="col-md-4">
  <input id="contactNumberOther" name="contactNumberOther" type="text" placeholder="e.g 0214613696" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group" id="otherProviderEmail" style="display: none;">
  <label class="col-md-4 control-label" for="email" >Email Address</label>  
  <div class="col-md-4">
  <input id="emailOther" name="emailOther" type="text" placeholder="e.g leticia.fisher@tagmarshal.com" class="form-control input-md">
    
  </div>
</div>





</fieldset>



<div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4" style="text-align: center;">
       <input id= "back" type="button" class="btn btn-default" onclick="courseInfoBack()" value="BACK" style="width:40% !important;float:left;"></input><button id="save" type="submit" class="btn" name="save-courseInfo" btn-default" style="width:40% !important;MARGIN-LEFT: 43PX !important;float:right;background-color: #8abe40; border-color: #8abe40;">SUBMIT</button>
    </div>
  </div>

 
</form>
</div>

		
        	</div>
    </div>
    
    </div>


<script type="text/javascript">
  $(document).ready(function() {
   $('input[type="radio"]').click(function() {
       if($(this).attr('id') == 'halfwayHousePolar-0') {
            $('#show-min').show();  
            $('#show-min1').show();  
            $('#halfWayHouseTime').val("") ;        
       }

       else if($(this).attr('id') == 'halfwayHousePolar-1'){
            $('#show-min').hide();
            $('#show-min1').hide(); 


       }
   });
});
</script>>


    <script type="text/javascript">
id="'.$rowCourses['idCourses'].'_yes_time"
        function yesHalfWayHouseCheck(id) {
            var idMod = id.slice(0, -1);
            if (document.getElementById(id).checked) {
                document.getElementById(idMod+"time").style.display = 'block';
            }
            //alert("Id is:"+idMod);
          }

        function noHalfWayHouseCheck(id) {
            var idMod = id.slice(0, -1);
            if (document.getElementById(id).checked) {
                document.getElementById(idMod+"time").style.display = 'none';
            }
            //alert("Id is:"+idMod);
          }
   
       function courseInfoBack()
        {
          location.href = "order_details.php";
        }
         function courseInfoSave()
        {
          location.href = "courses.php";
        }
   
       function providerSelectCheck(nameSelect)
      {
          providerOptionValue = document.getElementById("otherProvider").value;
          if(providerOptionValue == nameSelect.value){
            document.getElementById("otherProviderLabel").style.display = "block";
            document.getElementById("otherProviderPerson").style.display = "block";
            document.getElementById("otherProviderNumber").style.display = "block";
            document.getElementById("otherProviderEmail").style.display = "block";
           
          }
          else{
            document.getElementById("otherProviderLabel").style.display = "none";
             document.getElementById("otherProviderPerson").style.display = "none";
            document.getElementById("otherProviderNumber").style.display = "none";
            document.getElementById("otherProviderEmail").style.display = "none";
          }
      }

  

    function playersSelectCheck(nameSelect)
    {
    playerOptionValue = document.getElementById("playerProfiles").value;
    if(playerOptionValue==nameSelect.value){
        document.getElementById("bsProvider").style.display = "block";
    }
     else{
      document.getElementById("bsProvider").style.display = "none";
     }

   }

   function restoreValues()
{
  $(".collapse").collapse('show');

    <?php  

    $resFacilityDetails=mysql_query("SELECT * FROM GoalTimes WHERE idUSER=".$_SESSION['user']);
    while ($goalTimesRow=mysql_fetch_array($resFacilityDetails)){
    
      ?>

      if("<?php echo $goalTimesRow['track9Hole'];?>" =="Yes")
        {
          document.getElementById('<?php echo $goalTimesRow['idCourses'];?>_9holeRoundsPolar-0').checked=true;
        }
        else if("<?php echo $goalTimesRow['track9Hole'];?>" =="No")
        {
          document.getElementById('<?php echo $goalTimesRow['idCourses'];?>_9holeRoundsPolar-1').checked=true;
        }
        //


         if("<?php echo $goalTimesRow['halfWayHouse'];?>" =="Yes")
        {
          document.getElementById('<?php echo $goalTimesRow['idCourses'];?>_y').checked=true;
          document.getElementById('<?php echo $goalTimesRow['idCourses'];?>_time').style.display="block";
        }
        else if("<?php echo $goalTimesRow['halfWayHouse'];?>" =="No")
        {
          document.getElementById('<?php echo $goalTimesRow['idCourses'];?>_n').checked=true;
          document.getElementById('<?php echo $goalTimesRow['idCourses'];?>_time').style.display="none";
        }
        //
         if("<?php echo $goalTimesRow['tenthTeeStart'];?>" =="Yes")
        {
          document.getElementById('<?php echo $goalTimesRow['idCourses'];?>_10thTeePolar-0').checked=true;
        }
        else if("<?php echo $goalTimesRow['tenthTeeStart'];?>" =="No")
        {
          document.getElementById('<?php echo $goalTimesRow['idCourses'];?>_10thTeePolar-1').checked=true;
        }

        document.getElementById('halfWayHouseTime<?php echo $goalTimesRow['idCourses'];?>').value="<?php echo $goalTimesRow['halfWayHouseTime'];?>";
        //
           
      if("<?php echo $goalTimesRow['numHoles'];?>" =="0"){}
      else{
      document.getElementById('<?php echo $goalTimesRow['idCourses'];?>').value="<?php echo $goalTimesRow['numHoles'];?>";
    }
       document.getElementById('teeTimesWinter<?php echo $goalTimesRow['idCourses'];?>').value="<?php echo $goalTimesRow['defaultTeeTimesWinter'];?>";
       document.getElementById('teeTimesSummer<?php echo $goalTimesRow['idCourses'];?>').value="<?php echo $goalTimesRow['defaultTeeTimesSummer'];?>";
      
        var tableId = "<?php echo $goalTimesRow['idCourses'];?>";
        var tableIDCon = "holeTable"+tableId;
    var tableRef = document.getElementById(tableIDCon);
        

       while(tableRef.rows.length > 1) {
                  tableRef.deleteRow(1);
                }
    
       if(document.getElementById('<?php echo $goalTimesRow['idCourses'];?>').value == "9"){
       
           for (i = 1; i < 10; i++) { 

            
              var row = tableRef.insertRow(-1);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
                  cell1.innerHTML = "Hole"+i;
                  cell2.innerHTML = "<div class='col-md-12' style='padding-left: 0;'> <select id='parhole"+i+"_"+tableId+"' name='parhole"+i+"_"+tableId+"' class='form-control' onchange='parSelectCheck(this)'> <option value='3' selected='selected'>3</option> <option value='4'>4</option> <option value='5'>5</option> </select> </div>";
                  cell3.innerHTML = "<div class='col-md-12' style='padding-left: 0;display: flex;'><input class='form-control input-md' step='1' type='number' max='120' id='minutesHole"+i+"_"+tableId+"' name='minutesHole"+i+"_"+tableId+"' value='14' ><label >minutes</label></div>";
            }
        }
        else if(document.getElementById('<?php echo $goalTimesRow['idCourses'];?>').value == 18){
         
            for (i = 1; i < 19; i++) { 
              
               
               
                var row = tableRef.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                  cell1.innerHTML = "Hole"+i;
                  cell2.innerHTML = "<div class='col-md-12' style='padding-left: 0;'> <select id='parhole"+i+"_"+tableId+"' name='parhole"+i+"_"+tableId+"' class='form-control' onchange='parSelectCheck(this)'> <option value='3' selected='selected'>3</option> <option value='4'>4</option> <option value='5'>5</option> </select> </div>";
                  cell3.innerHTML = "<div class='col-md-12' style='padding-left: 0;display: flex;'><input class='form-control input-md' step='1' type='number' max='120' id='minutesHole"+i+"_"+tableId+"' name='minutesHole"+i+"_"+tableId+"' value='14' ><label >minutes</label></div>";
            }
        }
        else if(document.getElementById('<?php echo $goalTimesRow['idCourses'];?>').value == 27){
        
              for (i = 1; i < 28; i++) {
             
                  
                  var row = tableRef.insertRow(-1);
                  var cell1 = row.insertCell(0);
                  var cell2 = row.insertCell(1);
                  var cell3 = row.insertCell(2);
                  cell1.innerHTML = "Hole"+i;
                  cell2.innerHTML = "<div class='col-md-12' style='padding-left: 0;'> <select id='parhole"+i+"_"+tableId+"' name='parhole"+i+"_"+tableId+"' class='form-control' onchange='parSelectCheck(this)'> <option value='3' selected='selected'>3</option> <option value='4'>4</option> <option value='5'>5</option> </select> </div>";
                  cell3.innerHTML = "<div class='col-md-12' style='padding-left: 0;display: flex;'><input class='form-control input-md' step='1' type='number' max='120' id='minutesHole"+i+"_"+tableId+"' name='minutesHole"+i+"_"+tableId+"' value='14' ><label>minutes</label></div>";
                }
        }




    <?php  
  }

  $resFile=mysql_query("SELECT * FROM DatabaseFiles WHERE idUSER=".$_SESSION['user']);
   $fileRow=mysql_fetch_array($resFile);
   $countFile = mysql_num_rows($resFile);
   if($countFile > 0)
   {?>

          document.getElementById("dbFile").innerHTML="<?php echo $fileRow['name'];?> <p   id='<?php echo $fileRow['name'];?>' onclick='removeFile(this.id)' style='color:#7cab3a;display: inherit;'>:Upload another file to replace</p>";


    <?php
  }
    $resFacilityDetails=mysql_query("SELECT * FROM Profiles WHERE idUSER=".$_SESSION['user']);
    $facilityDetailsRow=mysql_fetch_array($resFacilityDetails);
    $countFacility = mysql_num_rows($resFacilityDetails);
      ?>
        if("<?php echo $facilityDetailsRow['profileAssign'];?>" == "")
        {}
        else
        {
          document.getElementById('profilesAssign').value="<?php echo $facilityDetailsRow['profileAssign'];?>";
        }

         if("<?php echo $facilityDetailsRow['caddies'];?>" =="1")
        {
          document.getElementById('caddiesCheckBox').checked=true;
          if(document.getElementById("caddiesCheckBox").checked== true)
          {document.getElementById("fileToUpload").style.display = "block";}
          else{document.getElementById("fileToUpload").style.display = "none";}
        }
        //
         if("<?php echo $facilityDetailsRow['leagues'];?>" =="1")
        {
          document.getElementById('leaguesCheckBox').checked=true;
          if(document.getElementById("leaguesCheckBox").checked== true)
          {document.getElementById("fileToUpload1").style.display = "block";}
          else{document.getElementById("fileToUpload1").style.display = "none";}
        }
         if("<?php echo $facilityDetailsRow['players'];?>" =="1")
        {
          document.getElementById('playersCheckBox').checked=true;
          if(document.getElementById("playersCheckBox").checked== true)
          {document.getElementById("fileToUpload2").style.display = "block";
            document.getElementById("bsProvider").style.display = "block";
          }
          else{document.getElementById("fileToUpload2").style.display = "none";
                document.getElementById("bsProvider").style.display = "none";
          }
        }

        if("<?php echo $facilityDetailsRow['bookingSysProvider'];?>" !=""){
          document.getElementById('bookingSystemProvider').value="<?php echo $facilityDetailsRow['bookingSysProvider'];?>";
          if(document.getElementById('bookingSystemProvider').value =='other')
            {
              document.getElementById("otherProviderLabel").style.display = "block";
                document.getElementById("otherProviderPerson").style.display = "block";
                document.getElementById("otherProviderNumber").style.display = "block";
                document.getElementById("otherProviderEmail").style.display = "block";

                document.getElementById('contactPersonOther').value="<?php echo $facilityDetailsRow['otherContactPerson'];?>";
                document.getElementById('contactNumberOther').value="<?php echo $facilityDetailsRow['otherContactNum'];?>";
                document.getElementById('emailOther').value="<?php echo $facilityDetailsRow['otherEmailAddress'];?>";
            }
            else
            {
              document.getElementById("otherProviderLabel").style.display = "none";
                document.getElementById("otherProviderPerson").style.display = "none";
                document.getElementById("otherProviderNumber").style.display = "none";
                document.getElementById("otherProviderEmail").style.display = "none";

                document.getElementById('otherProviderPerson').value="";
                document.getElementById('otherProviderNumber').value="";
                document.getElementById('otherProviderEmail').value="";
            }
        }
          else{
        
           }
        //
        
        
        /*if(document.getElementById('profilesAssign').value =='Players')
        {
          document.getElementById("bsProvider").style.display = "block";
        }
        else
        {
          document.getElementById("bsProvider").style.display = "none";
        }*/

        
        if(document.getElementById('bookingSystemProvider').value =='other')
        {
          document.getElementById("otherProviderLabel").style.display = "block";
            document.getElementById("otherProviderPerson").style.display = "block";
            document.getElementById("otherProviderNumber").style.display = "block";
            document.getElementById("otherProviderEmail").style.display = "block";

            document.getElementById('contactPersonOther').value="<?php echo $facilityDetailsRow['otherContactPerson'];?>";
            document.getElementById('contactNumberOther').value="<?php echo $facilityDetailsRow['otherContactNum'];?>";
            document.getElementById('emailOther').value="<?php echo $facilityDetailsRow['otherEmailAddress'];?>";
        }
        else
        {
          document.getElementById("otherProviderLabel").style.display = "none";
            document.getElementById("otherProviderPerson").style.display = "none";
            document.getElementById("otherProviderNumber").style.display = "none";
            document.getElementById("otherProviderEmail").style.display = "none";

            document.getElementById('otherProviderPerson').value="";
            document.getElementById('otherProviderNumber').value="";
            document.getElementById('otherProviderEmail').value="";
        }


}


   function parSelectCheck(nameSelect)
    {
    par3OptionValue = 3;
    par4OptionValue = 4;
    par5OptionValue = 5;
    var lastChar ="";
    var id = nameSelect.id;
    if(id.length == 16){
      lastChar = id.substr(id.length - 9); // => "2"
    }
    if(id.length == 15){
      lastChar = id.substr(id.length - 8); // => "2"
    }
    if(id.length == 14){
      lastChar = id.substr(id.length - 7); // => "2"
    }
    if(id.length == 13){
      lastChar = id.substr(id.length - 6); // => "2"
    }
    else if(id.length == 12){
      var lastChar = id.substr(id.length - 5); // => "2"
    }
    else if(id.length == 11){
      var lastChar = id.substr(id.length - 4); // => "2"
    }
    else if(id.length == 10){
      var lastChar = id.substr(id.length - 3); // => "2"
    }
    
    

    if(par3OptionValue==nameSelect.value){
       
        
        document.getElementById("minutesHole"+lastChar).value = 14;
    }
    else if(par4OptionValue==nameSelect.value){
     
       document.getElementById("minutesHole"+lastChar).value = 15;
       
    }
    else if(par5OptionValue==nameSelect.value){
        document.getElementById("minutesHole"+lastChar).value = 16;
       
    }
     
   }


    function holesSelectCheck(nameSelect, tableId)
    {
    var tableIDCon = "holeTable"+tableId;
    var tableRef = document.getElementById(tableIDCon);
    

       while(tableRef.rows.length > 1) {
                  tableRef.deleteRow(1);
                }
    
    console.log(nameSelect);
    console.log(tableId);
    if(nameSelect){
        holeOption1Value = document.getElementById("holeOption1").value;
        holeOption2Value = document.getElementById("holeOption2").value;
        holeOption3Value = document.getElementById("holeOption3").value;
        if(holeOption1Value == nameSelect.value){
       
           for (i = 1; i < 10; i++) { 

            
              var row = tableRef.insertRow(-1);
              var cell1 = row.insertCell(0);
              var cell2 = row.insertCell(1);
              var cell3 = row.insertCell(2);
                  cell1.innerHTML = "Hole"+i;
                  cell2.innerHTML = "<div class='col-md-12' style='padding-left: 0;'> <select id='parhole"+i+"_"+tableId+"' name='parhole"+i+"_"+tableId+"' class='form-control' onchange='parSelectCheck(this)'> <option value='3' selected='selected'>3</option> <option value='4'>4</option> <option value='5'>5</option> </select> </div>";
                  cell3.innerHTML = "<div class='col-md-12' style='padding-left: 0;display: flex;'><input class='form-control input-md' step='1' type='number' max='120' id='minutesHole"+i+"_"+tableId+"' name='minutesHole"+i+"_"+tableId+"' value='14' ><label >minutes</label></div>";
            }
        }
        else if(holeOption2Value == nameSelect.value){
         
            for (i = 1; i < 19; i++) { 
              
               
               
                var row = tableRef.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                  cell1.innerHTML = "Hole"+i;
                  cell2.innerHTML = "<div class='col-md-12' style='padding-left: 0;'> <select id='parhole"+i+"_"+tableId+"' name='parhole"+i+"_"+tableId+"' class='form-control' onchange='parSelectCheck(this)'> <option value='3' selected='selected'>3</option> <option value='4'>4</option> <option value='5'>5</option> </select> </div>";
                  cell3.innerHTML = "<div class='col-md-12' style='padding-left: 0;display: flex;'><input class='form-control input-md' step='1' type='number' max='120' id='minutesHole"+i+"_"+tableId+"' name='minutesHole"+i+"_"+tableId+"' value='14' ><label >minutes</label></div>";
            }
        }
        else if(holeOption3Value == nameSelect.value){
        
              for (i = 1; i < 28; i++) {
             
                  
                  var row = tableRef.insertRow(-1);
                  var cell1 = row.insertCell(0);
                  var cell2 = row.insertCell(1);
                  var cell3 = row.insertCell(2);
                  cell1.innerHTML = "Hole"+i;
                  cell2.innerHTML = "<div class='col-md-12' style='padding-left: 0;'> <select id='parhole"+i+"_"+tableId+"' name='parhole"+i+"_"+tableId+"' class='form-control' onchange='parSelectCheck(this)'> <option value='3' selected='selected'>3</option> <option value='4'>4</option> <option value='5'>5</option> </select> </div>";
                  cell3.innerHTML = "<div class='col-md-12' style='padding-left: 0;display: flex;'><input class='form-control input-md' step='1' type='number' max='120' id='minutesHole"+i+"_"+tableId+"' name='minutesHole"+i+"_"+tableId+"' value='14' ><label>minutes</label></div>";
                }
        }
    }
    else{
        document.getElementById("admDivCheck").style.display = "none";
    }
}
    </script>


    <script type="text/javascript">
        function caddiesChecked()
        {
          if(document.getElementById("caddiesCheckBox").checked== true)
          {document.getElementById("fileToUpload").style.display = "block";}
          else{document.getElementById("fileToUpload").style.display = "none";}
        }
        function leaguesChecked()
        {
          if(document.getElementById("leaguesCheckBox").checked== true)
          {document.getElementById("fileToUpload1").style.display = "block";}
          else{document.getElementById("fileToUpload1").style.display = "none";}
        }

        function playersChecked()
        {
           if(document.getElementById("playersCheckBox").checked== true)
          {

            document.getElementById("fileToUpload2").style.display = "block";

            document.getElementById("bsProvider").style.display = "block";
            }
          
          else{document.getElementById("fileToUpload2").style.display = "none";
            document.getElementById("bsProvider").style.display = "none";
          }
        }



        function courseInfoBack()
        {
          location.href = "order_details.php";
        }
        function orderDetailsBack()
        {
          location.href = "home.php";
        }
        function removeFile(id)
    {
          <?php
  
              $resDeleteFile=mysql_query("DELETE FROM DatabaseFile WHERE idUSER=".$_SESSION['user']);


              
          ?>
          document.getElementById("otherProviderLabel").style.display = "none";
      }
    </script>
    <script>
    
function myFunction() {
    var x = document.getElementById("myTime").value;
    document.getElementById("demo").innerHTML = x;
}
</script>

 <script>


var CourseNamesArray = new Array();
function addProfiles()
{

     
  var courseName = document.getElementById('course_name').value;
  CourseNamesArray.push(courseName);
  
  document.getElementById('jsarray').value = CourseNamesArray;

   
}</script>
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>