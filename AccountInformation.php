<?php 
session_start();
$Email=$DOB=$Phone=$ADDRESS=$STATUS=$Accounts="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		AccountInformation
	</title>
	<link rel="stylesheet" type="text/css" href="AccountInformation.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
if(!isset($_SESSION["user"])) 
	{header("Location: http://localhost/wt/login.php");}
  $con=$con=$con=mysqli_connect("localhost","ASD","123");
  if(!$con)
  {
  	echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";

  } 
  elseif (mysqli_select_db($con,"bank")) {
     	$sql="select Email,DOB,Phone,ADDRESS,STATUS from user,userinfo where username='".$_SESSION["user"]."' and user.id=userinfo.userid ";
     	$sql1="select count(*) as Noacc from account,user where user.id=account.user_id and username='".$_SESSION["user"]."'";
     	$res=mysqli_query($con,$sql);
     	$res1=mysqli_query($con,$sql1);
     	if($res && $res1)
     	{
     		 echo "<script type='text/javascript'>alert('loading successful')</script>"; 
                while ($r1=mysqli_fetch_array($res)) {
                	$Email=$r1["Email"];
                	$DOB=$r1["DOB"];
                	$Phone=$r1["Phone"];
                	$ADDRESS=$r1["ADDRESS"];
                	$STATUS=$r1["STATUS"];
                	}
                	while ($r2=mysqli_fetch_array($res1)) {
                		 $Accounts=$r2["Noacc"];
                	}
     	}
     	else
     	{
               echo "<script type='text/javascript'>alert('error!loading data')</script>";  
     	}
     }   

?>
<form method="post" action="">
<div id="header">
	<fieldset>
		<i class="fa fa-user"></i> <b>Welcome Back, <?php echo $_SESSION["user"];?>
	</fieldset>
</div>
<div id="sidebar">
	
  <span class="letters"><fieldset><h2>G-BANKING</h2></fieldset> </span> 
<fieldset>

	 <input type="submit" id="button" value="Home" formaction="http://localhost/wt/dashboard.php">
	 <input type="submit" name="acc_btn" id="button" value="Accounts" formaction="http://localhost/wt/accounts.php">
	 <input type="submit" name="Transfer_btn" id="button" value="Transfer" formaction="http://localhost/wt/transfer.php">
	 <input type="submit" name="Statements" id="button" value="Statements" formaction="http://localhost/wt/statements.php">
	 <input type="submit" id="button" value="Settings" formaction="http://localhost/wt/Settings.php">
	 <input type="submit" style="color: black;" id="button" value="Profile" formaction="http://localhost/wt/AccountInformation.php">
	 <input type="submit" id="button" value="Logout" formaction="http://localhost/wt/login.php">
</fieldset>
</div>
</form>
<div class="Pos">
<form >
<br>
<br>
<br>

<fieldset class="Pos"><i class="fa fa-user"></i><a style="color: white;" href="http://localhost/wt/EditProfile.php">Edit Profile</a>
<h1 style="color: blue">
	User Information
</h1>
<br>
<h3>
<pre>
Email Address    <input type="text" name="Email" value="<?php echo $Email;?>" readonly>
Password        <a href="http://localhost/wt/ChangePassword.php">change Password</a>
Date of Birth   <input type="text" name="DOB" value="<?php echo $DOB;?>" readonly>
</pre>
</h3>
<h1 style="color: blue">
	CONTACT DETAILS
</h1>
<br>
<h3>
<pre>
Phone Number <input type="text" name="mobile" value="<?php echo $Phone;?>" readonly>
</pre>
</h3>

<h1 style="color: blue">
	LAST LOGIN
</h1>
<br>
<h3>
<pre>
Date <input type="text" name="Login" value="<?php echo date("Y-m-d");?>" readonly>

</pre>
</h3>
<h1 style="color: blue">
	PHYSICAL ADDRESS
</h1>
<br>
<h3>
<pre>
Address :<input type="text" name="address" value="<?php echo $ADDRESS;?>" readonly>

</pre>
</h3>

<h1 style="color: blue">
	User Status
</h1>
<h3>
<pre>
Staus <input type="text" name="status" value="<?php if($STATUS>0) echo "ACTIVE"; else echo "INACTIVE";?>" readonly>
Accounts  <input type="text" name="NO_OF_ACCOUNTS" value="<?php echo $Accounts;?>" readonly>
</pre>
</h3>
</fieldset>
</form></div>
</body>
</html>