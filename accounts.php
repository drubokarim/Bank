<?php session_start();$fresult;$accounts_select ;$acc_type="";$curr_balance=$acc_date=$acc_status="";$accNo=0;$cBalance=0;
            	?>
<!DOCTYPE html>
<html>
<head>
	<title>
		USER DashBoard
	</title>
	<link rel="stylesheet" type="text/css" href="accounts.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
if(!isset($_SESSION["user"])) 
	{header("Location: http://localhost/wt/login.php");}
            if($_SERVER["REQUEST_METHOD"]=="POST" && !isset($_POST['acc_btn']) &&!isset($_POST['search']) )if($_POST['Selection']){   
                $accounts_select=$_POST["accounts_select"];
            	$con=mysqli_connect("localhost","ASD","123");
		        if(!$con)
		        {
			       echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
		        }
		        elseif (mysqli_select_db($con,"bank")) {
            	   $uid;
                   $retrieve="select id,Status from user where username='".$_SESSION["user"]."'";
                   $result=mysqli_query($con,$retrieve)
                   or die("<script type='text/javascript'>window.alert('failed to retrieve')</script>");
                   while ($rs=mysqli_fetch_array($result)) {
                       $uid=$rs["id"]; $acc_status=$rs["Status"];
                   }
                   $sql="select * from account where USER_ID=".$uid."";
                   $fresult=mysqli_query($con,$sql);


                   if($fresult){
         	          while ( $r=mysqli_fetch_array($fresult)) {
         		          if($r["ACCOUNT_NUMBER"]==$accounts_select){
            	           $acc_type=$r["ACCOUNT_TYPE"];
            	           $curr_balance=$r["TOTAL_BALACE"];$acc_date=$r["UPDATED_DATE"];
         		       }
                      }
                   }
                }
                else
                {
            	    echo "<script type='text/javascript'>alert('error!couldnot load data')</script>";
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
	 <input  style="color: black;" type="submit" name="acc_btn" id="button" value="Accounts" formaction="http://localhost/wt/accounts.php">
	 <input type="submit" name="Transfer_btn" id="button" value="Transfer" formaction="http://localhost/wt/transfer.php">
	 <input type="submit" name="Statements" id="button" value="Statements" formaction="http://localhost/wt/statements.php">
	 <input type="submit" id="button" value="Settings" formaction="http://localhost/wt/Settings.php">
	 <input type="submit" id="button" value="Profile" formaction="http://localhost/wt/AccountInformation.php">
	 <input type="submit" id="button" value="Logout" formaction="http://localhost/wt/login.php">
</fieldset>
</div>
</form>
<div class="Pos">
<form method="post" >
	<fieldset class="Pos">
	<legend>Accounts</legend>
		Select Account Number:<select name="accounts_select" id="selectedAccount" value="<?php echo $_POST["accounts_select"];?>">
		<option value="Account Number - Current Balance">
		Account Number - Current Balance
		</option> 
		<?php 
		$con=mysqli_connect("localhost","ASD","123");
		if(!$con)
		{
			echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
		}
		elseif (mysqli_select_db($con,"bank")) {
			$uid;
            $retrieve="select id from user where username='".$_SESSION["user"]."'";
            $result=mysqli_query($con,$retrieve)
            or die("<script type='text/javascript'>window.alert('failed to retrieve')</script>");
            while ($row=mysqli_fetch_array($result)) {
                 $uid=$row["id"];
            }
            $sql="select * from account where USER_ID=".$uid."";
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
		</select><br><input type="submit" name="Selection" value="Selection" formaction="http://localhost/wt/accounts.php">       
        <br>
		<input type="submit" name="Add_Account" value="ADD Account" formaction="http://localhost/wt/Add_Account.php" style="background-color: #0099ff;" > <br>
		<fieldset><legend>Account details</legend>
         <pre style="font-size:150%;font-family: arial;">
         
        <?php     
               echo "Accoutn Type   :".$acc_type."<br>";echo "Current Balance:".$curr_balance."<br>"; echo "Updated At:".$acc_date."<br>";  echo"Status:"; if($acc_status>0)echo " Active <br>"; else echo " Inactive <br>";
         ?>	                   
         	         
         </pre>
		</fieldset><br>
		Account Number <input type="text" name="account_no" value="<?php echo $accNo;?>"> <br><br>
		Balance<input type="text" name="c_balance" value="<?php echo $cBalance;?>"><br><br><input type="submit" name="search" value="search" ><br><br>
		<table id="tebels" border="1">
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
					Credit/Debit
				</th>
				<th>
					Current Balance
				</th>
				<th>
					Status
				</th>
			</tr><?php                                                                                                                                             if($_SERVER["REQUEST_METHOD"]=="POST"  && (!isset($_POST['acc_btn']) && !isset($_POST['Selection']) ) )
                {
                if($_POST['search'])         
                 {                                           
                $con=mysqli_connect("localhost","ASD","123");
		        if(!$con)
		        {
			     echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
		        }
		        elseif (mysqli_select_db($con,"bank")) {$accNo=$_POST["account_no"];$cBalance=$_POST["c_balance"];
			    $uid;$status="";
                $retrieve="select status,id from user where username='".$_SESSION["user"]."'";
                $result=mysqli_query($con,$retrieve)
                or die("<script type='text/javascript'>window.alert('failed to retrieve')</script>");
                while ($row=mysqli_fetch_array($result)) {
                 $uid=$row["id"];$status=$row["status"];echo "<script type='text/javascript'>window.alert('".$status."')</script>";
                }
                $sql="select * from account where USER_ID=".$uid." and (ACCOUNT_NUMBER=".$_POST["account_no"]." or TOTAL_BALACE=".$_POST["c_balance"].")";
                $result1=mysqli_query($con,$sql);echo "<script type='text/javascript'>alert('".$_POST["account_no"].$_POST["c_balance"]."')</script>";
                if($result1)
                {
            	$fresult=$result1;
            	while ( $r=mysqli_fetch_array($result1)) { echo"<tr>";echo"<td>".$r["UPDATED_DATE"]."</td>";echo"<td>".$r["ACCOUNT_NUMBER"]."</td>";echo"<td>".$r["ID"]."</td>";echo"<td>".$r["ACCOUNT_TYPE"]."</td>";echo"<td>".$r["TOTAL_BALACE"]."</td>";if($status>0)echo"<td>"."Active"."</td>";else echo"<td>"."Inactive"."</td>";
            	  
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
          } 
          }                                                                                                                                   
              elseif ($_SERVER["REQUEST_METHOD"]=="POST") {
		      
		      if(!$con)
		      {
			echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
		    }
		     elseif (mysqli_select_db($con,"bank")) {
			$uid;$status="";
            $retrieve="select status,id from user where username='".$_SESSION["user"]."'";
            $result=mysqli_query($con,$retrieve)
            or die("<script type='text/javascript'>window.alert('failed to retrieve')</script>");
            while ($row=mysqli_fetch_array($result)) {
                 $uid=$row["id"];$status=$row["status"];echo "<script type='text/javascript'>window.alert('".$status."')</script>";
            }
            $sql="select * from account where USER_ID=".$uid."";
            $result1=mysqli_query($con,$sql);
            if($result1)
            {
            	$fresult=$result1;
            	while ( $r=mysqli_fetch_array($result1)) { echo"<tr>";echo"<td>".$r["UPDATED_DATE"]."</td>";echo"<td>".$r["ACCOUNT_NUMBER"]."</td>";echo"<td>".$r["ID"]."</td>";echo"<td>".$r["ACCOUNT_TYPE"]."</td>";echo"<td>".$r["TOTAL_BALACE"]."</td>";if($status>0)echo"<td>"."Active"."</td>";else echo"<td>"."Inactive"."</td>";
            	  
             }
            }
            else
            {
            	echo "<script type='text/javascript'>alert('error!couldnot load data')</script>";
            }	
            
		}
		else{
                 echo "<script type='text/javascript'>alert('error!couldnot connect to the server')</script>";
		} }            
		
		?>
		</table>
	</fieldset>
</form></div>
</body>
</html>