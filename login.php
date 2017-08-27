<?php session_start();?>
<!DOCTYPE html>
<html >
<head>
  
  <title>Login Form</title>
  
  	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="log.css">

  
</head>


<body>
<?php
$_unameError=$_passwordError="";
?>
<?php
$uname="";
$pass="";
function test_input($data)
{
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(empty($_POST["username"])==true)
	{
		$_unameError="user name required";
	}
	else if(empty($_POST["password"])==true)
	{
		$_passwordError="Password Required";

	}
	else{
		$uname=test_input($_POST["username"]);
		        $pass=test_input($_POST["password"]);
				$con=mysqli_connect("localhost","ASD","123");
				if($con==null)
				{
					echo "error connecting to DB";
				} 
		else
		{
			if(mysqli_select_db($con,'bank'))
			{
				$sql="select * from USER WHERE USERNAME='".$uname."' and PASSWORD='".md5($pass)."'";
			    $result=mysqli_query($con,$sql)
			    or die("Failed to retrieve data from DB".mysqli_error());
			    $row=mysqli_fetch_array($result);
			    //$i=0;
			    //$row=mysqli_fetch_array($result,MYSQLI_ASSOC) ;
				
				//echo "<script type='text/javascript'>alert('".$row["username"]."')</script>";
				//echo "<script type='text/javascript'>alert('".$row["password"]."')</script>";
			
			   //if($result=)
			   if($row["USERNAME"]==$uname && $row["PASSWORD"]==md5($pass))
			   {

				    //echo "<script type='text/javascript'>alert('".$_POST["password"]."')</script>";
				    header("Location: http://localhost/wt/dashboard.php");
				    //session_start();
				    $_SESSION["user"]=$uname;
				
			   }
			   else 
			   {
				echo "<script type='text/javascript'>alert('login Failed!".$_POST["username"]."".$_POST["password"]."')</script>";
				//
				//echo $_POST["username"]>;
			   }
			}
			else
			{
				echo "error selecting db";
			}
			
		}
	}

}
?>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">G-Banking</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="active"><a href="homepage.html">Home</a></li>
        <li><a href="aboutus.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <body class="b1">
 	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1 class="lo">Login</h1>
			</div>
<form method="post" action="">
			<div class="login-form">
				<div class="control-group">
				<input type="text" class="login-field" value="<?php echo $uname;?>" name="username" id="login-name"><span class="error"><br>*<?php echo $_unameError; ?></span>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" name="password" id="login-pass"><span class="error"><br>*<?php echo $_passwordError; ?></span>
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<input type="submit"  class="btn btn-primary btn-large btn-block" value="Login">
				<a class="login-link" href="http://localhost/wt/forgetpass.php">Forgot password?</a>
				<a class="login-link" href="http://localhost/wt/signup.php">SIGN UP?</a>
			</div>
</form>
		</div>
	</div>

 </body>
	
  
  

</html>
