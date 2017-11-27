<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// open home  page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}
	
	$error = false;
	
	if( isset($_POST['btn-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$course_name = trim($_POST['course_name']);
		$course_name = strip_tags($course_name);
		$course_name = htmlspecialchars($course_name);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} 
		else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		if ( empty($course_name)) {
			$error = true;
			$course_nameError = "Please enter a registered course name.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			

			$res=mysql_query("SELECT idUSER, username, password,course_name FROM USER WHERE email_address='$email'");
			$row=mysql_fetch_array($res);
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			

			$password = hash('sha256', $pass); // password hashing using SHA256
			$passwordLegth = strlen($row['password']);
			//$password = substr($pword,0,$passwordLegth)

			if( $count == 1 && $row['password']==substr($password,0,$passwordLegth) ) {
				$_SESSION['user'] = $row['idUSER'];
				$_SESSION['emailz'] = $email;
				$_SESSION['course_name'] = $course_name;
				$_SESSION['username'] = $row['username'];
				if($email == "admin@tagmarshal.com"){
							header("Location: admin_home.php");
				}
				else{
					$to = "phuluso@plasticsoldiers.co.za";
					$subject = "new sign in";

					$message = $row['username']." just logged in";

					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					// More headers
					$headers .= 'From: <webmaster@example.com>' . "\r\n";

					mail($to,$subject,$message,$headers);
					header("Location: home.php");
				}
				
			} else {
				
			
				$errMSG = "Incorrect Credentials, Try again...";
			}
				
		}
		
	}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="shortcut icon" href="assets/img/favicon.png">

<title>Tamarshal - Onboarding questionnaire</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<style>
.text-danger {
	color: hsla(0, 369%, 60%, 1) !important;
}
.btn-block {
    
    color: #ffffff !important;
    background-color: #8abe40 !important;
    border-color: #7cab3a !important;
}

body, html {
    height: 100%;
}

body{
	    position: relative !important;
}


@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px) 
and (orientation : landscape) { .container{zoom: 1.2;}}

@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px)  { }

@media (min-width:320px) and (max-width:414px) { /* smartphones, iPhone, portrait 480x320 phones */
		.container{zoom: 0.9;}
		body, html {
    height: 100%;
    
}
 }
@media (min-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ 
			.container{zoom: 1.2;}
}
@media (min-width:641px)  { /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */ 
		.container{zoom: 1.3;}
}
@media (min-width:961px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */ 
				.container{zoom: 1.4;}
				body, html {
				    height: 100%;
				    
				}
@media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */ 
			.container{zoom: 1.4;}
}
@media (min-width:1281px) { /* hi-res laptops and desktops */ 

}
</style>
</head>
<body style="background: url(onboardingbg.jpg); background-repeat: no-repeat; background-size: cover;">

<div class="container" style="max-width: 384px; padding: 15px; background-color: rgba(49, 49, 49, 0.7); top: 50% !important; display: inline-block !important; left: 50% !important; position: absolute !important; transform: translate(-50%,-50%) !important;">

	<div id="login-form" >
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="form-signin-heading" style="text-align:center;color:white;">
        <center>
	        <img src="tagmarshal-app-logo.png">
		
        </center>

        </h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-flag"></span></span>
            	<input type="text" name="course_name" class="form-control" placeholder="Course Name" value="<?php echo $course_name; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $course_nameError; ?></span>
            </div>
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<label style="color:white;font-weight: 100;">Don't have an account? </label> <a href="register.php" style="color: #8abe40;"> Sign Up Here...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>