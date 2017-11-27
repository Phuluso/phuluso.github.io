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
  
  $error = false;
if( isset($_POST['save-orderDetails']) ) {

  $salesRep = trim($_POST['salesRep']);
  $salesRep = strip_tags($salesRep);
  $salesRep = htmlspecialchars($salesRep);

  $walkingTagsQTY = trim($_POST['walkingTagsQTY']);
  $walkingTagsQTY = strip_tags($walkingTagsQTY);
  $walkingTagsQTY = htmlspecialchars($walkingTagsQTY);

  $marshalTagsQTY = trim($_POST['marshalTagsQTY']);
  $marshalTagsQTY = strip_tags($marshalTagsQTY);
  $marshalTagsQTY = htmlspecialchars($marshalTagsQTY);


  $cartQuantityQTY = trim($_POST['cartQuantityQTY']);
  $cartQuantityQTY = strip_tags($cartQuantityQTY);
  $cartQuantityQTY = htmlspecialchars($cartQuantityQTY);

  $cartMake = trim($_POST['cartMake']);
  $cartMake= strip_tags($cartMake);
  $cartMake= htmlspecialchars($cartMake);

  $cartYear = trim($_POST['cartYear']);
  $cartYear = strip_tags($cartYear);
  $cartYear = htmlspecialchars($cartYear);
  
  $cartModel = trim($_POST['cartModel']);
  $cartModel = strip_tags($cartModel);
  $cartModel = htmlspecialchars($cartModel);

  $commentCart = trim($_POST['commentCart']);
  $commentCart = strip_tags($commentCart);
  $commentCart = htmlspecialchars($commentCart);
 
  $upgradeCart = trim($_POST['upgradeCart']);
  $upgradeCart = strip_tags($upgradeCart);
  $upgradeCart = htmlspecialchars($upgradeCart);
  
  $supQuantityQTY = trim($_POST['supQuantityQTY']);
  $supQuantityQTY = strip_tags($supQuantityQTY);
  $supQuantityQTY = htmlspecialchars($supQuantityQTY);

  $supMake = trim($_POST['supMake']);
  $supMake = strip_tags($supMake);
  $supMake = htmlspecialchars($supMake);

  $supYear = trim($_POST['supYear']);
  $supYear = strip_tags($supYear);
  $supYear = htmlspecialchars($supYear);

  $supModel = trim($_POST['supModel']);
  $supModel = strip_tags($supModel);
  $supModel = htmlspecialchars($supModel);

  $commentSup = trim($_POST['commentSup']);
  $commentSup = strip_tags($commentSup);
  $commentSup = htmlspecialchars($commentSup);

  $upgradeSup = trim($_POST['upgradeSup']);
  $upgradeSup = strip_tags($upgradeSup);
  $upgradeSup = htmlspecialchars($upgradeSup);
  
  
  $bevCartQuantityQTY = trim($_POST['bevCartQuantityQTY']);
  $bevCartQuantityQTY = strip_tags($bevCartQuantityQTY);
  $bevCartQuantityQTY = htmlspecialchars($bevCartQuantityQTY);

  $bevCartMake = trim($_POST['bevCartMake']);
  $bevCartMake = strip_tags($bevCartMake);
  $bevCartMake = htmlspecialchars($bevCartMake);

  $bevCartYear = trim($_POST['bevCartYear']);
  $bevCartYear = strip_tags($bevCartYear);
  $bevCartYear = htmlspecialchars($bevCartYear);

  $bevCartModel = trim($_POST['bevCartModel']);
  $bevCartModel = strip_tags($bevCartModel);
  $bevCartModel = htmlspecialchars($bevCartModel);

  $commentBev = trim($_POST['commentBev']);
  $commentBev = strip_tags($commentBev);
  $commentBev = htmlspecialchars($commentBev);

  $upgradeBev = trim($_POST['upgradeBev']);
  $upgradeBev = strip_tags($upgradeBev);
  $upgradeBev = htmlspecialchars($upgradeBev);

  $implementationDate = trim($_POST['implementationDate']);
  $implementationDate = strip_tags($implementationDate);
  $implementationDate = htmlspecialchars($implementationDate);

  $contractPeriod = trim($_POST['contractPeriod']);
  $contractPeriod = strip_tags($contractPeriod);
  $contractPeriod = htmlspecialchars($contractPeriod);
 
  $currency = trim($_POST['currency']);
  $currency = strip_tags($currency);
  $currency = htmlspecialchars($currency);
  
  $PricePerMonth = trim($_POST['PricePerMonth']);
  $PricePerMonth = strip_tags($PricePerMonth);
  $PricePerMonth = htmlspecialchars($PricePerMonth);

  
        
       
  $activeSeasonStartDay  = trim($_POST['llegada-dia']);
  $activeSeasonStartDay  = strip_tags($activeSeasonStartDay);
  $activeSeasonStartDay  = htmlspecialchars($activeSeasonStartDay);

  $activeSeasonStartMonth  = trim($_POST['llegada-mes']);
  $activeSeasonStartMonth  = strip_tags($activeSeasonStartMonth);
  $activeSeasonStartMonth  = htmlspecialchars($activeSeasonStartMonth);
  
  $activeSeasonEndDay  = trim($_POST['salida-dia']);
  $activeSeasonEndDay  = strip_tags($activeSeasonEndDay);
  $activeSeasonEndDay = htmlspecialchars($activeSeasonEndDay);

  $activeSeasonEndMonth  = trim($_POST['salida-mes']);
  $activeSeasonEndMonth  = strip_tags($activeSeasonEndMonth);
  $activeSeasonEndMonth = htmlspecialchars($activeSeasonEndMonth);


  $activeSeasonStart = ($activeSeasonStartDay) ." ". (create_date($activeSeasonStartMonth+1)); 
  $activeSeasonEnd = ($activeSeasonEndDay) ." ". (create_date($activeSeasonEndMonth+1));


  $closedSeasonStartDay  = trim($_POST['llegada-dia-closed']);
  $closedSeasonStartDay  = strip_tags($closedSeasonStartDay);
  $closedSeasonStartDay  = htmlspecialchars($closedSeasonStartDay);

  $closedSeasonStartMonth  = trim($_POST['llegada-mes-closed']);
  $closedSeasonStartMonth  = strip_tags($closedSeasonStartMonth);
  $closedSeasonStartMonth  = htmlspecialchars($closedSeasonStartMonth);
  
  $closedSeasonEndDay  = trim($_POST['salida-dia-closed']);
  $closedSeasonEndDay  = strip_tags($closedSeasonEndDay);
  $closedSeasonEndDay = htmlspecialchars($closedSeasonEndDay);

  $closedSeasonEndMonth  = trim($_POST['salida-mes-closed']);
  $closedSeasonEndMonth  = strip_tags($closedSeasonEndMonth);
  $closedSeasonEndMonth = htmlspecialchars($closedSeasonEndMonth);

  $closedSeasonStart = ($closedSeasonStartDay) ." ". (create_date($closedSeasonStartMonth+1)); 
  $closedSeasonEnd = ($closedSeasonEndDay) ." ". (create_date($closedSeasonEndMonth+1));
  
 $userID = $_SESSION['user'];


           



 $salesRepErr = $walkingTagsQTYErr = $marshalTagsQTYErr =  $cartInfoErr = $upgradeCartErr = $supInfoErr = $upgradeSupErr = $bevCartInfoErr = $upgradeBevErr= $implementationDateErr= $contractPeriodErr= $PricePerMonthErr= $activeSeasonErr= $closedSeasonErr="";

  

 if(empty($salesRep))
 {
      //$error = true;
      $salesRepErr = "Please enter sales rep";
  }
  if(empty($walkingTagsQTY))
 {
      //$error = true;
      $walkingTagsQTYErr = "Please enter walking tags";
  }
  if(empty($marshalTagsQTY))
 {
      //$error = true;
      $marshalTagsQTYErr = "Please enter marshal tags";
  }
  if($cartQuantityQTY =="")
 {
      //$error = true;
      $cartInfoErr = "Cart quantity is requires, insert 0 if you do not have carts";
  }

  if($cartQuantityQTY !="0" && empty($upgradeCart))
 {
      //$error = true;
      $upgradeCartErr = "Please enter player cart upgrade due date";
  }
  

  if($supQuantityQTY =="")
 {
      //$error = true;
      $supInfoErr = "Superintendent quantity is requires, insert 0 if you do not have superintendents";
  }
 
  if($bevCartQuantityQTY =="")
 {
      //$error = true;
      $bevCartInfoErr = "Beverage cart quantity is requires, insert 0 if you do not have beverage carts";
  }
 
  if(empty($implementationDate))
 {
      //$error = true;
      $implementationDateErr = "Please enter implementation date";
  }
  if(empty($contractPeriod))
 {
      //$error = true;
      $contractPeriodErr = "Please select contract period";
  }
  if(empty($currency) || empty($PricePerMonth))
 {
      //$error = true;
      $PricePerMonthErr = "Please enter currency/price per month";
  }
  if(empty($activeSeasonStart) || empty($activeSeasonEnd))
 {
      //$error = true;
      $activeSeasonErr = "Please active season start/end date";
  }

  if(empty($closedSeasonStart) || empty($closedSeasonEnd))
 {
      //$error = true;
      $closedSeasonErr = "Please closed season start/end date";
  }


  if (!$error) {
    $queryTest = "SELECT * FROM OrderDetails WHERE idUSER=".$userID;
      $resTest = mysql_query($queryTest);
      $count = mysql_num_rows($resTest);
    if($count == 0){

              $query = "INSERT INTO OrderDetails (idUSER, salesRep, walkingTagsQTY, marshalTagsQTY, cartQTY, cartMake, cartYear, cartModel, commentCart,playerCartUpgrade, supQTY, supMake, supYear, supModel, commentSup,supCartUpgrade, bevQTY, bevMake, bevYear, bevModel,commentBev, bevCartUpgrade, ImplDate, contractPeriod, currency, pricePerMonth, activeSeasonStart, activeSeasonEnd, closedSeasonStart, closedSeasonEnd) VALUES ('$userID', '$salesRep', '$walkingTagsQTY', '$marshalTagsQTY', '$cartQuantityQTY', '$cartMake', '$cartYear', '$cartModel','$commentCart', '$upgradeCart', '$supQuantityQTY', '$supMake', '$supYear', '$supModel','$commentSup', '$upgradeSup', '$bevCartQuantityQTY', '$bevCartMake', '$bevCartYear', '$bevCartModel','$commentBev', '$upgradeBev', '$implementationDate', '$contractPeriod', '$currency', '$PricePerMonth', '$activeSeasonStart', '$activeSeasonEnd', '$closedSeasonStart', '$closedSeasonEnd')";

              $res = mysql_query($query);
              header("Location: course_info.php");
    }
    else{
      $query = "UPDATE OrderDetails SET idUSER='$userID', salesRep = '$salesRep', walkingTagsQTY = '$walkingTagsQTY', marshalTagsQTY = '$marshalTagsQTY', cartQTY = '$cartQuantityQTY', cartMake  = '$cartMake', cartYear = '$cartYear', cartModel = '$cartModel',commentCart = '$commentCart', playerCartUpgrade = '$upgradeCart', supQTY = '$supQuantityQTY', supMake = '$supMake', supYear = '$supYear', supModel = '$supModel', commentSup = '$commentSup', supCartUpgrade = '$upgradeSup', bevQTY = '$bevCartQuantityQTY', bevMake = '$bevCartMake', bevYear = '$bevCartYear', bevModel = '$bevCartModel',  commentBev = '$commentBev', bevCartUpgrade = '$upgradeBev', ImplDate = '$implementationDate', contractPeriod = '$contractPeriod', currency = '$currency', pricePerMonth = '$PricePerMonth', activeSeasonStart = '$activeSeasonStart', activeSeasonEnd = '$activeSeasonEnd', closedSeasonStart = '$closedSeasonStart', closedSeasonEnd = '$closedSeasonEnd' WHERE idUSER='$userID'";
  
              mysql_query($query);
              header("Location: course_info.php");
    }

  }
  }
