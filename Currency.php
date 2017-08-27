<?php session_start();?>
!DOCTYPE html>
<html>
<head>
	<title>Currency</title>
    <link rel="stylesheet" type="text/css" href="transfer.css">
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
   <form method="post" action=""> 
    <fieldset class="Pos"><legend><h1>Currencies</h1></legend> 
        <legend>NEW CURRENCIES
		</legend>	
			<p>
               <label>*Currency Code : 
               </label>
               <input type="text" name= "currencycode" class="long"/>
            </p>
			<p>
                <label >*Currency Name :
                </label>
                <input type="text" name= "currencyname" class="long" maxlength="10"/>
            </p>
         	
			<p> 
			   <label>*Rate :
               </label>
               <input type="varchar" name= "rate" class="long"/>
            </p>
			
             <div><input type="submit" name="update" value="update"><BR> </BR> <div><input type="submit" name="ADD_NEW" value="ADD NEW"></div>
             <table>
             	<tr>
             		<th>Currency Code</th>
             		<th>Currency Name</th>
             		<th>Rate</th>
             		
             	</tr>
             </table>   
            
	</fieldset>
	<br>
	
	</br>
	
     
    </form></div> 
</body>
</html>