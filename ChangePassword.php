 <?php session_start();?>

<!DOCTYPE html>  
   <head>
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
    <form method="post" action=""> 
    <fieldset class="Pos">
    <legend><h1> Online Banking_Change Password</h1> </legend>
        <legend>Change Password
		</legend>
            <p>
               <label>*Old Password : 
               </label>
               <input type="text" name= "oldpassword" class="long"/>
            </p>		
			<p>
               <label>*New Password : 
               </label>
               <input type="text" name= "newpassword" class="long"/>
            </p>
			<p>
               <label>*Confirm New Password : 
               </label>
               <input type="text" name= "newpassword" class="long"/>
            </p>
			<p>
			<p>Please keep the password complicated atleast eight character.</p> 
              
		
	
	</br>
	<div><button class="button"> SUBMIT </button></div>
     </fieldset>
    </form>
    </div>  
    </body>  
    </html>  