function create_date($data){
      if($data == 1)
        {$data = "January";}
      else if($data == 2)
        {$data = "February";}
      else if($data == 3)
        {$data = "March";}
      else if($data == 4)
        {$data = "April";}
      else if($data == 5)
        {$data = "May";}
      else if($data == 6)
        {$data = "June";}
      else if($data == 7)
        {$data = "July";}
      else if($data == 8)
        {$data = "August";}
      else if($data == 9)
        {$data = "September";}
      else if($data == 10)
        {$data = "October";}
      else if($data == 11)
        {$data = "November";}
      else if($data == 12)
        {$data = "December";}
    return $data;
  }

  function reverse_date($data){
      if($data == 0)
        {$data = "January";}
      else if($data == 1)
        {$data = "February";}
      else if($data == 2)
        {$data = "March";}
      else if($data == 3)
        {$data = "April";}
      else if($data == 4)
        {$data = "May";}
      else if($data == 5)
        {$data = "June";}
      else if($data == 6)
        {$data = "July";}
      else if($data == 7)
        {$data = "August";}
      else if($data == 8)
        {$data = "September";}
      else if($data == 9)
        {$data = "October";}
      else if($data == 10)
        {$data = "November";}
      else if($data == 11)
        {$data = "December";}
    return $data;
  }
  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $_SESSION['username']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="assets/css/Sitestyle.css" type="text/css" />
