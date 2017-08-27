  <?php session_start();?>
  <!DOCTYPE html>  
  <head>
    <link rel="stylesheet" type="text/css" href="transfer.css">
  </head>
  <body> 
     <?php $pass=$cpass="";
     $email=$_SESSION["email"];
     if($_SERVER["REQUEST_METHOD"]=="POST")
     {
      $pass=test_input($_POST["newpassword"]);
      $cpass=test_input($_POST["newpassword1"]);
      if($pass==$cpass)
      {
        $con=mysqli_connect("localhost","ASD","123");
        if(!$con)
      {
        echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
      }
      elseif(mysqli_select_db($con,"bank"))
     {
           
           $sql="update user set password='".md5($pass)."' where EMAIL='".$email."'";
           $result=mysqli_query($con,$sql);
           if($result)
           {
             echo "<script type='text/javascript'>alert('UPDATED PASSWORD SUCCESSFULLY')</script>";
             header("Location: http://localhost/wt/login.php");
           }
           else
           {
              echo "<script type='text/javascript'>alert('error!couldnot load data')</script>";
           }
    }
    else
    {
      echo "<script type='text/javascript'>alert('error!couldnot connect to DB')</script>";
    }
      }
      else
      {
           echo "<script type='text/javascript'>alert('password doesnot match')</script>";
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

    <h1> Online Banking_Reset Password</h1> 
    <div class="Pos">
    <form method="post" action="">
    <fieldset class="Pos">
        <legend>Reset Password
		</legend>	
			<p>
               <label>*New Password : 
               </label>
               <input type="password" name= "newpassword" minlength="8">
            </p>
			<p>
               <label>*Confirm New Password : 
               </label>
               <input type="password" name= "newpassword1" >
            </p>
			<p>
			<p>Please keep the password complicated atleast eight character.</p> 
              
		
	
	</br>
	<div><button class="button"> SUBMIT </button></div>
    </fieldset> 
    </form></div>  
    </body>  
    </html>  