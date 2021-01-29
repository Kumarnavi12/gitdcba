<!DOCTYPE html>
<html>
<head>
<style>
@import "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
.error {color: #FF0000;}
}
body{
background:url(ag.jpg) no-repeat;
background-size:cover;
}
.register{
	width:360px;
	margin:50px auto;
	font:cambria,"Hoefler Text","Liberation Serif",Times,"Times New Roman",Serif;
	border-radius:10px;
	border 2px solid #CCC;
	padding:10px 40px 25px;
	margin-top:70px;
	align-items:center;
}

input[type=text],input[type=password]{
	width:99%;
	padding:10px;
	margin-top:8px;
	border:1px solid #CCC;
	padding-left:5px;
	font-size:16px;
	font-family:cambria,"Hoefler Text","Liberation Serif",Times,"Times New Roman",Serif;
	}
	
	inpt[type=submit]{
		width:100%;
		background-color:#009
		color:2px solid #06F;
		padding:10px;
		font-size:20px;
		curser:pointer;
		border-radius:5px;
		margin-bottom:15px;
		align:center;
	}
</style>
</head>
<body>

<?php
require('reses.php');
$firstnameErr=$lastnameErr=$usenameErr=$emailErr=$genderErr=$passErr=$confirmpasswordErr="";
$firstname=$lastname=$usename=$email=$gender=$pass=$confirmpassword="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 if (empty($_POST["firstname"])) {
    $firstnameErr = "first name is required";
  }else {
	  $firstname = test_input($_POST["firstname"]);
  }
  
   	 if (empty($_POST["lastname"])) {
    $lastnameErr = "Lastname is required";
  }else {
	  $lastname = test_input($_POST["lastname"]);
  }
  
  
  	 if (empty($_POST["usename"])) {
    $usenameErr = "Username is required";
  }else {
	  $usename = test_input($_POST["usename"]);
  }
  
  
      if (empty($_POST["email"])) {
    $emailErr = "email is required";
  }else {
	      $email = test_input($_POST["email"]);
	  	  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
   }else {
			$email = test_input($_POST["email"]);
		}
  } 
  
  
   	 if (empty($_POST["gender"])) {
    $genderErr = "gender is required";
  }else {
	  $gender = test_input($_POST["gender"]);
  }
  
  
   if(empty($_POST["pass"])) 
	{
		$passErr="password is required";
	   }else{
		    $pass=test_input($_POST["pass"]); 
			$confirmpassword = test_input($_POST["confirmpassword"]);
		    if(($_POST["pass"])===($_POST["confirmpassword"])){
			   if(strlen($_POST["pass"]) <= '6') {
            $passErr = "Your Password Must Contain At Least 6 Characters!";
            }
               elseif(!preg_match("#[0-9]+#",$pass)) {
              $passErr = "Your Password Must Contain At Least 1 Number!";
             }
             elseif(!preg_match("#[A-Z]+#",$pass)) {
              $passErr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$pass)) {
            $passErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } else{
		     $pass=test_input($_POST["pass"]);
	         }
		   }else {
			    $passErr="not matching";
		   }
	   }
    
  if (empty($_POST["confirmpassword"])) {
    $confirmpasswordErr = "confirm password is required";
  } else {
    $confirmpassword = test_input($_POST["confirmpassword"]);
  }
  
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<section>
<div class="register" align="center">
<h2>REGISTRATION FORM</h2>
<p><span class="error">* required field</span></p>
<form align="left" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <i class="fa fa-user" aria-hidden="true"></i>
   First Name: <input type="text" name="firstname" placeholder="First Name" required>
   <span class="error">* <?php echo $firstnameErr;?></span>
  <br><br>
  <i class="fa fa-user" aria-hidden="true"></i>
  Last Name: <input type="text" name="lastname" placeholder="Last Name" required>
  <span class="error">* <?php echo $lastnameErr;?></span>
  <br><br>
  <i class="fa fa-user" aria-hidden="true"></i>
  Username: <input type="text" name="usename" placeholder="username" required>
  <span class="error">* <?php echo $usenameErr;?></span>
  <br><br>
   <i class="fa fa-envelope-square" aria-hidden="true"></i>
   E-Mail: <input type="text" name="email" placeholder="E-Mail"required>
   <span class="error">* <?php echo $emailErr;?></span>
   
  <br><br>
  Gender:
  <i class="fa fa-female" aria-hidden="true"></i>
  <input type="radio" name="gender" value="female">Female
  <i class="fa fa-male" aria-hidden="true"></i>
  <input type="radio" name="gender" value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <i class="fa fa-lock" aria-hidden="true"></i>
  Password: <input type="password" name="pass" placeholder="Password"required>
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  <i class="fa fa-lock" aria-hidden="true"></i>
 confirm Password: <input type="password" name="confirmpassword" placeholder="confirmPassword"required>
 <span class="error">* <?php echo $confirmpasswordErr;?></span>
  <br><br>
  <p align="center"><input  type="submit" name="submit" value="register"></p> 
</form>
</fieldset>
</div>
</section>

</body>
</html>