<link rel="stylesheet" href="assets/css/orderDetailStyles.css" type="text/css" />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" />

<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="shortcut icon" href="assets/img/favicon.png">



<style type="text/css">


#navText{color: #8ABE40 !important;}

#llegada-dia {
  padding: 6px 8px !important;
}

#llegada-mes {
  padding: 6px 8px !important;
}

#salida-dia {
  padding: 6px 8px !important;
}

#salida-mes {
  padding: 6px 8px !important;
}

#llegada-dia-closed {
  padding: 6px 8px !important;
}

#llegada-mes-closed {
  padding: 6px 8px !important;
}

#salida-dia-closed {
  padding: 6px 8px !important;
}

#salida-mes-closed {
  padding: 6px 8px !important;
}


.seasonDates {
    height: 29px;
    overflow: hidden;
    border: none;
    font-size: 14px;
    padding: 5px;
    -webkit-appearance: button;
    -webkit-border-radius: 2px;
    -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
    -webkit-padding-end: 20px;
    -webkit-padding-start: 2px;
    -webkit-user-select: none;
    background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
    background-position: 97% center;
    background-repeat: no-repeat;
    border: 1px solid #AAA;
    color: #555;
    margin: 0px;
    padding: 5px 19.2px;
    
}
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
            <li class="active"><a href="order_details.php"  class="inactiveLink">OrderDetails</a></li>
            <li><a href="course_info.php" id="navText" class="inactiveLink">Course info</a></li>
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

      <div style="display: none;">

        <p>Id user:<?php echo $idUser ; ?></p><br>
        <p>Multi Course:<?php echo $course_multi ; ?></p><br>
        <p>Course list:<?php echo $jsarray ; ?></p><br>
        <p>Course group name:<?php echo $courseGroupName ; ?></p><br>
        <p>Course Name<?php echo $course_name ; ?></p><br>
        <p>Addr 1:<?php echo $addr1 ; ?></p><br>
        <p>Addr 2:<?php echo $addr2 ; ?></p><br>
        <p>City:<?php echo $city ; ?></p><br>
        <p>State:<?php echo $state ; ?></p><br>
        <p>P Code :<?php echo $pCode ; ?></p><br>
        <p>Country : <?php echo $country ; ?></p><br>
        <p>Comment :<?php echo $comment ; ?></p><br>
        <p>Contact Person :<?php echo $contactPerson ; ?></p><br>
        <p>Contact Position :<?php echo $contactPosition ; ?></p><br>
        <p>Contact Num :<?php echo $contactNumber ; ?></p><br>
        <p>contact email :<?php echo $contactEmail ; ?></p><br>
        <p>Contact person bill:<?php echo $contactPersonBilling ; ?></p><br>
        <p>Contact Num bill:<?php echo $contactNumberBilling ; ?></p><br>
        <p>Contact email bill:<?php echo $contactEmailBilling ; ?></p><br>
        <p>Payment method :<?php echo $paymentMethod ; ?></p><br>
    

      </div>
     

        
        <div class="row">
          <div class="col-lg-12" style="margin-bottom: 40px;">
          

    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


<fieldset>

<!-- Sales Representative -->
<legend>Order Details</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="startSystem">Sales Representative</label>  
  <div class="col-md-4">
  <input id="salesRep" name="salesRep" type="text" placeholder="e.g. John Klillmore" class="form-control input-md" value="<?php if(isset($_POST['salesRep'])) { echo htmlentities ($_POST['salesRep']); }?>">
     <span class="error" style="color:red;"><?php echo $salesRepErr ;?></span>
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
  
  <input id="walkingTags" name="walkingTagsQTY" type="number" placeholder="QTY" class="form-control input-md" value="<?php if(isset($_POST['walkingTagsQTY'])) { echo htmlentities ($_POST['walkingTagsQTY']); }?>">
  <span class="error" style="color:red;"><?php echo $walkingTagsQTYErr ;?></span>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="startSystem">Marshal</label>  
  <div class="col-md-4">
  
  <input id="marshalTags" name="marshalTagsQTY" type="number" placeholder="QTY" class="form-control input-md" value="<?php if(isset($_POST['marshalTagsQTY'])) { echo htmlentities ($_POST['marshalTagsQTY']); }?>">
  <span class="error" style="color:red;"><?php echo $marshalTagsQTYErr ;?></span>

  </div>
</div>

<!-- cart-->
<div class="form-group">
  <label class="col-md-4 control-label" for="startSystem">Cart</label>  
  <div class="col-md-4" >
  <div  style="display: inline-flex;">
  
  <input id="cartQuantity" name="cartQuantityQTY" type="number" placeholder="QTY" class="form-control input-md" value="<?php if(isset($_POST['cartQuantityQTY'])) { echo htmlentities ($_POST['cartQuantityQTY']); }?>">
  <select id="cartMake" name="cartMake" class="form-control" >
      <option value="" selected="true" disabled="true">Make</option>
      <option value="YamahaGas">Yamaha Gas</option>
      <option value="YamahaElectric">Yamaha Electric</option>
      <option value="ClubCarGas">ClubCar Gas</option>
      <option value="ClubCarElec">ClubCar Electric</option>
      <option value="EzgoGas">EZGO Gas</option>
      <option value="EzgoElec">EZGO Electric</option>
    </select>
    <script type="text/javascript">
  document.getElementById('cartMake').value = "<?php echo $_POST['cartMake'];?>";
