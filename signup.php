<!DOCTYPE>
<html>
    <head>
        <title>G-bankings</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="signup.css">
      
    </head>
    <body> 

<?php

$Errors=array();
$uname=$pass=$cpass=$emails=$fname=$lname=$mobiles=$addresses=$_city=$country=$_zip_code=$question=$_answer=$day=$month=$year="";
 $_dob="";
$unameErr=$passErr=$cpassErr=$emailsErr=$fnameErr=$lnameErr=$mobilesErr=$addressesErr=$_cityErr=$_countryErr=$_zip_codeErr=$_questionErr=$_answerErr=$_dobErr="";
$useruniq=1;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  
  $uname=test_input($_POST["username"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$uname))
  {
    array_push($Errors, "Username should contains only letters and space");

  }
  
  $uname=test_input($_POST["username"]);
      $con=mysqli_connect("localhost","ASD","123");
      if(!$con)
      {
        echo "error connecting to DB";
      }
      else
     {
      mysqli_select_db($con,"bank");
      $sql="select USERNAME from USER ";
      $result=mysqli_query($con,$sql)
      or die("error retrieving data from db".mysqli_error());
      
      while ($row=mysqli_fetch_array($result)) {
        if($uname==$row["USERNAME"])
        {
          //$useruniq=0;
         
          array_push($Errors, "please select another username");
          break;
        }
      }
  }
  $emails=test_input($_POST["email"]);
       $con=mysqli_connect("localhost","ASD","123");
      if(!$con)
      {
        echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
      }
      else
     {
      mysqli_select_db($con,"bank");
      $sql="select EMAIL from USER ";
      $result=mysqli_query($con,$sql)
      or die("error retrieving data from db".mysqli_error());
      
      while ($row=mysqli_fetch_array($result)) {
        if($emails==$row["EMAIL"])
        {
          //$useruniq=0;
         
          array_push($Errors, "Already Registered");

          break;
        }
      }
  }
  $pass=test_input($_POST["password"]);
  $cpass=test_input($_POST["cpassword"]);
  if($pass!=$cpass)
  {
    array_push($Errors,"Your PASSWORD Doesn't match");
  }
  $fname=test_input($_POST["fname"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$fname))
  {
    array_push($Errors, "first name should contains only letters and space");

  }
  $lname=test_input($_POST["lname"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$lname))
  {
    array_push($Errors, "last name should contains only letters and space");

  }
  if(is_numeric($_POST["year"]))
  {
    if(date("Y")-$_POST["year"]<18)
    {
      array_push($Errors, "You must be atleast 18 years old to open an Account");
    }
    else{
       
       $day=$_POST["day"];
       $month=$_POST["month"];
       $year=$_POST["year"];
       $_dob=$_POST["day"]."".$_POST["month"]."".$_POST["year"];
       echo "<script type='text/javascript'>alert('".$_dob."')</script>";
       //
    }
  }
  else
  {
     array_push($Errors, "year must be numeric and 4 digit");
  }
  if(is_numeric($_POST["mobile"]))
  {
    $mobiles=test_input($_POST["mobile"]);
  }
  else
  {
    array_push($Errors, "please enter valid mobile number");
  }
  if(!preg_match("/^[a-zA-Z0-9#, ]*$/",$addresses))
  {
    array_push($Errors, "please enter a valid address");

  }
  $addresses=test_input($_POST["address"]);
  if(!preg_match("/^[a-zA-Z0-9#, ]*$/",$addresses))
  {
    array_push($Errors, "please enter a valid address");

  }
  $addresses=test_input($_POST["address"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$_city))
  {
    array_push($Errors, "please enter a valid city");

  }
  $_city=test_input($_POST["address"]);
  if(is_numeric($_POST["zip_code"]))
  {
    $_zip_code=test_input($_POST["zip_code"]);
  }
  else
  {
    array_push($Errors, "please enter a valid zip code");
  }
  if(!(isset($_POST["acceptbox"]) && $_POST["acceptbox"]=="acceptbox")){
    array_push($Errors, "please accept terms and Conditions to proceed");
  }
  $question=test_input($_POST["question"]);
  $_answer=test_input($_POST["answer"]);
  $country=test_input($_POST["country"]);
  echo "<script type='text/javascript'>alert('".$question.$country."')</script>";
  if((isset($_POST["acceptbox"]) && $_POST["acceptbox"]=="acceptbox") && count($Errors)==0)
  {
    $con=mysqli_connect("localhost","ASD","123");
      if(!$con)
      {
        echo "error connecting to DB";
      }
      else
     {
      mysqli_select_db($con,"bank");
      $retrieveuId="select count(id) from user";
      $rs=mysqli_query($con,$retrieveuId)
      or die("error retrieving user id".mysqli_error($con));
      $uis;
      while($row1=mysqli_fetch_array($rs))
      {
        //if($row1["username"]==$_POST["uname"])
        $uis=$row1["count(id)"]+1;


      }
      $pass=md5($pass);
      $_answer=md5($_answer);
      $sql="Insert into user(USERNAME,PASSWORD,EMAIL,USERTYPE,STATUS,CREATED_AT,SECURITYID,SECURITYANSWER)values('".$uname."','".$pass."','".$emails."',0,1,CURDATE(),'".$question."','".$_answer."')";
      $result=mysqli_query($con,$sql)
      or die("error inserting data into db".mysqli_error($con));
      $address1=$addresses.",".$_city.",".$_zip_code.",".$country;
      $sql1="Insert into userinfo(USERID,FIRSTNAME,LASTNAME,DOB,PHONE,ADDRESS)values('".$uis."','".$fname."','".$lname."','".$_dob."','".$mobiles."','".$address1."')";
      $result1=mysqli_query($con,$sql1)
      or die("error inserting data into userdb".mysqli_error($con));
      
      //while ($row=mysqli_fetch_array($result)) 
        if($result && $result1)
        {
          //$useruniq=0;
         
          echo "<script type='text/javascript'>alert('Registered Successfully!')</script>";
          header("Location: http://localhost/wt/login.php");
        }
        else{
          echo "<script type='text/javascript'>alert('Registration failed!')</script>";
          $dq="delete from use where username=".$uname."";
          //mysqli_query($con,$dq)
          //or die("no data found".mysqli_error());
          header("Location: http://localhost/wt/signup.php");
        }
      
  }
  }
}

