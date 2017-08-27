<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>
		USER DashBoard
	</title>
	<link rel="stylesheet" type="text/css" href="statements.css">
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

	 <input type="submit"  id="button" value="Home" formaction="http://localhost/wt/dashboard.php">
	 <input type="submit" id="button" value="Accounts" formaction="http://localhost/wt/accounts.php">
	 <input type="submit" id="button" value="Transfer" formaction="http://localhost/wt/transfer.php">
	 <input type="submit" style="color: black;"  id="button" value="Statements" formaction="http://localhost/wt/statements.php">
	 <input type="submit" id="button" value="Settings" formaction="http://localhost/wt/Settings.php">
	 <input type="submit" id="button" value="Profile" formaction="http://localhost/wt/AccountInformation.php">
	 <input type="submit" id="button" value="Logout" formaction="http://localhost/wt/login.php">
</fieldset>
</div>
</form>
<div class="Pos">
<form>
	<fieldset class="Pos">
		<input type="submit"  style="font-size: 100%; color:black;" id="button" value="Speicific Account statement" formaction="http://localhost/wt/statements.php">
	    <input type="submit" style="font-size: 100%;"id="button" value="All Account Trasaction" formaction="http://localhost/wt/statements1.php">
        <form>
        	<fieldset>
        		<legend>Specific Account Transaction</legend> 
        		select your Account
               <select name="_from">
                <option value="Account Number - Current Balance">Account Number - Current Balance</option>
               </select><br><br><br><br><br><br><br>
        		*From <input type="date" name="_from">    *To <input type="date" name="_to">   <input type="submit" name="Generate" value="Generate"><br><br><br><br>
        		<table id=tebels>
			    <tr>
				<th>
					Date
				</th>
				<th>
					Account Number
				</th>
				<th>
					ID
				</th>
				<th>
					Description
				</th>
				<th>
					Credit/Debit
				</th>
				<th>
					Current Balance
				</th>
				<th>
					Status
				</th>
			</tr>
		</table>

        	</fieldset>
        </form>
	</fieldset>
</form>
</div>
</body>
</html>