</script>
  <input id="cartYear" name="cartYear" type="number" placeholder="Year" min="1700" class="form-control input-md" value="<?php if(isset($_POST['cartYear'])) { echo htmlentities ($_POST['cartYear']); }?>" ><br/>
  <input id="cartModel" name="cartModel" type="text" placeholder="Model" class="form-control input-md" value="<?php if(isset($_POST['cartModel'])) { echo htmlentities ($_POST['cartModel']); }?>"><br/>
  </div>
  

  <span class="error" style="color:red;"><?php echo $cartInfoErr ;?></span>
  </div>
</div>
<div class="form-group" id="commentCart">
  <label class="col-md-4 control-label" for="startSystem"></label>  
  <div class="col-md-4">
  
  <textarea name="commentCart" id="commentCart1" class="form-control" placeholder="Comment"></textarea>
  

  </div>
  
</div>
<!-- Text input-->
<div class="form-group" id="cartUpgradeSection">
  <label class="col-md-4 control-label" for="startSystem">When is your fleet of player carts due for upgrade?</label>  
  <div class="col-md-4" style="padding-top: 7px;">
  
  <input id="upgradeCart" name="upgradeCart" type="date"  class="form-control input-md" value="<?php if(isset($_POST['upgradeCart'])) { echo htmlentities ($_POST['upgradeCart']); }?>">
  <span class="error" style="color:red;"><?php echo $upgradeCartErr ;?></span>

  </div>
</div>

<!-- Superintendent-->
<div class="form-group">
  <label class="col-md-4 control-label" for="startSystem">Superintendent</label>  
  <div class="col-md-4" >
  <div  style="display: inline-flex;">
  
  <input id="supQuantity" name="supQuantityQTY" type="number" placeholder="QTY" class="form-control input-md" value="<?php if(isset($_POST['supQuantityQTY'])) { echo htmlentities ($_POST['supQuantityQTY']); }?>">
  <select id="supMake" name="supMake" class="form-control" >
      <option value="" selected="true" disabled="true">Make</option>
      <option value="YamahaGas">Yamaha Gas</option>
      <option value="YamahaElectric">Yamaha Electric</option>
      <option value="ClubCarGas">ClubCar Gas</option>
      <option value="ClubCarElec">ClubCar Electric</option>
      <option value="EzgoGas">EZGO Gas</option>
      <option value="EzgoElec">EZGO Electric</option>
    </select>
     <script type="text/javascript">
  document.getElementById('supMake').value = "<?php echo $_POST['supMake'];?>";
</script>
  <input id="supYear" name="supYear" type="number" placeholder="Year" min="1700" class="form-control input-md" value="<?php if(isset($_POST['supYear'])) { echo htmlentities ($_POST['supYear']); }?>"><br/>
  <input id="supModel" name="supModel" type="text" placeholder="Model" class="form-control input-md" value="<?php if(isset($_POST['supModel'])) { echo htmlentities ($_POST['supModel']); }?>"><br/>
  </div>
  <span class="error" style="color:red;"><?php echo $supInfoErr ;?></span>
  </div>
</div>

<div class="form-group" id="commentSup">
  <label class="col-md-4 control-label" for="startSystem"></label>  
  <div class="col-md-4">
  
  <textarea name="commentSup" id="commentSup1" class="form-control" placeholder="Comment"></textarea>
  

  </div>
  
</div>
<!-- Text input-->
<div class="form-group" id="supUpgradeSection">
  <label class="col-md-4 control-label" for="startSystem">When is your fleet of superintendent carts due for upgrade?</label>  
  <div class="col-md-4" style="padding-top: 7px;">
  
  <input id="upgradeSup" name="upgradeSup" type="date"" class="form-control input-md" value="<?php if(isset($_POST['upgradeSup'])) { echo htmlentities ($_POST['upgradeSup']); }?>">
  <span class="error" style="color:red;"><?php echo $upgradeSupErr ;?></span>

  </div>
</div>


<!-- Beverage Carts-->
<div class="form-group">
  <label class="col-md-4 control-label" for="startSystem">Beverage Carts</label>  
  <div class="col-md-4">
  <div  style="display: inline-flex;">
  
  <input id="bevQuantity" name="bevCartQuantityQTY" type="number" placeholder="QTY" class="form-control input-md" value="<?php if(isset($_POST['bevCartQuantityQTY'])) { echo htmlentities ($_POST['bevCartQuantityQTY']); }?>">
  <select id="bevMake" name="bevCartMake" class="form-control" >
      <option value="" selected="true" disabled="true">Make</option>
      <option value="Yamaha Gas">Yamaha Gas</option>
      <option value="Yamaha Electric">Yamaha Electric</option>
      <option value="ClubCar Gas">ClubCar Gas</option>
      <option value="ClubCar Electric">ClubCar Electric</option>
      <option value="Ezgo Gas">EZGO Gas</option>
      <option value="Ezgo Electric">EZGO Electric</option>
    </select>
     <script type="text/javascript">
  document.getElementById('bevMake').value = "<?php echo $_POST['bevCartMake'];?>";
</script>

  <input id="bevYear" name="bevCartYear" type="number" placeholder="Year" min="1700" class="form-control input-md" value="<?php if(isset($_POST['bevCartYear'])) { echo htmlentities ($_POST['bevCartYear']); }?>"><br/>
  <input id="bevModel" name="bevCartModel" type="text" placeholder="Model" class="form-control input-md" value="<?php if(isset($_POST['bevCartModel'])) { echo htmlentities ($_POST['bevCartModel']); }?>"><br/>
  </div>
  <span class="error" style="color:red;"><?php echo $bevCartInfoErr ;?></span>

  </div>

</div>


<!-- Beverage Carts-->
<div class="form-group" id="commentBev">
  <label class="col-md-4 control-label" for="startSystem"></label>  
  <div class="col-md-4">
  
  <textarea name="commentBev" id="commentBev1" class="form-control" placeholder="Comment"></textarea>
  

  </div>
  
</div>


