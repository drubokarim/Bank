   <?php session_start();?>
    <!DOCTYPE html>  
     <head>
     <title>Edit Profile</title> 
     <link rel="stylesheet" type="text/css" href="AccountInformation.css">
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
     <input type="submit" id="button" value="Transfer" formaction="http://localhost/wt/transfer.php">
     <input type="submit" id="button" value="Statements" formaction="http://localhost/wt/statements.php">
     <input type="submit" id="button" value="Settings" formaction="http://localhost/wt/Settings.php">
     <input type="submit" style="color: black;" id="button" value="Profile" formaction="http://localhost/wt/AccountInformation.php">
     <input type="submit" id="button" value="Logout" formaction="http://localhost/wt/login.php">
</fieldset>
</div>
</form>
    <div class="Pos">
    <form method="post" action="">
    <fieldset class="Pos">
        <legend><h1>Edit Profile</h1> 
		</legend>
        <legend> USER INFORMATION</legend>
			<p>
               <label>*First Name : 
               </label>
               <input type="text" name= "firstname" class="long" required>
            </p>
			<p>
                <label >*Last Name :
                </label>
                <input type="text" name= "lastname" class="long" maxlength="10" required>
            </p>
            <p>
               <label>Date Of Birth :
               </label>
                 </label><br>
                    <select class="date" name="day" value="<?php //echo $_POST["day"];?>" required >
                        
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
                    <select class="month" name="month" value="<?php //echo $_POST["month"];?>" required>
                        
                        <option value="1" <?php if(isset($month) && $month=="1") echo "selected";?>>January
                        </option>
                        <option value="2" <?php if(isset($month) && $month=="2") echo "selected";?>>February
                        </option>
                        <option value="3" <?php if(isset($month) && $month=="3") echo "selected";?>>March
                        </option>
                        <option value="4" <?php if(isset($month) && $month=="4") echo "selected";?>>April
                        </option>
                        <option value="5" <?php if(isset($month) && $month=="5") echo "selected";?>>May
                        </option>
                        <option value="6" <?php if(isset($month) && $month=="6") echo "selected";?>>June
                        </option>
                        <option value="7" <?php if(isset($month) && $month=="7") echo "selected";?>>July
                        </option>
                        <option value="8" <?php if(isset($month) && $month=="8") echo "selected";?>>August
                        </option>
                        <option value="9" <?php if(isset($month) && $month=="9") echo "selected";?>>September
                        </option>
                        <option value="10" <?php if(isset($month) && $month=="10") echo "selected";?>>October
                        </option>
                        <option value="11" <?php if(isset($month) && $month=="11") echo "selected";?>>November
                        </option>
                        <option value="12" <?php if(isset($month) && $month=="12") echo "selected";?>>December
                        </option>
                    </select>
                    <input class="year" name="year" type="text" size="4" maxlength="4" minlength="4" value="<?php echo $year;?>" required>
                </p>
				<p>
                    <label value="Email"><strong>*Email Address :</strong></label>
					<input id="Email" type="email" class="long"  required>
                    
                </p>
				<p>
                    <label value="password"><strong>*Confirm Password :</strong></label>
					<input id="password" type="password" class="long" minlength="5" maxlength="10" required>

                  
    
	<br>
	
	
	</br>
	
        <legend>CONTACT DETAILS
		</legend>	
			<p> 
			   <label>Phone Number :
               </label>
               <input type="text" class="long" name="mobile" pattern="01[0-9]*" value="<?php //echo $mobiles;?>" maxlength="11" minlength="11" required>
            </p>
			
                
            
			
	
	<br>
	
	</br>
	
    
        <legend>PRESENT ADDRESS
		</legend>	
			<p>
               <label>Address : 
               </label>
               <input type="text" name= "address" class="long" required>
            </p>
			
			<p>
               <label>City : 
               </label>
               <input type="text" name= "city" class="long" required>
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
               <label>Zip Code : 
               </label>
               <input type="text" name= "zipcode" class="long" required>
            </p>
			 
                
    
	<br>
	
	</br>
	
        <legend>SECURITY UPDATE
		</legend>	
			<p>
               <label>Question : 
               </label>
               
			    <select class="long" name="question" value="<?php echo $_POST["question"]; ?>" required>
                    
                    <option value="1"  <?php if(isset($question) && $question=="1") echo "selected";?> class="long">what is your favourite color ?</option>
                    
                    <option value="2"  <?php if(isset($question) && $question=="2") echo "selected";?> class="long">what is your favourite fruit ?</option>
                    
                    <option value="3"  <?php if(isset($question) && $question=="3")  echo "selected";?> class="long">what is your favourite flower ?</option>
                   
                    <option value="4"  <?php if(isset($question) && $question=="4")echo "selected";?> class="long">what is your favourite food ?</option> 
                     
                </select>
            </p>
			<p>
               <label>Answer : 
               </label>
               <input type="text" name= "answer" class="long"/>
            </p>
            
            <input type="submit" id="bttn" name="save" value="Save" > 
	</fieldset>
	<br>
	
	</br>
	
     
    </form> 
    </div> 
    </body>  
    </html>  