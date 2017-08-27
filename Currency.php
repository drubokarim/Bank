<?php session_start();$cur_name=$cur_code="";$cur_rate=0;$cur_id=0;$prev_code="";?>
<!DOCTYPE html>
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
if($_SERVER["REQUEST_METHOD"]=="POST" && !isset($_POST['update'])&& !isset($_POST['search']))
{
  if($_POST['ADD_NEW'])
  {
    $cur_name=$_POST['currencyname'];
    $cur_code=$_POST['currencycode'];
    $cur_rate=$_POST['currencyrate'];

    if(!empty($cur_name))
    {
      if(!empty($cur_code))
      {
        if(!empty($cur_rate))
        {
          $con=mysqli_connect("localhost","ASD","123");
          if(!$con)
          {
             echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
          }
          elseif (mysqli_select_db($con,"bank")) {
             $sql="insert into currency(currency_code,currency_name,rate) values('".$cur_code."','".$cur_name."',".$cur_rate.")";
             $result=mysqli_query($con,$sql);
             if($result)
             {
                echo "<script type='text/javascript'>alert('Successfully Inserted new Currency')</script>";
             }
             else
             {
               echo "<script type='text/javascript'>alert('currency insertion failed')</script>";
             }
          }
          else
          {
            echo "<script type='text/javascript'>alert('error!couldnot connect to the DB')</script>";
          }
        }
        else
        {
          echo "<script type='text/javascript'>alert('Currency rate required')</script>";
        }

      }
      else
      {
         echo "<script type='text/javascript'>alert('Currency code required')</script>";
      }

    }
    else
    {
       echo "<script type='text/javascript'>alert('Currency name required')</script>";
    }
  }
}