<!-- Text input-->
<div class="form-group" id="bevUpgradeSection">
  <label class="col-md-4 control-label" for="startSystem">When is your fleet of beverage carts due for upgrade?</label>  
  <div class="col-md-4" style="padding-top: 7px;">
  
  <input id="upgradeBev" name="upgradeBev" type="date"  class="form-control input-md" value="<?php if(isset($_POST['upgradeBev'])) { echo htmlentities ($_POST['upgradeBev']); }?>">
  <span class="error" style="color:red;"><?php echo $upgradeBevErr ;?></span>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-lg-4 control-label" for="initiationDate">Implementation Date</label>  
 <div class="col-md-4">
  <input id="inimplementationDate" name="implementationDate" type="date" placeholder="" class="form-control input-md" value="<?php if(isset($_POST['implementationDate'])) { echo htmlentities ($_POST['implementationDate']); }?>">
  <span class="error" style="color:red;"><?php echo $implementationDateErr ;?></span>

    
  </div>
  
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="contractPeriod">Contract Period</label>
  <div class="col-md-4">

    <select id="contractPeriod" name="contractPeriod" class="form-control" >
      <option value="" selected="true" disabled="true">Select Period</option>
      <option value="Trial">Trial</option>
      <option value="3 year">3 Year</option>
    </select>
    <span class="error" style="color:red;"><?php echo $contractPeriodErr ;?></span>
    <script type="text/javascript">
  document.getElementById('contractPeriod').value = "<?php echo $_POST['contractPeriod'];?>";
</script>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PricePerMonth">Price per month</label>  
  <div class="col-md-4" >
  <div  style="display: flex;">
  <select id="currency" name="currency" class="form-control" >
      <option value="" selected="true" disabled="true">Select Currency</option>
      <option value="USD">USD</option>
      <option value="ZAR">ZAR</option>
      <option value="GBP">GBP</option>
      <option value="EUR">EUR</option>
  </select>
   <script type="text/javascript">
  document.getElementById('currency').value = "<?php echo $_POST['currency'];?>";
</script>
  <input id="PricePerMonth" name="PricePerMonth" type="number" step="0.01" min="0.00" placeholder="e.g. 1000" class="form-control input-md" value="<?php if(isset($_POST['PricePerMonth'])) { echo htmlentities ($_POST['PricePerMonth']); }?>">
  </div>
    <span class="error" style="color:red;"><?php echo $PricePerMonthErr ;?></span>
  </div>
  

</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="activeSeason">Active Season</label>  
  <div class="col-md-4" style="    display: flex;">
      <div  style="display: flex;width: 47%;" class="arrival">
            <label style="width: inherit;">
            <select id="llegada-dia" name="llegada-dia" class="form-control">
                <option value="" selected="selected" disabled="true">Day</option>
                <option value="1" >1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28" >28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <?php
if( isset($_POST['save-orderDetails']) ) {
  echo "
            <script>
                document.getElementById('llegada-dia').value = " . $_POST['llegada-dia']. ";
            </script>";
          }
?>
           
        </label>
        <label style="width: inherit;">
            <select id="llegada-mes" name="llegada-mes" class="form-control" style="width: 113%;">
                 <option value="" selected="selected" disabled="true">Month</option>
                <option value="0" >Jan</option>
                <option value="1" >Feb</option>
                <option value="2">Mar</option>
                <option value="3">Apr</option>
                <option value="4">May</option>
                <option value="5">Jun</option>
                <option value="6">Jul</option>
                <option value="7">Aug</option>
                <option value="8">Sep</option>
                <option value="9">Oct</option>
                <option value="10">Nov</option>
                <option value="11">Dec</option>
            </select>
            <?php
if( isset($_POST['save-orderDetails']) ) {
  echo "
            <script>
                document.getElementById('llegada-mes').value = " . $_POST['llegada-mes'] . ";
            </script>";
          }
?>


        </label>
        <label style="display: none;">
            <select name="llegada-ano">
                <option value="" selected=""></option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
            </select>
        </label>
        <input name="llegada" hidden="">
    </div>
    &nbsp to &nbsp
    <div class="departure" style="width: 47%;display: flex;">

        <label style="width: inherit;">
            <select id="salida-dia" name="salida-dia" class="form-control">
                <option value="" selected="selected" disabled="true">Day</option>
                <option value="1" >1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <?php
if( isset($_POST['save-orderDetails']) ) {
  echo "
            <script>
                document.getElementById('salida-dia').value = " . $_POST['salida-dia'] . ";
            </script>";
          }
?>


        </label>
        <label style="width: inherit;">
            <select id="salida-mes" name="salida-mes" class="form-control" style="width: 113%;">
                 <option value="" selected="selected" disabled="true">Month</option>
                <option value="0" >Jan</option>
                <option value="1" >Feb</option>
                <option value="2">Mar</option>
                <option value="3">Apr</option>
                <option value="4">May</option>
                <option value="5" >Jun</option>
                <option value="6" >Jul</option>
                <option value="7">Aug</option>
                <option value="8">Sep</option>
                <option value="9">Oct</option>
                <option value="10">Nov</option>
                <option value="11">Dec</option>
            </select>
            <?php
if( isset($_POST['save-orderDetails']) ) {
  echo "
            <script>
                document.getElementById('salida-mes').value = " . $_POST['salida-mes'] . ";
            </script>";
          }
?>



        </label>
        <label>
            <select name="salida-ano" style="display: none;">
                <option value="" selected=""></option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
            </select>
        </label>
        <input name="salida" hidden="">
  
      </div>
  </div>
 
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="activeSeason">Closed Season</label>  
  <div class="col-md-4" style="    display: flex;">
      <div  style="display: flex;width: 47%;" class="arrival-closed">
            <label style="width: inherit;">
            <select id="llegada-dia-closed" name="llegada-dia-closed" class="form-control">
                <option value="" selected="selected" disabled="true">Day</option>
                <option value="1" >1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28" >28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <?php
if( isset($_POST['save-orderDetails']) ) {
  echo "
            <script>
                document.getElementById('llegada-dia-closed').value = " . $_POST['llegada-dia-closed'] .";
            </script>";
          }
?>


        </label>
        <label style="width: inherit;">
            <select id="llegada-mes-closed" name="llegada-mes-closed" class="form-control" style="width: 113%;">
                 <option value="" selected="selected" disabled="true">Month</option>
                <option value="0" >Jan</option>
                <option value="1" >Feb</option>
                <option value="2">Mar</option>
                <option value="3">Apr</option>
                <option value="4">May</option>
                <option value="5">Jun</option>
                <option value="6">Jul</option>
                <option value="7">Aug</option>
                <option value="8">Sep</option>
                <option value="9">Oct</option>
                <option value="10">Nov</option>
                <option value="11">Dec</option>
            </select>
            <?php
