  <!DOCTYPE html>  
     <head>
       <link rel="stylesheet" type="text/css" href="transfer.css">
     </head>
     <body>
    <h1>Online Banking_Forget Password</h1> 
    <form action="" method="post">
    <fieldset>
        <legend>Account Information
		</legend>	
			<p>
               <label>*User Name : 
               </label>
               <input type="text" name= "username" class="long"/>
            </p>
			<p>
			<p>NOTE:If you can not enter the username please enter your email.</p> 
              
				<p>
                    <label value="Email"><strong>*Email Address :</strong></label>
					<input id="Email"type="Email" class="long"  required>
                    
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
               <input type="text" name= "answer" class="long"/>
            </p>
	</fieldset>
	<br>
	<p>NOTE:During the registration you had answer a question!</p> 
	</br>
	<div><button class="button"> SUBMIT </button></div>
     
    </form>  
    </body>  
    </html>  