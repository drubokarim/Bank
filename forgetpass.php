 <?php session_start();?>
  <!DOCTYPE html>  
     <head>
       <link rel="stylesheet" type="text/css" href="transfer.css">
     </head>
     <body>
     <?php
     if($_SERVER["REQUEST_METHOD"]=="POST")
     {
      $con=mysqli_connect("localhost","ASD","123");
      if(!$con)
      {
        echo "<script type='text/javascript'>alert('error!couldnot connect')</script>";
      }
      elseif(mysqli_select_db($con,"bank"))
     {
           echo "<script type='text/javascript'>alert('email:".$_POST["email"]."  username".$_POST["username"]." id:".$_POST["question"]." Answer:".$_POST["answer"]."')</script>";
           $sql="select count(*) from User where EMAIL='".$_POST["email"]."' or USERNAME='".$_POST["username"]."' and (SECURITYID=".$_POST["question"]." and SECURITYANSWER='".md5($_POST["answer"])."')";
           $result=mysqli_query($con,$sql);
           if($result)
           {
            $i=0;
               while ( $row=mysqli_fetch_array($result)) {
                  $i=$row["count(*)"];
               }
               if($i==0)
               {
                 echo "<script type='text/javascript'>alert('wrong input given')</script>";
               }
               else
               {
                 header("Location: http://localhost/wt/resetpass.php");
                 $_SESSION["email"]=$_POST["email"];
               }
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
?>
    <h1>Online Banking_Forget Password</h1> 
    <form action="" method="post">
    <fieldset>
        <legend>Account Information
		</legend>	
			<p>
               <label>*User Name : 
               </label>
               <input type="text" name= "username"  pattern="[a-zA-Z ]*">
            </p>
			<p>
			<p>NOTE:If you can not enter the username please enter your email and email address is mendatory.</p> 
              
				<p>
                    <label value="Email"><strong>*Email Address :</strong></label>
					<input id="Email" type="Email" name="email"  required>
                    
                </p>
				

    </fieldset>	                
    
	<br>
	
	
 
			<p>
               <label>Question : 
               </label>
               
			   <select name="question" class="long">
					<option>
					</option>
                    
                    <option value="1" class="long">What is your favourite Color?
                    </option>
					<option value="2" class="long">What is your favourite fruit?
                    </option>
					<option value="3" class="long">What is your favourite flower?
                    </option>
					<option value="4" class="long">What is your favourite food?
                    </option>
                </select>
            </p>
			<p>
               <label>Answer : 
               </label>
               <input type="Password" name= "answer" class="long"/>
            </p>
	</fieldset>
	<br>
	<p>NOTE:During the registration you had answer a question!</p> 
	</br>
	<input type="submit" name="submit" value="submit" formaction="">
     
    </form>  
    </body>  
    </html>  