if( isset($_POST['save-orderDetails']) ) {
  echo "
            <script>
                document.getElementById('llegada-mes-closed').value = " . $_POST['llegada-mes-closed'] .";
            </script>";
          }
?>



        </label>
        <label style="display: none;">
            <select name="llegada-ano">
                <option value="" selected=""></option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
            </select>
        </label>
        <input name="llegada" hidden="">
    </div>
    &nbsp to &nbsp
    <div class="departure" style="width: 47%;display: flex;">

        <label style="width: inherit;">
            <select id="salida-dia-closed" name="salida-dia-closed" class="form-control">
         <option value="" selected="selected" disabled="true">Day</option>
                <option value="1" >1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <?php
if( isset($_POST['save-orderDetails']) ) {
  echo "
            <script>
                document.getElementById('salida-dia-closed').value = " . $_POST['salida-dia-closed'] . ";
            </script>";
          }
?>



        </label>
        <label style="width: inherit;">
            <select id="salida-mes-closed" name="salida-mes-closed" class="form-control" style="width: 113%;">
                 <option value="" selected="selected" disabled="true">Month</option>
                <option value="0" >Jan</option>
                <option value="1" >Feb</option>
                <option value="2">Mar</option>
                <option value="3">Apr</option>
                <option value="4">May</option>
                <option value="5" >Jun</option>
                <option value="6">Jul</option>
                <option value="7">Aug</option>
                <option value="8">Sep</option>
                <option value="9">Oct</option>
                <option value="10">Nov</option>
                <option value="11">Dec</option>
            </select>
            <?php
if( isset($_POST['save-orderDetails']) ) {
  echo "
            <script>
                document.getElementById('salida-mes-closed').value = " . $_POST['salida-mes-closed'].";
            </script>";
          }
?>




        </label>
        <label>
            <select name="salida-ano-closed" style="display: none;">
                <option value="" selected=""></option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
            </select>
        </label>
        <input name="salida-closed" hidden="">
  
      </div>
  </div>
 
    
</div>











</fieldset>





 <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-4" style="text-align: center;">
      <input id= "back" type="button" class="btn btn-default" onclick="orderDetailsBack()" value="BACK" style="width:40% !important;float:left;"></input><button id="save" type="submit"  class="btn btn-default" name="save-orderDetails" style="width:40% !important;MARGIN-LEFT: 43PX !important;float:right;">SAVE & PROCEED</button>
    </div>
  </div>


</form>
</div>

    
          </div>
    </div>
    
    </div>
    
<script type="text/javascript">
  $(document).ready(function () {
    months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dec'];

    /* Cachear selects */
    var $ld = $('select[name=llegada-dia]');
    var $lm = $('select[name=llegada-mes]');
    var $ly = $('select[name=llegada-ano]');
    var $sd = $('select[name=salida-dia]');
    var $sm = $('select[name=salida-mes]');
    var $sy = $('select[name=salida-ano]');

    //http://stackoverflow.com/a/1184359/297641
    function daysInMonth(month, year) {
        return new Date(year, month, 0).getDate();
    }

    function adjustDates(selMonthDates, $sel) {
        var $options = $sel.find('option');
        var dates = $options.length;
        //append/remove missing dates
        if (dates > selMonthDates) { //remove
            $options.slice(selMonthDates).remove();
        } else { //append
            var dateOptions = [];
            for (var date = dates + 1; date <= selMonthDates; date++) {
                dateOptions.push('<option value="' + date + '">' + date + '</option>');
            }
            $sel.append(dateOptions.join('')); //reduces DOM call
        }
    }

    function resetDates() {
        $lm.val(function (i, v) {
            return (v == '') ? '0' : v;
        });
        $ly.val(function (i, v) {
            return (v == '') ? '2013' : v;
        });
    }

    var paintCals = function (day, month, year) {

        resetDates();

        //adjust start date
        var selMonthDates = daysInMonth((parseInt($lm.val(), 10) + 1), $ly.val());
        adjustDates(selMonthDates, $ld);

        //If current day selection > number of days in selected month then set the day to max allowed day
        if (day > selMonthDates) {
            day = selMonthDates;
            $ld.val(day); //update selection
        }

        //selected start date
        var selectedDate = new Date(year, month, day);

        //next day from start date
        var nextDay = new Date(selectedDate.getTime() + 86400000);

        //lets build the end year drop down
        var tmpArr = [];
        for (var yrs = parseInt(nextDay.getFullYear(), 10); yrs <= 2020; yrs++) {
            tmpArr.push('<option value="' + yrs + '">' + yrs + '</option>');
        }
        $sy.empty().append(tmpArr.join('')); //set the YEARS
        //simply set the month
        $sm.val(nextDay.getMonth()); //set the month

        //adjust end date
        selMonthDates = daysInMonth(parseInt(nextDay.getMonth(), 10) + 1, nextDay.getFullYear());
        adjustDates(selMonthDates, $sd);

        $sd.val(nextDay.getDate()); //set the date

        $('#log').empty().append('Fecha: ' + selectedDate).append('<br>');
        $('#log').append('Siguiente: ' + nextDay);
    }

   
});

</script>

<script type="text/javascript">