function test_input($data)
{
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}

  
?>
    
    <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">G-Banking</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="active"><a href="homepage.html">Home</a></li>
        <li><a href="aboutus.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="http://localhost/wt/login.php">Login <i class="fa fa-user" aria-hidden="true"></i></a></li>
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
       
      
    <div class="container">
         <form  method="post" action="" class="register" style="text-align: justify; ">
            <h1>Registration</h1>
            <div style="border: 1px solid red;color:red;background-color: red;">
                <?php include('Errors.php');?> 
            </div>
           
            <fieldset class="row1">
                <legend>Account Details
                </legend>
                <p>
                    <label value="USERNAME"><strong>USERNAME*</strong></label><br>
                    <input id="USERNAME" type="name" class="long" name="username" value="<?php echo $uname;?>" required>
                    
                </p>
                <p>
                    <label value="Email"><strong>Email*</strong></label><br>
					<input id="Email" type="Email" class="long" name="email" value="<?php echo $emails;?>" required>
                    
                </p>
                <p>
                    <label value="password"><strong>Password*</strong></label><br>
					<input id="password" type="password" class="long" name="password" minlength="5" maxlength="10" required>

                    
                    
                </p>
                <p>
                    <label value="Confirm_password"><strong>CONFIRM Password*</strong></label><br>
                    <input id="C_password" type="password" class="long" name="cpassword" minlength="5" maxlength="10" required>

                    
                    
                </p>
            </fieldset>
            <fieldset class="row2">
                <legend>Personal Details
                </legend>
                <p>
                    <label>First Name *
                    </label><br>
                    <input type="text" class="long" name="fname" value="<?php echo $fname;?>" required>
                </p>
                <p>
                    <label>Last Name *
                    </label><br>
                    <input type="text" class="long" name="lname" value="<?php echo $lname;?>" required>
                </p>
                <p>
                    <label>Birthdate *
                    </label><br>
                    <select class="date" name="day" value="<?php echo $_POST["day"];?>" required >
                        
                        <option value="1" <?php if(isset($day) && $day=="1") echo "selected";?>>01
                        </option>
                        <option value="2" <?php if(isset($day) && $day=="2") echo "selected";?>>02
                        </option>
                        <option value="3" <?php if(isset($day) && $day=="3") echo "selected";?>>03
                        </option>
                        <option value="4" <?php if(isset($day) && $day=="4") echo "selected";?>>04
                        </option>
                        <option value="5" <?php if(isset($day) && $day=="5") echo "selected";?>>05
                        </option>
                        <option value="6" <?php if(isset($day) && $day=="6") echo "selected";?>>06
                        </option>
                        <option value="7" <?php if(isset($day) && $day=="7") echo "selected";?>>07
                        </option>
                        <option value="8" <?php if(isset($day) && $day=="8") echo "selected";?>>08
                        </option>
                        <option value="9" <?php if(isset($day) && $day=="9") echo "selected";?>>09
                        </option>
                        <option value="10" <?php if(isset($day) && $day=="10") echo "selected";?>>10
                        </option>
                        <option value="11" <?php if(isset($day) && $day=="11") echo "selected";?>>11
                        </option>
                        <option value="12" <?php if(isset($day) && $day=="12") echo "selected";?>>12
                        </option>
                        <option value="13" <?php if(isset($day) && $day=="13") echo "selected";?>>13
                        </option>
                        <option value="14" <?php if(isset($day) && $day=="14") echo "selected";?>>14
                        </option>
                        <option value="15" <?php if(isset($day) && $day=="15") echo "selected";?>>15
                        </option>
                        <option value="16" <?php if(isset($day) && $day=="16") echo "selected";?>>16
                        </option>
                        <option value="17" <?php if(isset($day) && $day=="17") echo "selected";?>>17
                        </option>
                        <option value="18" <?php if(isset($day) && $day=="18") echo "selected";?>>18
                        </option>
                        <option value="19" <?php if(isset($day) && $day=="19") echo "selected";?>>19
                        </option>
                        <option value="20" <?php if(isset($day) && $day=="20") echo "selected";?>>20
                        </option>
                        <option value="21" <?php if(isset($day) && $day=="21") echo "selected";?>>21
                        </option>
                        <option value="22" <?php if(isset($day) && $day=="22") echo "selected";?>>22
                        </option>
                        <option value="23" <?php if(isset($day) && $day=="23") echo "selected";?>>23
                        </option>
                        <option value="24" <?php if(isset($day) && $day=="24") echo "selected";?>>24
                        </option>
                        <option value="25" <?php if(isset($day) && $day=="25") echo "selected";?>>25
                        </option>
                        <option value="26" <?php if(isset($day) && $day=="26") echo "selected";?>>26
                        </option>
                        <option value="27" <?php if(isset($day) && $day=="27") echo "selected";?>>27
                        </option>
                        <option value="28" <?php if(isset($day) && $day=="28") echo "selected";?>>28
                        </option>
                        <option value="29" <?php if(isset($day) && $day=="29") echo "selected";?>>29
                        </option>
                        <option value="30" <?php if(isset($day) && $day=="30") echo "selected";?>>30
                        </option>
                        <option value="31" <?php if(isset($day) && $day=="31") echo "selected";?>>31
                        </option>
                    </select>
                    <select class="month" name="month" value="<?php echo $_POST["month"];?>" required>
                        
                        <option value="January" <?php if(isset($month) && $month=="January") echo "selected";?>>January
                        </option>
                        <option value="February" <?php if(isset($month) && $month=="February") echo "selected";?>>February
                        </option>
                        <option value="March" <?php if(isset($month) && $month=="March") echo "selected";?>>March
                        </option>
                        <option value="April" <?php if(isset($month) && $month=="April") echo "selected";?>>April
                        </option>
                        <option value="May" <?php if(isset($month) && $month=="May") echo "selected";?>>May
                        </option>
                        <option value="June" <?php if(isset($month) && $month=="June") echo "selected";?>>June
                        </option>
                        <option value="July" <?php if(isset($month) && $month=="July") echo "selected";?>>July
                        </option>
                        <option value="August" <?php if(isset($month) && $month=="August") echo "selected";?>>August
                        </option>
                        <option value="September" <?php if(isset($month) && $month=="September") echo "selected";?>>September
                        </option>
                        <option value="October" <?php if(isset($month) && $month=="October") echo "selected";?>>October
                        </option>
                        <option value="November" <?php if(isset($month) && $month=="November") echo "selected";?>>November
                        </option>
                        <option value="December" <?php if(isset($month) && $month=="December") echo "selected";?>>December
                        </option>
                    </select>
                    <input class="year" name="year" type="text" size="4" maxlength="4" minlength="4" value="<?php echo $year;?>" required>
                </p>
                <p>
                    <label >Phone *
                    </label><br>
                    <input type="text" class="long" name="mobile" pattern="01[0-9]*" value="<?php echo $mobiles;?>" maxlength="11" minlength="11" required>
                </p>
               
                
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information
                </legend>
                 <p>
                    <label class="optional">Address*
                    </label><br>
                    <input type="text" class="long" name="address" value="<?php echo $addresses;?>" required>
                </p>
                <p>
                    <label>City *
                    </label><br>
                    <input type="text" name="city" value="<?php echo $_city;?>" class="long" required>
                </p>
                <p>
                    <label >Country *
                    </label><br>
                    <select class="long" name="country" required>
                        <option value="Bangladesh"  <?php if(isset($country) && $country=="Bangladesh") echo "selected";?> class="long">Bangladesh
                        </option>
                    </select>
                </p>
                
                <p>
                    <label>Zip Code *
                    </label><br>
                    <input type="text" name="zip_code" value="<?php echo $_zip_code;?>" class="long" required>
                </p>
               
                
            </fieldset>
            <fieldset>
                <legend>
                    Security Section
                </legend>
                <label>
                Question*
                </label>
                <select class="long" name="question" value="<?php echo $_POST["question"]; ?>" required>
                    
                    <option value="1"  <?php if(isset($question) && $question=="1") echo "selected";?> class="long">what is your favourite color ?</option>
                    
                    <option value="2"  <?php if(isset($question) && $question=="2") echo "selected";?> class="long">what is your favourite fruit ?</option>
                    
                    <option value="3"  <?php if(isset($question) && $question=="3")  echo "selected";?> class="long">what is your favourite flower ?</option>
                   
                    <option value="4"  <?php if(isset($question) && $question=="4")echo "selected";?> class="long">what is your favourite food ?</option> 
                     
                </select>
                <p>
                    <label>Answer*
                    </label><br>
                    <input type="password" name="answer" class="long" value="<?php echo $_answer;?>">
                </p>
            </fieldset>

            <fieldset class="row4">
                
                <p class="agreement">
                    <input type="checkbox"  name="acceptbox" value="acceptbox"/>
                    <label>*  I accept the Terms and Conditions </label>
                </p>
               
            </fieldset>
            <div><button class="button">SignUp &raquo;</button></div>
        </form>
    </div>
       
    </body>
</html>