if($_SERVER["REQUEST_METHOD"]=="POST" && !isset($_POST['ADD_NEW']) && !isset($_POST['update']) && $_POST['currencyid']!=0)
{
  if($_POST['search'])
  {
    $cur_id=$_POST['currencyid'];
    

    if(!empty($cur_id))
    {
      
        
          $con=mysqli_connect("localhost","ASD","123");
          if(!$con)
          {
             echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
          }
          elseif (mysqli_select_db($con,"bank")) {
             $sql="select * from currency where ID=".$cur_id."";
             $result=mysqli_query($con,$sql);
             if($result)
             {
                while ($row=mysqli_fetch_array($result)) {
                  $cur_name=$row['CURRENCY_NAME'];
                  $cur_code=$row['CURRENCY_CODE'];
                  $cur_rate=$row['RATE'];
                  $prev_code=$row['CURRENCY_CODE'];
                }
             }
             else
             {
               echo "<script type='text/javascript'>alert('UPDATE FAILED! please make sure that youre currency id is valid ')</script>";
             }
          }
          else
          {
            echo "<script type='text/javascript'>alert('error!couldnot connect to the DB')</script>";
          }
        
        

      
      

    }
    else
    {
       echo "<script type='text/javascript'>alert('Currency ID required')</script>";
    }
  }
}  
if($_SERVER["REQUEST_METHOD"]=="POST" && !isset($_POST['ADD_NEW']) && !isset($_POST['search']))
{
  if($_POST['update'])
  {
    $cur_id=$_POST['currencyid'];
    $cur_name=$_POST['currencyname'];
    $cur_code=$_POST['currencycode'];
    $cur_rate=$_POST['currencyrate'];
    echo "<script type='text/javascript'>alert('Name:".$cur_name."   Code:".$cur_code."   rate:".$cur_rate."   id:".$cur_id."')</script>";
    
    if(!empty($cur_name))
    {
      if(!empty($cur_code))
      {
        if(!empty($cur_rate))
        {
          $con=mysqli_connect("localhost","ASD","123");
          if(!$con)
          {
             echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
          }
          elseif (mysqli_select_db($con,"bank")) {
            $sql1="select * from currency where ID=".$cur_id."";
             $result1=mysqli_query($con,$sql1);
             if($result1)
             {
                while ($row1=mysqli_fetch_array($result1)) {
                  //$cur_name=$row['CURRENCY_NAME'];
                  //$cur_code=$row['CURRENCY_CODE'];
                  //$cur_rate=$row['RATE'];
                  $prev_code=$row1['CURRENCY_CODE'];
                }
             }
            if($prev_code!=$cur_code)
            {

             $sql="update `currency` SET `CURRENCY_CODE` = '".$cur_code."', `CURRENCY_NAME` = '".$cur_name."', `RATE` = '".$cur_rate."' WHERE `currency`.`ID` = ".$cur_id."";
            }
           else
           {
            $sql="update `currency` SET `CURRENCY_NAME` = '".$cur_name."', `RATE` = '".$cur_rate."' WHERE `currency`.`ID` = ".$cur_id."";
           }
             
             $result=mysqli_query($con,$sql);
             if($result)
             {
                echo "<script type='text/javascript'>alert('Successfully updated  Currency')</script>";
             }
             else
             {
               echo "<script type='text/javascript'>alert('UPDATE FAILED! please make sure that youre currency id is valid ')</script>";
             }
          }
          else
          {
            echo "<script type='text/javascript'>alert('error!couldnot connect to the DB')</script>";
          }
        }
        else
        {
          echo "<script type='text/javascript'>alert('Currency rate required')</script>";
        }

      }
      else
      {
         echo "<script type='text/javascript'>alert('Currency code required')</script>";
      }

    }
    else
    {
       echo "<script type='text/javascript'>alert('Currency name required')</script>";
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
	 <input type="submit" name="acc_btn" id="button" value="Accounts" formaction="http://localhost/wt/accounts.php">
	 <input type="submit" name="Transfer_btn" id="button" value="Transfer" formaction="http://localhost/wt/transfer.php">
	 <input type="submit" name="Statements" id="button" value="Statements" formaction="http://localhost/wt/statements.php">
	 <input type="submit" style="color: black;" id="button" value="Settings" formaction="http://localhost/wt/Settings.php">
	 <input type="submit" id="button" value="Profile" formaction="http://localhost/wt/AccountInformation.php">
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
               <input type="text" name= "currencycode" patern="[a-z0-9A-Z]*" minlength="5" maxlength="10" value="<?php echo $cur_code;?>">
            </p>
			<p>
                <label >*Currency Name :
                </label>
                <input type="text" name= "currencyname"  patern="[a-zA-Z ]*" minlength="3" value="<?php echo $cur_name;?>">
            </p>
         	
			<p> 
			   <label>*Rate :
               </label>
               <input type="varchar" name= "currencyrate" patern="[0-9]*" value="<?php echo $cur_rate;?>" maxlength="4">
            </p>
			
             <div><input type="submit" name="ADD_NEW" value="ADD NEW"></div><BR> </BR><div><label>ID :
               </label><input type="text" name="currencyid" pattern="[0-9]*" value="<?php echo $cur_id;?>"><input type="submit" name="search" value="search"><br><br><input type="submit" name="update" value="update">  
             <table id="tables" border="1">
             	<tr>
                <th>ID</th>
             		<th>Currency Code</th>
             		<th>Currency Name</th>
             		<th>Rate</th>
             		
             	</tr>
              <?php
              $con=mysqli_connect("localhost","ASD","123");
          
              if(!$con)
              {
                echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
              }
             elseif (mysqli_select_db($con,"bank")) {
               
              $sql="select * from currency ";
              $result1=mysqli_query($con,$sql);
              if($result1)
              {
              $fresult=$result1;
              while ( $r=mysqli_fetch_array($result1)) { echo"<tr>";echo"<td>".$r["ID"]."</td>";echo"<td>".$r["CURRENCY_CODE"]."</td>";echo"<td>".$r["CURRENCY_NAME"]."</td>";echo"<td>".$r["RATE"]."</td>" ;echo "</tr>";
                
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
             </table>   
            
	</fieldset>
	<br>
	
	</br>
	
     
    </form></div> 
</body>
</html>