function restoreValues()
{
    <?php  

    $resFacilityDetails=mysql_query("SELECT * FROM OrderDetails WHERE idUSER=".$_SESSION['user']);
    $facilityDetailsRow=mysql_fetch_array($resFacilityDetails);
    $countFacility = mysql_num_rows($resFacilityDetails);
      ?>
      
        document.getElementById('salesRep').value="<?php echo $facilityDetailsRow['salesRep'];?>";
        document.getElementById('walkingTags').value="<?php echo $facilityDetailsRow['walkingTagsQTY'];?>";
        document.getElementById('marshalTags').value="<?php echo $facilityDetailsRow['marshalTagsQTY'];?>";
        if("<?php echo $facilityDetailsRow['cartQTY'];?>" == "0")
        {
           
            document.getElementById("cartUpgradeSection").style.display = "none";
            document.getElementById("cartMake").style.display = "none";
            document.getElementById("cartYear").style.display = "none";
            document.getElementById("cartModel").style.display = "none";
            document.getElementById("commentCart").style.display = "none";

            document.getElementById("cartMake").value = "";
            document.getElementById("cartYear").value = "";
            document.getElementById("cartModel").value = "";
            document.getElementById("commentCart1").value = "";


   
            document.getElementById('cartQuantity').value="<?php echo $facilityDetailsRow['cartQTY'];?>";


        }
        else{
          document.getElementById('cartQuantity').value="<?php echo $facilityDetailsRow['cartQTY'];?>";
          document.getElementById('cartMake').value="<?php echo $facilityDetailsRow['cartMake'];?>";
          document.getElementById('cartYear').value="<?php echo $facilityDetailsRow['cartYear'];?>";
          document.getElementById('cartModel').value="<?php echo $facilityDetailsRow['cartModel'];?>";
          document.getElementById('upgradeCart').value="<?php echo $facilityDetailsRow['playerCartUpgrade'];?>";
          document.getElementById('commentCart1').value="<?php echo $facilityDetailsRow['commentCart'];?>";

        }

        if("<?php echo $facilityDetailsRow['supQTY'];?>" == "0")
        {
           
            document.getElementById("supUpgradeSection").style.display = "none";
            document.getElementById("supMake").style.display = "none";
            document.getElementById("supYear").style.display = "none";
            document.getElementById("supModel").style.display = "none";
            document.getElementById("commentSup").style.display = "none";
            

            document.getElementById("supMake").value = "";
            document.getElementById("supYear").value = "";
            document.getElementById("supModel").value = "";
            document.getElementById("commentSup1").value = "";
            

   
            document.getElementById('supQuantity').value="<?php echo $facilityDetailsRow['supQTY'];?>";


        }
        else{
          document.getElementById('supQuantity').value="<?php echo $facilityDetailsRow['supQTY'];?>";
          document.getElementById('supMake').value="<?php echo $facilityDetailsRow['supMake'];?>";
          document.getElementById('supYear').value="<?php echo $facilityDetailsRow['supYear'];?>";
          document.getElementById('supModel').value="<?php echo $facilityDetailsRow['supModel'];?>";
          document.getElementById('upgradeSup').value="<?php echo $facilityDetailsRow['supCartUpgrade'];?>";
           document.getElementById('commentSup1').value="<?php echo $facilityDetailsRow['commentSup'];?>";

        }

         if("<?php echo $facilityDetailsRow['bevQTY'];?>" == "0")
        {
           
            document.getElementById("bevUpgradeSection").style.display = "none";
            document.getElementById("bevMake").style.display = "none";
            document.getElementById("bevYear").style.display = "none";
            document.getElementById("bevModel").style.display = "none";
            document.getElementById("commentBev").style.display = "none";

            document.getElementById("bevMake").value = "";
            document.getElementById("bevYear").value = "";
            document.getElementById("bevModel").value = "";
            document.getElementById("commentBev1").value = "";

   
            document.getElementById('bevQuantity').value="<?php echo $facilityDetailsRow['bevQTY'];?>";


        }
        else{
       

          document.getElementById('bevQuantity').value="<?php echo $facilityDetailsRow['bevQTY'];?>";
          document.getElementById('bevMake').value="<?php echo $facilityDetailsRow['bevMake'];?>";
          document.getElementById('bevYear').value="<?php echo $facilityDetailsRow['bevYear'];?>";
          document.getElementById('bevModel').value="<?php echo $facilityDetailsRow['bevModel'];?>";
          document.getElementById('upgradeBev').value="<?php echo $facilityDetailsRow['bevCartUpgrade'];?>";
          document.getElementById('commentBev1').value="<?php echo $facilityDetailsRow['commentBev'];?>";

        }

        document.getElementById('inimplementationDate').value= "<?php echo substr($facilityDetailsRow['ImplDate'],0,10);?>";
        document.getElementById('contractPeriod').value="<?php echo $facilityDetailsRow['contractPeriod'];?>";
        document.getElementById('currency').value="<?php echo $facilityDetailsRow['currency'];?>";
        document.getElementById('PricePerMonth').value="<?php echo $facilityDetailsRow['pricePerMonth'];?>";

     





        if("<?php echo explode(" ",$facilityDetailsRow['activeSeasonStart'])[0];?>"=="")
        {}
        else{
        document.getElementById('llegada-dia').value="<?php echo explode(" ",$facilityDetailsRow['activeSeasonStart'])[0];?>";
        document.getElementById('llegada-mes').value="<?php
        $data = explode(" ",$facilityDetailsRow['activeSeasonStart'])[1];
        if($data == "January")
        {echo 0;}
        if($data == "February")
        {echo 1;}
      if($data == "March")
        {echo 2;}
      if($data == "April")
        {echo 3;}
      if($data == "May")
        {echo 4;}
      if($data == "June")
        {echo 5;}
      if($data == "July")
        {echo 6;}
      if($data == "August")
        {echo 7;}
      if($data == "September")
        {echo 8;}
      if($data == "October")
        {echo 9;}
      if($data == "November")
        {echo 10;}
      if($data == "December")
        {echo 11;}
        ?>";
         }
        
        if("<?php echo explode(" ",$facilityDetailsRow['activeSeasonEnd'])[0];?>"=="")
        {}
        else{
        document.getElementById('salida-dia').value="<?php echo explode(" ",$facilityDetailsRow['activeSeasonEnd'])[0];?>";
        document.getElementById('salida-mes').value="<?php 

        $data = explode(" ",$facilityDetailsRow['activeSeasonEnd'])[1];
        if($data == "January")
        {echo 0;}
        if($data == "February")
        {echo 1;}
      if($data == "March")
        {echo 2;}
      if($data == "April")
        {echo 3;}
      if($data == "May")
        {echo 4;}
      if($data == "June")
        {echo 5;}
      if($data == "July")
        {echo 6;}
      if($data == "August")
        {echo 7;}
      if($data == "September")
        {echo 8;}
      if($data == "October")
        {echo 9;}
      if($data == "November")
        {echo 10;}
      if($data == "December")
        {echo 11;}
        ?>";
        }


        if("<?php echo explode(" ",$facilityDetailsRow['closedSeasonStart'])[0];?>"=="")
        {}
        else{
        document.getElementById('llegada-dia-closed').value="<?php echo explode(" ",$facilityDetailsRow['closedSeasonStart'])[0];?>";
        document.getElementById('llegada-mes-closed').value="<?php 
        $data = explode(" ",$facilityDetailsRow['closedSeasonStart'])[1];
        if($data == "January")
        {echo 0;}
        if($data == "February")
        {echo 1;}
      if($data == "March")
        {echo 2;}
      if($data == "April")
        {echo 3;}
      if($data == "May")
        {echo 4;}
      if($data == "June")
        {echo 5;}
      if($data == "July")
        {echo 6;}
      if($data == "August")
        {echo 7;}
      if($data == "September")
        {echo 8;}
      if($data == "October")
        {echo 9;}
      if($data == "November")
        {echo 10;}
      if($data == "December")
        {echo 11;}?>";
        document.getElementById('salida-dia-closed').value="<?php echo explode(" ",$facilityDetailsRow['closedSeasonEnd'])[0];?>";
        document.getElementById('salida-mes-closed').value="<?php 
        $data = explode(" ",$facilityDetailsRow['closedSeasonEnd'])[1];
        if($data == "January")
        {echo 0;}
        if($data == "February")
        {echo 1;}
      if($data == "March")
        {echo 2;}
      if($data == "April")
        {echo 3;}
      if($data == "May")
        {echo 4;}
      if($data == "June")
        {echo 5;}
      if($data == "July")
        {echo 6;}
      if($data == "August")
        {echo 7;}
      if($data == "September")
        {echo 8;}
      if($data == "October")
        {echo 9;}
      if($data == "November")
        {echo 10;}
      if($data == "December")
        {echo 11;}?>";
    }

       

}
  
