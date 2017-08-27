<?php session_start(); $From_date=$To_date=$selectedAcc="";?>
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
	 <input type="submit" name="Statements" style="color: black;"  id="button" value="Statements" formaction="http://localhost/wt/statements.php">
	 <input type="submit" id="button" value="Settings" formaction="http://localhost/wt/Settings.php">
	 <input type="submit" id="button" value="Profile" formaction="http://localhost/wt/AccountInformation.php">
	 <input type="submit" id="button" value="Logout" formaction="http://localhost/wt/login.php">
</fieldset>
</div>
</form>
<div class="Pos">
<form method="post">
	<fieldset class="Pos">
		<input type="submit"  style="font-size: 100%; color:black;" name="Speicific_Statements" id="button" value="Speicific Account statement" formaction="http://localhost/wt/statements.php">
	    <input type="submit" style="font-size: 100%;" id="button" name="All_Statements" value="All Account Trasaction" formaction="http://localhost/wt/statements1.php">
        <form method="post">
        	<fieldset>
        		<legend>Specific Account Transaction</legend> 
        		select your Account
               <select name="_ACC">
                <option value="Account Number - Current Balance">Account Number - Current Balance</option>
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
               </select><br><br><br><br><br><br><br>
        		*From <input type="date" name="_from">    *To <input type="date" name="_to">   <input type="submit" name="Generate" value="Generate"><br><br><br><br>
        		<table id=tebels border="1">
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
				
			</tr>
			<?php
			    if($_SERVER["REQUEST_METHOD"]=="POST" && !isset($_POST["Speicific_Statements"]) && !isset($_POST["All_Statements"]))
			    {
                            
                            if($_POST["Generate"])
                            {
                            	
                            	$From_date=$_POST["_from"]." 00:00:00.000000";
                                $To_date=$_POST["_to"]." 00:00:00.000000";
                                $selectedAcc=$_POST["_ACC"];
                                $timestamp=strtotime($From_date);
                                $t1=date("Y-m-d H:i:s A", $timestamp);
                                $timestamp1=strtotime($To_date);
                                $t2=date("Y-m-d H:i:s A", $timestamp1);
                            	$con=$con=mysqli_connect("localhost","ASD","123");
                            	if(!$con)
                            	{
                                              echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
                            	}
                            	elseif(mysqli_select_db($con,"bank"))
                        	    {
                        	    	$sql="select HAPPENED_DATE_TIME,ACCOUNT_NUMBER,USER_ID,DESCRIPTION,AMOUNT,TOTAL_BALACE,ACCOUNT_TYPE from account,transaction,user where (ACCOUNT_NUMBER=transaction.FROM or ACCOUNT_NUMBER=transaction.TO) and user.ID=USER_ID and USERNAME='".$_SESSION["user"]."' and ACCOUNT_NUMBER=".$selectedAcc." " ;// and transaction.HAPPENED_DATE_TIME BETWEEN ".$t1." and ".$t2."
                        	       $result=mysqli_query($con,$sql);
                        	       if($result)
                        	       {
                        	       	         echo "<script type='text/javascript'>alert('Hello from:".$t1." To:".$t2."')</script>";  
                                             while ( $r=mysqli_fetch_array($result)) { echo"<tr>";echo"<td>".$r["HAPPENED_DATE_TIME"]."</td>";echo"<td>".$r["ACCOUNT_NUMBER"]."</td>";echo"<td>".$r["USER_ID"]."</td>";echo"<td>".$r["DESCRIPTION"]."</td>";

                                                 echo"<td>".$r["AMOUNT"]."</td>";echo"<td>".$r["TOTAL_BALACE"]."</td>";
                                                 echo"</tr>";
            	  
                                             }
                        	       }
                        	       else
                        	       {
                        	       	echo "<script type='text/javascript'>alert('error!Statement Generation Failed')</script>";
                        	       }
                        	    }
                        	    else
                        	    {
                        	    	echo "<script type='text/javascript'>alert('error!couldnot connect to the DB')</script>";
                        	    }
                            }
                        
			    }
			    ?>
		</table>

        	</fieldset>
        </form>
	</fieldset>
</form>
</div>
</body>
</html>