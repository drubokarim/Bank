<?php session_start();?>
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
	 <input type="submit" id="button" value="Accounts" formaction="http://localhost/wt/accounts.php">
	 <input type="submit" id="button" value="Transfer" formaction="http://localhost/wt/transfer.php">
	 <input type="submit" id="button" value="Statements" formaction="http://localhost/wt/statements.php">
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
Email Address 
Password        <a href="http://localhost/wt/ChangePassword.php">change Password</a>
Date of Birth
</pre>
</h3>
<h1 style="color: blue">
	CONTACT DETAILS
</h1>
<br>
<h3>
<pre>
Phone Number 
</pre>
</h3>

<h1 style="color: blue">
	LAST LOGIN
</h1>
<br>
<h3>
<pre>
Date
IP Address:
</pre>
</h3>
<h1 style="color: blue">
	PHYSICAL ADDRESS
</h1>
<br>
<h3>
<pre>
Address 
Zip/postal Code
Country
</pre>
</h3>

<h1 style="color: blue">
	User Status
</h1>
<br>
<h3>
<pre>
Staus
Accounts
</pre>
</h3>
</fieldset>
</form></div>
</body>
</html>