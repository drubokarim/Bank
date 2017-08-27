<?php session_start(); $uname="";$uid="";$to_uname=$to_description=$to_account=$from_account="";$to_amount=0;?>
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
 if($_SERVER["REQUEST_METHOD"]=="POST" && (!isset($_POST['Transfer_btn']) && !isset($_POST['Transfer_Usr_btn']) && !isset($_POST['Transfer_Acc_btn'])))
  {
    echo "<script type='text/javascript'>alert('Trello')</script>";
    if($_POST['Proceed'])
    {

    echo "<script type='text/javascript'>alert('Hello World')</script>";
    ///$to_uname=$_POST["_username"];
    $to_account=$_POST["_To"];
    $to_amount=$_POST["_amount"];
    $to_description=$_POST["_Description"] ;
    $from_account=$_POST["_from"];
    
    $con=mysqli_connect("localhost","ASD","123");
    if(!$con)
    {
      echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
    }
    elseif (mysqli_select_db($con,"bank")) {
             $sql2="select TOTAL_BALACE from account where  ACCOUNT_NUMBER=".$from_account."";
                  $tresult=mysqli_query($con,$sql2);
                  if($tresult)
                  { 
                    
                    $from_balance=0;
                    while ($tr=mysqli_fetch_array($tresult)) {
                       $from_balance=$tr["TOTAL_BALACE"];
                    }
                    if($to_amount>100 )
                      {
                            if($from_balance>1000 && $from_balance-$to_amount>=300)
                            {
                                   $diff=$from_balance-$to_amount;
                                   $sql3="update account set TOTAL_BALACE=".$diff." where ACCOUNT_NUMBER=".$from_account."";
                                   $tr1=mysqli_query($con,$sql3);
                                   if($tr1)
                                   {
                                       $sql4="update account set TOTAL_BALACE=TOTAL_BALACE+".$to_amount." where ACCOUNT_NUMBER=".$to_account."";
                                       $tr2=mysqli_query($con,$sql4);
                                       $trcode=date('Y-m-dh:i:sa');
                                       if($tr2)
                                       {
                                         
                                         $sql5="insert into `transaction` (`TR_CODE`, `FROM`, `TO`, `AMOUNT`, `HAPPENED_DATE_TIME`, `STATUS`, `DESCRIPTION`) VALUES('".$trcode."','".$from_account."','".$to_account."',".$to_amount.",CURDATE(),1,'".$to_description."')";
                                         $tr3=mysqli_query($con,$sql5);
                                         if($tr3)
                                         {echo "<script type='text/javascript'>alert('".$to_uname.$to_account.$to_description.$from_account."')</script>";
                                            echo "<script type='text/javascript'>alert('Transaction Successful')</script>";

                                         }
                                         else
                                         {
                                          echo "<script type='text/javascript'>alert('Transaction failed".$trcode."')</script>";
                                          $tr3=mysqli_query($con,"update account set TOTAL_BALACE=".$from_balance." where ACCOUNT_NUMBER=".$from_account."");
                                          $tr4=mysqli_query($con,"update account set TOTAL_BALACE=TOTAL_BALACE-".$to_amount." where USER_ID=".$to_uid." and ACCOUNT_NUMBER=".$to_account."");
                                         }
                                         
                                       }
                                       else
                                       {
                                         echo "<script type='text/javascript'>alert('Transaction failed')</script>";
                                         $tr3=mysqli_query($con,"update account set TOTAL_BALACE=".$from_balance." where ACCOUNT_NUMBER=".$from_account."");

                                       }

                                   }
                                   else
                                   {
                                       echo "<script type='text/javascript'>alert('Transaction failed')</script>";
                                   }
                                    

                            }
                            else
                               echo "<script type='text/javascript'>alert('Not enough balance')</script>";

                      }
                      else
                      {
                         echo "<script type='text/javascript'>alert('Please Enter A Valid Amount')</script>";
                      }
            
    }
    else{
        echo "<script type='text/javascript'>alert('error!couldnot connect to the server')</script>";
    } 
  }
  } }                                                                                                                                      
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
    <input type="submit" name="Transfer_btn" style="color: black;" id="button" value="Transfer" formaction="http://localhost/wt/transfer.php">
    <input type="submit" id="button" value="Statements" formaction="http://localhost/wt/statements.php">
    <input type="submit" id="button" value="Settings" formaction="http://localhost/wt/Settings.php">
    <input type="submit" id="button" value="Profile" formaction="http://localhost/wt/AccountInformation.php">
    <input type="submit" id="button" value="Logout" formaction="http://localhost/wt/login.php">
