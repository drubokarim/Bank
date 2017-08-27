<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Settings
	</title>
	<link rel="stylesheet" type="text/css" href="Settings.css">
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
    <input type="submit" name="acc_btn" id="button" value="Accounts" formaction="http://localhost/wt/accounts.php">
    <input type="submit" name="Transfer_btn" id="button" value="Transfer" formaction="http://localhost/wt/transfer.php">
    <input type="submit" name="Statements" id="button" value="Statements" formaction="http://localhost/wt/statements.php">
    <input type="submit" style="color: black;" id="button" value="Settings" formaction="http://localhost/wt/Settings.php">
    <input type="submit" id="button" value="Profile" formaction="http://localhost/wt/AccountInformation.php">
    <input type="submit" id="button" value="Logout" formaction="http://localhost/wt/login.php">
</fieldset>
</div>
</form>
   </h1>
   <br>
   <div class="Pos">
   <form action="http://localhost/wt/dashboard.php">
   
   
   	<fieldset class="Pos">
      <h1>
      <b >
      Settings
       </b>
      </h1>
   	<h2 style="color: blue">
   	NOTIFICATIONS	
   	</h2><br><label>
   	Internal Notification</label><br>
   	<h4><label>When a transfer from another user is received</label></h4>
   	<label class="switch">
   	<input type="checkbox" name="N1">
   	<span class="slider"></span>
   	</label>
   	<br>
      <label>
   	Email Notification<br></label>
   	<h4><label>When an Internal Activity is Happened</label></h4>
   	<label class="switch">
   	<input type="checkbox" name="N2">
   	<span class="slider"> </span>
   	</label>
   	<br><label>
   	<h4>When Login Attempt Fails</h4></label>
   	<label class="switch">
   	<input type="checkbox" name="N3">
   	<span class="slider"> </span>
   	</label>
   	<br><label>
   	<h4>When Funds are Added to my Account</h4></label>
   	<label class="switch">
   	<input type="checkbox" name="N4">
   	<span class="slider"> </span>
   	</label>
   	<br>

   	
   
   	
   	<h2 style="color: blue"><label>
   	Other Settings</label>	
   	</h2><br>
   	<label>Currency Settings</label>
   	<br>
   	<label><h4>Set Default Currency</h4></label>    
   	<select name="currency" >
   		<option value="USD">USD</option>
   		<option value="BDT">BDT</option>
   	</select>  
   	<br>  
   	 <a href="Currency.php" style="background-color: rgb(1,1,1);">Add More Currencies</a>
   	 <input type="submit" style="background-color: lightblue; font-size: 100%" value="Save" name="Save">
   	</fieldset>

   </form>
   </div>
   
</body>
</html>