<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
   <title>
      USER DashBoard
   </title>
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
    <input type="submit" style="color: black;" id="button" value="Transfer" formaction="http://localhost/wt/transfer.php">
    <input type="submit" id="button" value="Statements" formaction="http://localhost/wt/statements.php">
    <input type="submit" id="button" value="Settings" formaction="http://localhost/wt/Settings.php">
    <input type="submit" id="button" value="Profile" formaction="http://localhost/wt/AccountInformation.php">
    <input type="submit" id="button" value="Logout" formaction="http://localhost/wt/login.php">
</fieldset>
</div>
</form>
<div>
<form class="Pos">
  <fieldset class="Pos">
    <legend>Transfer</legend>
    <input type="submit" style="font-size: 100%;" id="button" value="User_To_User" formaction="http://localhost/wt/transfer.php">
   <input type="submit"  style="color: black;font-size: 100%;" id="button" value="Account_To_Account" formaction="http://localhost/wt/transfer1.php"><form method="post" action="">
   <fieldset>
     <legend>Account_to_Account</legend>
     select your Debit Account
     <select name="_from">
       <option value="Account Number - Current Balance">Account Number - Current Balance</option>
     </select><br><br><br><br><br><br><br>
     select your Credit Account
     <select name="_To">
       <option value="Account Number - Current Balance">Account Number - Current Balance</option>
     </select>
     <br><br><br><br>
     <u>Transfer Details</u><br><br><br><br>
     *Amount To Transfer : <input type="text" name="amount"><br><br><br>
     *Description        : <textarea name="Description" rows="6" cols="60"></textarea> <br><br>

     <input type="submit" name="Proceed" value="Proceed">
   </fieldset>
</form>
  </fieldset>
</form></div>


</body>
</html>