</fieldset>
</div>
</form>
<div>
<form class="Pos" method="post">
  <fieldset class="Pos">
    <legend>Transfer</legend>
    <input type="submit" style="font-size: 100%;" name="Transfer_Usr_btn" id="button" value="User_To_User" formaction="http://localhost/wt/transfer.php">
   <input type="submit"  style="color: black;font-size: 100%;" name="Transfer_Acc_btn" id="button" value="Account_To_Account" formaction="http://localhost/wt/transfer1.php"><form method="post" action="">
   <fieldset>
     <legend>Account_to_Account</legend>
     select your Debit Account
     <select name="_from">
       <option value="Account Number - Current Balance">Account Number - Current Balance</option>
       <?php 
    $con=mysqli_connect("localhost","ASD","123");
    if(!$con)
    {
      echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
    }
    elseif (mysqli_select_db($con,"bank")) {
      
            $retrieve="select id from user where username='".$_SESSION["user"]."'";
            $result=mysqli_query($con,$retrieve)
            or die("<script type='text/javascript'>window.alert('failed to retrieve')</script>");
            while ($row=mysqli_fetch_array($result)) {
                 $uid=$row["id"];
            }
            $sql="select * from account where USER_ID=".$uid." and ACCOUNT_TYPE='Debit Account' and TOTAL_BALACE>1000";
            $result1=mysqli_query($con,$sql);
            if($result1)
            {
              $fresult=$result1;
              while ( $r=mysqli_fetch_array($result1)) { $account=$r["ACCOUNT_NUMBER"];$balance=$r["TOTAL_BALACE"];?>
                <option value="<?php echo $account;?>" <?php if (isset($accounts_select) && $accounts_select==$account) echo "selected";?>>
                  
                 <?php echo $account;?> -><?php echo $balance;?></option><?php
             }
            }
            else
            {
              echo "<script type='text/javascript'>alert('error!couldnot load data')</script>";
            } 
            
    }
    else{
                 echo "<script type='text/javascript'>alert('error!couldnot connect to the server')</script>";
    }
    ?>  
     </select><br><br><br><br><br><br><br>
     select your Credit Account
     <select name="_To">
       <option value="Account Number - Current Balance">Account Number - Current Balance</option>
       <?php 
    $con=mysqli_connect("localhost","ASD","123");
    if(!$con)
    {
      echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
    }
    elseif (mysqli_select_db($con,"bank")) {
      
            $retrieve="select id from user where username='".$_SESSION["user"]."'";
            $result=mysqli_query($con,$retrieve)
            or die("<script type='text/javascript'>window.alert('failed to retrieve')</script>");
            while ($row=mysqli_fetch_array($result)) {
                 $uid=$row["id"];
            }
            $sql="select * from account where USER_ID=".$uid." and ACCOUNT_TYPE='Credit Account'";
            $result1=mysqli_query($con,$sql);
            if($result1)
            {
              $fresult=$result1;
              while ( $r=mysqli_fetch_array($result1)) { $account=$r["ACCOUNT_NUMBER"];$balance=$r["TOTAL_BALACE"];?>
                <option value="<?php echo $account;?>" <?php if (isset($accounts_select) && $accounts_select==$account) echo "selected";?>>
                  
                 <?php echo $account;?> -><?php echo $balance;?></option><?php
             }
            }
            else
            {
              echo "<script type='text/javascript'>alert('error!couldnot load data')</script>";
            } 
            
    }
    else{
                 echo "<script type='text/javascript'>alert('error!couldnot connect to the server')</script>";
    }
    ?>  
     </select>
     <br><br><br><br>
     <u>Transfer Details</u><br><br><br><br>
     *Amount To Transfer : <input type="text" name="_amount" pattern="[0-9]+(\.[0-9]{0,10})?%?"><br><br><br>
     *Description        : <textarea name="_Description" rows="6" cols="60"></textarea> <br><br>

     <input type="submit" name="Proceed" value="Proceed">
   </fieldset>
</form>
  </fieldset>
</form></div>


</body>
</html>