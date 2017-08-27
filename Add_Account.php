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
$Errors=array();
if(!isset($_SESSION["user"])) 
   {header("Location: http://localhost/wt/login.php");}
 $account_number=$account=$initial_balance="";
 if($_SERVER["REQUEST_METHOD"]=="POST"){
     $con=mysqli_connect("localhost","ASD","123");
     if($con==null)
     {
      echo "<script type='text/javascript'>alert('connection Failed!')</script>";
     }
     else
     {
       if(mysqli_select_db($con,'bank'))
       {
          $account_number=$_POST["account_number"];
          $account=$_POST["account_type"];
          $initial_balance=$_POST["balance"];
          $uid;
          $retrieve="select id from user where username='".$_SESSION["user"]."'";
          $result=mysqli_query($con,$retrieve)
          or die("<script type='text/javascript'>window.alert('failed to retrieve')</script>");
          while ($row=mysqli_fetch_array($result)) {
            $uid=$row["id"];
          }
          $sql="insert into account(ACCOUNT_NUMBER,ACCOUNT_TYPE,TOTAL_BALACE,CREATED_DATE,UPDATED_DATE,USER_ID) values('".$account_number."','".$account."',".
          $initial_balance.",CURDATE(),CURDATE(),".$uid.")";

          $result1=mysqli_query($con,$sql);
          if(!$result1)
          {?>//<script type='text/javascript'>alert('failed to Insert')</script>
           <?php echo"hello"; header("Location: http://localhost/wt/Add_Account.php");
           }
          else
          {?>
           <script type='text/javascript'>alert('Successful')</script>
            <?php header("Location: http://localhost/wt/accounts.php");
          }

       }else
       {
        echo "<script type='text/javascript'>window.alert('Can't connect to the server now!')</script>";

       }
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
    <input type="submit" name="acc_btn" style="color: black;" id="button" value="Accounts" formaction="http://localhost/wt/accounts.php">
    <input type="submit" name="Transfer_btn" id="button" value="Transfer" formaction="http://localhost/wt/transfer.php">
    <input type="submit" name="Statements" id="button" value="Statements" formaction="http://localhost/wt/statements.php">
    <input type="submit" id="button" value="Settings" formaction="http://localhost/wt/Settings.php">
    <input type="submit" id="button" value="Profile" formaction="http://localhost/wt/AccountInformation.php">
    <input type="submit" id="button" value="Logout" formaction="http://localhost/wt/login.php">
</fieldset>
</div>
</form>
<div>
<form class="Pos" method="post" action="">
  <fieldset class="Pos">
    <legend>ADD ACCOUNT</legend>
    <pre>
    *ACCOUNT NUMBER   : <input type="text" name="account_number" pattern="[0-9]*" required><br>
    *ACCOUNT TYPE     : <select name="account_type" required><option></option> <option value="Debit Account"  <?php if(isset($account) && $account=="Debit Account") echo "selected";?> >Debit Account
                        </option>
                         <option value="Credit Account"  <?php if(isset($account) && $account=="Credit Account") echo "selected";?>>Credit Account
                        </option> 
                        </select><br>
    *INITIAL BALANCE  : <input type="text" name="balance" pattern="[0-9]+(\.[0-9]{0,10})?%?" required > <br>
                        <input type="submit" name="Insert" value="Insert">                  
    </pre>
  </fieldset>
</form></div>
</body>
</html>