</script>
<script type="text/javascript">
  $(document).ready(function () {
    months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dec'];

    /* Cachear selects */
    var $ld = $('select[name=llegada-dia-closed]');
    var $lm = $('select[name=llegada-mes-closed]');
    var $ly = $('select[name=llegada-ano-closed]');
    var $sd = $('select[name=salida-dia-closed]');
    var $sm = $('select[name=salida-mes]-closed');
    var $sy = $('select[name=salida-ano-closed]');

    //http://stackoverflow.com/a/1184359/297641
    function daysInMonth(month, year) {
        return new Date(year, month, 0).getDate();
    }

    function adjustDates(selMonthDates, $sel) {
        var $options = $sel.find('option');
        var dates = $options.length;
        //append/remove missing dates
        if (dates > selMonthDates) { //remove
            $options.slice(selMonthDates).remove();
        } else { //append
            var dateOptions = [];
            for (var date = dates + 1; date <= selMonthDates; date++) {
                dateOptions.push('<option value="' + date + '">' + date + '</option>');
            }
            $sel.append(dateOptions.join('')); //reduces DOM call
        }
    }

    function resetDates() {
        $lm.val(function (i, v) {
            return (v == '') ? '0' : v;
        });
        $ly.val(function (i, v) {
            return (v == '') ? '2013' : v;
        });
    }

   
    var paintCals = function (day, month, year) {

        resetDates();

        //adjust start date
        var selMonthDates = daysInMonth((parseInt($lm.val(), 10) + 1), $ly.val());
        adjustDates(selMonthDates, $ld);

        //If current day selection > number of days in selected month then set the day to max allowed day
        if (day > selMonthDates) {
            day = selMonthDates;
            $ld.val(day); //update selection
        }

        //selected start date
        var selectedDate = new Date(year, month, day);

        //next day from start date
        var nextDay = new Date(selectedDate.getTime() + 86400000);

        //lets build the end year drop down
        var tmpArr = [];
        for (var yrs = parseInt(nextDay.getFullYear(), 10); yrs <= 2020; yrs++) {
            tmpArr.push('<option value="' + yrs + '">' + yrs + '</option>');
        }
        $sy.empty().append(tmpArr.join('')); //set the YEARS
        //simply set the month
        $sm.val(nextDay.getMonth()); //set the month

        //adjust end date
        selMonthDates = daysInMonth(parseInt(nextDay.getMonth(), 10) + 1, nextDay.getFullYear());
        adjustDates(selMonthDates, $sd);

        $sd.val(nextDay.getDate()); //set the date

        $('#log').empty().append('Fecha: ' + selectedDate).append('<br>');
        $('#log').append('Siguiente: ' + nextDay);
    }

   
});

 

</script>

<script type="text/javascript">
   $(document).ready(function(){
    var $cartUpgradeSection = $('#cartUpgradeSection');
    var $supUpgradeSection = $('#supUpgradeSection');
    var $bevUpgradeSection = $('#bevUpgradeSection');

    var $cartMake = $('#cartMake');
    var $cartYear = $('#cartYear');
    var $cartModel = $('#cartModel');
    var $commentCart = $('#commentCart');

    var $supMake = $('#supMake');
    var $supYear = $('#supYear');
    var $supModel = $('#supModel');
    var $commentSup = $('#commentSup');

    var $bevMake = $('#bevMake');
    var $bevYear = $('#bevYear');
    var $bevModel = $('#bevModel');
    var $commentBev = $('#commentBev');




    $('#cartQuantity').on('keyup',function(){    
        if(this.value === '0'){
            $cartUpgradeSection.hide();
            $cartMake.hide();
            $cartYear.hide();
            $cartModel.hide();
            $commentCart.hide();
            $cartMake.hide("");
            $cartMake.val("");
            $cartYear.val("");
            $cartModel.val("");
            $commentCart.val("");
        } else {
            $cartUpgradeSection.show();
            $cartMake.show();
            $cartYear.show();
            $cartModel.show();
            $commentCart.show();
        }
    });

    $('#supQuantity').on('keyup',function(){    
        if(this.value === '0'){
            $supUpgradeSection.hide();
            $supMake.hide();
            $supYear.hide();
            $supModel.hide();
            $commentSup.hide();
            $supMake.val("");
            $supYear.val("");
            $supModel.val("");
             $commentSup.val("");
        } else {
            $supUpgradeSection.show();
            $supMake.show();
            $supYear.show();
            $supModel.show();
            $commentSup.show();
        }
    });

    $('#bevQuantity').on('keyup',function(){    
        if(this.value === '0'){
            $bevUpgradeSection.hide();
            $bevMake.hide();
            $bevYear.hide();
            $bevModel.hide();
            $commentBev.hide();
            $bevMake.val("");
            $bevYear.val("");
            $bevModel.val("");
            $commentBev.val("");
        } else {
            $bevUpgradeSection.show();
            $bevMake.show();
            $bevYear.show();
            $bevModel.show();
            $commentBev.show();
        }
    });
});
</script>>

    <script type="text/javascript">
        
        function orderDetailsBack()
        {
          location.href = "home.php";
        }
      
    </script>
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php ob_end_flush(); ?>